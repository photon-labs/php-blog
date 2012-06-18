<?php /*
 * ###
 * PHR_PhpBlog
 * %%
 * Copyright (C) 1999 - 2012 Photon Infotech Inc.
 * %%
 * Licensed under the Apache License, Version 2.0 (the "License");
 * you may not use this file except in compliance with the License.
 * You may obtain a copy of the License at
 * 
 *      http://www.apache.org/licenses/LICENSE-2.0
 * 
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS,
 * WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 * See the License for the specific language governing permissions and
 * limitations under the License.
 * ###
 */ ?>
<?php

// Get file
$fileID = $_GET['fileID'];
settype($fileID,"integer");
session_start();

$dbc = connectDatabase();

$getConfigs = mysql_fetch_assoc(mysql_query("SELECT `configValue` FROM `siteconfig` WHERE `configName`='fileLocation'"));
$checkFile = mysql_fetch_assoc(mysql_query("SELECT `fileID`,`fileName`,`fileNameIs` FROM `blogattachments` WHERE `fileID`='$fileID'"));


if($checkFile['fileID'] != $fileID || !is_file($getConfigs['configValue'].$checkFile['fileNameIs']))
{
	disconnectDatabase($dbc);
	die('Invalid access.');
}

$update = mysql_query("UPDATE `blogattachments` SET `fileHits`=fileHits+1 WHERE `fileID`='$fileID'");
disconnectDatabase($dbc);

downloadFile($getConfigs['configValue'].$checkFile['fileNameIs'],$checkFile['fileName']);

?>