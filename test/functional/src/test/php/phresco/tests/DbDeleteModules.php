<?php
/*	Author by {phresco} QA Automation Team	*/

require_once 'Dashboard_DeleteTopic.php';
require_once 'Dashboard_CatDelete.php';

class DbDeleteModules extends PHPUnit_Framework_TestSuite
{
	protected function setUp(){
		parent::setUp();
	}
	public static function suite(){
	
		$testSuite = new DbDeleteModules();
		$testSuite->setName('DbDeleteModules');
		$testSuite->addTestSuite('Dashboard_DeleteTopic');
		$testSuite->addTestSuite('Dashboard_CatDelete');
		return $testSuite;
		
    }
    protected function tearDown(){
		
	}
}
?>