<?php 

function get_user_session_token(){                             
    return get_user_session_token_from_api(get_oauth_token());  
}

function get_user_session_token_from_api($oAuthToken){
    
        $user = 'defaultuser'; //TODO, this needs to be wired in some how to existing system
        $apiRoot = 'https://api-beta.direct.id:444/v1/' ; //TODO - Control this with a beta / live switch in options
        $userSessionEndpoint = $apiRoot . 'bob/user/session/'. $user; //TODO - Extend to use an options property
        $userSessionToken = '';
        
        $response = wp_remote_get($userSessionEndpoint, get_api_request_args($oAuthToken));
        
        if ( is_wp_error( $response ) ) {
         $error_message = $response->get_error_message();
         echo "Something went wrong getting an User Session Token for the DirectID Widget: $error_message";
     } else {                       
        $jsonResponse = json_decode($response[body], true);                
        $userSessionToken = $jsonResponse[token];           
    }
    
    return $userSessionToken;
}

function get_api_request_args($oAuthToken){
   
    $args = array(
        'headers' => get_api_request_headers($oAuthToken)        
        );
    
    return $args;        
}

function get_api_request_headers($oAuthToken){
    $headers = array(
        'Authorization' => 'Bearer ' . $oAuthToken,
        'Content-Type' => 'application/json'
        );
    
    return $headers;
}    
?>
