<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="profile" href="https://gmpg.org/xfn/11">
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<a class="skip-link" href="#main"><?php esc_html_e( 'Skip to main content', 'jarred-re' ); ?></a>

<header id="site-header" class="site-header <?php echo is_front_page() ? '' : 'header--opaque'; ?>">
    <div class="header-inner">

        <!-- Logo lockup: Reside mark + Keller Williams brokerage logo -->
<a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="header-logos" aria-label="<?php bloginfo( 'name' ); ?> Home">
    <img
        src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/logo-reside.png"
        alt="Reside in KC"
        class="header-logo header-logo--reside">
    <span class="header-logo-divider" aria-hidden="true"></span>
    <img
        src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/logo-kw.png"
        alt="Keller Williams Kansas City North"
        class="header-logo header-logo--kw">
</a>

        <!-- Primary Navigation -->
        <nav id="site-nav" class="site-nav" aria-label="Primary">
            <?php
            wp_nav_menu( [
                'theme_location' => 'primary',
                'container'      => false,
                'items_wrap'     => '%3$s',
                'walker'         => new Jarred_Nav_Walker(),
            ] );
            ?>
            <a href="<?php echo esc_url( home_url( '/contact' ) ); ?>" class="btn btn--primary nav-cta">
                <?php esc_html_e( 'Get in Touch', 'jarred-re' ); ?>
            </a>
        </nav>

        <!-- Mobile toggle -->
        <button class="menu-toggle" id="menu-toggle" aria-expanded="false" aria-controls="site-nav" aria-label="Toggle menu">
            <span></span>
            <span></span>
            <span></span>
        </button>

    </div>
</header>

<main id="main" tabindex="-1">
<?php

/**
 * Minimal nav walker — outputs plain <a> tags, no UL/LI wrappers.
 */
class Jarred_Nav_Walker extends Walker_Nav_Menu {
    public function start_el( &$output, $item, $depth = 0, $args = null, $id = 0 ) {
        $url   = $item->url;
        $title = $item->title;
       $active = in_array( 'current-menu-item', (array) $item->classes ) ? ' active' : '';
        $output .= '<a href="' . esc_url( $url ) . '" class="' . esc_attr( trim( $active ) ) . '">' . esc_html( $title ) . '</a>';
    }
    public function start_lvl( &$output, $depth = 0, $args = null ) {}
    public function end_lvl( &$output, $depth = 0, $args = null ) {}
    public function end_el( &$output, $item, $depth = 0, $args = null ) {}
}
