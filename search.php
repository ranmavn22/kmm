<?php
/**
 * The template for displaying Search Results pages.
 *
 * @package GeneratePress
 */

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

get_header(); ?>
    <div class="tuyendung">
        <h1><?php printf(__('Tìm kiếm: %s', 'generatepress'), '' . get_search_query() . ''); ?></h1>
        <?php if (have_posts()) : ?>
            <div class="dstuyendung">
                <?php while (have_posts()) : the_post();
                    ?>
                    <div class="item">
                        <div class="imgBox">
                            <a href="<?php echo get_permalink($post->ID)?>" title="<?php the_title() ?>"><?php echo get_the_post_thumbnail($post->ID, 'square_thumbnail', array('alt' => get_the_title())) ?></a>
                        </div>
                        <div class="noidung">
                            <h2><a href="<?php echo get_permalink($post->ID)?>" title="<?php the_title() ?>"><?php the_title() ?></a></h2>
                            <div>
                                <p><?php echo wp_trim_words($post->post_content,20)?></p>
                            </div>
                        </div>
                        <div class="clearDiv"></div>
                    </div><!--end item-->
                <?php
                endwhile; ?>
            </div>
        <?php
        else :
            echo "<p class='textCenter'>Không tìm thấy kết quả</p>";
        endif;
        ?>
    </div>

<?php
get_footer();
