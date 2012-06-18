<?php
/*	Author by {phresco} QA Automation Team	*/

require_once 'PhpCommonFun.php';

class Dashboard_CatDelete extends PhpCommonFun
{
    protected function setUp(){ 
    	parent::setUp();
    }   
    
    public function testCatDelete(){ 
	
		$testcases = __FUNCTION__;
    	parent::Browser();
    	parent::DoLogin($testcases);
		
		$this->getElement(PHP_DBCATDELETE_LINK,$testcases);
		
		$this->clickandLoad(PHP_DBCATDELETE_LINK);
		
		$this->getElement(PHP_DBCATDELETE_LINK1,$testcases);
		
		$this->clickandLoad(PHP_DBCATDELETE_LINK1);
		
		$this->getElement(PHP_DBCATDELETE_LINK2,$testcases);
		
		$this->clickandLoad(PHP_DBCATDELETE_LINK2);
		
		$this->acceptAlert();
		
		try{
		
			$this->assertFalse($this->isTextPresent(PHP_DBCATDELETE_MSG));
		}
		
		catch (PHPUnit_Framework_AssertionFailedError $e) {
		
	        $this->doCreateScreenShot(__FUNCTION__);
			
		}	
		
		$this->getElement(PHP_DBCATDELETE_LOGOFF,$testcases);
		
		$this->clickandLoad(PHP_DBCATDELETE_LOGOFF);
			
		$this->getElement(PHP_LOGIN_LINK,$testcases);
		
    }
}  
?>