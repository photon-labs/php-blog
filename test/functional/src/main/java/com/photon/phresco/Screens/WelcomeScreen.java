package com.photon.phresco.Screens;

import java.io.IOException;

import com.photon.phresco.uiconstants.PhpData;
import com.photon.phresco.uiconstants.UIConstants;
import com.photon.phresco.uiconstants.UserInfoConstants;





public class WelcomeScreen extends PhotonAbstractScreen {
	public UIConstants phrsc;
    public WelcomeScreen(String selectedBrowser,String selectedPlatform, String applicationURL, String context, PhpData phpConstants, UIConstants uiConstants,UserInfoConstants uif ) throws InterruptedException,IOException, Exception {
    	super(selectedBrowser,selectedPlatform, applicationURL, context, phpConstants, uiConstants, uif);
    	
    
    }
	
    
}

