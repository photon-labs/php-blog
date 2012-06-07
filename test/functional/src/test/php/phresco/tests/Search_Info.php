<?php 
/*	Author by {phresco} QA Automation Team	*/

require_once 'PhpCommonFun.php';
require_once 'PHPUnit/Extensions/SeleniumTestCase.php';

class Search_Info extends PhpCommonFun
{
    protected function setUp(){ 
    	parent::setUp();
    }   
    public function testSearch(){ 
    	parent::Browser();
    	parent::DoLogin(__FUNCTION__);
		
		$Searchtopic;
		$property = new PhpCommonFun;
		$doc = new DOMDocument();
		$doc->load('src/test/php/phresco/tests/phpsetting.xml');
		$users = $doc->getElementsByTagName("searchmodule");
		foreach( $users as $searchmodule )
		{
			$Searchtopics = $searchmodule->getElementsByTagName("Searchtopic");
			$Searchtopic = $Searchtopics->item(0)->nodeValue;
		}
		try {
			if ($this->isElementPresent(PHP_SEARCH_LINK))
			$property->waitForElementPresent('PHP_SEARCH_LINK');
			$this->click(PHP_SEARCH_LINK);
			sleep(WAIT_FOR_NEXT_LINE);
	    }   
		catch (Exception $e) {}
			$this->type(PHP_SEARCH_LINK,$Searchtopic);
			$property->waitForElementPresent('PHP_SEARCHIN_AREAS');
			$this->select(PHP_SEARCHIN_AREAS,PHP_SEARCH_AREA);
			$this->isElementPresent(PHP_SEARCH_BUTT);
			$property->waitForElementPresent('PHP_SEARCH_BUTT');
			$this->clickAndWait(PHP_SEARCH_BUTT);
		try {
			$this->assertTrue($this->isTextPresent(PHP_SEARCH_ICON));
        } 
		catch (PHPUnit_Framework_AssertionFailedError $e) {
			parent::doCreateScreenShot(__FUNCTION__);
        }
        parent::DoLogout(__FUNCTION__);
    	sleep(WAIT_FOR_NEXT_LINE);
    }
}  
?>









