<?php
/**
 * The template for displaying the header.
 *
 * @package GeneratePress
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <link rel="profile" href="https://gmpg.org/xfn/11">
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<div id="wrapper">
    <div class="logo1"><a href="<?php echo get_site_url()?>" title=""><img src="/kmm/wp-content/uploads/2020/03/logo.png" width="406" height="144" alt=""/></a></div>
    <div id="container">
        <header>
            <div class="logo2"><?php generate_construct_logo()?></div>
            <a class="tuvanBtn" href="javascript:;">Nhận tư vấn</a>
            <a href="javascript:;" class="navBtn"><i></i><i></i><i></i></a>
        </header><!--end header-->

        <nav>
            <?php echo wp_nav_menu( ['menu' => 2, 'container' => false, 'echo'=> false, 'depth' => 0] ) ?>
        </nav>
        <main>