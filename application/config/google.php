<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------
|  Google API Configuration
| -------------------------------------------------------------------
| 
| To get API details you have to create a Google Project
| at Google API Console (https://console.developers.google.com)
| 
|  client_id         string   Your Google API Client ID.
|  client_secret     string   Your Google API Client secret.
|  redirect_uri      string   URL to redirect back to after login.
|  application_name  string   Your Google application name.
|  api_key           string   Developer key.
|  scopes            string   Specify scopes
*/
$config['client_id']        = '';
$config['client_secret']    = '';
$config['redirect_uri']     = 'https://localhost/oglasavanje/users/google_login';
$config['application_name'] = 'My Project 84192';
$config['api_key']          = '';
$config['scopes']           = array("https://www.googleapis.com/auth/plus.login",
			
			"https://www.googleapis.com/auth/userinfo.email",
			"https://www.googleapis.com/auth/userinfo.profile");