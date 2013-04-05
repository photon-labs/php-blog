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

// Add Categories
if($_POST['catID'] == NULL && $_GET['do'] == NULL)
{
	// Check new category values
	if($_POST['catTitle'] == NULL){ $message = 'Please enter a title.';return;}
	if($_POST['catDesc'] == NULL){ $message = 'Please enter a description.';return;}
	$userID=$_SESSION['userID'];
	$catdesc=mysql_escape_string($_POST['catDesc']);
	$addCat = mysql_query("INSERT INTO `catlist` (`userId`,`catTitle`,`catDesc`)
		VALUES ('$userID','$_POST[catTitle]','$catdesc')");
	if($addCat)
	{
		$message = 'Category has been  added successfully.';
		$_GET['catID'] = mysql_insert_id();
	} else {
		$message = 'Unable to add Category.';
	}
}

// Edit category
if($_POST['catID'] != NULL)
{
	// Check new category values
	if($_POST['catTitle'] == NULL){ $message = 'Please enter a title.';return;}
	if($_POST['catDesc'] == NULL){ $message = 'Please enter a description.';return;}
	$catdesc=mysql_escape_string($_POST['catDesc']);	
	// If everything OK, Update
	$update = mysql_query("UPDATE `catlist` SET `catTitle`='$_POST[catTitle]',`catDesc`='$catdesc'
		WHERE `catID`='$_POST[catID]' LIMIT 1");
	if($update)
	{
		$message .= 'Category has been  updated successfully.';
	} else {
		$message .= 'Unable to update category.';
	}
	return;
}

// If removing category
if($_GET['do'] == 'remove')
{
	// Remove category
	//$remove = mysql_query("DELETE FROM `catlist` WHERE `catID`='$_GET[catID]' LIMIT 1");
	
	// Remove topics & replies
	/*$getTopics = mysql_query("SELECT `topicID` FROM `blogtopics` WHERE `catID`='$_GET[catID]'");
	while($eachTopic = @mysql_fetch_assoc($getTopics))
	{
		$removeReplies = mysql_query("DELETE FROM `blogreplies` WHERE `topicID`='$eachTopic[topicID]'");
	}
	$updateReplies = mysql_query("DELETE FROM `blogtopics` WHERE `catID`='$_GET[catID]'");*/
	
	$getTopics = mysql_query("SELECT `topicID` FROM `blogtopics` WHERE `catID`='$_GET[catID]'");
	$querytopic=mysql_fetch_assoc($getTopics);
	if($querytopic['topicID']!="")
	{
		$message = 'Unable to remove category.';
	}
	else
	{
		$remove = mysql_query("DELETE FROM `catlist` WHERE `catID`='$_GET[catID]' LIMIT 1");
		$message = 'Category has been  removed successfully';
	}
	
	
	
	/*if($remove)
	{
		$message = 'Category removed';
	} else {
		$message = 'Unable to remove category.';
	}*/
}

?>