<?php
/*	Author by {phresco} QA Automation Team	*/

require_once 'PhpCommonFun.php';

class Dashboard_Cat extends PhpCommonFun
{
    protected function setUp(){ 
    	parent::setUp();
    }   
    
    public function testCat(){

		$testcases = __FUNCTION__;
    	parent::Browser();
    	parent::DoLogin($testcases);
		
		$doc = new DOMDocument();
		
		$doc->load('test-classes/phresco/tests/phpsetting.xml');
		
		$users = $doc->getElementsByTagName("searchmodule");
		
		foreach( $users as $searchmodule ){
			
			$DbCartTopics = $searchmodule->getElementsByTagName("db-carttopic");
			$DbCartTopic = $DbCartTopics->item(0)->nodeValue;
			
			$DbCartDescs = $searchmodule->getElementsByTagName("db-cartdesc");
			$DbCartDesc = $DbCartDescs->item(0)->nodeValue;
		
		}
		
		$this->getElement(PHP_DBCAT_LINK,$testcases);
		
		$this->clickandLoad(PHP_DBCAT_LINK);
		
		$this->getElement(PHP_DBCAT_LINK1,$testcases);
		
		$this->clickandLoad(PHP_DBCAT_LINK1);
		
		$this->getElement(PHP_DBCAT_LINK2,$testcases);
		
		$this->clickandLoad(PHP_DBCAT_LINK2);
		
		$this->getElement(PHP_DBCAT_CATNAME,$testcases);
		
		$this->clear(PHP_DBCAT_CATNAME,$testcases);
		
		$this->type(PHP_DBCAT_CATNAME,$DbCartTopic);
		
		$this->getElement(PHP_DBCAT_CATDEC,$testcases);
		
		$this->clear(PHP_DBCAT_CATDEC,$testcases);
		
		$this->type(PHP_DBCAT_CATDEC,$DbCartDesc);
		
		$this->submit(PHP_DBCAT_SUBMIT,$testcases);
		
		try{
		
			$this->assertFalse($this->isTextPresent(PHP_DBCAT_MSG));
		}
		
		catch (PHPUnit_Framework_AssertionFailedError $e) {
		
	        $this->doCreateScreenShot(__FUNCTION__);
			
		}	

		$this->getElement(PHP_UPDATE_LOGOFF,$testcases);
		
		$this->clickandLoad(PHP_UPDATE_LOGOFF);
			
		$this->getElement(PHP_LOGIN_LINK,$testcases);
		
		
    }
}  
?>