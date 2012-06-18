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
		$testSuite = new SearchModules();
		$testSuite->setName('SearchModules');
		$testSuite->addTestSuite('Search_Info');
		$testSuite->addTestSuite('Dashboard_Cat');
		$testSuite->addTestSuite('Dashboard_AddTopic');
		return $testSuite;
    }
    protected function tearDown(){
		
	}
}
?>