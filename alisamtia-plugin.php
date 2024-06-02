<?php
/**
* @package AlisamtiaPlugin
*/

/**
Plugin Name: AliSamtia Plugin
Plugin URI: https://alisamtia.com/alisamtia-plugin
Description: This is my first attempt to create a plugin for WordPress Designers
Version: 1.0.0
Author: Ali Samtia
Author URI: https://alisamtia.com/
License: GPLv2
Text Domain: alisamtia-plugin
*/

/**
This program is free software; you can redistribute it and/or
modify it under the terms of the GNU General Public License
as published by the Free Software Foundation; either version 2
of the License, or (at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program; if not, write to the Free Software
Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston, MA  02110-1301, USA.
Copyright (C) 2024  AliSamtia, Inc.
*/

//Security Things



//If this global variable is not defined it means that the wordpress is interacted by some hacker/Its is not compeletly installed or configured with its core files
// both of them are sames
// if(! defined('ABSPATH')){
//     die;
// }

use Inc\Init;

defined('ABSPATH') or die('You, can\t access this file, You silly human!');

// but defined and funtion_exists are different
function_exists('add_action') or die('You, can\t access this file, You silly human!');
!defined('AliPlugin') or die;

if(file_exists(dirname(__FILE__).'/vendor/autoload.php')){
    require_once dirname(__FILE__).'/vendor/autoload.php';
}

// Define a constant you can use it globally anywhere in plugin, Use it with out any $ sign but be carefull it must be unique
// define('PLUGIN_PATH',plugin_dir_path(__FILE__));
// define('PLUGIN_URL',plugin_dir_url(__FILE__));
// define('PLUGIN',plugin_basename(__FILE__));

if(!class_exists("Init")){
    Init::register_services();
}


function activate(){
    Inc\Base\Activate::activate();
}
function deactivate(){
    Inc\Base\Deactivate::deactivate();
}

register_activation_hook(__FILE__,"Activate");
register_deactivation_hook(__FILE__,"Deactivate");

