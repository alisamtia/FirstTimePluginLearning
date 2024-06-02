<?php
/**
* @package AlisamtiaPlugin
*/
namespace Inc\Base;
use Inc\Base\BaseController;

class SettingLink extends BaseController{
    function register(){
        add_filter("plugin_action_links_".$this->plugin,array($this,"settings_links"));
    }
    function settings_links($links){
        //add custom setting links
        $setting_link='<a href="admin.php?page=ali_plugin">Settings</>';

        array_push($links,$setting_link);
        return $links;
    }
}