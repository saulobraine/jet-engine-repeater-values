<?php
/**
 * Plugin Name: JetEngine - Repeater field values
 * Description: Add dynamic tag that returns a repeater variable.
 * Version:     1.3
 * Author:      Matthew Harris, runthings.dev, Saulo Braine
 * Author URI:  https://braine.dev
 * Text Domain: jet-engine-repeater-values
 *
 * Elementor tested up to: 3.16.1
 * Elementor Pro tested up to: 3.16.0
 */

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

/**
 * Register Repeater Variables Dynamic Tag Group.
 *
 * Register new dynamic tag group for Request Variables.
 *
 * @since 1.0.0
 * @return void
 */
function register_dynamic_tag_group($dynamic_tags_manager) {
    $dynamic_tags_manager->register_group(
        'braine',
        [
            'title' => esc_html__('JetEngine - Braine', 'jet-engine-repeater-values')
        ]
    );
}
add_action('elementor/dynamic_tags/register', 'register_dynamic_tag_group');

/**
 * Register Server Variable Dynamic Tag.
 *
 * Include dynamic tag file and register tag class.
 *
 * @since 1.0.0
 * @return void
 */
function register_dynamic_tag($dynamic_tags) {
    require_once __DIR__ . '/dynamic-tags/jet-engine-repeater-dynamic-tag-text.php';
    require_once __DIR__ . '/dynamic-tags/jet-engine-repeater-dynamic-tag-gallery.php';
    require_once __DIR__ . '/dynamic-tags/jet-engine-repeater-dynamic-tag-image.php';

    $dynamic_tags->register(new \Elementor_Dynamic_Tag_Jet_Engine_Repeater_Text());
    $dynamic_tags->register(new \Elementor_Dynamic_Tag_Jet_Engine_Repeater_Gallery());
    $dynamic_tags->register(new \Elementor_Dynamic_Tag_Jet_Engine_Repeater_Image());
}
add_action('elementor/dynamic_tags/register', 'register_dynamic_tag');
