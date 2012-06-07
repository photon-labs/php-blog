<?php
/*	Author by {phresco} QA Automation Team	*/

require_once 'PhpCommonFun.php';
require_once 'PHPUnit/Extensions/SeleniumTestCase.php';
class Dashboard_EditTopic extends PhpCommonFun
{
    protected function setUp(){ 
    	parent::setUp();
    }   
    
    public function testEditTopic(){ 
    	parent::Browser();
    	parent::DoLogin(__FUNCTION__);
		
		$edittopicname;$edittopicinfo;
		$property = new PhpCommonFun;
		$doc = new DOMDocument();
		$doc->load('src/test/php/phresco/tests/phpsetting.xml');
		$users = $doc->getElementsByTagName("dbupdatemodule");
		foreach( $users as $dbupdatemodule)
		{
			
			$edittopicnames = $dbupdatemodule->getElementsByTagName("dbedittopicname");
			$edittopicname = $edittopicnames->item(0)->nodeValue;
			$edittopicinfos = $dbupdatemodule->getElementsByTagName("dbedittopicinfo");
			$edittopicinfo = $edittopicinfos->item(0)->nodeValue;
		}
		try {
			if ($this->isTextPresent(PHP_DBEDIT_LINK))
		    $property->waitForElementPresent('PHP_DBEDIT_LINK');
	        $this->clickAndWait(PHP_DBEDIT_LINK);
	        $property->waitForElementPresent('PHP_DBEDIT_EDIT');
	    }   
		catch (Exception $e) {}
            $this->clickAndWait(PHP_DBEDIT_EDIT);
            $property->waitForElementPresent('PHP_DBEDIT_CNAME');
            $this->select(PHP_DBEDIT_CNAME,PHP_DBEDIT_TOPIC);
            $property->waitForElementPresent('PHP_DBEDIT_TTITLE');
            $this->type(PHP_DBEDIT_TTITLE,$edittopicname);
            $property->waitForElementPresent('PHP_DBEDIT_TTEXT');
            $this->type(PHP_DBEDIT_TTEXT,$edittopicinfo);
            $property->waitForElementPresent('PHP_DBEDIT_SBUTT');
            $this->clickAndWait(PHP_DBEDIT_SBUTT);
            $property->waitForElementPresent('PHP_DBEDIT_MSG');;
            
		try {
		    $this->assertFalse($this->isElementPresent(PHP_DBEDIT_MSG));
        }     
        catch (PHPUnit_Framework_AssertionFailedError $e) {
		    parent::doCreateScreenShot(__FUNCTION__);
			$this->isElementPresent(PHP_DBEDIT_LOGOFF);
            $this->clickAndWait(PHP_DBEDIT_LOGOFF);
    	    sleep(WAIT_FOR_NEXT_LINE);
        }
    }
}  
?>