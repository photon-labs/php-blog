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
	require_once("../../path.php");

	require_once("../../config.php");

	function renderLayoutWithContentFile($contentFile, $variables = array())
	{
		// making sure passed in variables are in scope of the template
		// each key in the $variables array will become a variable
		if (count($variables) > 0) {
			foreach ($variables as $key => $value) {
				if (strlen($key) > 0) {
					${$key} = $value;
				}
			}
		}

		require_once("../../resources/templates/blog/header.php");

		echo "<div id=\"container\">\n"
		   . "\t<div id=\"content\">\n";

		if (true) {
			require_once("../../resources/templates/blog/$contentFile");
		} else {
			/*
				If the file isn't found the error can be handled in lots of ways.
				In this case we will just include an error template.
			*/
			require_once("../../resources/templates/blog/error.php");
		}

		// close content div
		echo "\t</div>\n";

		//rightPanel

		// close container div
		echo "</div>\n";

		require_once("../../resources/templates/blog/footer.php");
	}

	//require_once("../../library/templateFunctions.php");

	$variables = array();

	if($_GET)
		$view = $_GET['view'];
	else
		$view = 'blog';

	renderLayoutWithContentFile($view.".php", $variables);

?>
