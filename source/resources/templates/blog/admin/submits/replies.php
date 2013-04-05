<?php /*
* PHR_PhpBlog
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
*/ ?><?php


// If already logged in
if($isAdmin != true){ die('Invalid Access');}

// Add Reply
if($_POST['replyID'] == NULL && $_GET['do'] == NULL)
{
	// Check new Reply values
	if($_POST['userID'] == NULL){ $message = 'Please select a user.';return;}
	if($_POST['topicID'] == NULL){ $message = 'Please select a topic.';return;}
	if($_POST['replyTitle'] == NULL){ $message = 'Please enter a title.';return;}
	if($_POST['replyText'] == NULL){ $message = 'Please enter reply text.';return;}
	$userID=$_SESSION['userID'];
	$addReply = mysql_query("INSERT INTO `blogreplies` (`topicID`,`userID`,`replyTitle`,`replyText`,`replyDate`)
		VALUES ('$_POST[topicID]','$userID','$_POST[replyTitle]','$_POST[replyText]',NOW())");
	if($addReply)
	{
		$message = 'Reply has been  added successfully.';
		$_GET['replyID'] = mysql_insert_id();
	} else {
		$message = 'Unable to add reply.';
	}
}

// Edit Reply
if($_POST['replyID'] != NULL)
{
	// Check new Reply values
	if($_POST['userID'] == NULL){ $message = 'Please select a user.';return;}
	if($_POST['topicID'] == NULL){ $message = 'Please select a topic.';return;}
	if($_POST['replyTitle'] == NULL){ $message = 'Please enter a title.';return;}
	if($_POST['replyText'] == NULL){ $message = 'Please enter reply text.';return;}
		
	// If everything OK, Update
	$update = mysql_query("UPDATE `blogreplies` SET `topicID`='$_POST[topicID]',`userID`='$_POST[userID]',
	`replyTitle`='$_POST[replyTitle]',`replyText`='$_POST[replyText]' WHERE `replyID`='$_POST[replyID]' LIMIT 1");
	if($update)
	{
		$message .= 'Reply has been  updated successfully.';
	} else {
		$message .= 'Unable to update reply.';
	}
	return;
}


?>