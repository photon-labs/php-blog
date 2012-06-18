<?php
/*	Author by {phresco} QA Automation Team	*/

require_once 'PhpCommonFun.php';

class Dashboard_CatEdit extends PhpCommonFun
{
    protected function setUp(){ 
    	parent::setUp();
    }   
    
    public function testCatEdit(){ 
	
		$testcases = __FUNCTION__;
    	parent::Browser();
    	parent::DoLogin($testcases);
		
		$doc = new DOMDocument();
		
		$doc->load('test-classes/phresco/tests/phpsetting.xml');
		
		$users = $doc->getElementsByTagName("dbupdatemodule");
		
		foreach( $users as $dbupdatemodule ){
			
			$cartedittopics = $dbupdatemodule->getElementsByTagName("dbcartedittopic");
			$cartedittopic = $cartedittopics->item(0)->nodeValue;
			
			$carteditdescs = $dbupdatemodule->getElementsByTagName("dbcarteditdesc");
			$carteditdesc = $carteditdescs->item(0)->nodeValue;
			
		}
			
		$this->getElement(PHP_DBCATEDIT_LINK,$testcases);
		
		$this->clickandLoad(PHP_DBCATEDIT_LINK);
		
		$this->getElement(PHP_DBCATEDIT_LINK1,$testcases);
		
		$this->clickandLoad(PHP_DBCATEDIT_LINK1);
		
		$this->getElement(PHP_DBCATEDIT_LINK2,$testcases);
		
		$this->clickandLoad(PHP_DBCATEDIT_LINK2);
		
		$this->getElement(PHP_DBCATEDIT_CATNAME,$testcases);
		
		$this->clear(PHP_DBCATEDIT_CATNAME,$testcases);
		
		$this->type(PHP_DBCATEDIT_CATNAME,$cartedittopic);
		
		$this->getElement(PHP_DBCATEDIT_CATDEC,$testcases);
		
		$this->clear(PHP_DBCATEDIT_CATDEC,$testcases);
		
		$this->type(PHP_DBCATEDIT_CATDEC,$carteditdesc);
		
		$this->submit(PHP_DBCATEDIT_SUBMIT,$testcases);
		
		try{
		
			$this->assertFalse($this->isTextPresent(PHP_DBCATEDIT_MSG));
		}
		
		catch (PHPUnit_Framework_AssertionFailedError $e) {
		
	        $this->doCreateScreenShot(__FUNCTION__);
			
		}	

		$this->getElement(PHP_DBCATEDIT_LOGOFF,$testcases);
		
		$this->clickandLoad(PHP_DBCATEDIT_LOGOFF);
			
		$this->getElement(PHP_LOGIN_LINK,$testcases);
    }
}  
?>