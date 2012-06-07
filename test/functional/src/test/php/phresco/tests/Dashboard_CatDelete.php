<?php
/*	Author by {phresco} QA Automation Team	*/

require_once 'PhpCommonFun.php';
require_once 'PHPUnit/Extensions/SeleniumTestCase.php';
class Dashboard_CatDelete extends PhpCommonFun
{
    protected function setUp(){ 
    	parent::setUp();
    }   
    
    public function testCatDelete(){ 
    	parent::Browser();
    	parent::DoLogin(__FUNCTION__);
		
		$property = new PhpCommonFun;
		
		
		try {
			if ($this->isTextPresent(PHP_DBCATDELETE_LINK))
		    $property->waitForElementPresent('PHP_DBCATDELETE_LINK');
	        $this->clickAndWait(PHP_DBCATDELETE_LINK);
	        $property->waitForElementPresent('PHP_DBCATELETE_LINK1');
	    }   
		catch (Exception $e) {}
            $this->clickAndWait(PHP_DBCATELETE_LINK1);
            $property->waitForElementPresent('PHP_DBCATELETE_LINK2');
            $this->click(PHP_DBCATELETE_LINK2);
            $property->waitForElementPresent('PHP_DBCATELETE_MSG');
            
            
		try {
		    $this->assertFalse($this->isElementPresent(PHP_DBCATELETE_MSG));
        }     
        catch (PHPUnit_Framework_AssertionFailedError $e) {
		    parent::doCreateScreenShot(__FUNCTION__);
			$this->isElementPresent(PHP_DBCATELETE_LOGOFF);
            $this->clickAndWait(PHP_DBCATELETE_LOGOFF);
    	    sleep(WAIT_FOR_NEXT_LINE);
        }
    }
}  
?>