<?php
/**
* @package AlisamtiaPlugin
*/
namespace Inc\Base;

class Deactivate{
    static function deactivate(){
        //flush rewrite rules
        flush_rewrite_rules();
    }
}