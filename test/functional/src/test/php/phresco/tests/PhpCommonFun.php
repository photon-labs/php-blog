<?php /*
 * ###
 * PHR_PhpBlog
 * %%
 * Copyright (C) 1999 - 2012 Photon Infotech Inc.
 * %%
 * Licensed under the Apache License, Version 2.0 (the "License");
 * you may not use this file except in compliance with the License.
 * You may obtain a copy of the License at
 * 
 *      http://www.apache.org/licenses/LICENSE-2.0
 * 
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS,
 * WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 * See the License for the specific language governing permissions and
 * limitations under the License.
 * ###
 */ ?>
<?php
/*	Author by {phresco} QA Automation Team	*/

require_once 'PHPUnit/Autoload.php';
include 'phresco/tests/basescreen.php';
require_once 'phresco/tests/phpwebdriver/RequiredFunction.php';

class PhpCommonFun extends RequiredFunction
{
	private $host;
	private $port;
	private $context;
	private $protocol;
	private $serverUrl;
	private $browser;
	private $screenShotsPath;
	
    protected function setUp(){ 
	
		$doc = new DOMDocument();
		
		$doc->load('test-classes/phresco/tests/phresco-env-config.xml');
		
		$configuration = $doc->getElementsByTagName("Server");
		
		$config = $doc->getElementsByTagName("Browser");
		$browser = $config->item(0)->nodeValue;
		
    	$this->webdriver = new WebDriver("localhost", 4444); 
		
       	$this->webdriver->connect($browser);
		
        $screenShotsPath = getcwd()."/surefire-reports/screenshots";
		
		if (!file_exists($screenShotsPath)) {
		
			mkdir($screenShotsPath);
		
		}
    
	}
    public function Browser(){  
	
		$doc = new DOMDocument();
		
		$doc->load('test-classes/phresco/tests/phresco-env-config.xml');
		
		$configuration = $doc->getElementsByTagName("Server");
		
		foreach( $configuration as $Server )
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
    	
        $serverUrl = $protocol . ':'.'//' . $host . ':' . $port . '/'. $context . '/';
		
		$this->webdriver->get($serverUrl);
		
    }
    function DoLogin($testcases){
	if($testcases == null){
		
			$testcases = __FUNCTION__;
		}
	
		$doc = new DOMDocument();
		
		$doc->load('test-classes/phresco/tests/phpsetting.xml');
		
		$users = $doc->getElementsByTagName("user");
		
		foreach( $users as $user ){
			
			$emails = $user->getElementsByTagName("email");
			$email = $emails->item(0)->nodeValue;
		
			$passwords = $user->getElementsByTagName("password");
			$password = $passwords->item(0)->nodeValue;
		}
		
		$this->getElement(PHP_LOGIN_LINK,$testcases);
	
		$this->clickandLoad(PHP_LOGIN_LINK);
		
		$this->getElement(PHP_LOGIN_UNAME_TBOX,$testcases);
		
		$this->type(PHP_LOGIN_UNAME_TBOX,$email);
		
		$this->getElement(PHP_LOGIN_PASS_TBOX,$testcases);
		
		$this->type(PHP_LOGIN_PASS_TBOX,$password);
		
		$this->getElement(PHP_LOGIN_SUBMIT,$testcases);
		
		$this->submit(PHP_LOGIN_SUBMIT,$testcases);
		
		try	{
		
			$this->assertTrue($this->isTextPresent(PHP_LOGIN_MSG));
		
		}
		
		catch (PHPUnit_Framework_AssertionFailedError $e) {
		 
	       $this->doCreateScreenShot($testcases);

		}		
		
					
   	} 		
    function DoLogout($testcases){ 
	
		if($testcases == null){
		
			$testcases = __FUNCTION__;
		}
	
		$this->getElement(PHP_LOGOUT_LINK,$testcases);
		
		$this->clickandLoad(PHP_LOGOUT_LINK);
		
		$this->getElement(PHP_LOGIN_LINK,$testcases);
		
		try {
		
			$this->assertTrue($this->isTextPresent(PHP_LOGIN_LINK));
		}   
		catch (PHPUnit_Framework_AssertionFailedError $e) {
		
			$this->doCreateScreenShot($testcases);
			
		}
		
    }
	
}
?>