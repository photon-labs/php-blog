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


//Check admin sessions (set it to NO at first)
$isAdmin = false;

// Start session
session_start();

if($_SESSION['usersession'] == NULL){$_SESSION['usersession'] = $_COOKIE['usersession'];}

$checkUser = mysql_fetch_assoc(mysql_query("SELECT * FROM `usersessions` WHERE `sessionID`='$_SESSION[usersession]'"));
$userID = $checkUser['userID'];

// check for any sessions in database
if($userID != '')
{ 
	$isAdmin = true;
}

?>