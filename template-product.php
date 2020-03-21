<?php
/**
 * Template Name: Sản phẩm
 */

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

get_header();
while (have_posts()) : the_post();
    ?>

    <div class="product productCat">
        <h1><?php the_title() ?></h1>
        <?php
        $terms = get_terms(array(
            'taxonomy' => 'category_products',
            'hide_empty' => false,
        ));
        ?>
        <ul class="subMenu">
            <?php
            if (!empty($terms)) {
                $flgActive = true;
                $term = '';
                foreach ($terms as $term) {
                    ?>
                    <li><a href="#" class="<?php echo $flgActive ? 'active' : '' ?> jsGetProduct"
                           data-term="<?php echo $term->term_id ?>"><?php echo $term->name ?></a></li>
                    <?php
                    $term = $term ? $term : $term->term_id;
                    $flgActive = false;
                }
            }
            ?>
        </ul>
        <div class="productList productList2 jsAreaProduct">
            <?php $loop = new WP_Query(array(
                    'post_type' => 'products',
                    'posts_per_page' => -1,
                    'tax_query' => array(
                        array(
                            'taxonomy' => 'category_products',
                            'field' => 'id',
                            'terms' => $term,
                        ),
                    )
                )
            );
            while ($loop->have_posts()) : $loop->the_post();
                include __DIR__ . '/includes/item_product.php';
            endwhile; ?>
        </div>
    </div>

<?php
endwhile;
get_footer('thanks');
