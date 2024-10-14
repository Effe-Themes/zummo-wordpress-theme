<?php

/**
 * zummo: Block Patterns
 *
 * @since zummo 1.0.0
 */

/**
 * Registers pattern categories for zummo
 *
 * @since zummo 1.0.0
 *
 * @return void
 */
function zummo_register_pattern_category()
{
	$block_pattern_categories = array(
		'zummo' => array('label' => __('Zummo', 'zummo')),
	);

	$block_pattern_categories = apply_filters('zummo_block_pattern_categories', $block_pattern_categories);

	foreach ($block_pattern_categories as $name => $properties) {
		if (!WP_Block_Pattern_Categories_Registry::get_instance()->is_registered($name)) {
			register_block_pattern_category($name, $properties);
		}
	}
}
add_action('init', 'zummo_register_pattern_category', 9);
