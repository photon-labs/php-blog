package com.photon.phresco.Screens;

import java.io.IOException;

import com.photon.phresco.uiconstants.PhpData;
import com.photon.phresco.uiconstants.UIConstants;
import com.photon.phresco.uiconstants.UserInfoConstants;

public class PhotonAbstractScreen extends BaseScreen {

	// public PhrescoUiConstantsXml phrescoXml;

	protected PhotonAbstractScreen() {

	}

	protected PhotonAbstractScreen(String selectedBrowser,String selectedPlatform, String applicationURL, String context, PhpData phpConstants, UIConstants uiConstants ,UserInfoConstants uif) throws IOException,
			Exception {
		super(selectedBrowser,selectedPlatform, applicationURL, context, phpConstants, uiConstants, uif, phpConstants);
	}

}

