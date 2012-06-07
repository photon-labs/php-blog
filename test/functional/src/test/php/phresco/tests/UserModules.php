<?php
/*	Author by {phresco} QA Automation Team	*/

require_once 'Register_NewUser.php';
require_once 'LoginLogout_User.php';
require_once 'Account_Update.php';

class UserModules extends PHPUnit_Framework_TestSuite
{
	protected function setUp(){
		parent::setUp();
	}
	public static function suite(){
		$testSuite = new UserModules('UserModules');
		$testSuite->addTest(new Register_NewUser("testRegisters"));
        $testSuite->addTest(new LoginLogout_User("testLoginLogout_User"));	
		$testSuite->addTest(new Account_Update("testAccountUpdate"));
		return $testSuite;
    }
    protected function tearDown(){
		
	}
}
?>