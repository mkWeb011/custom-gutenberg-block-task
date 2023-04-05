<?php

/**
 * Task Block
 */

 // enqueue styles for the block

// $data - expose to render template
$data = array(
	'task_block_title' => get_field('task_block_title')
);

// Creating dynamic ID
$block_id = 'task-' . $block['id'];

// passing custom id
if (!empty($block['anchor'])) {
	$block_id = $block['anchor'];
}
// Block classes
$classes = ['block-task'];
$block_style = ''; // declare the variable here
if (!empty($block['className'])) {
	$classes = array_merge($classes, explode(' ', $block['className']));
}

if (!empty($block['backgroundColor'])) {
	$classes[] = 'has-background';
	$classes[] = 'has-' . $block['backgroundColor'] . '-background-color';
}
if (!empty($block['style']['color']['background'])) {
	$classes[] = 'has-background';
	$block_style = 'background-color:' . $block['style']['color']['background'] . ';';
}
if (!empty($block['textColor'])) {
	$classes[] = 'has-text-color';
	$classes[] = 'has-' . $block['textColor'] . '-color';
}

get_template_part(
	'blocks/task/template',
	null,
	array(
		'block'     	=> $block,
		'is_preview' 	=> $is_preview,
		'post_id'    	=> $post_id,
		'data'			=> $data,
		'block_id'		=> $block_id,
		'block_style'	=> $block_style,
		'classes'		=> $classes
	)
);
