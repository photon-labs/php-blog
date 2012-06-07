<?php

/*	Author by {phresco} QA Automation Team	*/

require_once 'tests/EmailAddressValidator.php';
 
class AllTest extends PHPUnit_Framework_TestSuite
{
 
 protected function setUp()
    {
		
	}
 public static function suite()
    {
		$testSuite = new AllTest('Phpunittest');
		$testSuite->addTest(new EmailAddressValidator("testValidation"));
 		
		return $testSuite;
    }
 protected function tearDown()
    {
		//run after the final test
    }
}

	


?>
