<?php
/**
 * This code will work when a user delete the plugin
 * Delete all the database related post types
 * 
 * @package AlisamtiaPlugin
*/

defined('WP_UNINSTALL_PLUGIN') or die;

// Clear the database stored data
// $books=get_posts(array('post_type'=>'book','numberposts'=>-1));

// foreach($books as $book){
//     wp_delete_post($book->id,true);
// }


// Access the database via SQP
global $wpdb;
$wpdb->query("DELETE FROM wp_posts where post_type='book'");
$wpdb->query("DELETE FROM wp_postmeta WHERE post_id NOT IN (SELECT id FROM wp_posts)");
$wpdb->query("DELETE FROM wp_term_relationships WHERE object_id NOT IN (SELECT id FROM wp_posts)");