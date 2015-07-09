<?php
	session_start();
    if ($_SERVER['SERVER_NAME']=="www.khonkaenhospital.org" || $_SERVER['SERVER_NAME']=="web.khonkaenhospital.org" || $_SERVER['SERVER_NAME']=="www.kkh.go.th") {
		$URL =	'/main.php';
		header("location: $URL");
		exit ;
	}
	
	$cIP = (getenv('HTTP_X_FORWARDED_FOR')=="")? getenv('REMOTE_ADDR'):getenv('HTTP_X_FORWARDED_FOR') ;
    //if (($_SERVER['SERVER_NAME']=="in.kkh.go.th"  || $_SERVER['SERVER_NAME']=="kkh-vpn.dyndns.org"  || $_SERVER['SERVER_NAME']=="intranet.khonkaenhospital.org" ) && (substr($cIP,0,3)=="10." || substr($cIP,0,7)=="192.168" || substr($cIP,0,10)=="203.157.88" )) {
 if (($_SERVER['SERVER_NAME']=="in.kkh.go.th"  || $_SERVER['SERVER_NAME']=="kkh-vpn.dyndns.org"  || $_SERVER['SERVER_NAME']=="intranet.khonkaenhospital.org" ) && (substr($cIP,0,3)=="10." || substr($cIP,0,10)=="203.157.88" )) {
		$URL =	'http://192.168.0.222'.$_SERVER['REQUEST_URI'] ;
		header("location: $URL");
		exit ;
	}
	
	$_SESSION["website_sessiontype"] = "INTRANET" ;
	$_SESSION["currentpage"] = $_SERVER['REQUEST_URI'] ;
	include_once ($_SERVER['DOCUMENT_ROOT']."/config/config.inc.php");
	include_once($_SERVER['DOCUMENT_ROOT']."/config/subroutine.inc.php");
	ConnectDB("intranet");
	
	$_SESSION["intranet_source"] = (substr(getenv('REMOTE_ADDR'),0,7)=="192.168")? "INTRANET":"INTERNET" ;
	$cPrg = $_REQUEST["prg"] ;
	
	if ($_SESSION["intranet_sessionid"] == "") {
		$Sql = "UPDATE counter SET no = no + 1,ip='".getIP()."' WHERE code='MAIN'";
		$result = mysql_query("$Sql");
		
		session_register("intranet_sessionid");
		$_SESSION["intranet_sessionid"] = date(YmdHis).rand(10,99);
		
		session_register("intranet_sessiondate");
		$_SESSION["intranet_sessiondate"] = date("Y-m-d")  ;
		
		session_register("intranet_sessiontime");
		$_SESSION["intranet_sessiontime"] = date("H:i:s")  ;
		
		$_SESSION["internalclient"] = (substr(getenv('REMOTE_ADDR'),0,7)=="192.168" || substr(getenv('REMOTE_ADDR'),0,3)=="10.")? TRUE:FALSE ;
		
		// ????Ѻ????ʴ?˹???á  *******************************************************************
		
				
/*	if (date("Y-m-d") < "2013-06-06"){
			echo "<center><table width='100%'>\n";
			echo "<tr align='center' valign='center'>\n";
			echo "	<td height='600' >
					<a href=''><img src='images/index.jpg'  border='0'>
					
					</a> </td>\n";
			echo "</tr>\n";
			echo "</table></center>\n";
			
			exit;
		}
*/

    		header('Location: /alert0.php');
			exit;
		if (date("Y-m-d") <= "2014-12-08"){
    		header('Location: popup/index.php');
			exit;
		}
		// ****************************************************************************************
		
	}
	
	include($_SERVER['DOCUMENT_ROOT']."/menu/menu.php");
    if ($_SESSION["intranet_userid"]=="" && !(substr($cIP,0,3)=="10." || substr($cIP,0,7)=="192.168" || substr($cIP,0,10)=="172.16.37.")) {
    	header("location: /login0.php");
    	exit ;
    }
	//	$cTopicbgcolor = "#9DB7C4";
//	$cTopicbgcolor = "#BDD7E4";
	$cTopicbgcolor = "#FFFFDD";
	$bgColorOther1 = "#8FBC8F" ;
	$bgColorOther2 = "#EBDAC2";
	$ScreenWidth = '99%' ;
	$today = date("Y-m-d") ;
	if (!isset($dDate) || $dDate=="")
		$dDate = $today ;
	$yesterday = get_yesterday() ;
	$tomorrow = get_tomorrow() ;
	
	include("menu/indexpageheader.php");
	echo "<center><table width='".$ScreenWidth."' border='0' cellpadding='0' cellspacing='0' bgcolor='WHITE'>\n";
	echo "<tr align='LEFT'><td>\n";
	PageTitle() ;
	echo "</td></tr>\n";
	
