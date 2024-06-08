<?php
/**
* @package AlisamtiaPlugin
*/
namespace Inc\Pages;

use Inc\Api\Callbacks\AdminCallbacks;
use Inc\Api\SettingsApi;
use Inc\Base\BaseController;


class Admin extends BaseController{
    public $settings;
    public $pages=array();
    public $subPages=array();
    public $callbacks;

    public function register(){
        $this->settings=new SettingsApi();

        $this->callbacks=new AdminCallbacks();

        $this->setPages();

        $this->setSubPages();

        $this->setSettings();
        $this->setSections();
        $this->setFields();

        $this->settings->addPages($this->pages)->withSubPage("Dashboard")->addSubPages($this->subPages)->register();
    }

    public function setPages(){
        $this->pages=[
            [
                'page_title'=>"AliSamtia",
                'menu_title'=>"AliPlugin",
                'capability'=>'manage_options',
                'menu_slug'=>'ali_plugin',
                'callback'=>[$this->callbacks,'dashboard'],
                'icon_url'=>'dashicons-store',
                'position'=>110
            ]
        ];
    }

    public function setSubPages(){
        
        $adminPage=$this->pages[0];

        $this->subPages=[
            [
                'parent_slug'=>$adminPage['menu_slug'],
                'page_title'=>"CPT",
                'menu_title'=>"CPT",
                'capability'=>"manage_options",
                'menu_slug'=>"ali_cpt",
                'callback'=>array($this->callbacks,'cpt'),
            ],
            [
                'parent_slug'=>$adminPage['menu_slug'],
                'page_title'=>"Taxonomies",
                'menu_title'=>"Taxonomies",
                'capability'=>"manage_options",
                'menu_slug'=>"ali_taxonomies",
                'callback'=>array($this->callbacks,'taxonomies'),
            ],
            [
                'parent_slug'=>$adminPage['menu_slug'],
                'page_title'=>"Widgets",
                'menu_title'=>"Widgets",
                'capability'=>"manage_options",
                'menu_slug'=>"ali_widgets",
                'callback'=>array($this->callbacks,'widgets'),
            ],
        ];
    }


    public function setSettings(){
        $settings=array(
            array(
                'option_group'=>'alisamtia_option_group',
                'option_name'=>'text_example',
                'callback'=>array($this->callbacks,"aliSettings")
            )
        );

        $this->settings->setSettings($settings);
    }

    public function setSections(){
        $sections=array(
            array(
                'id'=>'alisamtia_admin_index',
                'title'=>'Settings',
                'callback'=>array($this->callbacks,"aliAdminSection"),
                'page'=>'ali_plugin'
            ),
        );

        $this->settings->setSections($sections);
    }

    public function setFields(){
        $fields=array(
            array(
                'id'=>'text_example',
                'title'=>'Text Example',
                'callback'=>array($this->callbacks,"aliTextExample"),
                'page'=>'ali_plugin',
                'section'=>'alisamtia_admin_index',
                'args'=>array(
                    'label_for'=>'text_example',
                    'class'=>'example-class'
                )
                ),
                array(
                    'id'=>'first_example',
                    'title'=>'First Example',
                    'callback'=>array($this->callbacks,"aliFirstName"),
                    'page'=>'ali_plugin',
                    'section'=>'alisamtia_admin_index',
                    'args'=>array(
                        'label_for'=>'First_example',
                        'class'=>'first-class'
                    )
                    ),
        );

        $this->settings->setFields($fields);
    }
}