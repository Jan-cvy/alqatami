<?php

namespace Alqatami\Theme\App\Structure;

/*
|-----------------------------------------------------------
| Theme Custom Post Types
|-----------------------------------------------------------
|
| This file is for registering your theme post types.
| Custom post types allow users to easily create
| and manage various types of content.
|
*/

use function Alqatami\Theme\App\config;

/**
 * Registers `book` custom post type.
 *
 * @return void
 */
function register_book_post_type()
{
    register_post_type('book', [
        'description' => __('Collection of books.', config('textdomain')),
        'public' => true,
        'supports' => ['title', 'editor', 'excerpt', 'thumbnail'],
        'labels' => [
            'name' => _x('Books', 'post type general name', config('textdomain')),
            'singular_name' => _x('Book', 'post type singular name', config('textdomain')),
            'menu_name' => _x('Books', 'admin menu', config('textdomain')),
            'name_admin_bar' => _x('Book', 'add new on admin bar', config('textdomain')),
            'add_new' => _x('Add New', 'book', config('textdomain')),
            'add_new_item' => __('Add New Book', config('textdomain')),
            'new_item' => __('New Book', config('textdomain')),
            'edit_item' => __('Edit Book', config('textdomain')),
            'view_item' => __('View Book', config('textdomain')),
            'all_items' => __('All Books', config('textdomain')),
            'search_items' => __('Search Books', config('textdomain')),
            'parent_item_colon' => __('Parent Books:', config('textdomain')),
            'not_found' => __('No books found.', config('textdomain')),
            'not_found_in_trash' => __('No books found in Trash.', config('textdomain')),
        ],
    ]);
}
// add_action('init', 'Alqatami\Theme\App\Structure\register_book_post_type');



function revcon_change_post_label() {
    global $menu;
    global $submenu;
    $menu[5][0] = 'Projects';
    $submenu['edit.php'][5][0] = 'Projects';
    $submenu['edit.php'][10][0] = 'Add Projects';
    $submenu['edit.php'][16][0] = 'Projects Tags';
}
function revcon_change_post_object() {
    global $wp_post_types;
    $labels = &$wp_post_types['post']->labels;
    $labels->name = 'Projects';
    $labels->singular_name = 'Projects';
    $labels->add_new = 'Add Projects';
    $labels->add_new_item = 'Add Projects';
    $labels->edit_item = 'Edit Projects';
    $labels->new_item = 'Projects';
    $labels->view_item = 'View Projects';
    $labels->search_items = 'Search Projects';
    $labels->not_found = 'No Projects found';
    $labels->not_found_in_trash = 'No Projects found in Trash';
    $labels->all_items = 'All Projects';
    $labels->menu_name = 'Projects';
    $labels->name_admin_bar = 'Projects';
}
 
add_action( 'admin_menu', __NAMESPACE__ . '\\revcon_change_post_label' );
add_action( 'init', __NAMESPACE__ . '\\revcon_change_post_object' );