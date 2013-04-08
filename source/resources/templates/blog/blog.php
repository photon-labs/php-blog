<?php /*
 * PHR_DrupalEshop
 *
 * Copyright (C) 1999-2013 Photon Infotech Inc.
 *
 * Licensed under the Apache License, Version 2.0 (the "License");
 * you may not use this file except in compliance with the License.
 * You may obtain a copy of the License at
 *
 *         http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS,
 * WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 * See the License for the specific language governing permissions and
 * limitations under the License.
*/ ?>
<?php
session_start();
// Load functions & database
include('admin/includes/functions.php');

$dbc = connectDatabase();
// List of allowed pages/submits
$allowedList = array('main');

// Get page name
if($_POST['page'] != NULL){$_GET['page'] = $_POST['page'];}

$_GET['page'] = cleanInputs($_GET['page']);
ob_start();

// Get site configurations
$getConfigs = mysql_query("SELECT * FROM `siteconfig`");
while($eachConfig = mysql_fetch_assoc($getConfigs)){${$eachConfig['configName']} = $eachConfig['configValue'];}
	
if(!in_array($_GET['page'],$allowedList))
{
	$_GET['page'] = 'main';
}

// Check account verification
if($_GET['verificationCode'] != NULL)
{
	list($userStatus) = cleanInputs($_GET['verificationCode']);
	$update = mysql_query("UPDATE `userlist` SET `userStatus`='1' WHERE `userStatus`='$userStatus' LIMIT 1");
	if($update)
	{
		$message = 'Your account has been verified.';
	} else {
		$message = 'Internal error.';
	}
}

// Only allow pages on list and that exist
$fileNameSubmit = 'submits/'.$_GET['page'].'.php';
$fileNamePage = 'pages/'.$_GET['page'].'.php';	
	
include($fileNameSubmit);
include($fileNamePage);

$MAINBODY = ob_get_contents();
ob_end_clean();

// Get template
include('template.php');

// Diconnect from database
disconnectDatabase($dbc);
?>
