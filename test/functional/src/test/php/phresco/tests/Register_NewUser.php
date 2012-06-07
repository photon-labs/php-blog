<?php
/*	Author by {phresco} QA Automation Team	*/

require_once 'PhpCommonFun.php';
require_once 'PHPUnit/Extensions/SeleniumTestCase.php';

class Register_NewUser extends PhpCommonFun
{
    protected function setUp(){ 
    	parent::setUp();
    }   
    public function testRegisters(){ 
    	parent::Browser();
		$name;
		$password;$email;
		$property = new PhpCommonFun;
		$doc = new DOMDocument();
		$doc->load('src/test/php/phresco/tests/phpsetting.xml');
		$users = $doc->getElementsByTagName("register");
		foreach( $users as $register )
		{
			$names = $register->getElementsByTagName("username");
			$name = $names->item(0)->nodeValue;
			
			$passwords = $register->getElementsByTagName("password");
			$password = $passwords->item(0)->nodeValue;
			$emails = $register->getElementsByTagName("email");
			$email = $emails->item(0)->nodeValue;
		}
		
		try {
			if ($this->isElementPresent(PHP_REG_LINK))
			$property->waitForElementPresent('PHP_REG_LINK');
			$this->clickAndWait(PHP_REG_LINK);
			$property->waitForElementPresent('PHP_REG_UNAME_TBOX');
	    }   
		catch (Exception $e) {}        
			$this->type(PHP_REG_UNAME_TBOX,$name);
			$property->waitForElementPresent('PHP_REG_EMAIL_TBOX');
			$this->type(PHP_REG_EMAIL_TBOX,$email);
			$property->waitForElementPresent('PHP_REG_PASS_TBOX');
			$this->type(PHP_REG_PASS_TBOX,$password);
			$property->waitForElementPresent('PHP_REG_SUBMIT');
			$this->clickAndWait(PHP_REG_SUBMIT);
			$property->waitForElementPresent('PHP_REG_MSG');	       
		try {
			$this->assertTrue($this->isTextPresent(PHP_REG_MSG));
		}	
		catch (Exception $e) {
			parent::doCreateScreenShot(__FUNCTION__);
		}	
    }
	public function tearDown(){
		parent::tearDown();
	}
	
}  
?>
