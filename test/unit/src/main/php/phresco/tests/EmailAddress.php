<?php

/*	Author by {phresco} QA Automation Team	*/

class EmailAddress {
	
	
	public function check_email_address($strEmailAddress) {
		 if (!preg_match('/^(([A-Za-z0-9][A-Za-z0-9-]{0,61}[A-Za-z0-9])|'.'([A-Za-z0-9]+))$/', $strEmailAddress))
				{
                   return true;
                }
	}
}
?>