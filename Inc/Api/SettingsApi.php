<?php
/**
* @package AlisamtiaPlugin
*/
namespace Inc\Api;

class SettingsApi{
    public $adminPages=array();
    public $adminSubPages=[];

    public $settings=array();
    public $sections=array();
    public $exam_temp=array();
    public $fields=array();



    public function register(){
        if(!empty($this->adminPages)){
            add_action("admin_menu",array($this,'addAdminMenu'));
        }

        if(!empty($this->settings)){
            add_action("admin_init",array($this,'registerCustomFields'));
        }
    }
    public function addPages(array $pages){
        $this->adminPages=$pages;
        return $this;
    }

    public function withSubPage(string $title=null){

        $adminPage=$this->adminPages[0];
        $page=[
            [
                'parent_slug'=>$adminPage['menu_slug'],
                'page_title'=>$adminPage['page_title'],
                'menu_title'=>$title ?? $adminPage['menu_title'],
                'capability'=>$adminPage['capability'],
                'menu_slug'=>$adminPage['menu_slug'],
                'callback'=>$adminPage['callback'],
            ]
        ];
        $this->adminSubPages=$page;

        return $this;
    }

    public function addSubPages(array $subPages){
        $this->adminSubPages=array_merge($this->adminSubPages,$subPages);
        return $this;
    }

    public function addAdminMenu(){
        foreach($this->adminPages as $page){
            add_menu_page($page['page_title'],$page['menu_title'],$page['capability'],$page['menu_slug'],$page['callback'],$page['icon_url'],$page['position']);
        }
        foreach($this->adminSubPages as $subPage){
            add_submenu_page($subPage['parent_slug'],$subPage['page_title'],$subPage['menu_title'],$subPage['capability'],$subPage['menu_slug'],$subPage['callback']);
        }
    }

    public function setSettings(array $settings){
        $this->settings=$settings;
        return $this;
    }

    public function setSections(array $sections){
        $this->sections=$sections;
        return $this;
    }

    public function setFields(array $fields){
        $this->fields=$fields;
        return $this;
    }

    public function registerCustomFields() {

        //register Setting
        foreach($this->settings as $setting){
            register_setting($setting['option_group'],$setting['option_name'], $setting['callback'] ?? '');
        }

        //add Setting Section
        foreach($this->sections as $section){
            add_settings_section($section['id'],$section['title'],$section['callback']??'',$section['page']);
        }

        //Add setting field
        foreach($this->fields as $field){
            add_settings_field($field['id'],$field['title'],$field['callback']??'',$field['page'],$field['section'],$field['args']??'');
        }
    }
}