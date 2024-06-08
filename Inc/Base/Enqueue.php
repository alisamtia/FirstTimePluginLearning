<?php
/**
* @package AlisamtiaPlugin
*/
namespace Inc\Base;
use Inc\Base\BaseController;

class Enqueue extends BaseController{
    public function register(){
        add_action('admin_enqueue_scripts',array($this,'enqueue'));
    }

    function enqueue(){
        wp_enqueue_style('alipluginscript',$this->pluginUrl.'assets/mystyle.css',array(),null); // null is important to remove query string ver=6.5.3
        wp_enqueue_script('alipluginstyle',$this->pluginUrl.'assets/myscript.js',array(),null); // null is important to remove query string ver=6.5.3
    }
}