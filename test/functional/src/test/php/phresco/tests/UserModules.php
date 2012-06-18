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
	
		$testSuite = new UserModules();
		$testSuite->setName('UserModules');
		$testSuite->addTestSuite('Register_NewUser');
		$testSuite->addTestSuite('LoginLogout_User');
		$testSuite->addTestSuite('Account_Update');
        return $testSuite;
    }
    protected function tearDown(){
		
	}
}
?>