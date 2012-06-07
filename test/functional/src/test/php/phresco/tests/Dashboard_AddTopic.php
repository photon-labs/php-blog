<?php
/*	Author by {phresco} QA Automation Team	*/

require_once 'PhpCommonFun.php';
require_once 'PHPUnit/Extensions/SeleniumTestCase.php';
class Dashboard_AddTopic extends PhpCommonFun
{
    protected function setUp(){ 
    	parent::setUp();
    }   
    
    public function testDash(){ 
    	parent::Browser();
    	parent::DoLogin(__FUNCTION__);
		
		$DbAddTopic;$DbTopicInfo;
		$property = new PhpCommonFun;
		$doc = new DOMDocument();
		$doc->load('src/test/php/phresco/tests/phpsetting.xml');
		$users = $doc->getElementsByTagName("searchmodule");
		foreach( $users as $searchmodule )
		{
			
			$DbAddTopics = $searchmodule->getElementsByTagName("db-addtopic");
			$DbAddTopic = $DbAddTopics->item(0)->nodeValue;
			$DbTopicInfos = $searchmodule->getElementsByTagName("db-topicinfo");
			$DbTopicInfo = $DbTopicInfos->item(0)->nodeValue;
		}
		
		try {
			if ($this->isTextPresent(PHP_DBOARD_LINK))
		    $property->waitForElementPresent('PHP_DBOARD_LINK');
	        $this->clickAndWait(PHP_DBOARD_LINK);
	        $property->waitForElementPresent('PHP_DBOARD_LINK1');
	    }   
		catch (Exception $e) {}
            $this->click(PHP_DBOARD_LINK1);
            $property->waitForElementPresent('PHP_DBOARD_TOPIC');
            $this->select(PHP_DBOARD_CNAME,PHP_DBOARD_TOPIC);
            $property->waitForElementPresent('PHP_DBOARD_TTITLE');
            $this->type(PHP_DBOARD_TTITLE,$DbAddTopic);
            $property->waitForElementPresent('PHP_DBOARD_TTEXT');
            $this->type(PHP_DBOARD_TTEXT,$DbTopicInfo);
            $property->waitForElementPresent('PHP_DBOARD_SBUTT');
            $this->clickAndWait(PHP_DBOARD_SBUTT);
            $property->waitForElementPresent('PHP_DBOARD_MSG');
            
		try {
		    $this->assertFalse($this->isElementPresent(PHP_DBOARD_MSG));
        }     
        catch (PHPUnit_Framework_AssertionFailedError $e) {
		    parent::doCreateScreenShot(__FUNCTION__);
			$this->isElementPresent(PHP_DBOARD_LOGOFF);
            $this->clickAndWait(PHP_DBOARD_LOGOFF);
    	    sleep(WAIT_FOR_NEXT_LINE);
        }
    }
}  
?>