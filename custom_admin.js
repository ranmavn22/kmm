(function ($) {
    $(document).ready(function () {
        $(document).on('click', ".wrapMetaBox .btnAdd",function (event) {
            event.preventDefault();
            let index = $(this).closest('.wrapMetaBox').find('.item').length;
            let string = '<div class="item">'
                +'<p><input type="text" value="" name="product_detail['+index+'][label]" placeholder="Label"></p>'
                +'<p><input type="text" class="valueDetail" value="" name="product_detail['+index+'][detail]" placeholder="Detail"></p>'
                +'<a href="#" class="del_item">Xóa</a>'
                +'</div>';
            $(this).closest('.wrapMetaBox').find('.contentMetaBox').append(string);
        });

        $(document).on('click','.del_item', function (e) {
            e.preventDefault();
            $(this).closest('.item').remove();
        })
    })
})(jQuery);