<?php
if (!defined('ABSPATH')) {
    die();
}
if(!function_exists("productDetail")) {
    function productDetail()
    {
        add_meta_box('product_detail', 'Chi tiết khác', 'productDetailCallback', 'products');
    }
}

add_action('add_meta_boxes', 'productDetail');
if(!function_exists("productDetailCallback")) {
    function productDetailCallback($post)
    {
        $value_editor = get_post_meta($post->ID, 'product_detail', true); ?>
        <div class="wrapMetaBox">
            <div class="contentMetaBox">
                <?php if(!empty($value_editor)){
                    $num = 0;
                    foreach ($value_editor as $item){
                        $index = $num++; ?>
                        <div class="item">
                            <p><input type="text" value="<?php echo $item["label"]?>" name="product_detail[<?php echo $index?>][label]" placeholder="Label"></p>
                            <p><input type="text" class="valueDetail" value="<?php echo $item["detail"]?>" name="product_detail[<?php echo $index?>][detail]" placeholder="Detail"></p>
                            <a href="#" class="del_item">Xóa</a>
                        </div>
                        <?php
                    }
                }?>
            </div>
            <a class="btnAdd">Thêm thông tin</a>
        </div>
<?php
    }
}
if(!function_exists("saveProductDetail")) {
    function saveProductDetail($post_id, $post)
    {
		if(empty($post_id) || empty($post)) return;
        if($post->post_type != 'products') return;
        $value = isset($_POST['product_detail']) ? $_POST['product_detail'] : '';
        update_post_meta($post_id, 'product_detail', $value);
    }
}
add_action('save_post', 'saveProductDetail', 10, 2);


