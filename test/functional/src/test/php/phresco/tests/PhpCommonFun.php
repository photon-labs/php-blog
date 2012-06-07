<?php
/*	Author by {phresco} QA Automation Team	*/

require_once 'PHPUnit/Framework.php';
include 'phresco/tests/basescreen.php';
require_once 'PHPUnit/Extensions/SeleniumTestCase.php';

class PhpCommonFun extends PHPUnit_Extensions_SeleniumTestCase
{
	private $properties;
	private $host;
	private $port;
	private $context;
	private $protocol;
	private $serverUrl;
	private $screenShotsPath;
	private $browser;
	
    protected function setUp()
	{ 
    	$doc = new DOMDocument();
		$doc->load('src/test/php/phresco/tests/phresco-env-config.xml');
		$environment = $doc->getElementsByTagName("Server");
		foreach( $environment as $Server )
		{
			$protocols= $Server->getElementsByTagName("protocol");
			$protocol = $protocols->item(0)->nodeValue;
			
			$hosts = $Server->getElementsByTagName("host");
			$host = $hosts->item(0)->nodeValue;
			
			$ports = $Server->getElementsByTagName("port");
			$port = $ports->item(0)->nodeValue;
			
			$contexts = $Server->getElementsByTagName("context");
			$context = $contexts->item(0)->nodeValue;
		}
		    $config = $doc->getElementsByTagName("Browser");
			$browser = $config->item(0)->nodeValue;
		
		$this->setBrowser('*' . $browser);
        $serverUrl = $protocol . ':'.'//' . $host . ':' . $port . '/'. $context . '/';
		$screenShotsPath = getcwd()."/"."target\surefire-reports\screenshots";
		if (!file_exists($screenShotsPath)) {
			mkdir($screenShotsPath);
		}
		echo $serverUrl;
        $this->setBrowserUrl($serverUrl);
    }
    public function Browser()
	{  
    	$doc = new DOMDocument();
		$doc->load('src/test/php/phresco/tests/phresco-env-config.xml');
		$environment = $doc->getElementsByTagName("Server");
		foreach( $environment as $Server )
		{
			$protocols= $Server->getElementsByTagName("protocol");
			$protocol = $protocols->item(0)->nodeValue;
			
			$hosts = $Server->getElementsByTagName("host");
			$host = $hosts->item(0)->nodeValue;
			
			$ports = $Server->getElementsByTagName("port");
			$port = $ports->item(0)->nodeValue;
			
			$contexts = $Server->getElementsByTagName("context");
			$context = $contexts->item(0)->nodeValue;
		}
        $serverUrl = $protocol .':'. '//' . $host . ':' . $port . '/'. $context . '/';
        $this->open($serverUrl);
		$this->waitForPageToLoad(WAIT_FOR_NEXT_PAGES);
		$this->windowMaximize();
		$this->windowFocus();
		sleep(WAIT_FOR_NEXT_LINE);
    }
    function DoLogin($testCaseName){
	
		if ($testCaseName == null) {
			$testCaseName = __FUNCTION__;
		}
	    $name;
		$password;$email;
		$property = new PhpCommonFun;
		$doc = new DOMDocument();
		$doc->load('src/test/php/phresco/tests/phpsetting.xml');
		$users = $doc->getElementsByTagName("user");
		foreach( $users as $user )
		{
			$passwords = $user->getElementsByTagName("password");
			$password = $passwords->item(0)->nodeValue;
			$emails = $user->getElementsByTagName("email");
			$email = $emails->item(0)->nodeValue;
		}
		
     	if  (!$this->isTextPresent(PHP_TXT_LOGOUT)) {
			sleep(WAIT_FOR_NEXT_LINE);
	    try {
	        $this->assertTrue($this->isElementPresent(PHP_LOGIN_LINK));
		}	
	    catch (PHPUnit_Framework_AssertionFailedError $e) {
            array_push($this->verificationErrors, $e->toString());
        }      
 	        $this->clickAndWait(PHP_LOGIN_LINK);
		    sleep(WAIT_FOR_NEXT_LINE);
	        $this->type(PHP_LOGIN_UNAME_TBOX,$email);
	        sleep(WAIT_FOR_NEXT_LINE);
	        $this->type(PHP_LOGIN_PASS_TBOX,$password);
            sleep(WAIT_FOR_NEXT_LINE);
            
        try {
	        if ($this->isTextPresent(PHP_LOGIN_SUBMIT))
		    sleep(WAIT_FOR_NEXT_LINE);
	        $this->clickAndWait(PHP_LOGIN_SUBMIT);
	        sleep(WAIT_FOR_NEXT_LINE);
	    }   
	    catch (Exception $e) {}
	    try {
		    $this->assertTrue($this->isTextPresent(PHP_LOGIN_MSG));
        }   
	    catch (PHPUnit_Framework_AssertionFailedError $e) {
	        $this->doCreateScreenShot($testCaseName);
   		}      	      
   		}
			
   	} 		
    function DoLogout($testCaseName){ 
	
		if ($testCaseName == null) {
			$testCaseName = __FUNCTION__;
		}
 	    if ($this->isTextPresent(PHP_TXT_LOGOUT)) {
 	  	    sleep(WAIT_FOR_NEXT_LINE);
 	        $this->clickAndWait(PHP_LOGOUT_LINK);
 	        $this->waitForPageToLoad(WAIT_FOR_NEXT_PAGES);
 	    try {
	        $this->assertTrue($this->isElementPresent(PHP_LOGIN_LINK));
        }   
        catch (PHPUnit_Framework_AssertionFailedError $e) {
	        $this->doCreateScreenShot($testCaseName);
		}
		}
    }
 
    function doCreateScreenShot($file_name){ 
			$this->captureEntirePageScreenshot(getcwd()."/"."target\surefire-reports\screenshots"."/".$file_name.'.png');
			$this->fail( "Failed asserting that &lt;boolean:false&gt; required is true." );
	}  
	function tearDown(){ 
	$this->stop();
	}
	
	public function waitForElementPresent($waitfor)
	{

		for ($second = 0;$second <=WAIT_FOR_SEC ;$second++) {
		if ($second >= WAIT_FOR_SEC){
			}
		try{
		if ($this->isElementPresent($waitfor))
		break;
		} catch (Exception $e) {}
		sleep(1);
		}
	}
}
?>