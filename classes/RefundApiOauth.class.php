<?php

class RefundApiOauth
{
    public static function RefundProtectOauth(){
        $rpAccessToken = null;
        global $rpApiUrl;
        $request_url = $rpApiUrl.'/api/v1/oauth/token';
        $httpHeader = ['Content-Type: application/json'];
        $postdata= ['grant_type' => 'client_credentials', 'scope' =>  '*', 'client_id' => '1', 'client_secret' => '32GKp7kWUruA5igIcDoisYWhBE4nalDKfW2VnZEL'];
        
        $c = curl_init();		
        curl_setopt($c, CURLOPT_URL, $request_url);
        curl_setopt($c, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($c, CURLOPT_POST, true);
        curl_setopt($c, CURLOPT_POSTFIELDS,  json_encode($postdata));
        curl_setopt($c, CURLOPT_HTTPHEADER, $httpHeader);        	
        $json = curl_exec($c);		
        curl_close($c);

        if(!empty($json)) {
          $oauthDetails = json_decode($json, null, 512, JSON_THROW_ON_ERROR);
          $rpAccessToken = $oauthDetails->access_token;            
          
        }
        return $rpAccessToken;
    }
}