<?php
/*	Author by {phresco} QA Automation Team	*/

require_once 'Search_Info.php';
require_once 'Dashboard_AddTopic.php';
require_once 'Dashboard_Cat.php';

class SearchModules extends PHPUnit_Framework_TestSuite
{
	protected function setUp(){
		parent::setUp();
	}
	public static function suite(){
		$testSuite = new SearchModules('SearchModules');
		$testSuite->addTest(new Search_Info("testSearch"));
		$testSuite->addTest(new Dashboard_Cat("testCat"));	
		$testSuite->addTest(new Dashboard_AddTopic("testDash"));
		return $testSuite;
    }
    protected function tearDown(){
		
	}
}
?>