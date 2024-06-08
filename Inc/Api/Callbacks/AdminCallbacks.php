<?php
/**
* @package AlisamtiaPlugin
*/
namespace Inc\Api\Callbacks;
use Inc\Base\BaseController;

class AdminCallbacks extends BaseController{
    public function dashboard(){
        require_once $this->pluginPath."templates/admin.php";
    }

    public function cpt(){
        require_once $this->pluginPath."templates/cpt.php";
    }

    public function taxonomies(){
        require_once $this->pluginPath."templates/taxonomies.php";
    }

    public function widgets(){
        require_once $this->pluginPath."templates/widgets.php";
    }

    public function groupOptionSettings($input){
        return $input;
    }

    public function aliAdminSection(){
        echo "Check this beautifull Page!";
    }

    public function aliTextExample(){
        $value=esc_attr(get_option('text_example'));
        echo "<input type='text' name='text_example' class='regular-text' value='$value' placeholder='Write Something Here!' />";
    }

    public function aliFirstName(){
        $value=esc_attr(get_option('first_example'));
        echo "<input type='text' name='aliFirstName' class='regular-text' value='$value' placeholder='Write Something Here!' />";
    }
}