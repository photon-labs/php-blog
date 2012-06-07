<?php

/*	Author by {phresco} QA Automation Team	*/

require_once 'PHPUnit/Framework.php';
require_once 'phresco/tests/EmailAddress.php';
class EmailAddressValidator extends PHPUnit_Framework_TestCase {
        public function setUp() 
		{
            $this->objValidator = new EmailAddress;
        }

        public function testValidation() 
		{
            $this->assertEquals(true, $this->objValidator->check_email_address('test@example.com'));
        }
}
?>