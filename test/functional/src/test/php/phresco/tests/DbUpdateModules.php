<?php
/*	Author by {phresco} QA Automation Team	*/

require_once 'Dashboard_EditTopic.php';
require_once 'Dashboard_CatEdit.php';

class DbUpdateModules extends PHPUnit_Framework_TestSuite
{
	protected function setUp(){
		parent::setUp();
	}
	public static function suite(){
	
		$testSuite = new DbUpdateModules();
		$testSuite->setName('DbUpdateModules');
		$testSuite->addTestSuite('Dashboard_CatEdit');
		$testSuite->addTestSuite('Dashboard_EditTopic');
		return $testSuite;
    }
    protected function tearDown(){
		
	}
}
?>