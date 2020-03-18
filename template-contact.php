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
                    <img src="/kmm/wp-content/uploads/2020/03/map.jpg" width="952" height="473" alt=""/>
                </div><!--end gmap-->
            </div><!--end right-->
            <div class="clear"></div>
        </div><!--end lienheContent-->
    </div><!--end lienhe-->

<?php
endwhile;
get_footer('thanks');
