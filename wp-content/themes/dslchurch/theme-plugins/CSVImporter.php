<?php
/*
 * --------------  General CSV Importer Tool ----------------
 * For use by extending the class, statically calling the parent constructor
 * and providing a name/post_type for the post type you are trying to import
 * 
 * the parent class (CSVImporter) will then use the given name value to populate 
 * the labels for the menu option.
 */

//an example use case
/*
 * class ExampleClass extends CSVImporter {
 * 		public function __construct () {
 * 			parent::__construct('custom_post_type');
 * 			$this->dataHandlers = array(
 * 				"FieldName1" => "field1Handler".
 * 				"FieldName2" => "field2Handler".
 * 			);
 * 		}
 *
 * 		public function field1Handler () { your code here }
 * 		public function field2Handler () { your code here }
 * }
 * Make sure you instatiate your child class 
 * YOU DO NOT NEED TO INSTANTIATE THE PARENT CLASS "CSVImporter" this will cause errors 
 * simply include this file before instantiating child classes
 * new ExampleClass ();
 */
class CSVImporter {
	// this is a property of this class BT dubs these are accessible by child classes 
	// AKA ExampleClass if set to public or protected but only by this class if set 
	// to private
	//
	// these can be set at anytime look at (*1)
	public $postObject;
	public function __construct ($postType = "post", $idCheckers = []) {
		// assigns the provided name of the postType property
		// please make sure the correct post type name for the custom post type
		// you are trying to import is used as this value will be used later for
		// creating the Post of that given Post Type 
		/* (*1) */$this->postType = str_replace(" ", "_",  strtolower($postType));
		add_action('admin_menu', [$this, 'importerSetUp']); 
	}
	public function checkWPDatabase ($row, $idCheck) {
		$args = [
			'post_type' => $this->postType,
			'posts_per_page' => '1',
			'meta_query' => [
				[
					'key' => $idCheck,
					'value' => $row[$idCheck],
					'compare' => '=',
				],
			],
		];
		$post = new WP_Query($args);
		if ($post->found_posts) { 
			$this->postObject = $post->post; 
		}
	}
	public function importerSetUp () {
		// given the post type name this function will convert the post type to readable
		// text for the tool that will be listed underneath the settings tab of the 
		// wordpress installation
		// in your child class create a method called "render" this method will be called
		// by this class to render a ui to the tool 
		add_options_page(
			ucfirst($this->postType) . " Importer Tool", 
			ucfirst($this->postType) . " Importer", 
			"manage_options", 
			"{$this->postType}-importer-tool", 
			[$this, "render"]
		);
	}
	public function renameFields ($field) {
		// this function will rename the field name by making the field lower case
		// and search and replacing the " char with nothing and the a space char with an
		// underscore
		// I.E. Field Name -> fieldname
		// this is to provide consistency and improved searching capability
		// *semantic shit*
		// the new field name is then returned 
		if ($field) {
			// this strips away any chars that aren't specifically letters and spaces
			$field = preg_replace("/[^a-zA-Z ]/", "", $field);
			$newField = trim(str_replace(["\"", " ",], ["", "_"], strtolower($field)));
			$this->fieldNameMap->{$newField} = $field;
			return $newField;
		}
	}
	public function updatePostMeta ($value, $key) {
		// This function will simply insert a post meta value into the database
		// and attach it to a post id if one has been assigned to the postObject 
		// property of this class
		if ($value == 'False' || $value == 'false') {
			$value = 0;
		}
		else if ($value == 'True' || $value == 'true') {
			$value = 1;
		}
		if ($this->postObject->ID) {
			update_post_meta($this->postObject->ID, $key, $value); 
		}
	}
	public function importerHandleCSV () {
		/*
		 * By default i've set the class to look for a "csv" input field name
		 * for the csv file make sure to replicate this is in your UI in the render
		 * method 
		 *
		 * <input name="csv" type='file' />
		 *
		 * Set this input attribute to limit file type submissions 
		 * to only CSVs: accept=".csv"
		 *
		 * <input name="csv" type='file' accept=".csv"/>
		 */
		if (isset($_FILES['csv'])) {
			$file = $_FILES['csv'];
			// this function will open the temporary version of the file submitted
			// for reading, thats what the "r" parameter is for.
			// the csv tmp_name property points to the temporary path of the file
			$openFile = fopen($file['tmp_name'], "r");
			// In runtime order:
			// - "fgetcsv" function will read the first line of the "open CSV" and return
			// 	 the line as an array 
			// 	 I.E.: FieldName1, FieldName2, FieldName3 -> ["FieldName1","FieldName2","FieldName3"]  
			//
			// - "array_map" will then run the "renameFields" method on every index of the array 
			// 	 renameFields("FieldName1")
			// 	 renameFields("FieldName2")
			// 	 renameFields("FieldName3")
			// 	 and map them to the $fields variable
			//
			$fields = array_map([$this, 'renameFields'], fgetcsv($openFile));
			// "fgetcsv" function will move the internal pointer to the next row of the csv
			// and return an array of the CSV row values 
			// Visual representation:
			// 0 => ["FieldName1", "FieldName2"]
			// 1 => ["FieldName1Value", FieldName2Value"] 
			// while the open CSV is still returning rows the script will continue to loop through the CSV
			while ($row = fgetcsv($openFile)) {
				$this->postObject = new StdClass();
				// array_combine will merge one array of keys with on array of values and create
				// an associative array as long as they have the same amount of values assigned
				// I.E.:
				// array_combine(["FieldName1", "FieldName2"], ["FieldName1Value", "FieldName2Value"]);
				// 			==
				// array(
				// "FieldName1" => "FieldName1Value",
				// "FieldName2" => "FieldName2Value",
				// );
				// so this function as used will return an associative array using the field names as keys
				// and the current read row and values for those keys
				$row = array_combine($fields, $row);
				// set the idCheckers property as an array of fields to use to check against the current
				// wordpress installation in the checkWPDatabase method.
				if  (!empty($this->idCheckers)) {
					foreach ($this->idCheckers as $idCheck) {
						// if the id checker field name exists in the row keys it the system will send
						// the current row and the field it uses to check to the checkWPDatabase method
						if (!$row[$idCheck]) continue;

						$this->checkWPDatabase($row, $idCheck);
						// if the postObject id is assigned it means an post was found with a post meta
						// value equaling to the value of the key value pair provided by the field name
						// given if this is true then the loop will break and skip the rest of the 
						// idChecker values
					}

					// if after the loop no post id is found then the system will create a new post object
					// that can later be inserted into the database through child class datahandlers
					if (!$this->postObject->ID) {
						$this->postObject = [
							'post_type' => $this->postType,
							'post_content' => '',
							'post_status' => 'publish',
							'comment_status' => 'closed',
							'ping_status' => 'closed',
						];
						$this->postObject = (object)$this->postObject;
					}
				}
				// this part of the script will run only if you want data to be handled in a specific way
				// create an array with the field name that you want a certain funciton to run on as the key
				// and the name of the function in your child class as the value
				// I.E.:
				// $this->dataHandlers = array(
				// 		"FieldName1" => "field1Handler",
				// 		"FieldName2" => "field2Handler",
				// ); 
				// the given function will need to permit 2 parameters one for the associative array of the row
				// and one for the key the function is running on
				// public function field1Handler ($row, $key) { your code here }
				// BT Dubs the order will matter when setting dataHandlers property be careful, make sure to 
				// plan how you handle csv data
				if (!empty($this->dataHandlers)) {
					foreach ($this->dataHandlers as $key => $function) {
						if (isset($row[$key])) $this->{$function}($row, $key);
					}
				}
				//only will attach post meta and update the post object if one is already set as the postObject property
				if ($this->postObject->ID) {
					// "array_walk" function will provide the updatePostMeta class method with each key value pair of
					// row associative array, different from "array_map" which only passes the value 
					array_walk($row, [$this, 'updatePostMeta']);
					// "wp_insert_post" will insert the compiled new/updated post of given post type into the database
					// it will update the post if the ID property is present in $this->postObject and create a new post if 
					// it is missing (edit: im not sure about this actually :P, do your research) 
					// has to be array
					// this is called casting, used to quickly change between types, not so important in earlier
					// versions of php but will be important moving forward as php moves to more secure data structures
					// see php 7 documentation.
					// $postArray = (array)$this->postObject;
					// wp_insert_post($postArray, true);
				}
			}
		}
	}
	public function render() { ?>
		<?php
		// this function is called on render including after form submission
		// it will check if file of the correct name is submitted if it is
		// then the rest of the method will run.
		//
		// see importerHandleCSV method for more detail
		// this will not be carried over with you overwrite the render method in your child class
		// make sure you add this in your new form in the new render method 
		$this->importerHandleCSV();
		// default layout for the importer with a simple form
		?>
		<div class='container'>
			<h1>General CSV Importer for <?= ucfirst($this->postType); ?></h1>
			<form  method="post" enctype="multipart/form-data">
				<p>
					<b>CSV file:</b><input type='file' name='csv' accept='.csv'/>
				</p>
				<?php submit_button('Import') ?>
			</form>
		</div>
	<?php }
}
