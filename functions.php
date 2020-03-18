<?php
if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}

function wpdocs_theme_name_scripts() {
    wp_enqueue_style( 'slick-style', get_stylesheet_directory_uri() . '/assets/styles/slick.css' );
    wp_enqueue_style( 'slick-theme-style', get_stylesheet_directory_uri() . '/assets/styles/slick-theme.css' );
    wp_enqueue_style( 'basic-style', get_stylesheet_directory_uri() . '/assets/styles/basicStyle.css' );
    wp_enqueue_style( 'responsive-style', get_stylesheet_directory_uri() . '/assets/styles/responsiveStyle.css?v=0.1' );
    wp_enqueue_style( 'theme-style', get_stylesheet_directory_uri() . '/style.css?v=0.2' );
    wp_enqueue_script( 'slick_script', get_stylesheet_directory_uri() . '/assets/js/slick.min.js', array('jquery') );
    wp_enqueue_script( 'app_script', get_stylesheet_directory_uri() . '/assets/js/myScript.js', array('jquery') );
    wp_localize_script( 'app_script', 'ajax_url', array( 'ajax_url' => admin_url( 'admin-ajax.php' ) ) );

}
add_action( 'wp_enqueue_scripts', 'wpdocs_theme_name_scripts' );

add_action('admin_enqueue_scripts', 'customAdminStyle');
if (!function_exists("customAdminStyle")):
    function customAdminStyle()
    {
        wp_enqueue_style('my_admin-style', get_stylesheet_directory_uri() . '/assets/styles/style_admin.css');
        wp_enqueue_script('my_custom_script_admin', get_stylesheet_directory_uri() . '/assets/js/custom_admin.js', array('jquery'));
    }
endif;

add_action( 'after_setup_theme', 'tu_remove_dynamic_css' );
function tu_remove_dynamic_css() {
    remove_action( 'wp_enqueue_scripts', 'generate_enqueue_dynamic_css', 50 );
}

function custom_dequeue() {
    wp_dequeue_style('generate-style');
    wp_deregister_style('generate-style');
}
add_action( 'wp_enqueue_scripts', 'custom_dequeue', 9999 );

add_image_size('custom_larger',722,404, true);
add_image_size('custom_larger_2',651,368, true);
add_image_size('custom_larger_3',424,225, true);
add_image_size('custom_larger_4',412,412, true);
add_image_size('custom_small',168,106, true);
include_once __DIR__."/posttype/product.php";
include_once __DIR__."/metabox/metabox_product_detail.php";

if (!function_exists('getProductCallback')):
    function getProductCallback($atts)
    {
        $param = shortcode_atts( array(
            'category' => '',
            'product_id' => 0,
        ), $atts );

        $args = array(
            'posts_per_page' => -1,
            'offset' => 0,
            'post_type' => 'products',
            'post_status' => 'publish',
            'include' => $param['product_id']
        );

        $posts = get_posts($args);
        $html = '';

        if (!empty($posts)) {
            foreach ($posts as $post) {
                $detail = get_field('product_detail', $post->ID);
                $detailMore = get_post_meta($post->ID, 'product_detail', true);
                $html .= '<div class="contentBox dichvumoi">';
                $html .= '<div class="left">';
                $html .= '<div class="vidContainer">'.get_the_post_thumbnail($post->ID,'custom_larger').'</div>';
                $html .= '<p><span>'. (!empty($detail['gia_cu']) ? $detail['gia_cu'] : "") .''. (!empty($detail['giam_gia']) ? '<i class="icon">'.$detail['giam_gia'].'</i></span>' : "") .'<br/>'. (!empty($detail['gia_moi']) ? $detail['gia_moi'] : "") .'</p>';
                $html .= '<a href="javascript:;" class="tuvanBtn">ĐẶT NGAY</a>';
                $html .= '</div>';

                $html .= '<div class="right">';
                $html .= '<h2>'. $post->post_title .'</h2>';
                $html .= '<p>'. $post->post_content .'</p>';
                $html .= '<h3><i class="icon"></i>Corporate Art gồm có nhừng gì?</h3>';
                $html .= '<ul>';

                if(!empty($detail['kich_ban']))
                    $html .= '<li>Kịch bản<span>'.$detail['kich_ban'].'</span></li>';

                if(!empty($detail['chat_luong_hinh_anh']))
                    $html .= '<li>Chất lượng hình ảnh<span>'.$detail['chat_luong_hinh_anh'].'</span></li>';

                if(!empty($detail['thoi_luong']))
                    $html .= '<li>Thời lượng<span>'.$detail['thoi_luong'].'</span></li>';

                if(!empty($detail['am_nhac']))
                    $html .= '<li>Âm nhạc<span>'.$detail['am_nhac'].'</span></li>';

                if(!empty($detail['thoi_gian_thuc_hien']))
                    $html .= '<li>Thời gian thực hiện<span>'.$detail['thoi_gian_thuc_hien'].'</span></li>';

                if(!empty($detailMore))
                    foreach ($detailMore as $item){
                        $html .= '<li>'.$item["label"].'<span>'.$item["detail"].'</span></li>';
                    }

                $html .= '</ul>';
                $html .= '<a href="javascript:;">Tìm hiểu thêm<i class="icon"></i></a>';
                $html .= '</div>';
                $html .= '<div class="clear"></div>';
                $html .= '</div>';
            }
        }

        return $html;
    }
    add_shortcode('product_detail', 'getProductCallback');
