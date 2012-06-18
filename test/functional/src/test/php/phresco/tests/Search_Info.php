<?php 
/*	Author by {phresco} QA Automation Team	*/

require_once 'PhpCommonFun.php';

class Search_Info extends PhpCommonFun
{
    protected function setUp(){ 
    	parent::setUp();
    }   
    public function testSearch(){ 
	
		$testcases = __FUNCTION__;
    	parent::Browser();
    	parent::DoLogin($testcases);
		
		$doc = new DOMDocument();
		
		$doc->load('test-classes/phresco/tests/phpsetting.xml');
		
		$users = $doc->getElementsByTagName("searchmodule");
		
		foreach( $users as $searchmodule ){
		
			$Searchtopics = $searchmodule->getElementsByTagName("Searchtopic");
			$Searchtopic = $Searchtopics->item(0)->nodeValue;
		}
		
		$this->getElement(PHP_SEARCH_LINK,$testcases);
		
		$this->type(PHP_SEARCH_LINK,$Searchtopic);
		
		$this->getElement(PHP_SEARCH_LINK,$testcases);
		
		$this->select(PHP_SEARCHIN_AREAS,PHP_SEARCH_AREA,$testcases);
		
		$this->getElement(PHP_SEARCH_BUTT,$testcases);
		
		$this->submit(PHP_SEARCH_BUTT,$testcases);
		
		try{
		
			$this->assertTrue($this->isTextPresent(PHP_SEARCH_ICON));
		}
		
		catch (PHPUnit_Framework_AssertionFailedError $e) {
		
	        $this->doCreateScreenShot(__FUNCTION__);
					
		}
		
		parent::DoLogout($testcases);
		
		$this->getElement(PHP_LOGIN_LINK,$testcases);
		
    }
	
	public function tearDown(){
	
		parent::tearDown();
		
	}
	
}  
?>









