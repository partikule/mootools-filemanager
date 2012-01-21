<?php

// error_reporting(E_ALL);

require_once('../Assets/Connector/FileManager.php');

// Base URL to the Files
$baseUrl = ((isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] == "on") ? "https" : "http");
$baseUrl .= "://".$_SERVER['HTTP_HOST'];
$baseUrl .= str_replace(basename($_SERVER['SCRIPT_NAME']),"",$_SERVER['SCRIPT_NAME']); 


/*

baseUrl : 			http://filemanager.local/Demos/

documentRootPath	realpath($_SERVER['DOCUMENT_ROOT'])
directory: 			Demos/Files/
thumbnailPath		Demos/Files/Thumbnails/
assetPath			../Assets

*/


$browser = new FileManager(array
(
	'baseUrl' => $baseUrl,
	
	// Must be set if the 'directory' value is in a subfolder of the DOCUMENT_ROOT
	'documentRootPath' => realpath($_SERVER['DOCUMENT_ROOT']) . '/Demos',
	
	// Relative to documentRootPath but also to baseUrl
	'directory' => 'Files/',
	'thumbnailPath' => 'Files/Thumbnails/',
	'assetPath' => '../Assets',
	
	'chmod' => 0777,
	//'maxUploadSize' => 1024 * 1024 * 5,
	'upload' => true,
	
	'allowExtChange' => true,						// ?
	'UploadIsAuthorized_cb' => 'FM_IsAuthorized',
	'DownloadIsAuthorized_cb' => 'FM_IsAuthorized',
	'CreateIsAuthorized_cb' => 'FM_IsAuthorized',
	'DestroyIsAuthorized_cb' => 'FM_IsAuthorized',
	'MoveIsAuthorized_cb' => 'FM_IsAuthorized'
));


$browser->fireEvent(!empty($_GET['event']) ? $_GET['event'] : null);

