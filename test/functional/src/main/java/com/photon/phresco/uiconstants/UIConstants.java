package com.photon.phresco.uiconstants;

import java.lang.reflect.Field;

public class UIConstants {
	
	private ReadXMLFile readXml;
	
	public String REGISTER="register";
	public String USERNAMET="usernamet";
	public String EMAILTEXT="emailt";
	public String PASSWORDT="passwordt";
	public String RBUTTON="rbutton";
	public String LOGLINK="loglink";
    public String AMAILTEXT="amailt";
	public String APASSWORDT="apassword";
	public String ABUTTON="abutton";
	public String LBUTTON="logout";
	public String SEARCHBOX="searchbox";
	public String SEARCHB="searchb";
	public String DASHBOARD="dashboard";
	public String MYACCOUNT="myaccount";
	public String UFIELD="ufield";
	public String EFIELD="efield";
	public String PFIELD="pfield";
	public String UBUTTON="ubutton";
	public String CATLINK1="catlink1";
	public String CATFIELD="catfield";
	public String DESCRIPTIONFIELD="descfield";
	public String CATBUTTON="catbutton"; 
	
   
    public String HOME="home";
    public String EDIT1="edit1";
    public String CATDESCRIPTIONEDIT="catdescriptionedit";
    public String SUBMITBUTTON="submitbutton";
    public String LINKDELETE="linkdelete";
    public String HOMELAST="homelast";
    
    
    public String DASHBORAD2 = "dashboard2";
    public String CLICKADD="clickadd";
    public String TOPICTITLE="topictitle";
    public String TOPICTEXT="topictext";
    public String ONCECLICK="onceclick";
    public String EDIT2="edit2";
    public String TOPICTITLE1="topictitle1";
    public String TOPICTEXT1="topictext1";
    public String CLIKLAST="cliklast";
    public String DELETE="delete";
    public String LOGOFF="logoff";
	
  
	public UIConstants() {
		try {
			readXml = new ReadXMLFile();
			readXml.loadUIConstants();
			Field[] arrayOfField1 = super.getClass().getFields();
			Field[] arrayOfField2 = arrayOfField1;
			int i = arrayOfField2.length;
			for (int j = 0; j < i; ++j) {
				Field localField = arrayOfField2[j];
				Object localObject = localField.get(this);
				if (localObject instanceof String)
					localField
							.set(this, readXml.getValue((String) localObject));

			}
		} catch (Exception localException) {
			throw new RuntimeException("Loading "
					+ super.getClass().getSimpleName() + " failed",
					localException);
		}
	}
}
