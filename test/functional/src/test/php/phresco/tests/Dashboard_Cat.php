<?php
/*	Author by {phresco} QA Automation Team	*/

require_once 'PhpCommonFun.php';
require_once 'PHPUnit/Extensions/SeleniumTestCase.php';
class Dashboard_Cat extends PhpCommonFun
{
    protected function setUp(){ 
    	parent::setUp();
    }   
    
    public function testCat(){ 
    	parent::Browser();
    	parent::DoLogin(__FUNCTION__);
		$DbCartTopic;$DbCartDesc;
		$property = new PhpCommonFun;
		$doc = new DOMDocument();
		$doc->load('src/test/php/phresco/tests/phpsetting.xml');
		$users = $doc->getElementsByTagName("searchmodule");
		foreach( $users as $searchmodule )
		{
			
			$DbCartTopics = $searchmodule->getElementsByTagName("db-carttopic");
			$DbCartTopic = $DbCartTopics->item(0)->nodeValue;
			$DbCartDescs = $searchmodule->getElementsByTagName("db-cartdesc");
			$DbCartDesc = $DbCartDescs->item(0)->nodeValue;
		}
		
		try {
			if ($this->isTextPresent(PHP_DBCAT_LINK))
		    $property->waitForElementPresent('PHP_DBCAT_LINK');
	        $this->clickAndWait(PHP_DBCAT_LINK);
	        
	    }   
		catch (Exception $e) {}
		
			$property->waitForElementPresent('PHP_DBCAT_LINK1');
			$this->clickAndWait(PHP_DBCAT_LINK1);
			$property->waitForElementPresent('PHP_DBCAT_LINK2');
            $this->click(PHP_DBCAT_LINK2);
            $property->waitForElementPresent('PHP_DBCAT_CATNAME');
            $this->type(PHP_DBCAT_CATNAME,$DbCartTopic);
            $property->waitForElementPresent('PHP_DBCAT_CATDEC');
            $this->type(PHP_DBCAT_CATDEC,$DbCartDesc);
            $property->waitForElementPresent('PHP_DBCAT_CATDEC');
            $this->clickAndWait(PHP_DBCAT_LINK3);
            $property->waitForElementPresent('PHP_DBCAT_MSG');
            
		try {
		    $this->assertFalse($this->isElementPresent(PHP_DBCAT_MSG));
        }     
        catch (PHPUnit_Framework_AssertionFailedError $e) {
		    parent::doCreateScreenShot(__FUNCTION__);
			$property->waitForElementPresent('PHP_DBCAT_LOGOFF');
			$this->clickAndWait(PHP_DBCAT_LOGOFF);
			sleep(WAIT_FOR_NEXT_LINE);
			
			
        }
    }
}  
?>