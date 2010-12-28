<?php

include('../Backend/FileManager.php');

$browser = new FileManager(array(
	'directory' => 'Files/',
	'thumbnailPath' => 'Files/Thumbnails/',
	'assetBasePath' => '../Assets',
	'filter' => 'image/',
	'chmod' => 0777
));

$browser->fireEvent(!empty($_GET['event']) ? $_GET['event'] : null);