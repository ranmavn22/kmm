<?php
if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

$detail = get_field('product_detail', $post->ID);
$detailMore = get_post_meta($post->ID, 'product_detail', true);
?>
<div class="contentBox dichvumoi">
    <div class="left">
        <div class="vidContainer"><?php echo get_the_post_thumbnail($post->ID, 'custom_larger') ?></div>
        <p>
            <span><?php echo(!empty($detail['gia_cu']) ? $detail['gia_cu'] : "") ?>
                <?php if (!empty($detail['giam_gia'])) { ?>
                    <i class="icon"><?php echo $detail['giam_gia'] ?></i>
                <?php } ?>
            </span>
            <br/><?php echo(!empty($detail['gia_moi']) ? $detail['gia_moi'] : "") ?></p>
        <a href="javascript:;" class="tuvanBtn">ĐẶT NGAY</a>
    </div>

    <div class="right">
        <h2><?php echo $post->post_title ?></h2>
        <p><?php echo $post->post_content ?></p>
        <h3><i class="icon"></i>Corporate Art gồm có nhừng gì?</h3>
        <ul>

            <?php if (!empty($detail['kich_ban'])) { ?>
                <li>Kịch bản<span><?php echo $detail['kich_ban'] ?></span></li>
            <?php } ?>

            <?php if (!empty($detail['chat_luong_hinh_anh'])) { ?>
                <li>Chất lượng hình ảnh<span><?php echo $detail['chat_luong_hinh_anh'] ?></span></li>
            <?php } ?>

            <?php if (!empty($detail['thoi_luong'])) { ?>
                <li>Thời lượng<span><?php echo $detail['thoi_luong'] ?></span></li>
            <?php } ?>

            <?php if (!empty($detail['am_nhac'])) { ?>
                <li>Âm nhạc<span><?php echo $detail['am_nhac']?></span></li>
            <?php } ?>

            <?php if (!empty($detail['thoi_gian_thuc_hien'])) { ?>
                <li>Thời gian thực hiện<span><?php echo $detail['thoi_gian_thuc_hien'] ?></span></li>
            <?php } ?>

            <?php if (!empty($detailMore)) {
                foreach ($detailMore as $item) {
                    ?>
                    <li><?php echo $item["label"] ?>span><?php echo $item["detail"] ?></span></li>
                <?php }
            } ?>

        </ul>
        <a href="javascript:;">Tìm hiểu thêm<i class="icon"></i></a>
    </div>
    <div class="clear"></div>
</div>

