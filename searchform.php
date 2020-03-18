<?php
/**
 * The template for displaying search forms in Generate
 *
 * @package GeneratePress
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}
?>
<form method="get" class="search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
    <input type="hidden" name="post_type" value="post"/>
    <input type="search" class="search-field" placeholder="Nhập nội dung tìm kiếm" value="<?php echo esc_attr( get_search_query() ); ?>" name="s" title="Nhập nội dung tìm kiếm">
    <button type="submit" class="submitBtn">Tìm kiếm</button>
</form>
