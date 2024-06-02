<?php
/**
* @package AlisamtiaPlugin
*/
namespace Inc;

final class Init{
    /**
     * An array of the classes to be instantiated and used
     * @return array
     */
    static function get_services(){
        return [
            Pages\Admin::class,
            Base\Enqueue::class,
            Base\SettingLink::class
        ];
    }

    /**
     * run foreach loop on the array of get serices,
     * get instance of each class of get_services,
     * call the register method of each class if exists
     */
    public static function register_services(){
        //use $this->get_services if its not a static method
        //because its a static method we need to use self::get_services
        foreach(self::get_services() as $class){
            $service=self::instantiate($class);
            if(method_exists($service,"register")){
                $service->register();
            }
        }
    }

    /**
     * Instantiate the class
     * @param class $class  class from the services array
     * @return instance of class  instance of class from the servies array
     */
    private static function instantiate($class){
        $service=new $class();
        return $service;
    }
}


// use Inc\Base\Activate;
// use Inc\Base\Deactivate;
// use Inc\Pages\Admin;

// class AliPlugin
// {
//     //public: Can be access anywhere
//     //protected: Can only be access within the class itself or the extention of the class
//     //private: Can only be access within the class itself

//     public $pluginName;

//     function __construct(){
//         $this->pluginName=plugin_basename(__FILE__);
//     }
    
//     function register(){
//         // use "admin_enqueue_scripts" to add scripts/styles in admin panel
//         // use "wp_enqueue_scripts" to add scripts/styles in WordPress FrontEnd Website
//         add_action('admin_enqueue_scripts',array($this,'enqueue'));


//         add_filter("plugin_action_links_$this->pluginName",array($this,"settings_links"));
//     }

//     function settings_links($links){
//         //add custom setting links
//         $setting_link='<a href="admin.php?page=ali_plugin">Settings</>';

//         array_push($links,$setting_link);
//         return $links;
//     }



//     protected function create_post_type(){
//         add_action('init',array($this,'custom_post_type'));
//     }

//     function custom_post_type(){
//         register_post_type("book",['public' => true, 'label'=>"Books"]);
//     }

//     function activate(){
//         // require_once plugin_dir_path(__FILE__).'inc/ali-plugin-activate.php';
//         Activate::activate();
//     }

//     function enqueue(){
//         wp_enqueue_style('alipluginscript',plugins_url('/assets/mystyle.css',__FILE__));
//         wp_enqueue_script('alipluginstyle',plugins_url('/assets/myscript.js',__FILE__));
//     }
// }

// $aliPlugin=new AliPlugin();
// $aliPlugin->register();

// // activation
// register_activation_hook(__FILE__,array($aliPlugin,'activate'));

// // deactivation
// // require_once plugin_dir_path(__FILE__).'inc/deactivate.php';

// register_deactivation_hook(__FILE__,array('Inc\\Base\\Deactivate','deactivate'));
