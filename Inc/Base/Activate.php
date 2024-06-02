<?php
/**
* @package AlisamtiaPlugin
*/
namespace Inc\Base;

class Activate{
    public static function activate(){
        //Create "CUSTOM POST TYPE"
        // $this->custom_post_type();
        // flush rewrites(Need to be done of custom post type)
        flush_rewrite_rules();
    }
}