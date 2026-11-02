<?php
/**
 * Jarred Real Estate — functions.php
 * Theme setup, asset loading, menus, custom post types, schema
 */

defined( 'ABSPATH' ) || exit;

/* ============================================================
   THEME SETUP
   ============================================================ */
function jarred_re_setup() {
    load_theme_textdomain( 'jarred-re', get_template_directory() . '/languages' );

    add_theme_support( 'title-tag' );
    add_theme_support( 'post-thumbnails' );
    add_theme_support( 'html5', [ 'search-form', 'comment-form', 'comment-list', 'gallery', 'caption', 'style', 'script' ] );
    add_theme_support( 'customize-selective-refresh-widgets' );
    add_theme_support( 'responsive-embeds' );
    add_theme_support( 'wc-product-gallery-zoom' );

    // Custom logo
    add_theme_support( 'custom-logo', [
        'height'      => 60,
        'width'       => 200,
        'flex-height' => true,
        'flex-width'  => true,
    ] );

    // Image sizes
    add_image_size( 'jarred-hero',         1920, 1080, true );
    add_image_size( 'jarred-card',          800,  533, true );
    add_image_size( 'jarred-neighborhood',  600,  800, true );
    add_image_size( 'jarred-blog',          800,  500, true );

    // Nav menus
    register_nav_menus( [
        'primary'  => __( 'Primary Navigation', 'jarred-re' ),
        'footer-1' => __( 'Footer: Quick Links', 'jarred-re' ),
        'footer-2' => __( 'Footer: Resources', 'jarred-re' ),
    ] );
}
add_action( 'after_setup_theme', 'jarred_re_setup' );

/* ============================================================
   CONTENT WIDTH
   ============================================================ */
function jarred_re_content_width() {
    $GLOBALS['content_width'] = 1240;
}
add_action( 'after_setup_theme', 'jarred_re_content_width', 0 );

/* ============================================================
   ENQUEUE SCRIPTS & STYLES
   ============================================================ */
function jarred_re_scripts() {
    $ver = wp_get_theme()->get( 'Version' );

    // Google Fonts: Cormorant Garamond + Inter
    wp_enqueue_style(
        'jarred-fonts',
        'https://fonts.googleapis.com/css2?family=Cormorant+Garamond:ital,wght@0,300;0,400;0,600;1,400&family=Inter:wght@400;500;600&display=swap',
        [],
        null
    );

    // Main stylesheet
    wp_enqueue_style( 'jarred-re-style', get_stylesheet_uri(), [ 'jarred-fonts' ], $ver );

    // Main JS (defer)
    wp_enqueue_script( 'jarred-re-main', get_template_directory_uri() . '/assets/js/main.js', [], $ver, true );

    // Comments
    if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
        wp_enqueue_script( 'comment-reply' );
    }
}
add_action( 'wp_enqueue_scripts', 'jarred_re_scripts' );

/* ============================================================
   CUSTOM POST TYPE: NEIGHBORHOODS
   ============================================================ */
function jarred_re_register_post_types() {
    register_post_type( 'neighborhood', [
        'labels' => [
            'name'               => __( 'Neighborhoods', 'jarred-re' ),
            'singular_name'      => __( 'Neighborhood', 'jarred-re' ),
            'add_new_item'       => __( 'Add New Neighborhood', 'jarred-re' ),
            'edit_item'          => __( 'Edit Neighborhood', 'jarred-re' ),
            'view_item'          => __( 'View Neighborhood', 'jarred-re' ),
            'search_items'       => __( 'Search Neighborhoods', 'jarred-re' ),
        ],
        'public'        => true,
        'has_archive'   => true,
        'rewrite'       => [ 'slug' => 'neighborhoods' ],
        'menu_icon'     => 'dashicons-location',
        'supports'      => [ 'title', 'editor', 'thumbnail', 'excerpt', 'custom-fields' ],
        'show_in_rest'  => true,
    ] );

    register_post_type( 'resource', [
        'labels' => [
            'name'          => __( 'Resources', 'jarred-re' ),
            'singular_name' => __( 'Resource', 'jarred-re' ),
            'add_new_item'  => __( 'Add New Resource', 'jarred-re' ),
        ],
        'public'       => true,
        'has_archive'  => true,
        'rewrite'      => [ 'slug' => 'resources' ],
        'menu_icon'    => 'dashicons-media-document',
        'supports'     => [ 'title', 'editor', 'thumbnail', 'excerpt', 'custom-fields' ],
        'show_in_rest' => true,
    ] );
}
add_action( 'init', 'jarred_re_register_post_types' );

