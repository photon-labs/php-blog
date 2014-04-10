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
// Check for reply addition
if($_POST['topicID'] != NULL)
{
	list($topicID,$userName,$userEmail,$userPassword,$replyTitle) = cleanInputs(
	$_POST['topicID'],$_POST['userName'],$_POST['userEmail'],$_POST['userPassword'],$_POST['replyTitle']);
	
	if($_POST['replyTitle'] != NULL && $_POST['replyText']!="")
	{
			$session_userid=$_SESSION['userID'];
			if($session_userid!="")
			{
				$_POST['replyText'] = mysql_real_escape_string(substr($_POST['replyText'],0,$maxWords));
				
				$addReply = mysql_query("INSERT INTO `blogreplies` (`topicID`,`userID`,`replyTitle`,`replyText`,`replyDate`)
					VALUES ('$_POST[topicID]','$session_userid','$_POST[replyTitle]','$_POST[replyText]',NOW())");
					$message = 'Reply added.';
			}	
			else 
			{
				$message = 'Unable to add reply Register First.';
			}
	}	
		
	// By this point, we have a user ID
	
}

?>