endif;

if (!function_exists('listProductsCallback')):
    function listProductsCallback($atts)
    {
        $param = shortcode_atts( array(
            'products' => '',
        ), $atts );

        $args = array(
            'posts_per_page' => -1,
            'offset' => 0,
            'post_type' => 'products',
            'post_status' => 'publish',
            'include' => $param['products']
        );

        $posts = get_posts($args);
        $html = '';
        if (!empty($posts)) {
            $html .= '<div class="productList productSlide">';
            foreach ($posts as $post) {
                $html .= '<div class="productItem">';
                $html .= '<a href="'.get_permalink($post->ID).'" title="'. get_the_title($post->ID) .'">' . get_the_post_thumbnail($post->ID,'custom_larger_3') . '</a>';
                $html .= '<h3><a href="'.get_permalink($post->ID).'" title="'. get_the_title($post->ID) .'">'.$post->post_title.'</a></h3>';
                $html .= '</div>';
            }
            $html .= '</div>';
        }
        return $html;
    }
    add_shortcode('slide_product', 'listProductsCallback');
endif;

if (!function_exists('listPartnerCallback')):
    function listPartnerCallback($atts)
    {
        $posts = get_posts(array('post_type' => 'attachment',
                'posts_per_page' => -1,
                'tax_query' => array(
                    array(
                        'taxonomy' => 'media_category',
                        'field'    => 'slug',
                        'terms'    => 'doi-tac',
                    ),
                ),
            )
        );

        $html = '';
        if (!empty($posts)) {
            $html .= '<ul>';
            foreach ($posts as $post) {
                $img = wp_get_attachment_image_src($post->ID, "custom_small");
                $html .= '<li><img src="'.$img[0].'" width="168" height="106" alt=""/></li>';
            }
            $html .= '</ul>';
        }
        return $html;
    }
    add_shortcode('list_partner', 'listPartnerCallback');
endif;

if (!function_exists('listMemberCallback')):
    function listMemberCallback($atts)
    {
        $posts = get_posts(array('post_type' => 'attachment',
                'posts_per_page' => -1,
                'orderby'          => 'date',
                'order'            => 'DESC',
                'tax_query' => array(
                    array(
                        'taxonomy' => 'media_category',
                        'field'    => 'slug',
                        'terms'    => 'thanh-vien',
                    ),
                ),
            )
        );

        $html = '';
        if (!empty($posts)) {
            $html .= '<div class="memberList">';
            foreach ($posts as $post) {
                $img = wp_get_attachment_image_src($post->ID, "custom_larger_4");
                $html .= '<div class="member1">';
                $html .= '<img src="'.$img[0].'" alt=""/>';
                $html .= '<h3>'.$post->post_title.'</h3>';
                $html .= '<p>'.$post->post_excerpt.'</p>';
                $html .= '</div>';
            }
            $html .= '<div class="clear"></div>';
            $html .= '</div>';
        }
        return $html;
    }
    add_shortcode('list_member', 'listMemberCallback');
endif;