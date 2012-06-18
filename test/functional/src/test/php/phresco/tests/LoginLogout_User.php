<?php
/*	Author by {phresco} QA Automation Team	*/

require_once 'PhpCommonFun.php';
require_once 'PHPUnit/Extensions/SeleniumTestCase.php';

class LoginLogout_User extends PhpCommonFun
{
    protected function setUp(){ 
    	parent::setUp();
    }   
    public function testLoginLogout_User(){ 
	

    	parent::Browser();
    	parent::DoLogin(__FUNCTION__);
		parent::DoLogout(__FUNCTION__);
    	
    }	
}
?>