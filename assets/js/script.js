(function ($) {
    $(document).ready(function () {
        $(document).on('click','.jsGetProduct', function (e) {
            e.preventDefault();
            let termId = $(this).data('term');
            let el = $('.jsAreaProduct');
            $('.productCat .subMenu li a').removeClass("active");
            $(this).addClass("active");
            ajaxAction(ajax_url.ajax_url+'?action=get_product',{termId:termId},function (data) {
                el.html(data);

            }, el)
        });


        function ajaxAction(url,data,access = null,appent = null,method = "POST",error = null) {
            $.ajax({
                url: url,
                data: data,
                beforeSend:function () {
                    if(appent){
                        $("html, body").animate({ scrollTop: appent.offset().top - 100 }, 500);
                        appent.html('<div class="loading"><div class="loader"></div></div>');
                    }
                },
                success:function (e) {
                    access(e);
                }
            })
        }
    })
})(jQuery);