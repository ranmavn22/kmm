<?php
/**
 * Template Name: Báo giá
 */

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

get_header();
while (have_posts()) : the_post();
    ?>

    <div class="baogia">
        <h1><?php the_title() ?></h1>

        <?php $loop = new WP_Query(array(
                'post_type' => 'products',
                'posts_per_page' => -1,
                /*'tax_query' => array(
                    array(
                        'taxonomy' => 'category_products',
                        'field' => 'id',
                        'terms' => $term,
                    ),
                ),*/
            )
        );
        while ($loop->have_posts()) : $loop->the_post();
            include __DIR__ . '/includes/item_product_detail.php';
        endwhile; ?>
    </div>

<?php
endwhile;
get_footer('thanks');
