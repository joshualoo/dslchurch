<?php
/**
 * when including this file you should have a $video_url and $video_ratio
 * variable set.
 */
?>
<div class="default-iframe-size embed-responsive embed-responsive-<?php echo $video_ratio; ?>">
	<iframe class="embed-responsive-item" src="<?php echo $video_url; ?>" frameborder="0" allowfullscreen></iframe>
</div>