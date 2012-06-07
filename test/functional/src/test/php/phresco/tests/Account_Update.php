<?php
/*	Author by {phresco} QA Automation Team	*/

require_once 'PhpCommonFun.php';
require_once 'PHPUnit/Extensions/SeleniumTestCase.php';

class Account_Update extends PhpCommonFun
{
    protected function setUp(){ 
    	parent::setUp();
    }   
    public function testAccountUpdate(){ 
    	parent::Browser();
		parent::DoLogin(__FUNCTION__);	
		$name;
		$password;$email;
		$property = new PhpCommonFun;
		$doc = new DOMDocument();
		$doc->load('src/test/php/phresco/tests/phpsetting.xml');
		$users = $doc->getElementsByTagName("acupdate");
		foreach( $users as $acupdate )
		{
			$names = $acupdate->getElementsByTagName("username");
			$name = $names->item(0)->nodeValue;
			
			$passwords = $acupdate->getElementsByTagName("password");
			$password = $passwords->item(0)->nodeValue;
			$emails = $acupdate->getElementsByTagName("email");
			$email = $emails->item(0)->nodeValue;
		}
		
		try {
			if ($this->isElementPresent(PHP_UPDATE_LINK))
			$property->waitForElementPresent('PHP_UPDATE_LINK');
			$this->clickAndWait(PHP_UPDATE_LINK);
			$property->waitForElementPresent('PHP_UPDATE_LINK1');
	    }   
		catch (Exception $e) {}  
			$this->clickAndWait(PHP_UPDATE_LINK1);
			$property->waitForElementPresent('PHP_UPDATE_UNAME');
			$this->type(PHP_UPDATE_UNAME,$name);
			$property->waitForElementPresent('PHP_UPDATE_EMAIL');
			$this->type(PHP_UPDATE_EMAIL,$email);
			$property->waitForElementPresent('PHP_UPDATE_PASS');
			$this->type(PHP_UPDATE_PASS,$password);
			$property->waitForElementPresent('PHP_UPDATE_STATUS');
			$this->click(PHP_UPDATE_STATUS);
			$property->waitForElementPresent('PHP_UPDATE_LINK2');
			$this->click(PHP_UPDATE_LINK2);
			$property->waitForElementPresent('PHP_UPDATE_MSG');
		try {
			$this->assertTrue($this->isTextPresent(PHP_UPDATE_MSG));
		}	
		catch (Exception $e) {
			parent::doCreateScreenShot(__FUNCTION__);
			$this->clickAndWait(PHP_UPDATE_LOGOFF);
			sleep(WAIT_FOR_NEXT_LINE);
		}	
    }
	public function tearDown(){
		parent::tearDown();
	}
	
}  
?>
