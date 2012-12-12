
package com.photon.phresco.testcases;

import java.io.IOException;

import org.testng.annotations.AfterTest;
import org.testng.annotations.BeforeTest;
import org.testng.annotations.Parameters;
import org.testng.annotations.Test;

import com.photon.phresco.Screens.WelcomeScreen;
import com.photon.phresco.uiconstants.PhpData;
import com.photon.phresco.uiconstants.PhrescoUiConstants;
import com.photon.phresco.uiconstants.UIConstants;
import com.photon.phresco.uiconstants.UserInfoConstants;

public class WelcomePageTestCase {

	private  UIConstants uiConstants;
	private  PhrescoUiConstants phrescoUIConstants;
	private  WelcomeScreen welcomeScreen;
	private  String methodName;
	private  String selectedBrowser;
	private  PhpData phpConstants;
	private  UserInfoConstants uif;

	// private Log log = LogFactory.getLog(getClass());

	//@BeforeGroups(groups = { "fast" })
	//@Parameters({"browser"})
	@Parameters(value = { "browser", "platform" })
	@BeforeTest
	public  void setUp(String browser, String platform) throws Exception {
		try {
			
			System.out.println("*****************************************************************");
			phrescoUIConstants = new PhrescoUiConstants();
			uiConstants = new UIConstants();
			// assertNotNull(uiConstants);
			phpConstants = new PhpData();
			uif= new UserInfoConstants();
			String selectedBrowser = browser;
			String selectedPlatform = platform;
			
			methodName = Thread.currentThread().getStackTrace()[1]
					.getMethodName();
				/*Reporter.log("Selected Browser to execute testcases--->>"
					+ selectedBrowser);*/
			System.out
			.println("Selected Browser to execute testcases--->>"
					+ selectedBrowser);
			String applicationURL = phrescoUIConstants.PROTOCOL + "://"
					+ phrescoUIConstants.HOST + ":" + phrescoUIConstants.PORT
					+ "/";
			//selectedBrowser=browser;
			welcomeScreen = new WelcomeScreen(selectedBrowser,selectedPlatform, applicationURL,
					phrescoUIConstants.CONTEXT, phpConstants, uiConstants, uif);
			
		} catch (Exception exception) {
			exception.printStackTrace();
		}
	}

/*	public  void launchingBrowser() throws Exception {
		try {
			String applicationURL = phrescoUIConstants.PROTOCOL + "://"
					+ phrescoUIConstants.HOST + ":" + phrescoUIConstants.PORT
					+ "/";
			selectedBrowser = phrescoUIConstants.BROWSER;
			//selectedBrowser=browser;
			welcomeScreen = new WelcomeScreen(selectedBrowser,selectedPlatform, applicationURL,
					phrescoUIConstants.CONTEXT, phpConstants, uiConstants, uif);
		} catch (Exception exception) {
			exception.printStackTrace();

		}

	}*/
	//@Test(groups = { "fast" })
	@Test 
	public void testARegistration()
			throws InterruptedException, IOException, Exception {
		try {

			System.out.println("---------testToVerifyRegistration()-------------");
			methodName = Thread.currentThread().getStackTrace()[1]
					.getMethodName();

			welcomeScreen.RegisterChek(methodName,uiConstants);
			
		} catch (Exception t) {
			t.printStackTrace();

		}
	}
	

	//@Test(groups = { "fast" })
	@Test
	public void testBLogin()
			throws InterruptedException, IOException, Exception {
		try {


			System.out.println("---------testToVerifyTheLogin()-------------");
			methodName = Thread.currentThread().getStackTrace()[1]
					.getMethodName();

			welcomeScreen.LoginChek(methodName,uiConstants);
		} catch (Exception t) {
			t.printStackTrace();

		}
	}
	@Test
	public void testcSearch()
			throws InterruptedException, IOException, Exception {
		try {

			System.out
					.println("---------testTosearch()-------------");
			methodName = Thread.currentThread().getStackTrace()[1]
					.getMethodName();

			welcomeScreen.FindChek(methodName,uiConstants,phpConstants);
		} catch (Exception t) {
			t.printStackTrace();

		}
	}
	
	
	@Test
	public void testDUpdate()
			throws InterruptedException, IOException, Exception {
		try {

			System.out.println("---------testToUpdateCategory()-------------");
			methodName = Thread.currentThread().getStackTrace()[1]
					.getMethodName();

			welcomeScreen.UpdateAccount(methodName,uiConstants,phpConstants);
		} catch (Exception t) {
			t.printStackTrace();

		}
	}
	
	@Test
	public void testEToCreateCategory()
			throws InterruptedException, IOException, Exception {
		try {
			
			System.out.println("---------testToCreateCategory()-------------");
			methodName = Thread.currentThread().getStackTrace()[1]
					.getMethodName();
			welcomeScreen.CreateCategory(methodName,uiConstants,phpConstants);			
		    
			
		} catch (Exception t) {
			t.printStackTrace();

		}
	}
	@Test
	public void testFToUpdateCategory()
			throws InterruptedException, IOException, Exception {
		try {
			
			System.out.println("---------testToUpdateCategory()-------------");
			methodName = Thread.currentThread().getStackTrace()[1]
					.getMethodName();
					
		    welcomeScreen.updateCategory(methodName,uiConstants,phpConstants);
			
			
		} catch (Exception t) {
			t.printStackTrace();

		}
	}
	@Test
	public void testGToDeleteCategory()
			throws InterruptedException, IOException, Exception {
		try {

			System.out.println("---------testToDeleteCategory()-------------");
			methodName = Thread.currentThread().getStackTrace()[1]
					.getMethodName();
			
			welcomeScreen.deleteCategory(methodName,uiConstants,phpConstants);
			
		} catch (Exception t) {
			t.printStackTrace();

		}
	}
@Test
	public void testHToCreateTopic()
			throws InterruptedException, IOException, Exception {
		try {

			System.out.println("---------testToCreateTopic()-------------");
			methodName = Thread.currentThread().getStackTrace()[1]
					.getMethodName();
			welcomeScreen.CreateTopic(methodName,uiConstants,phpConstants);
		
			
			
		} catch (Exception t) {
			t.printStackTrace();

		}
	}

@Test
public void testIToEditTopic()
		throws InterruptedException, IOException, Exception {
	try {

		System.out.println("---------testToEditTopic()-------------");
		methodName = Thread.currentThread().getStackTrace()[1]
				.getMethodName();
   
		welcomeScreen.editTopic(methodName,uiConstants,phpConstants);
	
		
		
	} catch (Exception t) {
		t.printStackTrace();

	}
}

@Test
public void testJToDeleteTopic()
		throws InterruptedException, IOException, Exception {
	try {

		System.out.println("---------testToDeleteTopic()-------------");
		methodName = Thread.currentThread().getStackTrace()[1]
				.getMethodName();
    
		welcomeScreen.deleteTopic(methodName,uiConstants,phpConstants);
		
		
	} catch (Exception t) {
		t.printStackTrace();

	}
}

	
	
//@AfterGroups(groups = { "fast" })
@AfterTest
public  void tearDown() {
	System.out.println("============================================");
	welcomeScreen.closeBrowser();
}

}
