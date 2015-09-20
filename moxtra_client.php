<?php
    //Moxtra App Credentials from developer.moxtra.com
    $client_id = "uE7i8KHKb-U";
    $client_secret = "jGYTxZERuhY";
    //User Information
    $unique_id = $_GET['id']; //Unique ID of how user is identified in your application
    $firstname = "Will";
    $lastname = "Callaghan";
    //Get current UTC timestamp in milliseconds
    date_default_timezone_set('UTC'); 
    $timestamp = time()*1000;
    //Post data to setup/initialize user
    $data_string = "client_id=".$client_id."&client_secret=".$client_secret."&grant_type=http://www.moxtra.com/auth_uniqueid&uniqueid=".$unique_id."&timestamp=".$timestamp."&firstname=".$firstname."&lastname=".$lastname;
    $uri = "https://apisandbox.moxtra.com/oauth/token";
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL,$uri);
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS,$data_string);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $result = curl_exec($ch);
    $result = json_decode($result, true);
    //Get Access Token on Successful Setup & Initialization of the User
    $access_token = $result['access_token'];
    echo $access_token;
?>