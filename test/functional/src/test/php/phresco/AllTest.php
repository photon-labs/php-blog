<?php
/*	Author by {phresco} QA Automation Team	*/

require_once 'tests/UserModules.php';
require_once 'tests/SearchModules.php';
require_once 'tests/DbUpdateModules.php';
require_once 'tests/DbDeleteModules.php';

class AllTest extends PHPUnit_Framework_TestSuite 
{
	protected function setUp(){
		parent::setUp();
	}
	public static function suite(){
	
		$suite = new AllTest();
		$suite->setName('AllTestsuite');
        $suite->addTest(UserModules::suite());
		$suite->addTest(SearchModules::suite());
		$suite->addTest(DbUpdateModules::suite());
		$suite->addTest(DbDeleteModules::suite());
        return $suite;
    }
	protected function tearDown(){
		parent::tearDown();
	}
}
?>
