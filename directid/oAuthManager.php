<?php
function get_oauth_token(){

    $oAuthToken = '';

        $oAuthPath = 'https://login.windows.net/directiddirectory.onmicrosoft.com/oauth2/token'; //TODO - Extend to use an options property
        
        $response = wp_remote_post($oAuthPath, get_oauth_args());
        
        if ( is_wp_error( $response ) ) {
         $error_message = $response->get_error_message();
         echo "Something went wrong getting an Ouath Token for the DirectID Widget: $error_message";
     } else {           
        $jsonResponse = json_decode($response[body], true);            
        $oAuthToken = $jsonResponse[access_token];           
    }

    return $oAuthToken;
}

function get_oauth_args(){

    $headers = get_oauth_headers();
    $body = get_oauth_body();

    $args = array(
        'headers' => $headers,
        'body' => $body                      
        );
    return $args;    
}

function get_oauth_headers(){
    $headers = array(            
        'Host' => 'login.windows.net',
        'user-agent'  => 'WordPress/' . $wp_version . '; ' . get_bloginfo( 'url' )
        );      

    return $headers;
}

function get_oauth_body(){

        $clientID = ''; //TODO - Extend to use an options property
        $clientSecret = ''; //TODO - Extend to use an options property
        $oAuthResource = 'https://directiddirectory.onmicrosoft.com/DirectID.API.Beta'; //TODO - Control this with a beta / live switch in options
        
        $body = array(
            'grant_type' => 'client_credentials',
            'client_id' => $clientID,
            'client_secret' => $clientSecret,
            'resource' => $oAuthResource            
            );
        return $body;
    }
?>