// Top Menu *********************************************************************************************
	echo "<tr align='LEFT'><td>\n";
	ShowTopMenu();
	echo "	</td></tr>\n";
    
    if ($_SESSION["intranet_userid"]=="" && !(substr($cIP,0,3)=="10." || substr($cIP,0,7)=="192.168" || substr($cIP,0,10)=="172.16.37.")) {
		$_SESSION["txterror"] = "Access denied. login first.";
    	echo "<tr align='center'><td bgcolor='red'>\n";
        echo "<BR><Br><font color='yellow' size='5'>Access denied. login first<BR><BR></font></center>";
    	echo "	</td></tr>\n";
//		include ($_SERVER['DOCUMENT_ROOT']."/config/error.php");
    	include('menu/footer.php') ;
		exit ;
    }
    	
	echo "<tr align='LEFT'><td>&nbsp;\n";
	echo "	</td></tr>\n";
	
// Menu+Body *********************************
	echo "<tr  valign='top' align='LEFT'><td>\n";
	echo "<div  id='body'>\n";
	
//  ???????****************************************************************************************************
	echo "<table>";
	echo "<tr valign='top' align='LEFT'><td>";
	echo "<div width='100' id='left'>\n";
	ShowLeftMenu() ;			//     ??????????????  ??????????? file config  MENU ??? Intranet
	//ShowLink() ;					//     ??????????????  ??????????? file link
	ShowLinkNew();
	ShowLinkIcon();
	printf ("	<center><font size='1' color='gray'>visited : %04d<br>since 12 ??.50<BR>%s</font></center>\n",GetCounter("MAIN"),$cPrg);
//	echo "</td>\n";
	echo "</div>\n";
	
// BODY ****************************************************************************************************
	echo "</td><td>";  //**************************************************  column ???
	echo "<div style='float:left; width:720px;'>\n";
	echo "<table width='100%' border='0' cellpadding='0' cellspacing='0' bgcolor='#FFFFFF'>\n";
	
//	???????????????????????
		//echo "<tr align='left'><td bgcolor='#EFEFFF'>\n";
		echo "	<a href= 'http://urday.kkh.go.th' ><img src='/images/banner/urbanner.jpg'  width='100%'></a>\n";
		//echo "	<a href= 'http://192.168.0.222/index.php?page=annouce&r=2605' ><img src='/images/banner/banner_181157.jpg' border='1' width='100%'></a>\n";
			//echo "	<br/><a href= 'http://192.168.0.222/index.php?page=annouce&r=2605' ><img src='/images/banner/banner-re-accredit.jpg' border='1' width='100%'></a>\n";
	//	echo "</td></tr>\n";
	
	echo "	<tr align='LEFT'><td>\n";
//	echo '<div style="margin-left: 90px;"><iframe src="http://192.168.0.222/app_backoffice/reportopd/test.php"    width="600" height="120" style="border:0; margin:0 auto; width:600px;"></iframe></div>';
	Annouce($cTopicbgcolor,$bgColorOther1,$today,$_REQUEST["r"]);
	echo "		</td></tr>\n";
	
	echo "	<tr align='LEFT'><td>\n";
	Recruit($cTopicbgcolor,$bgColorOther1,$today,$_REQUEST["r"]);
	echo "		</td></tr>\n";
	
//-- ??????
	printf("<tr align='LEFT'>\n");
	printf("	<td colspan='4' valign='TOP'>\n");
	echo "		<table width='100%' border='0' cellpadding='0' cellspacing='0' bgcolor='#FFFFEE'>\n";
	
	Calendar($bgColorOther1) ;
//-- ???????????????????
	ShowPromote($bgColorOther1,$today) ;
// ?????
	Seminar($bgColorOther1,$today) ;
// IT News
	IT_News($bgColorOther1,$today) ;
//-- Download ??????
	Downloads_List($bgColorOther1,$today) ;
	
	echo "</td></tr></table>";  //**************************************************  column ???
	
    /*echo "	<tr align='center'>\n";
	echo "		<td colspan='4' valign='TOP' align='left'>\n";
	ShowGraphNoPt(FALSE,$today) ;
	mysql_close();
	echo "		</td>\n";
	echo "	</tr>\n";*/
    
	printf("</Table></td></tr>\n");
	echo "<tr align='LEFT'>\n";
	echo "	<td colspan='4'>&nbsp;</td>\n";
	echo "</tr>\n";
	
	echo "</table>\n";				// Body
	echo "</div>\n";
	
	echo "</div>\n";
	include('menu/footer.php') ;
	echo "</TD></tr></table>\n";				// All
	mysql_close();
	
	echo "</body>\n";
	echo "</html>\n";
?>
