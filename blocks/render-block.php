<?php
/**
 * Registering block
 */
register_block_type( get_template_directory() . '/blocks/task/block.json' );

function add_my_stylesheet() {
	wp_enqueue_style( 'my-style', get_template_directory_uri() . '/blocks/task/style.css' );
  }
  add_action( 'wp_enqueue_scripts', 'add_my_stylesheet' );