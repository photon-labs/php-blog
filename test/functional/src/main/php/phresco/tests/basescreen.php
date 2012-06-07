<?php 
/*	Author by {phresco} QA Automation Team	*/

  define ('WAIT_FOR_NEXT_LINE',"3");
  define ('WAIT_FOR_NEXT_LINE7',"7");
  define ('WAIT_FOR_NEXT_PAGES', "20000");
  define ('WAIT_FOR_SEC',"3");
    
  //LoginDetails 
  define ('PHP_LOGIN_LINK',"link=login");
  define ('PHP_LOGIN_UNAME_TBOX',"id=adminEmail");
  define ('PHP_LOGIN_PASS_TBOX', "id=adminPassword");
  define ('PHP_LOGIN_SUBMIT',"name=Submit");
  define ('PHP_LOGIN_MSG',"Welcome");
  
  //LogoutDetails
  define ('PHP_LOGOUT_LINK',"link=Logout");
  define ('PHP_TXT_LOGOUT',"Logout");
  define ('PHP_LOGOUT_CONFIRM',"Login");
  
  
  //RegisterDetails  
  define ('PHP_REG_LINK',"link=Register");
  define ('PHP_REG_UNAME_TBOX',"id=userName");
  define ('PHP_REG_EMAIL_TBOX', "id=userEmail");
  define ('PHP_REG_PASS_TBOX', "id=userPassword");
  define ('PHP_REG_SUBMIT',"//div[7]/input");
  define ('PHP_REG_CONFIRM',"System Message:");
  define ('PHP_REG_MSG',"Your registration was successful, Now you can login ");
  
  //UpdateAccount
  define ('PHP_UPDATE_LINK',"link=Dashboard");
  define ('PHP_UPDATE_LINK1',"link=Myaccount");
  define ('PHP_UPDATE_UNAME',"id=userName");
  define ('PHP_UPDATE_EMAIL',"id=userEmail");
  define ('PHP_UPDATE_PASS',"id=userPassword");
  define ('PHP_UPDATE_STATUS',"name=userStatus");
  define ('PHP_UPDATE_LINK2',"name=Submit");
  define ('PHP_UPDATE_MSG',"Account has been updated successfully");
  define ('PHP_UPDATE_LOGOFF',"link=Logoff");
  
  //SearchBarDetails
  define ('PHP_SEARCH_LINK',"id=searchTerm");
  define ('PHP_SEARCH_TOPIC',"id=searchIn");
  define ('PHP_SEARCHIN_AREAS',"id=searchIn");
  define ('PHP_SEARCH_AREA',"label=Both");
  define ('PHP_SEARCH_BUTT', "name=Submit");
  define ('PHP_SEARCH_ICON', "Topics");
  
  //DashBoard
  define ('PHP_DBOARD_LINK',"link=Dashboard");
  define ('PHP_DBOARD_LINK1',"link=Add");
  define ('PHP_DBOARD_CNAME',"id=catID");
  define ('PHP_DBOARD_TOPIC',"label=Cell phone");
  define ('PHP_DBOARD_TTITLE',"id=topicTitle");
  define ('PHP_DBOARD_TTEXT',"id=topicText");
  define ('PHP_DBOARD_SBUTT', "name=Submit");
  define ('PHP_DBOARD_LOGOFF', "link=Logoff");
  define ('PHP_DBOARD_MSG', "Topic updated");
  
  //DashboardCategory
  define ('PHP_DBCAT_LINK',"link=Dashboard");
  define ('PHP_DBCAT_LINK1',"link=Categories");
  define ('PHP_DBCAT_LINK2',"link=Add");
  define ('PHP_DBCAT_CATNAME',"id=catTitle");
  define ('PHP_DBCAT_CATDEC',"id=catDesc");
  define ('PHP_DBCAT_LINK3',"name=Submit");
  define ('PHP_DBCAT_MSG',"Category has been added successfully");
  
   //DashBoard EditTopic
  define ('PHP_DBEDIT_LINK',"link=Dashboard");
  define ('PHP_DBEDIT_EDIT',"link=Edit");
  define ('PHP_DBEDIT_CNAME',"id=catID");
  define ('PHP_DBEDIT_TOPIC',"label=Cell phone");
  define ('PHP_DBEDIT_TTITLE',"id=topicTitle");
  define ('PHP_DBEDIT_TTEXT',"id=topicText");
  define ('PHP_DBEDIT_SBUTT',"name=Submit");
  define ('PHP_DBEDIT_MSG',"Topic has been updated successfully");
  define ('PHP_DBEDIT_LOGOFF', "link=Logoff");
   
   //DashboardCategory EditTopic
  define ('PHP_DBCATEDIT_LINK',"link=Dashboard");
  define ('PHP_DBCATEDIT_LINK1',"link=Categories");
  define ('PHP_DBCATEDIT_LINK2',"link=Edit");
  define ('PHP_DBCATEDIT_CATNAME',"id=catTitle");
  define ('PHP_DBCATEDIT_CATDEC',"id=catDesc");
  define ('PHP_DBCATEDIT_LINK3',"name=Submit");
  define ('PHP_DBCATEDIT_MSG',"Category has been updated successfully");
  define ('PHP_DBCATEDIT_LOGOFF', "link=Logoff");
  
  //DashboardDeleteTopic
  define ('PHP_DBDELETE_LINK',"link=Dashboard");
  define ('PHP_DBDELETE_DEL',"link=Delete");
  define ('PHP_DBDELETE_OK',"Are you sure you want to delete topic:");
  define ('PHP_DBDELETE_MSG',"Topic has been removed successfully ");
  define ('PHP_DBDELETE_LOGOFF', "link=Logoff");
  
  //DashboardDeleteCategory
  define ('PHP_DBCATDELETE_LINK',"link=Dashboard");
  define ('PHP_DBCATELETE_LINK1',"link=Categories");
  define ('PHP_DBCATELETE_LINK2',"link=Delete");
  define ('PHP_DBCATELETE_MSG',"Category has been removed successfully");
  define ('PHP_DBCATELETE_LOGOFF', "link=Logoff");
  ?>