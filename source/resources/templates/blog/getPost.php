<?php /*
 * PHR_DrupalEshop
 *
 * Copyright (C) 1999-2014 Photon Infotech Inc.
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
include('admin/includes/functions.php');
include("../../../config.php");
$dbc = connectDatabase();

// Get site configurations
$getConfigs = mysql_fetch_assoc(mysql_query("SELECT `configValue` FROM `siteconfig` WHERE `configName`='allowBBCode'"));

if($_POST['topicID'] != NULL)
{
	// Get topic ID
	list($topicID) = cleanInputs($_POST['topicID']);
	$getText = mysql_fetch_assoc(mysql_query("SELECT `topicText` FROM `blogtopics` WHERE `topicID`='$topicID'"));
	echo formatPost($getText['topicText']);
} else {
	// Get reply ID
	list($replyID) = cleanInputs($_POST['replyID']);
	$getText = mysql_fetch_assoc(mysql_query("SELECT `replyText` FROM `blogreplies` WHERE `replyID`='$replyID'"));
	if($getConfigs['configValue'] == 1)
	{
		echo formatPost($getText['replyText']);
	} else {
		echo nl2br($getText['replyText']);
	}
}

disconnectDatabase($dbc);
?>
