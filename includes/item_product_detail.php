<?php
if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}

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
echo $html
?>

