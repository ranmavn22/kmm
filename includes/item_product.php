<?php
if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}
?>
<div class="productItem">
    <a href="javascript:;"><?php echo get_the_post_thumbnail($post->ID,'custom_larger_3')?></a>
    <h3><a href="javascript:;"><?php echo get_the_title($post->ID)?></a></h3>
</div>
