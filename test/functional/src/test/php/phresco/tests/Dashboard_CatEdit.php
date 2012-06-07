<?php
/*	Author by {phresco} QA Automation Team	*/

require_once 'PhpCommonFun.php';
require_once 'PHPUnit/Extensions/SeleniumTestCase.php';
class Dashboard_CatEdit extends PhpCommonFun
{
    protected function setUp(){ 
    	parent::setUp();
    }   
    
    public function testCatEdit(){ 
    	parent::Browser();
    	parent::DoLogin(__FUNCTION__);
		
		$cartedittopic;$carteditdesc;
		$property = new PhpCommonFun;
		$doc = new DOMDocument();
		$doc->load('src/test/php/phresco/tests/phpsetting.xml');
		$users = $doc->getElementsByTagName("dbupdatemodule");
		foreach( $users as $dbupdatemodule )
		{
			
			$cartedittopics = $dbupdatemodule->getElementsByTagName("dbcartedittopic");
			$cartedittopic = $cartedittopics->item(0)->nodeValue;
			$carteditdescs = $dbupdatemodule->getElementsByTagName("dbcarteditdesc");
			$carteditdesc = $carteditdescs->item(0)->nodeValue;
		}
		try {
			if ($this->isTextPresent(PHP_DBCATEDIT_LINK))
		    $property->waitForElementPresent('PHP_DBCATEDIT_LINK');
	        $this->clickAndWait(PHP_DBCATEDIT_LINK);
	        
	    }   
		catch (Exception $e) {}
		
			$property->waitForElementPresent('PHP_DBCATEDIT_LINK1');
			$this->clickAndWait(PHP_DBCATEDIT_LINK1);
			$property->waitForElementPresent('PHP_DBCATEDIT_LINK2');
            $this->click(PHP_DBCATEDIT_LINK2);
            $property->waitForElementPresent('PHP_DBCATEDIT_CATNAME');
            $this->type(PHP_DBCATEDIT_CATNAME,$cartedittopic);
            $property->waitForElementPresent('PHP_DBCATEDIT_CATDEC');
            $this->type(PHP_DBCATEDIT_CATDEC,$carteditdesc);
            $property->waitForElementPresent('PHP_DBCATEDIT_LINK3');
            $this->clickAndWait(PHP_DBCATEDIT_LINK3);
            $property->waitForElementPresent('PHP_DBCATEDIT_MSG');
            
		try {
		    $this->assertFalse($this->isElementPresent(PHP_DBCATEDIT_MSG));
        }     
        catch (PHPUnit_Framework_AssertionFailedError $e) {
		    parent::doCreateScreenShot(__FUNCTION__);
			$property->waitForElementPresent('PHP_DBCATEDIT_LOGOFF');
			$this->clickAndWait(PHP_DBCATEDIT_LOGOFF);
			sleep(WAIT_FOR_NEXT_LINE);
			
			
        }
    }
}  
?>