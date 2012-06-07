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
		$testSuite = new AllTest('AllTestSuite');
		$testSuite->addTestSuite('UserModules');
		$testSuite->addTestSuite('SearchModules');	
		$testSuite->addTestSuite('DbUpdateModules');
		$testSuite->addTestSuite('DbDeleteModules');
		return $testSuite;
    }
	protected function tearDown(){
		parent::tearDown();
	}
}
?>
