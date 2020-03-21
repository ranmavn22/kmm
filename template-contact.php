<?php
/**
 * Template Name: Liên hệ
 */

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

get_header();
while (have_posts()) : the_post();
    ?>

    <div class="lienhe">
        <h1>Liên hệ với chúng tôi</h1>
        <div class="lienheContent">
            <div class="left">
                <?php echo do_shortcode('[contact-form-7 id="5" title="Contact form 1"]')?>
            </div><!--end left-->

            <div class="right">
                <?php the_content();?>
                <div class="gmap">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d4429.21041861897!2d105.829170332278!3d21.01238378094238!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xf2d69a0c3422d30a!2zS2h1IHThuq1wIHRo4buDIE5hbSDEkOG7k25n!5e0!3m2!1svi!2s!4v1584767714732!5m2!1svi!2s" width="952" height="473" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
                </div><!--end gmap-->
            </div><!--end right-->
            <div class="clear"></div>
        </div><!--end lienheContent-->
    </div><!--end lienhe-->

<?php
endwhile;
get_footer('thanks');
