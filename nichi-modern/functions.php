<?php
if (!defined('ABSPATH')) exit;

function nm_setup_theme() {
  add_theme_support('title-tag');
  add_theme_support('post-thumbnails');
  add_theme_support('html5', ['search-form','comment-form','comment-list','gallery','caption','style','script']);

  register_nav_menus([
    'primary' => __('Primary Menu', 'nichi-modern'),
    'footer'  => __('Footer Menu', 'nichi-modern'),
  ]);
}
add_action('after_setup_theme', 'nm_setup_theme');

function nm_enqueue_assets() {
  $ver = wp_get_theme()->get('Version');

  wp_enqueue_style('nm-main', get_template_directory_uri() . '/assets/css/main.css', [], $ver);

  // Font Awesome (no plugin needed)
  wp_enqueue_style('nm-fa', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css', [], '6.5.0');

  wp_enqueue_script('nm-main', get_template_directory_uri() . '/assets/js/main.js', [], $ver, true);
}
add_action('wp_enqueue_scripts', 'nm_enqueue_assets');

/**
 * Footer widget areas (so footer content is reusable & editable)
 */
function nm_widgets_init() {
  register_sidebar([
    'name'          => __('Footer Column 1', 'nichi-modern'),
    'id'            => 'footer-1',
    'before_widget' => '<div class="nm-widget">',
    'after_widget'  => '</div>',
    'before_title'  => '<h3 class="nm-footer-title">',
    'after_title'   => '</h3>',
  ]);

  register_sidebar([
    'name'          => __('Footer Column 2', 'nichi-modern'),
    'id'            => 'footer-2',
    'before_widget' => '<div class="nm-widget">',
    'after_widget'  => '</div>',
    'before_title'  => '<h3 class="nm-footer-title">',
    'after_title'   => '</h3>',
  ]);

  register_sidebar([
    'name'          => __('Footer Column 3', 'nichi-modern'),
    'id'            => 'footer-3',
    'before_widget' => '<div class="nm-widget">',
    'after_widget'  => '</div>',
    'before_title'  => '<h3 class="nm-footer-title">',
    'after_title'   => '</h3>',
  ]);
}
add_action('widgets_init', 'nm_widgets_init');


/**
 * (Optional but useful) Reusable color controls in Customizer
 */
function nm_customize_register($wp_customize) {
  $wp_customize->add_section('nm_colors', [
    'title'    => __('Theme Colors', 'nichi-modern'),
    'priority' => 30
  ]);

  $colors = [
    'primary'   => ['Primary Color', '#0b2aa8'],
    'accent'    => ['Accent Color',  '#f59e0b'],
    'bg_dark'   => ['Footer Dark BG', '#071b4d'],
    'text_dark' => ['Dark Text', '#0b1220'],
  ];

  foreach ($colors as $key => $meta) {
    [$label, $default] = $meta;

    $wp_customize->add_setting("nm_$key", [
      'default'           => $default,
      'sanitize_callback' => 'sanitize_hex_color',
      'transport'         => 'refresh',
    ]);

    $wp_customize->add_control(new WP_Customize_Color_Control(
      $wp_customize,
      "nm_$key",
      [
        'label'   => __($label, 'nichi-modern'),
        'section' => 'nm_colors',
        'settings'=> "nm_$key",
      ]
    ));
  }
}
add_action('customize_register', 'nm_customize_register');

function nm_inline_theme_css() {
  $primary   = get_theme_mod('nm_primary', '#0b2aa8');
  $accent    = get_theme_mod('nm_accent', '#f59e0b');
  $bg_dark   = get_theme_mod('nm_bg_dark', '#071b4d');
  $text_dark = get_theme_mod('nm_text_dark', '#0b1220');

  $css = "
    :root{
      --nm-primary: {$primary};
      --nm-accent: {$accent};
      --nm-footer-bg: {$bg_dark};
      --nm-text: {$text_dark};
    }
  ";
  wp_add_inline_style('nm-main', $css);
}
add_action('wp_enqueue_scripts', 'nm_inline_theme_css', 20);


add_action('init', function () {
  register_block_pattern_category('nichi-modern', [
    'label' => __('Nichi Modern Patterns', 'nichi-modern')
  ]);
});

add_action('init', function () {
  register_block_pattern_category('nichimodern', [
    'label' => __('Nichi Modern Patterns', 'nichi-modern'),
  ]);
});
