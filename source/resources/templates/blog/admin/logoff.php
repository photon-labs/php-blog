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
// Start session
session_start();
include("../../../../path.php");

include("../../../../config.php");

$dbc = connectDatabase();
$userID=$_SESSION['userID'];
// Remove admin session
$remove = mysql_query("DELETE FROM `usersessions` WHERE `userID`='$userID'");

disconnectDatabase($dbc);

unset($_SESSION['adminSession'],$_COOKIE['adminSession']);
unset($_SESSION['userID']);

	header("location: ../../../../public_html/blog/index.php?view=blog");

//header('Location: index.php');
exit();
?>
