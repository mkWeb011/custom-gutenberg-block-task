<?php

/**
 * Block Name: Task Block
 *
 * 
 */

// Block Attrs
$block = $args['block'];
$data = $args['data'];
$block_id = $args['block_id'];

// styles and classes
$block_style = $args['block_style'];
$classes = $args['classes']


?>

<!-- Displaying Template -->
<?php
printf(
    '<section class="%s"%s style="' . $block_style . '">',
    esc_attr(join(' ', $classes)),
    !empty($block['anchor']) ? ' id="' . esc_attr(sanitize_title($block['anchor'])) . '"' : '',
);

if ($data['task_block_title']) {
    echo "<h1>" . $data['task_block_title'] . "</h1>";
}

if (have_rows('task_list_items')) :
    echo "<ul>";

    while (have_rows('task_list_items')) : the_row();

        $svg_icon = get_sub_field('task_list_item_image');
        $heading_title = get_sub_field('task_list_item_title');
        $item_content = get_sub_field('task_list_item_desc');
        $button = get_sub_field('task_list_item_button_link');
        echo '<li class="task-list-item"><span class="list-item-content">';
        if ($svg_icon) {
            echo "<img src='$svg_icon'/>";
        }
        if ($heading_title) {
            echo "<h3 class='task-item-title'>" . $heading_title . "</h3>";
        }
        if ($item_content) {
            echo "<p>" . $item_content . "</p>";
        }
        // Using the Link Array return type for button
        if ($button) {
            $link_url = $button['url'];
            $link_title = $button['title'];
            $link_target = $button['target'] ? $button['target'] : '_self';
?>
            <a class="button" href="<?php echo esc_url($link_url); ?>" target="<?php echo esc_attr($link_target); ?>"><?php echo esc_html($link_title); ?></a>
<?php };

        echo '</span></li>';

    endwhile;

    echo "</ul>";

endif;
