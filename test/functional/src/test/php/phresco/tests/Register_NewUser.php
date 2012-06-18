<?php
/*	Author by {phresco} QA Automation Team	*/

require_once 'PhpCommonFun.php';

class Register_NewUser extends PhpCommonFun
{
    protected function setUp(){ 
	
    	parent::setUp();
    }   
    public function testRegisters(){ 
    	parent::Browser();
		$testcases = __FUNCTION__;
		$doc = new DOMDocument();
		
		$doc->load('test-classes/phresco/tests/phpsetting.xml');
		
		$users = $doc->getElementsByTagName("register");
		
		foreach( $users as $register ){
		
			$names = $register->getElementsByTagName("username");
			$name = $names->item(0)->nodeValue;
			
			$emails = $register->getElementsByTagName("email");
			$email = $emails->item(0)->nodeValue;
			
			$passwords = $register->getElementsByTagName("password");
			$password = $passwords->item(0)->nodeValue;
		}
		
		$this->getElement(PHP_REG_LINK,$testcases);
		
		$this->clickandLoad(PHP_REG_LINK);
		
		$this->getElement(PHP_REG_UNAME_TBOX,$testcases);
		
		$this->type(PHP_REG_UNAME_TBOX,$name);
		
		$this->getElement(PHP_REG_EMAIL_TBOX,$testcases);
		
		$this->type(PHP_REG_EMAIL_TBOX,$email);
		
		$this->getElement(PHP_REG_PASS_TBOX,$testcases);
		
		$this->type(PHP_REG_PASS_TBOX,$password);
		
		$this->getElement(PHP_REG_SUBMIT,$testcases);
		
		$this->submit(PHP_REG_SUBMIT,$testcases);
		
		try{
		
			$this->assertTrue($this->isTextPresent(PHP_REG_MSG));
		}
		
		catch (PHPUnit_Framework_AssertionFailedError $e) {
		
	        $this->doCreateScreenShot(__FUNCTION__);
			
		}		
    }
	public function tearDown(){
		$this->closeWindow();
	}
	
}  
?>
