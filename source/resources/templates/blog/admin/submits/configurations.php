<?php /*
/*
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
 */
?>
<?php


// If already logged in
if($isAdmin != true){ die('Invalid Access');}

// Go through every post field
foreach($_POST as $item => $value)
{
	// If not hidden value or submit button, update config
	if($item != 'submitName' && $item != 'Submit')
	{
		$check = mysql_fetch_row(mysql_query("SELECT COUNT(*) FROM `siteconfig` WHERE `configName`='$item'"));
		if($check[0] > 0)
		{
			$update = mysql_query("UPDATE `siteconfig` SET `configValue`='$value' WHERE `configName`='$item'");
		} else {
			$update = mysql_query("INSERT INTO `siteconfig` (`configName`,`configValue`) VALUES ('$item','$value')");
		}
		if($update)
		{
			$message .= 'Config value for <font color="#0000FF">'.$item.'</font> has been changed.<br/ >';
		} else {
			$message .= 'Unable to change value for <font color="#0000FF">'.$item.'</font>.<br/ >';
		}
	}
}

?>