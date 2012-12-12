package com.photon.phresco.uiconstants;

import java.lang.reflect.Field;

public class PhpData {

	private ReadXMLFile readXml;
	
	
	public String SEARCHBOXVALUE="searchvalue";
	 public String TEXTACCUPDATE="textaccupdate";
	 public String CATEGORYNAME="categoryname";
	 public String CATEGORYDESCRIPTION="categorydescription";
	 public String CATDESCRIPTIONADD="catdescriptionadd";
	 public String TEXTCATEGORYADD="textcategoryadd";
	 public String TEXTCATEGORYUPDATE="textcategoryupdate";
	 public String TEXTCATEGORYREMOVE="textcategoryremove";	
	 public String TOPICTITLE="topictitle";
	 public String TOPICTEXT="topictext";
	 public String TOPICTITLE1="topictitle1";
	 public String TOPICTEXT1="topictext1";
	 public String TEXTTOPICADD="texttopicadd";
	 public String TEXTTOPICUPDATE="texttopicupdate";
	 public String TEXTTOPICREMOVE="texttopicremove";
	 
	
	public PhpData() {
		try {
			readXml = new ReadXMLFile();
			readXml.loadPhpData();
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