/* ============================================================
   CUSTOM TAXONOMIES
   ============================================================ */
function jarred_re_register_taxonomies() {
    // Resource type (Buyer Guide, Seller Guide, First-Time Buyer, etc.)
    register_taxonomy( 'resource_type', 'resource', [
        'labels'            => [
            'name'          => __( 'Resource Types', 'jarred-re' ),
            'singular_name' => __( 'Resource Type', 'jarred-re' ),
        ],
        'hierarchical'      => true,
        'rewrite'           => [ 'slug' => 'resource-type' ],
        'show_in_rest'      => true,
    ] );
}
add_action( 'init', 'jarred_re_register_taxonomies' );

/* ============================================================
   THEME OPTIONS (via Customizer)
   ============================================================ */
function jarred_re_customizer( $wp_customize ) {

    // ── Agent Info panel ──────────────────────────────────────
    $wp_customize->add_panel( 'jarred_agent', [
        'title'    => __( 'Agent Info', 'jarred-re' ),
        'priority' => 30,
    ] );

    $fields = [
        'agent_name'      => [ 'Agent Name',             'text',     'Jarred Donalson' ],
        'agent_title'     => [ 'Title / License',         'text',     'REALTOR® | Kansas City' ],
        'agent_phone'     => [ 'Phone Number',            'text',     '' ],
        'agent_email'     => [ 'Email Address',           'email',    '' ],
        'agent_license'   => [ 'License Number',          'text',     '' ],
        'agent_brokerage' => [ 'Brokerage Name',          'text',     'Keller Williams KC North' ],
        'agent_bio_short' => [ 'Short Bio (hero tagline)','textarea',  'Helping Kansas City families find their next home with honesty, expertise, and care.' ],
        'facebook_url'    => [ 'Facebook URL',            'url',      '' ],
        'instagram_url'   => [ 'Instagram URL',           'url',      '' ],
        'linkedin_url'    => [ 'LinkedIn URL',            'url',      '' ],
        'footer_brand_name'  => [ 'Footer: Brand Name',      'text',  'Reside in Kansas City' ],
        'footer_brand_phone' => [ 'Footer: Brand Phone',     'text',  '816-719-0829' ],
        'footer_brand_email' => [ 'Footer: Brand Email',     'email', 'jarred.donalson@kw.com' ],
        'brokerage_phone'    => [ 'Footer: Brokerage Phone', 'text',  '816-452-4200' ],
        'brokerage_address'  => [ 'Footer: Brokerage Address','text', '310 NW Englewood Rd, Kansas City, MO 64118' ],
    ];

    $wp_customize->add_section( 'jarred_agent_section', [
        'title' => __( 'Contact & Bio', 'jarred-re' ),
        'panel' => 'jarred_agent',
    ] );

    foreach ( $fields as $id => $config ) {
        $wp_customize->add_setting( $id, [ 'default' => $config[2], 'sanitize_callback' => 'sanitize_text_field', 'transport' => 'refresh' ] );
        $wp_customize->add_control( $id, [ 'label' => __( $config[0], 'jarred-re' ), 'section' => 'jarred_agent_section', 'type' => $config[1] ] );
    }
}
add_action( 'customize_register', 'jarred_re_customizer' );

/* ============================================================
   SCHEMA MARKUP (JSON-LD)
   ============================================================ */
