<?php
/**
 * The template for displaying the footer.
 *
 * @package GeneratePress
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}
?>
</main><!--end main-->
</div><!--end container-->

<footer>
    <div class="footer2">
        <div class="logo"><a href="http://localhost/kmm/" title=""><img src="/kmm/wp-content/uploads/2020/03/logo.png" width="406" height="144" alt=""/></a></div>
        <?php
        if (is_active_sidebar('footer-1')) :
            dynamic_sidebar('footer-1');
        endif;
        ?>
        <div class="clear"></div>
        <?php
        if (is_active_sidebar('footer-2')) :
            dynamic_sidebar('footer-2');
        endif;
        ?>
    </div><!--end footer2-->
</footer><!--end footer-->
<div class="popup" id="tuvanPopup">
    <div class="popupClose popupBg"></div>
    <div class="popupContent">
        <div class="left">
            <div class="leftContent">
                <div class="logo"><a href="javascript:;"><img src="/kmm/wp-content/uploads/2020/03/logo.png" width="406" height="144" alt=""/></a></div>
                <h5>Điền thông tin <br/>để nhận tư vấn ngay!</h5>
                <ul>
                    <li>KMM Film Studio</li>
                    <li>Email: kmmfilmstudio@gmail.com</li>
                    <li>Portfolio: (dẫn link long portfolio)</li>
                    <li>Portfolio: (dẫn link long portfolio)</li>
                    <li>Youtube: (link youtube)</li>
                    <li>Facebook: (link facebook)</li>
                    <li>Linkedin: (link linkedIn)</li>
                    <li>Hotline: 0969951721 - 0365338353</li>
                </ul>
            </div>
        </div><!--end left-->

        <div class="right">
            <p>Hello, Dreamer</p>
            <?php echo do_shortcode('[contact-form-7 id="112" title="Contact form 2"]')?>
        </div><!--end right-->
        <div class="clear"></div>
    </div><!--end content-->
</div><!--end tuvan-->
</div><!--end wrapper-->
