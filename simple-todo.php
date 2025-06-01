<?php
/**
 * Plugin Name: Simple To-Do List
 * Plugin URI: https://github.com/PATELMIHIR2715/simple-todo-plugin
 * Description: A basic WordPress admin to-do list manager.
 * Version: 1.0
 * Author: Patel Mihir
 * Author URI: https://github.com/PATELMIHIR2715
 */

add_action('admin_menu', 'simple_todo_menu');

function simple_todo_menu() {
    add_menu_page(
        'To-Do List',
        'To-Do List',
        'manage_options',
        'simple-todo',
        'simple_todo_page',
        'dashicons-list-view',
        100
    );
}

function simple_todo_page() {
    include plugin_dir_path(__FILE__) . 'todo-admin-page.php';
}

add_action('admin_enqueue_scripts', function() {
    wp_enqueue_style('simple-todo-style', plugin_dir_url(__FILE__) . 'style.css');
});
