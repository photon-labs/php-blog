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
		$testSuite = new DbDeleteModules('DbDeleteModules');
		$testSuite->addTest(new Dashboard_DeleteTopic("testDeleteTopic"));
		$testSuite->addTest(new Dashboard_CatDelete("testCatDelete"));
		return $testSuite;
    }
    protected function tearDown(){
		
	}
}
?>