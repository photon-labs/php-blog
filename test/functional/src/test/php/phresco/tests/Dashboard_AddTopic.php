<?php
/*	Author by {phresco} QA Automation Team	*/

require_once 'PhpCommonFun.php';

class Dashboard_AddTopic extends PhpCommonFun
{
    protected function setUp(){ 
	
    	parent::setUp();
    
	}   
    
    public function testDash(){ 
	
		$testcases = __FUNCTION__;
    	parent::Browser();
    	parent::DoLogin($testcases);
		
		$doc = new DOMDocument();
		
		$doc->load('test-classes/phresco/tests/phpsetting.xml');
		
		$users = $doc->getElementsByTagName("searchmodule");
		
		foreach( $users as $searchmodule ){
			
			$DbAddTopics = $searchmodule->getElementsByTagName("db-addtopic");
			$DbAddTopic = $DbAddTopics->item(0)->nodeValue;
			
			$DbTopicInfos = $searchmodule->getElementsByTagName("db-topicinfo");
			$DbTopicInfo = $DbTopicInfos->item(0)->nodeValue;
		}
		
		$this->getElement(PHP_DBOARD_LINK,$testcases);
		
		$this->clickandLoad(PHP_DBOARD_LINK);
		
		$this->getElement(PHP_DBOARD_LINK1,$testcases);
		
		$this->clickandLoad(PHP_DBOARD_LINK1);
		
		$this->getElement(PHP_DBOARD_CNAME,$testcases);
		
		$this->select(PHP_DBOARD_CNAME,PHP_DBOARD_TOPIC,$testcases);
		
		$this->getElement(PHP_DBOARD_TTITLE,$testcases);
		
		$this->type(PHP_DBOARD_TTITLE,$DbAddTopic);
		
		$this->getElement(PHP_DBOARD_TTEXT,$testcases);
		
		$this->type(PHP_DBOARD_TTEXT,$DbTopicInfo);
		
		$this->getElement(PHP_DBOARD_SBUTT,$testcases);
		
		$this->submit(PHP_DBOARD_SBUTT,$testcases);
		
		try{
		
			$this->assertFalse($this->isTextPresent(PHP_DBOARD_MSG));
		}
		
		catch (PHPUnit_Framework_AssertionFailedError $e) {
		
	        $this->doCreateScreenShot(__FUNCTION__);
			
		}	
		
		$this->getElement(PHP_DBOARD_LOGOFF,$testcases);
		
		$this->clickandLoad(PHP_DBOARD_LOGOFF);
			
		$this->getElement(PHP_LOGIN_LINK,$testcases);
    }
}  
?>