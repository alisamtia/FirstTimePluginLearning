<?php
/**
* @package AlisamtiaPlugin
*/
namespace Inc\Pages;
use Inc\Base\BaseController;

class Admin extends BaseController{
    public function register(){
        add_action('admin_menu',array($this,'add_menu_page'));
    } 

    function add_menu_page(){
        add_menu_page("AliSamtia","Ali",'manage_options','ali_plugin',array($this,'admin_index'),'dashicons-store',110);
    }

    function admin_index(){
        require_once $this->pluginPath."templates/admin.php";
    }
}