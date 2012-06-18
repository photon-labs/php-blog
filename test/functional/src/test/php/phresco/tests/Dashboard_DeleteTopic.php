<?php
/*	Author by {phresco} QA Automation Team	*/

require_once 'PhpCommonFun.php';

class Dashboard_DeleteTopic extends PhpCommonFun
{
    protected function setUp(){ 
    	parent::setUp();
    }   
    
    public function testDeleteTopic(){ 
	
		$testcases = __FUNCTION__;
    	parent::Browser();
    	parent::DoLogin($testcases);
		
		$this->getElement(PHP_DBDELETE_LINK,$testcases);
		
		$this->clickandLoad(PHP_DBDELETE_LINK);
		
		$this->getElement(PHP_DBDELETE_DEL,$testcases);
		
		$this->clickandLoad(PHP_DBDELETE_DEL);
		
		$this->acceptAlert();
		
		$this->getElement(PHP_DBDELETE_LOGOFF,$testcases);
		
		try{
		
			$this->assertFalse($this->isTextPresent(PHP_DBDELETE_MSG));
		}
		
		catch (PHPUnit_Framework_AssertionFailedError $e) {
		
	        $this->doCreateScreenShot(__FUNCTION__);
			
		}	
		
		$this->getElement(PHP_DBDELETE_LOGOFF,$testcases);
		
		$this->clickandLoad(PHP_DBDELETE_LOGOFF);
			
		$this->getElement(PHP_LOGIN_LINK,$testcases);
    }
}  
?>