function jarred_re_schema_markup() {
    $name      = get_theme_mod( 'agent_name',      'Jarred' );
    $phone     = get_theme_mod( 'agent_phone',     '' );
    $email     = get_theme_mod( 'agent_email',     '' );
    $license   = get_theme_mod( 'agent_license',   '' );
    $brokerage = get_theme_mod( 'agent_brokerage', '' );
    $url       = home_url( '/' );

    $schema = [
        '@context' => 'https://schema.org',
        '@graph'   => [
            // RealEstateAgent entity
            [
                '@type'          => [ 'RealEstateAgent', 'Person' ],
                '@id'            => $url . '#agent',
                'name'           => $name,
                'url'            => $url,
                'telephone'      => $phone,
                'email'          => $email,
                'hasCredential'  => $license ? [ '@type' => 'EducationalOccupationalCredential', 'name' => 'Real Estate License', 'identifier' => $license ] : null,
                'worksFor'       => $brokerage ? [ '@type' => 'RealEstateAgent', 'name' => $brokerage ] : null,
                'sameAs'         => array_filter( [
                    get_theme_mod( 'facebook_url',  '' ),
                    get_theme_mod( 'instagram_url', '' ),
                    get_theme_mod( 'linkedin_url',  '' ),
                ] ),
            ],
            // WebSite
            [
                '@type'           => 'WebSite',
                '@id'             => $url . '#website',
                'url'             => $url,
                'name'            => get_bloginfo( 'name' ),
                'publisher'       => [ '@id' => $url . '#agent' ],
            ],
        ],
    ];

    // Remove null values
    $schema['@graph'][0] = array_filter( $schema['@graph'][0] );

    echo '<script type="application/ld+json">' . wp_json_encode( $schema, JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT ) . '</script>' . "\n";

    // Extra schema for neighborhood pages
    if ( is_singular( 'neighborhood' ) ) {
        $place_schema = [
            '@context' => 'https://schema.org',
            '@type'    => 'Place',
            'name'     => get_the_title(),
            'url'      => get_permalink(),
            'description' => get_the_excerpt(),
        ];
        echo '<script type="application/ld+json">' . wp_json_encode( $place_schema, JSON_UNESCAPED_SLASHES ) . '</script>' . "\n";
    }

    // BreadcrumbList for inner pages
    if ( ! is_front_page() ) {
        $breadcrumbs = [
            '@context'        => 'https://schema.org',
            '@type'           => 'BreadcrumbList',
            'itemListElement' => [
                [ '@type' => 'ListItem', 'position' => 1, 'name' => 'Home', 'item' => $url ],
                [ '@type' => 'ListItem', 'position' => 2, 'name' => get_the_title(), 'item' => get_permalink() ],
            ],
        ];
        echo '<script type="application/ld+json">' . wp_json_encode( $breadcrumbs, JSON_UNESCAPED_SLASHES ) . '</script>' . "\n";
    }
}
add_action( 'wp_head', 'jarred_re_schema_markup' );

/* ============================================================
   TITLE TAG
   ============================================================ */
function jarred_re_document_title_separator() {
    return '|';
}
add_filter( 'document_title_separator', 'jarred_re_document_title_separator' );

/* ============================================================
   EXCERPT LENGTH
   ============================================================ */
function jarred_re_excerpt_length() {
    return 20;
}
add_filter( 'excerpt_length', 'jarred_re_excerpt_length' );

function jarred_re_excerpt_more() {
    return '&hellip;';
}
add_filter( 'excerpt_more', 'jarred_re_excerpt_more' );

/* ============================================================
   REGISTER SIDEBARS / WIDGET AREAS
   ============================================================ */
function jarred_re_widgets_init() {
    register_sidebar( [
        'name'          => __( 'Blog Sidebar', 'jarred-re' ),
        'id'            => 'sidebar-blog',
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h5 class="widget-title">',
        'after_title'   => '</h5>',
    ] );
}
add_action( 'widgets_init', 'jarred_re_widgets_init' );

/* ============================================================
   SECURITY HARDENING
   ============================================================ */
remove_action( 'wp_head', 'wp_generator' );
remove_action( 'wp_head', 'wlwmanifest_link' );
remove_action( 'wp_head', 'rsd_link' );

/* ============================================================
   CONTACT FORM AJAX HANDLER
   ============================================================ */
function jarred_re_handle_contact() {
    check_ajax_referer( 'jarred_contact_nonce', 'nonce' );

    $name    = sanitize_text_field( $_POST['name'] ?? '' );
    $email   = sanitize_email( $_POST['email'] ?? '' );
    $phone   = sanitize_text_field( $_POST['phone'] ?? '' );
    $msg     = sanitize_textarea_field( $_POST['message'] ?? '' );
    $type    = sanitize_text_field( $_POST['inquiry_type'] ?? '' );

    if ( ! $name || ! is_email( $email ) || ! $msg ) {
        wp_send_json_error( [ 'message' => 'Please fill in all required fields.' ] );
    }

    $to      = get_theme_mod( 'agent_email', get_option( 'admin_email' ) );
    $subject = "New Contact from {$name} — {$type}";
    $body    = "Name: {$name}\nEmail: {$email}\nPhone: {$phone}\nInquiry: {$type}\n\nMessage:\n{$msg}";
    $headers = [ "Reply-To: {$name} <{$email}>", 'Content-Type: text/plain; charset=UTF-8' ];

    $sent = wp_mail( $to, $subject, $body, $headers );

    if ( $sent ) {
        wp_send_json_success( [ 'message' => "Thanks {$name} — I'll be in touch shortly!" ] );
    } else {
        wp_send_json_error( [ 'message' => 'There was an issue sending your message. Please try calling or emailing directly.' ] );
    }
}
add_action( 'wp_ajax_jarred_contact',        'jarred_re_handle_contact' );
add_action( 'wp_ajax_nopriv_jarred_contact', 'jarred_re_handle_contact' );

