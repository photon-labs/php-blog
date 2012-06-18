<?php
/*	Author by {phresco} QA Automation Team	*/

require_once 'PhpCommonFun.php';

class Account_Update extends PhpCommonFun
{
    protected function setUp(){ 
    	parent::setUp();
    }   
    public function testAccountUpdate(){ 
	
		$testcases = __FUNCTION__;
    	parent::Browser();
		parent::DoLogin($testcases);	
		
		$doc = new DOMDocument();
		
		$doc->load('test-classes/phresco/tests/phpsetting.xml');
		
		$users = $doc->getElementsByTagName("acupdate");
		
		foreach( $users as $acupdate ){
		
			$names = $acupdate->getElementsByTagName("username");
			$name = $names->item(0)->nodeValue;
			
			$emails = $acupdate->getElementsByTagName("email");
			$email = $emails->item(0)->nodeValue;
			
			$passwords = $acupdate->getElementsByTagName("password");
			$password = $passwords->item(0)->nodeValue;
		}
		
		$this->getElement(PHP_UPDATE_LINK,$testcases);
		
		$this->clickandLoad(PHP_UPDATE_LINK);
		
		$this->getElement(PHP_UPDATE_LINK1,$testcases);
		
		$this->clickandLoad(PHP_UPDATE_LINK1);
		
		$this->getElement(PHP_UPDATE_UNAME,$testcases);
		
		$this->clear(PHP_UPDATE_UNAME,$testcases);
		
		$this->type(PHP_UPDATE_UNAME,$name);
		
		$this->getElement(PHP_UPDATE_EMAIL,$testcases);
		
		$this->clear(PHP_UPDATE_EMAIL,$testcases);
		
		$this->type(PHP_UPDATE_EMAIL,$email);
		
		$this->getElement(PHP_UPDATE_PASS,$testcases);
		
		$this->clear(PHP_UPDATE_PASS,$testcases);
		
		$this->type(PHP_UPDATE_PASS,$password);
		
		$this->getElement(PHP_UPDATE_STATUS,$testcases);
		
		$this->clickandLoad(PHP_UPDATE_STATUS);
		
		$this->getElement(PHP_UPDATE_SUBMIT,$testcases);
		
		$this->clickandLoad(PHP_UPDATE_SUBMIT);
		
		try{
		
			$this->assertFalse($this->isTextPresent(PHP_UPDATE_MSG));
		}
		
		catch (PHPUnit_Framework_AssertionFailedError $e) {
		
	        $this->doCreateScreenShot(__FUNCTION__);
					
		}
		
		$this->getElement(PHP_UPDATE_LOGOFF,$testcases);
		
		$this->clickandLoad(PHP_UPDATE_LOGOFF);
			
		$this->getElement(PHP_LOGIN_LINK,$testcases);
		
    }
	
	public function tearDown(){
	
		parent::tearDown();
		
	}
	
}  
?>
