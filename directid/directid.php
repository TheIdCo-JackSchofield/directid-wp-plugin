<?php 
    /*
    Plugin Name: DirectID Widget
    Plugin URI: https://developers.direct.id
    Description: Provides a shortcode for simplified intergration of DirectID into Wordpress
    Author: Jack Schofield
    Version: 1.0
    Author URI: http://www.miicard.com
    */    
    
    $dir = plugin_dir_path( __FILE__ );
    require_once $dir . 'oAuthManager.php';
    require_once $dir . 'apiManager.php';    

    function init_directid_widget(){
        wp_enqueue_script('directid', 'https://az708254.vo.msecnd.net/content/latest/directid.min.js'); //TODO - Control this with a beta / live switch in options
        wp_enqueue_style('directid', 'https://az708254.vo.msecnd.net/content/latest/directid.min.css');  //TODO - Control this with a beta / live switch in options          
        
        return '<div id="did" data-token="' . get_user_session_token() . '"></div>';
        
    }    

    add_shortcode('directid-widget', 'init_directid_widget');
    add_action('directid_widget', 'init_directid_widget');
?>