function jarred_re_localize_ajax() {
    wp_localize_script( 'jarred-re-main', 'jarredAjax', [
        'url'   => admin_url( 'admin-ajax.php' ),
        'nonce' => wp_create_nonce( 'jarred_contact_nonce' ),
    ] );
}
add_action( 'wp_enqueue_scripts', 'jarred_re_localize_ajax', 20 );

/* ============================================================
   INHERITED HOME GUIDE — LEAD MAGNET
   ============================================================ */
function jarred_re_inherited_guide_url() {
    $custom = get_theme_mod( 'inherited_guide_pdf_url', '' );
    return $custom ? $custom : get_template_directory_uri() . '/assets/downloads/kansas-city-inherited-home-guide.pdf';
}

function jarred_re_handle_inherited_guide() {
    check_ajax_referer( 'jarred_contact_nonce', 'nonce' );

    $pdf = jarred_re_inherited_guide_url();

    // Honeypot: bots fill the hidden field. Pretend success, send nothing.
    if ( ! empty( $_POST['website'] ) ) {
        wp_send_json_success( [ 'url' => $pdf ] );
    }

    $name  = sanitize_text_field( wp_unslash( $_POST['name'] ?? '' ) );
    $email = sanitize_email( wp_unslash( $_POST['email'] ?? '' ) );
    $phone = sanitize_text_field( wp_unslash( $_POST['phone'] ?? '' ) );
    $stage = sanitize_text_field( wp_unslash( $_POST['stage'] ?? '' ) );

    if ( ! $name || ! is_email( $email ) ) {
        wp_send_json_error( [ 'message' => 'Please add your first name and a valid email address.' ] );
    }

    $agent_email  = get_theme_mod( 'agent_email', get_option( 'admin_email' ) );
    $agent_phone  = get_theme_mod( 'agent_phone', '816-719-0829' );
    $office_phone = get_theme_mod( 'brokerage_phone', '816-452-4200' );

    // 1) Lead notification to Jarred
    $lead_body = "New Inherited Home Guide request\n\n"
        . "Name: {$name}\nEmail: {$email}\nPhone: " . ( $phone ?: '(not given)' ) . "\n"
        . "Where they are: {$stage}\nPage: " . esc_url_raw( wp_get_referer() ) . "\n"
        . 'Time: ' . wp_date( 'M j, Y g:i a' );
    wp_mail(
        $agent_email,
        "Inherited Home Guide request: {$name}",
        $lead_body,
        [ "Reply-To: {$name} <{$email}>", 'Content-Type: text/plain; charset=UTF-8' ]
    );

    // 2) Guide delivery to the visitor (emails are advertising: brokerage info required)
    $guest_body = "Hi {$name},\n\n"
        . "Thank you for requesting The Kansas City Inherited Home Guide. You can download it here:\n{$pdf}\n\n"
        . "You don't have to figure it all out this week. Start with the first 30 days, and when you're ready to talk through your situation, just reply to this email or call me.\n\n"
        . "Jarred Donalson, REALTOR\xC2\xAE\n"
        . "Reside in Kansas City | Keller Williams Kansas City North\n"
        . "Cell {$agent_phone} | Office {$office_phone}\n"
        . "{$agent_email} | resideinkc.com\n"
        . "310 NW Englewood Rd, Kansas City, MO 64118\n"
        . "Each Office Independently Owned & Operated. Equal Housing Opportunity.\n\n"
        . "This guide is general information only, not legal, tax or financial advice. "
        . "Nothing in this email is binding without a fully signed written agreement.";
    wp_mail(
        $email,
        'Your Kansas City Inherited Home Guide',
        $guest_body,
        [ "Reply-To: Jarred Donalson <{$agent_email}>", 'Content-Type: text/plain; charset=UTF-8' ]
    );

    // Give the download even if a mail send hiccups.
    wp_send_json_success( [ 'url' => $pdf ] );
}
add_action( 'wp_ajax_jarred_inherited_guide',        'jarred_re_handle_inherited_guide' );
add_action( 'wp_ajax_nopriv_jarred_inherited_guide', 'jarred_re_handle_inherited_guide' );
