<?php
if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}

function products_init() {
    register_post_type( 'products', array(
        'labels'            => array(
            'name'                => __( 'Products', 'enfold' ),
            'singular_name'       => __( 'Product', 'enfold' ),
            'all_items'           => __( 'All Products', 'enfold' ),
            'new_item'            => __( 'New Product', 'enfold' ),
            'add_new'             => __( 'Add New', 'enfold' ),
            'add_new_item'        => __( 'Add New Product', 'enfold' ),
            'edit_item'           => __( 'Edit Product', 'enfold' ),
            'view_item'           => __( 'View Product', 'enfold' ),
            'search_items'        => __( 'Search Products', 'enfold' ),
            'not_found'           => __( 'No Products found', 'enfold' ),
            'not_found_in_trash'  => __( 'No Products found in trash', 'enfold' ),
            'parent_item_colon'   => __( 'Parent Products', 'enfold' ),
            'menu_name'           => __( 'Products', 'enfold' ),
        ),
        'public'            => true,
        'hierarchical'      => false,
        'show_ui'           => true,
        'show_in_nav_menus' => true,
        'supports'          => array( 'title', 'editor', 'thumbnail' ),
        'has_archive'       => true,
        'rewrite'           => true,
        'query_var'         => true,
        'menu_icon'         => 'dashicons-admin-post',
        'show_in_rest'      => true,
        'rest_base'         => 'products',
        'rest_controller_class' => 'WP_REST_Posts_Controller',
    ) );
}
add_action( 'init', 'products_init' );

function category_product_init() {
    register_taxonomy( 'category_products', array( 'products' ), array(
        'hierarchical'      => true,
        'public'            => true,
        'show_in_nav_menus' => true,
        'show_ui'           => true,
        'show_admin_column' => false,
        'query_var'         => true,
        'rewrite'           => true,
        'capabilities'      => array(
            'manage_terms'  => 'edit_posts',
            'edit_terms'    => 'edit_posts',
            'delete_terms'  => 'edit_posts',
            'assign_terms'  => 'edit_posts'
        ),
        'labels'            => array(
            'name'                       => __( 'Category products', '' ),
            'singular_name'              => _x( 'Category products', 'taxonomy general name', '' ),
            'search_items'               => __( 'Search category products', '' ),
            'popular_items'              => __( 'Popular category products', '' ),
            'all_items'                  => __( 'All category products', '' ),
            'parent_item'                => __( 'Parent category products', '' ),
            'parent_item_colon'          => __( 'Parent category products:', '' ),
            'edit_item'                  => __( 'Edit category products', '' ),
            'update_item'                => __( 'Update category products', '' ),
            'add_new_item'               => __( 'New category products', '' ),
            'new_item_name'              => __( 'New category products', '' ),
            'separate_items_with_commas' => __( 'Separate category products with commas', '' ),
            'add_or_remove_items'        => __( 'Add or remove category products', '' ),
            'choose_from_most_used'      => __( 'Choose from the most used category products', '' ),
            'not_found'                  => __( 'No category products found.', '' ),
            'menu_name'                  => __( 'Category products', '' ),
        ),
        'show_in_rest'      => true,
        'rest_base'         => 'category_products',
        'rest_controller_class' => 'WP_REST_Terms_Controller',
    ) );

}
add_action( 'init', 'category_product_init' );