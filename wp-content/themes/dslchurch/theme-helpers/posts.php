<?php

add_filter( 'posts_where', 'post_content_is_like_filter', 10, 2 );
add_filter( 'posts_where', 'post_title_is_like_filter', 10, 2 );
// add_filter( 'terms_clauses','filter_terms_by_post_type',10,3);

/**
 * This filter takes the posts_where filter and adds an additional argument for doing wp queries. The added argument is called 'post_content_like'. This argument checks if posts have your search word either in the title of the post or the content.
 * 
 * @param  [string] $where
 *         sql query string for the post search
 * @param  [object] $wp_query
 *         the query OBJECT
 * @return [string]
 *         returns new where sql string if argument was passed
 * @usage 
 * 		   $args = array(
 * 		   		posts_per_page = 5,
 * 		   		post_type = 'post',
 * 		   		post_content_like = 'foo' // title or content that contains 'foo'
 * 		   );
 *
 * 		   $query = new WP_Query( $args );
 */
function post_content_is_like_filter( $where, $wp_query ) {
	global $wpdb;
	if ( $post_content_like = $wp_query->get( 'post_content_like' ) ) {

		$where .= ' AND (' . $wpdb->posts . '.post_title LIKE \'%' . esc_sql( $wpdb->esc_like( $post_content_like ) ) . '%\'';

		$where .= ' OR ' . $wpdb->posts . '.post_content LIKE \'%' . esc_sql( $wpdb->esc_like( $post_content_like ) ) . '%\')';
			
	}
	return $where;
}

function post_title_is_like_filter( $where, $wp_query ) {
	global $wpdb;
	if ( $post_title_like = $wp_query->get( 'post_title_like' ) ) {

		$where .= ' AND ' . $wpdb->posts . '.post_title LIKE \'%' . esc_sql( $wpdb->esc_like( $post_title_like ) ) . '%\'';
			
	}
	return $where;
}

function get_featured_image_url($post, $size='thumbnail') {

	if( gettype($post) === 'integer' ) {
		// we will assume it is the post id
		$post = get_post($post);
	}

	if(has_post_thumbnail( $post->ID )) {
		$image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), $size );

		if( $image ) {
			return $image[0];
		}

	}

	return false;
}

function filter_terms_by_post_type( $pieces, $tax, $args){
	global $wpdb;

	if( !isset($args['post_types']) ) {
		return $pieces;
	}

	//Don't use db count
	$pieces['fields'] .=", COUNT(*) " ;

	//Join extra tables to restrict by post type.
	$pieces['join'] .=" INNER JOIN $wpdb->term_relationships AS r ON r.term_taxonomy_id = tt.term_taxonomy_id 
	                INNER JOIN $wpdb->posts AS p ON p.ID = r.object_id ";

	//Restrict by post type and Group by term_id for COUNTing.
	$post_types_str = implode(',',$args['post_types']);
	$pieces['where'].= $wpdb->prepare(" AND p.post_type IN(%s) GROUP BY t.term_id", $post_types_str);

	return $pieces;
}

function get_custom_pagination($query) {

	$big = 999999999; // need an unlikely integer

	$pagination_args = array(
		'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
		'format' => '?paged=%#%',
		'current' => max( 1, get_query_var('paged') ),
		'total' => $query->max_num_pages
	);

	return paginate_links( $pagination_args );
}