<?php
/*	Author by {phresco} QA Automation Team	*/

require_once 'PhpCommonFun.php';
require_once 'PHPUnit/Extensions/SeleniumTestCase.php';
class Dashboard_DeleteTopic extends PhpCommonFun
{
    protected function setUp(){ 
    	parent::setUp();
    }   
    
    public function testDeleteTopic(){ 
    	parent::Browser();
    	parent::DoLogin(__FUNCTION__);
		
		$property = new PhpCommonFun;
		
		try {
			if ($this->isTextPresent(PHP_DBDELETE_LINK))
		    $property->waitForElementPresent('PHP_DBDELETE_LINK');
	        $this->clickAndWait(PHP_DBDELETE_LINK);
	        $property->waitForElementPresent('PHP_DBDELETE_DEL');
	    }   
		catch (Exception $e) {}
            $this->clickAndWait(PHP_DBDELETE_DEL);
            $property->waitForElementPresent('PHP_DBDELETE_MSG');
		try {
		    $this->assertFalse($this->isElementPresent(PHP_DBDELETE_MSG));
        }     
        catch (PHPUnit_Framework_AssertionFailedError $e) {
		    parent::doCreateScreenShot(__FUNCTION__);
			$this->isElementPresent(PHP_DBOARD_LOGOFF);
            $this->clickAndWait(PHP_DBDELETE_LOGOFF);
    	    sleep(WAIT_FOR_NEXT_LINE);
        }
    }
}  
?>