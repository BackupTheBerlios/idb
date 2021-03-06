<?php
/*
    This program is free software; you can redistribute it and/or modify
    it under the terms of the Revised BSD License.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    Revised BSD License for more details.

    Copyright 2004-2012 iDB Support - http://idb.berlios.de/
    Copyright 2004-2012 Game Maker 2k - http://gamemaker2k.org/

    $FileInfo: profilemain.php - Last Update: 12/30/2011 SVN 781 - Author: cooldude2k $
*/
$File3Name = basename($_SERVER['SCRIPT_NAME']);
if ($File3Name=="profilemain.php"||$File3Name=="/profilemain.php") {
	require('index.php');
	exit(); }

// Check if we can edit the profile
if($_SESSION['UserGroup']==$Settings['GuestGroup']||$GroupInfo['CanEditProfile']=="no") {
redirect("location",$rbasedir.url_maker($exfile['index'],$Settings['file_ext'],"act=view",$Settings['qstr'],$Settings['qsep'],$prexqstr['index'],$exqstr['index'],false));
ob_clean(); header("Content-Type: text/plain; charset=".$Settings['charset']); $urlstatus = 302;
gzip_page($Settings['use_gzip'],$GZipEncode['Type']); session_write_close(); die(); }
if(!isset($_POST['update'])) { $_POST['update'] = null; }
$_SESSION['ViewingPage'] = url_maker(null,"no+ext","act=view","&","=",$prexqstr['index'],$exqstr['index']);
if($Settings['file_ext']!="no+ext"&&$Settings['file_ext']!="no ext") {
$_SESSION['ViewingFile'] = $exfile['index'].$Settings['file_ext']; }
if($Settings['file_ext']=="no+ext"||$Settings['file_ext']=="no ext") {
$_SESSION['ViewingFile'] = $exfile['index']; }
$_SESSION['PreViewingTitle'] = "Viewing";
$_SESSION['ViewingTitle'] = "UserCP";
?>
<div class="NavLinks"><?php echo $ThemeSet['NavLinkIcon']; ?><a href="<?php echo url_maker($exfile['index'],$Settings['file_ext'],"act=view",$Settings['qstr'],$Settings['qsep'],$prexqstr['index'],$exqstr['index']); ?>"><?php echo $Settings['board_name']; ?></a><?php echo $ThemeSet['NavLinkDivider']; ?><a href="<?php echo url_maker($exfile['profile'],$Settings['file_ext'],"act=".$_GET['act'],$Settings['qstr'],$Settings['qsep'],$prexqstr['profile'],$exqstr['profile']); ?>">Profile Editor</a></div>
<div class="DivNavLinks">&nbsp;</div>
<table class="Table3">
<tr style="width: 100%; vertical-align: top;">
	<td style="width: 15%; vertical-align: top;">
	<div class="TableSMenuBorder">
<?php if($ThemeSet['TableStyle']=="div") { ?>
<div class="TableSMenuRow1">
<?php echo $ThemeSet['TitleIcon']; ?>Profile Settings</div>
<?php } ?>
<table id="ProfileLinks" class="TableSMenu" style="width: 100%; text-align: left; vertical-align: top;">
<?php if($ThemeSet['TableStyle']=="table") { ?>
<tr class="TableSMenuRow1">
<td class="TableSMenuColumn1"><?php echo $ThemeSet['TitleIcon']; ?>Profile Settings</td>
</tr><?php } ?>
<tr class="TableSMenuRow2">
<td class="TableSMenuColumn2">&nbsp;</td>
</tr><tr class="TableSMenuRow3">
<td class="TableSMenuColumn3"><a href="<?php echo url_maker($exfile['profile'],$Settings['file_ext'],"act=view",$Settings['qstr'],$Settings['qsep'],$prexqstr['profile'],$exqstr['profile']); ?>">Edit NotePad</a></td>
</tr><tr class="TableSMenuRow3">
<td class="TableSMenuColumn3"><a href="<?php echo url_maker($exfile['profile'],$Settings['file_ext'],"act=profile",$Settings['qstr'],$Settings['qsep'],$prexqstr['profile'],$exqstr['profile']); ?>">Edit Profile</a></td>
</tr><tr class="TableSMenuRow3">
<td class="TableSMenuColumn3"><a href="<?php echo url_maker($exfile['profile'],$Settings['file_ext'],"act=signature",$Settings['qstr'],$Settings['qsep'],$prexqstr['profile'],$exqstr['profile']); ?>">Edit Signature</a></td>
</tr><tr class="TableSMenuRow3">
<td class="TableSMenuColumn3"><a href="<?php echo url_maker($exfile['profile'],$Settings['file_ext'],"act=avatar",$Settings['qstr'],$Settings['qsep'],$prexqstr['profile'],$exqstr['profile']); ?>">Edit Avatar</a></td>
</tr><tr class="TableSMenuRow4">
<td class="TableSMenuColumn4">&nbsp;</td>
</tr></table></div>
<div class="DivSMenu">&nbsp;</div>
<div class="TableSMenuBorder">
<?php if($ThemeSet['TableStyle']=="div") { ?>
<div class="TableSMenuRow1">
<?php echo $ThemeSet['TitleIcon']; ?>Board Settings</div>
<?php } ?>
<table class="TableSMenu" style="width: 100%; text-align: left; vertical-align: top;">
<?php if($ThemeSet['TableStyle']=="table") { ?>
<tr class="TableSMenuRow1">
<td class="TableSMenuColumn1"><?php echo $ThemeSet['TitleIcon']; ?>Board Settings</td>
</tr><?php } ?>
<tr class="TableSMenuRow2">
<td class="TableSMenuColumn2">&nbsp;</td>
</tr><tr class="TableSMenuRow3">
<td class="TableSMenuColumn3"><a href="<?php echo url_maker($exfile['profile'],$Settings['file_ext'],"act=settings",$Settings['qstr'],$Settings['qsep'],$prexqstr['profile'],$exqstr['profile']); ?>">Board Settings</a></td>
</tr><tr class="TableSMenuRow3">
<td class="TableSMenuColumn3"><a href="<?php echo url_maker($exfile['profile'],$Settings['file_ext'],"act=userinfo",$Settings['qstr'],$Settings['qsep'],$prexqstr['profile'],$exqstr['profile']); ?>">Change User Info</a></td>
</tr><tr class="TableSMenuRow4">
<td class="TableSMenuColumn4">&nbsp;</td>
</tr></table></div>
</td>
	<td style="width: 85%; vertical-align: top;">
<?php if($_POST['update']=="now"&&$_GET['act']!=null) {
$updateact = url_maker($exfile['profile'],$Settings['file_ext'],"act=".$_GET['act'],$Settings['qstr'],$Settings['qsep'],$prexqstr['profile'],$exqstr['profile']);
$profiletitle = " ".$ThemeSet['TitleDivider']." Updating Settings";
redirect("refresh",$rbasedir.url_maker($exfile['profile'],$Settings['file_ext'],"act=".$_GET['act'],$Settings['qstr'],$Settings['qsep'],$prexqstr['profile'],$exqstr['profile'],FALSE),"3");
$noteact = url_maker($exfile['profile'],$Settings['file_ext'],"act=view",$Settings['qstr'],$Settings['qsep'],$prexqstr['profile'],$exqstr['profile']);
$profiletitle = " ".$ThemeSet['TitleDivider']." NotePad";
?>
<div class="TableMenuBorder">
<?php if($ThemeSet['TableStyle']=="div") { ?>
<div class="TableMenuRow1">
<span style="text-align: left;">
<?php echo $ThemeSet['TitleIcon']; ?><a href="<?php echo $updateact; ?>">Updating Settings</a>
</span></div>
<?php } ?>
<table class="TableMenu" style="width: 100%;">
<?php if($ThemeSet['TableStyle']=="table") { ?>
<tr class="TableMenuRow1">
<td class="TableMenuColumn1"><span style="text-align: left;">
<?php echo $ThemeSet['TitleIcon']; ?><a href="<?php echo $updateact; ?>">Updating Settings</a>
</span></td>
</tr><?php } ?>
<tr id="ProfileTitle" class="TableMenuRow2">
<th class="TableMenuColumn2">Updating Settings</th>
</tr>
<tr class="TableMenuRow3" id="ProfileUpdate">
<td class="TableMenuColumn3">
<div style="text-align: center;">
<br />Profile updated <a href="<?php echo $updateact; ?>">click here</a> to go back. ^_^<br />&nbsp;</div>
<?php } if($_GET['act']=="view") {
if($_POST['update']!="now") {
$query = sql_pre_query("SELECT * FROM \"".$Settings['sqltable']."members\" WHERE \"id\"=%i LIMIT 1", array($_SESSION['UserID']));
$result=sql_query($query,$SQLStat);
$num=sql_num_rows($result);
$i=0;
$YourID=sql_result($result,$i,"id");
$Notes=sql_result($result,$i,"Notes");
$noteact = url_maker($exfile['profile'],$Settings['file_ext'],"act=view",$Settings['qstr'],$Settings['qsep'],$prexqstr['profile'],$exqstr['profile']);
$notepadact = $noteact; $profiletitle = " ".$ThemeSet['TitleDivider']." NotePad";
?>
<div class="TableMenuBorder">
<?php if($ThemeSet['TableStyle']=="div") { ?>
<div class="TableMenuRow1">
<span style="text-align: left;">
<?php echo $ThemeSet['TitleIcon']; ?><a href="<?php echo $noteact; ?>">NotePad</a>
</span></div>
<?php } ?>
<table class="TableMenu" style="width: 100%;">
<?php if($ThemeSet['TableStyle']=="table") { ?>
<tr class="TableMenuRow1">
<td class="TableMenuColumn1"><span style="text-align: left;">
<?php echo $ThemeSet['TitleIcon']; ?><a href="<?php echo $noteact; ?>">NotePad</a>
</span></td>
</tr><?php } ?>
<tr id="ProfileTitle" class="TableMenuRow2">
<th class="TableMenuColumn2">NotePad</th>
</tr>
<tr class="TableMenuRow3" id="NotePadRow">
<td class="TableMenuColumn3">
<form style="display: inline;" method="post" action="<?php echo $notepadact; ?>"><div style="text-align: center;">
<label class="TextBoxLabel" for="NotePad">Your NotePad</label><br />
<textarea class="TextBox" name="NotePad" id="NotePad" style="width: 75%; height: 128px;" rows="10" cols="84"><?php echo $Notes; ?></textarea>
<input type="hidden" name="act" value="view" style="display: none;" />
<input type="hidden" name="update" value="now" style="display: none;" />
<br /><input type="submit" class="Button" value="Save" />&nbsp;<input class="Button" type="reset" />
</div></form></td>
</tr>
<tr id="ProfileEnd" class="TableMenuRow4">
<td class="TableMenuColumn4">&nbsp;</td>
</tr>
</table>
</div>
<?php sql_free_result($result); }
if($_POST['update']=="now") {
if($_POST['act']=="view"&&
	$_SESSION['UserGroup']!=$Settings['GuestGroup']) {
	$_POST['NotePad'] = htmlspecialchars($_POST['NotePad'], ENT_QUOTES, $Settings['charset']);
	$_POST['NotePad'] = remove_bad_entities($_POST['NotePad']);
	//$_POST['Signature'] = preg_replace("/&amp;#(x[a-f0-9]+|[0-9]+);/i", "&#$1;", $_POST['Signature']);
	//$_POST['Signature'] = remove_spaces($_POST['Signature']);
	//$_POST['Signature'] = remove_bad_entities($_POST['Signature']);
	/*    <_<  iWordFilter  >_>      
    by Kazuki Przyborowski - Cool Dude 2k */
	$katarzynaqy=sql_pre_query("SELECT * FROM \"".$Settings['sqltable']."wordfilter\"", array(null));
	$katarzynart=sql_query($katarzynaqy,$SQLStat);
	$katarzynanm=sql_num_rows($katarzynart);
	$katarzynas=0;
	while ($katarzynas < $katarzynanm) {
	$Filter=sql_result($katarzynart,$katarzynas,"FilterWord");
	$Replace=sql_result($katarzynart,$katarzynas,"Replacement");
	$CaseInsensitive=sql_result($katarzynart,$katarzynas,"CaseInsensitive");
	if($CaseInsensitive=="on") { $CaseInsensitive = "yes"; }
	if($CaseInsensitive=="off") { $CaseInsensitive = "no"; }
	if($CaseInsensitive!="yes"||$CaseInsensitive!="no") { $CaseInsensitive = "no"; }
	$WholeWord=sql_result($katarzynart,$katarzynas,"WholeWord");
	if($WholeWord=="on") { $WholeWord = "yes"; }
	if($WholeWord=="off") { $WholeWord = "no"; }
	if($WholeWord!="yes"&&$WholeWord!="no") { $WholeWord = "no"; }
	$Filter = preg_quote($Filter, "/");
	if($CaseInsensitive!="yes"&&$WholeWord=="yes") {
	$_POST['NotePad'] = preg_replace("/\b(".$Filter.")\b/", $Replace, $_POST['NotePad']); }
	if($CaseInsensitive=="yes"&&$WholeWord=="yes") {
	$_POST['NotePad'] = preg_replace("/\b(".$Filter.")\b/i", $Replace, $_POST['NotePad']); }
	if($CaseInsensitive!="yes"&&$WholeWord!="yes") {
	$_POST['NotePad'] = preg_replace("/".$Filter."/", $Replace, $_POST['NotePad']); }
	if($CaseInsensitive=="yes"&&$WholeWord!="yes") {
	$_POST['NotePad'] = preg_replace("/".$Filter."/i", $Replace, $_POST['NotePad']); }
	++$katarzynas; } sql_free_result($katarzynart);
	$NewDay=GMTimeStamp();
	$NewIP=$_SERVER['REMOTE_ADDR'];
	$querynewskin = sql_pre_query("UPDATE \"".$Settings['sqltable']."members\" SET \"Notes\"='%s',\"LastActive\"=%i,\"IP\"='%s' WHERE \"id\"=%i", array($_POST['NotePad'],$NewDay,$NewIP,$_SESSION['UserID']));
		sql_query($querynewskin,$SQLStat); } } }
if($_GET['act']=="signature") {
if($_POST['update']!="now") {
$query = sql_pre_query("SELECT * FROM \"".$Settings['sqltable']."members\" WHERE \"id\"=%i LIMIT 1", array($_SESSION['UserID']));
$result=sql_query($query,$SQLStat);
$num=sql_num_rows($result);
$i=0;
$YourID=sql_result($result,$i,"id");
$Signature=sql_result($result,$i,"Signature"); 
$signatureact = url_maker($exfile['profile'],$Settings['file_ext'],"act=signature",$Settings['qstr'],$Settings['qsep'],$prexqstr['profile'],$exqstr['profile']);
$profiletitle = " ".$ThemeSet['TitleDivider']." Signature Editor";
?>
<div class="TableMenuBorder">
<?php if($ThemeSet['TableStyle']=="div") { ?>
<div class="TableMenuRow1">
<span style="text-align: left;">
<?php echo $ThemeSet['TitleIcon']; ?><a href="<?php echo $signatureact; ?>">Signature Editer</a>
</span></div>
<?php } ?>
<table class="TableMenu" style="width: 100%;">
<?php if($ThemeSet['TableStyle']=="table") { ?>
<tr class="TableMenuRow1">
<td class="TableMenuColumn1"><span style="text-align: left;">
<?php echo $ThemeSet['TitleIcon']; ?><a href="<?php echo $signatureact; ?>">Signature Editer</a>
</span></td>
</tr><?php } ?>
<tr id="ProfileTitle" class="TableMenuRow2">
<th class="TableMenuColumn2">Signature Editor</th>
</tr>
<tr class="TableMenuRow3" id="SignatureRow">
<td class="TableMenuColumn3">
<form style="display: inline;" method="post" action="<?php echo $signatureact; ?>"><div style="text-align: center;">
<label class="TextBoxLabel" for="Signature">Your Signature</label><br />
<textarea class="TextBox" name="Signature" id="Signature" style="width: 75%; height: 128px;" rows="10" cols="84"><?php echo $Signature; ?></textarea>
<input type="hidden" name="act" value="signature" style="display: none;" />
<input type="hidden" name="update" value="now" style="display: none;" />
<br /><input type="submit" class="Button" value="Save" />&nbsp;<input class="Button" type="reset" />
</div></form></td>
</tr>
<tr id="ProfileEnd" class="TableMenuRow4">
<td class="TableMenuColumn4">&nbsp;</td>
</tr>
</table>
</div>
<?php sql_free_result($result); }
if($_POST['update']=="now") {
if($_POST['act']=="signature"&&
	$_SESSION['UserGroup']!=$Settings['GuestGroup']) {
	$_POST['Signature'] = stripcslashes(htmlspecialchars($_POST['Signature'], ENT_QUOTES));
	//$_POST['Signature'] = preg_replace("/&amp;#(x[a-f0-9]+|[0-9]+);/i", "&#$1;", $_POST['Signature']);
	//$_POST['Signature'] = remove_spaces($_POST['Signature']);
	$_POST['Signature'] = remove_bad_entities($_POST['Signature']);
	/*    <_<  iWordFilter  >_>      
    by Kazuki Przyborowski - Cool Dude 2k */
	$katarzynaqy=sql_pre_query("SELECT * FROM \"".$Settings['sqltable']."wordfilter\"", array(null));
	$katarzynart=sql_query($katarzynaqy,$SQLStat);
	$katarzynanm=sql_num_rows($katarzynart);
	$katarzynas=0;
	while ($katarzynas < $katarzynanm) {
	$Filter=sql_result($katarzynart,$katarzynas,"FilterWord");
	$Replace=sql_result($katarzynart,$katarzynas,"Replacement");
	$CaseInsensitive=sql_result($katarzynart,$katarzynas,"CaseInsensitive");
	if($CaseInsensitive=="on") { $CaseInsensitive = "yes"; }
	if($CaseInsensitive=="off") { $CaseInsensitive = "no"; }
	if($CaseInsensitive!="yes"||$CaseInsensitive!="no") { $CaseInsensitive = "no"; }
	$WholeWord=sql_result($katarzynart,$katarzynas,"WholeWord");
	if($WholeWord=="on") { $WholeWord = "yes"; }
	if($WholeWord=="off") { $WholeWord = "no"; }
	if($WholeWord!="yes"&&$WholeWord!="no") { $WholeWord = "no"; }
	$Filter = preg_quote($Filter, "/");
	if($CaseInsensitive!="yes"&&$WholeWord=="yes") {
	$_POST['Signature'] = preg_replace("/\b(".$Filter.")\b/", $Replace, $_POST['Signature']); }
	if($CaseInsensitive=="yes"&&$WholeWord=="yes") {
	$_POST['Signature'] = preg_replace("/\b(".$Filter.")\b/i", $Replace, $_POST['Signature']); }
	if($CaseInsensitive!="yes"&&$WholeWord!="yes") {
	$_POST['Signature'] = preg_replace("/".$Filter."/", $Replace, $_POST['Signature']); }
	if($CaseInsensitive=="yes"&&$WholeWord!="yes") {
	$_POST['Signature'] = preg_replace("/".$Filter."/i", $Replace, $_POST['Signature']); }
	++$katarzynas; } sql_free_result($katarzynart);
	$NewDay=GMTimeStamp();
	$NewIP=$_SERVER['REMOTE_ADDR'];
	$querynewskin = sql_pre_query("UPDATE \"".$Settings['sqltable']."members\" SET \"Signature\"='%s',\"LastActive\"=%i,\"IP\"='%s' WHERE \"id\"=%i", array($_POST['Signature'],$NewDay,$NewIP,$_SESSION['UserID']));
	sql_query($querynewskin,$SQLStat); } } }
if($_GET['act']=="avatar") {
if($_POST['update']!="now") {
$query = sql_pre_query("SELECT * FROM \"".$Settings['sqltable']."members\" WHERE \"id\"=%i LIMIT 1", array($_SESSION['UserID']));
$result=sql_query($query,$SQLStat);
$num=sql_num_rows($result);
$i=0;
$YourID=sql_result($result,$i,"id");
$User1Avatar=sql_result($result,$i,"Avatar"); 
$User1AvatarSize=sql_result($result,$i,"AvatarSize");
$avataract = url_maker($exfile['profile'],$Settings['file_ext'],"act=avatar",$Settings['qstr'],$Settings['qsep'],$prexqstr['profile'],$exqstr['profile']);
$profiletitle = " ".$ThemeSet['TitleDivider']." Avatar Editor";
$Pre1Avatar = $User1Avatar;
if ($User1Avatar==null) { $User1Avatar="http://"; }
if ($Pre1Avatar=="http://"||$Pre1Avatar==null||
	strtolower($Pre1Avatar)=="noavatar") {
$Pre1Avatar=$ThemeSet['NoAvatar'];
$User1AvatarSize=$ThemeSet['NoAvatarSize']; }
$AvatarSize1=explode("x", $User1AvatarSize);
$AvatarSize1W=$AvatarSize1[0]; $AvatarSize1H=$AvatarSize1[1];
?>
<div class="TableMenuBorder">
<?php if($ThemeSet['TableStyle']=="div") { ?>
<div class="TableMenuRow1">
<span style="text-align: left;">
<?php echo $ThemeSet['TitleIcon']; ?><a href="<?php echo $avataract; ?>">Avatar Editer</a>
</span></div>
<?php } ?>
<table class="TableMenu" style="width: 100%;">
<?php if($ThemeSet['TableStyle']=="table") { ?>
<tr class="TableMenuRow1">
<td class="TableMenuColumn1"><span style="text-align: left;">
<?php echo $ThemeSet['TitleIcon']; ?><a href="<?php echo $avataract; ?>">Avatar Editer</a>
</span></td>
</tr><?php } ?>
<tr id="ProfileTitle" class="TableMenuRow2">
<th class="TableMenuColumn2">Avatar Editor</th>
</tr>
<tr class="TableMenuRow3" id="AvatarEditor">
<td class="TableMenuColumn3">
<form style="display: inline;" method="post" action="<?php echo $avataract; ?>">
<?php  // Avatar Table Thanks For SeanJ's Help at http://seanj.jcink.com/  
 ?>
 <table class="AvatarTable" style="width: 100px; height: 100px; text-align: center;">
	<tr class="AvatarRow" style="width: 100%; height: 100%;">
		<td class="AvatarRow" style="width: 100%; height: 100%; text-align: center; vertical-align: middle;">
		<img src="<?php echo $Pre1Avatar; ?>" alt="<?php echo $_SESSION['MemberName']; ?>'s Avatar" title="<?php echo $_SESSION['MemberName']; ?>'s Avatar" style="border: 0px; width: <?php echo $AvatarSize1W; ?>px; height: <?php echo $AvatarSize1H; ?>px;" />
		</td>
	</tr>
 </table>
<table style="text-align: left;">
<tr style="text-align: left;">
	<td style="width: 40%;"><label class="TextBoxLabel" for="Avatar">Your Avatar</label></td>
	<td style="width: 60%;"><input type="text" class="TextBox" name="Avatar" id="Avatar" value="<?php echo $User1Avatar; ?>" size="20" /></td>
	</tr><tr style="text-align: left;">
	<td style="width: 40%;"><label class="TextBoxLabel" for="AvatarSizeW">Avatar Width</label></td>
	<td style="width: 60%;"><select size="1" name="AvatarSizeW" id="AvatarSizeW" class="TextBox">
	<option value="<?php echo $AvatarSize1W; ?>" selected="selected"><?php echo $AvatarSize1W; ?></option><?php echo "\n"; $r=1; while ($r <= 100) { ?><option value="<?php echo $r ?>"><?php echo $r; ?></option><?php echo "\n"; ++$r; } ?>
</select></td>
</tr><tr style="text-align: left;">
	<td style="width: 40%;"><label class="TextBoxLabel" for="AvatarSizeH">Avatar Height</label></td>
	<td style="width: 60%;"><select size="1" name="AvatarSizeH" id="AvatarSizeH" class="TextBox">
<option value="<?php echo $AvatarSize1H; ?>" selected="selected"><?php echo $AvatarSize1H; ?></option><?php echo "\n"; $s=1; while ($s <= 100) { ?><option value="<?php echo $s ?>"><?php echo $s; ?></option><?php echo "\n"; ++$s; } ?>
</select></td>
</tr></table>
<table style="text-align: left;">
<tr style="text-align: left;">
<td style="width: 100%;">
<input type="hidden" name="act" value="avatar" style="display: none;" />
<input type="hidden" name="update" value="now" style="display: none;" />
<input type="submit" class="Button" value="Save" />
<input class="Button" type="reset" />
</td></tr></table>
</form></td>
</tr>
<tr id="ProfileEnd" class="TableMenuRow4">
<td class="TableMenuColumn4">&nbsp;</td>
</tr>
</table>
</div>
<?php sql_free_result($result); }
if($_POST['update']=="now") {
if($_POST['Avatar']!=null&&$_POST['AvatarSizeW']!=null&&$_POST['AvatarSizeH']!=null&&
	$_SESSION['UserGroup']!=$Settings['GuestGroup']) {
	if(!is_numeric($_POST['AvatarSizeW'])) { $_POST['AvatarSizeW'] = 100; }
	if($_POST['AvatarSizeW']>=100) { $_POST['AvatarSizeW']=100; }
	if(!is_numeric($_POST['AvatarSizeH'])) { $_POST['AvatarSizeH'] = 100; }
	if($_POST['AvatarSizeH']>=100) { $_POST['AvatarSizeH']=100; }
	$fullavatarsize = $_POST['AvatarSizeW']."x".$_POST['AvatarSizeH'];
	$_POST['Avatar'] = htmlentities($_POST['Avatar'], ENT_QUOTES, $Settings['charset']);
	$NewDay=GMTimeStamp();
	$NewIP=$_SERVER['REMOTE_ADDR'];
	$_POST['Avatar'] = remove_spaces($_POST['Avatar']);
	$querynewskin = sql_pre_query("UPDATE \"".$Settings['sqltable']."members\" SET \"Avatar\"='%s',\"AvatarSize\"='%s',\"LastActive\"=%i,\"IP\"='%s' WHERE \"id\"=%i", array($_POST['Avatar'],$fullavatarsize,$NewDay,$NewIP,$_SESSION['UserID']));
	sql_query($querynewskin,$SQLStat); } } }
if($_GET['act']=="settings") {
if($_POST['update']!="now") {
$query = sql_pre_query("SELECT * FROM \"".$Settings['sqltable']."members\" WHERE \"id\"=%i LIMIT 1", array($_SESSION['UserID']));
$result=sql_query($query,$SQLStat);
$num=sql_num_rows($result);
$i=0;
$YourID=sql_result($result,$i,"id");
$User1TimeZone=sql_result($result,$i,"TimeZone"); 
$User1DateFormat=sql_result($result,$i,"DateFormat");
$User1DateFormat = htmlspecialchars($User1DateFormat, ENT_QUOTES, $Settings['charset']);
$User1TimeFormat=sql_result($result,$i,"TimeFormat");
$User1TimeFormat= htmlspecialchars($User1TimeFormat, ENT_QUOTES, $Settings['charset']);
$tsa_mem = explode(":",$User1TimeZone);
$TimeZoneArray = array("offset" => $User1TimeZone, "hour" => $tsa_mem[0], "minute" => $tsa_mem[1]);
$User1DST=sql_result($result,$i,"DST");
$settingsact = url_maker($exfile['profile'],$Settings['file_ext'],"act=settings",$Settings['qstr'],$Settings['qsep'],$prexqstr['profile'],$exqstr['profile']);
$profiletitle = " ".$ThemeSet['TitleDivider']." Board Settings"; ?>
<div class="TableMenuBorder">
<?php if($ThemeSet['TableStyle']=="div") { ?>
<div class="TableMenuRow1">
<span style="text-align: left;">
<?php echo $ThemeSet['TitleIcon']; ?><a href="<?php echo $settingsact; ?>">Board Settings</a>
</span></div>
<?php } ?>
<table class="TableMenu" style="width: 100%;">
<?php if($ThemeSet['TableStyle']=="table") { ?>
<tr class="TableMenuRow1">
<td class="TableMenuColumn1"><span style="text-align: left;">
<?php echo $ThemeSet['TitleIcon']; ?><a href="<?php echo $settingsact; ?>">Board Settings</a>
</span></td>
</tr><?php } ?>
<tr id="ProfileTitle" class="TableMenuRow2">
<th class="TableMenuColumn2">Board Settings</th>
</tr>
<tr class="TableMenuRow3" id="BoardSettings">
<td class="TableMenuColumn3">
<form style="display: inline;" method="post" action="<?php echo $settingsact; ?>">
<table style="text-align: left;">
<tr style="text-align: left;">
	<td style="width: 40%;"><label class="TextBoxLabel" for="YourOffSet">Your TimeZone:</label></td>
	<td style="width: 60%;"><select id="YourOffSet" name="YourOffSet" class="TextBox">
<?php
$plusi = 1; $minusi = 12;
$plusnum = 15; $minusnum = 0;
while ($minusi > $minusnum) {
if($TimeZoneArray['hour']==-$minusi) {
echo "<option selected=\"selected\" value=\"-".$minusi."\">UTC - ".$minusi.":00 hours</option>\n"; }
if($TimeZoneArray['hour']!=-$minusi) {
echo "<option value=\"-".$minusi."\">UTC - ".$minusi.":00 hours</option>\n"; }
--$minusi; }
if($TimeZoneArray['hour']==0) { ?>
<option selected="selected" value="0">UTC +/- 0:00 hours</option>
<?php } if($TimeZoneArray['hour']!=0) { ?>
<option value="0">UTC +/- 0:00 hours</option>
<?php }
while ($plusi < $plusnum) {
if($TimeZoneArray['hour']==$plusi) {
echo "<option selected=\"selected\" value=\"".$plusi."\">UTC + ".$plusi.":00 hours</option>\n"; }
if($TimeZoneArray['hour']!=$plusi) {
echo "<option value=\"".$plusi."\">UTC + ".$plusi.":00 hours</option>\n"; }
++$plusi; }
?></select></td>
</tr><tr style="text-align: left;">
	<td style="width: 40%;"><label class="TextBoxLabel" for="MinOffSet">Minute OffSet:</label></td>
	<td style="width: 60%;"><select id="MinOffSet" name="MinOffSet" class="TextBox">
<option selected="selected" value="<?php echo $TimeZoneArray['minute']; ?>">Old Value (<?php echo "0:".$TimeZoneArray['minute']." minutes"; ?>)</option>
<?php
$mini = 0; $minnum = 60;
while ($mini < $minnum) {
if(strlen($mini)==2) { $showmin = $mini; }
if(strlen($mini)==1) { $showmin = "0".$mini; }
echo "<option value=\"".$showmin."\">0:".$showmin." minutes</option>\n";
++$mini; }
?></select></td>
</tr><tr style="text-align: left;">
	<td style="width: 40%;"><label class="TextBoxLabel" for="iDBTimeFormat">Insert time format string:</label></td>
	<td style="width: 60%;"><input type="text" class="TextBox" name="iDBTimeFormat" id="iDBTimeFormat" value="<?php echo $User1DateFormat; ?>" /></td>
</tr><tr style="text-align: left;">
	<td style="width: 40%;"><label class="TextBoxLabel" for="iDBDateFormat">Insert date format string:</label></td>
	<td style="width: 60%;"><input type="text" class="TextBox" name="iDBDateFormat" id="iDBDateFormat" value="<?php echo $User1TimeFormat; ?>" /></td>
</tr><tr style="text-align: left;">
	<td style="width: 40%;"><label class="TextBoxLabel" for="skin">Pick a CSS Theme</label></td>
	<td style="width: 60%;"><select id="skin" name="skin" class="TextBox">
<option selected="selected" value="<?php echo $_SESSION['Theme']; ?>">Old Value (<?php echo $_SESSION['Theme']; ?>)</option><?php
if($Settings['SQLThemes']=="off") {
$skindir = dirname(realpath("settings.php"))."/".$SettDir['themes'];
if ($handle = opendir($skindir)) { $dirnum = null;
   while (false !== ($file = readdir($handle))) {
	   if ($dirnum==null) { $dirnum = 0; }
	   if (file_exists($skindir.$file."/info.php")) {
		   if ($file != "." && $file != "..") {
	   include($skindir.$file."/info.php");
       $themelist[$dirnum] =  "<option value=\"".$file."\">".$ThemeInfo['ThemeName']."</option>";
	   ++$dirnum; } } }
   closedir($handle); asort($themelist);
   $themenum=count($themelist); $themei=0; 
   while ($themei < $themenum) {
   echo $themelist[$themei]."\n";
   ++$themei; } } }
if($Settings['SQLThemes']=="on") {
$sknquery = sql_pre_query("SELECT * FROM \"".$Settings['sqltable']."themes\" ORDER BY \"id\" ASC, \"Name\" ASC", array(null));
$sknresult=sql_query($sknquery,$SQLStat);
$sknum=sql_num_rows($sknresult);
$skni=0;
while ($skni < $sknum) {
$ThemeInfo['Name'] = sql_result($sknresult,$skni,"Name");
$ThemeInfo['ThemeName'] = sql_result($sknresult,$skni,"ThemeName");
echo "<option value=\"".$ThemeInfo['Name']."\">".$ThemeInfo['ThemeName']."</option>\n";
++$skni; }
} ?></select></td>
</tr><tr style="text-align: left;">
	<td style="width: 40%;"><label class="TextBoxLabel" for="RepliesPerPage">Replies Per Page:</label></td>
	<td style="width: 60%;"><select id="RepliesPerPage" name="RepliesPerPage" class="TextBox">
<option selected="selected" value="<?php echo $Settings['max_posts']; ?>">Old Value (<?php echo $Settings['max_posts']; ?>)</option>
<option value="5">5</option>
<option value="10">10</option>
<option value="15">15</option>
<option value="20">20</option>
<option value="25">25</option>
<option value="30">30</option>
<option value="30">35</option>
<option value="30">40</option>
</select></td>
</tr><tr style="text-align: left;">
	<td style="width: 40%;"><label class="TextBoxLabel" for="TopicsPerPage">Topics Per Page:</label></td>
	<td style="width: 60%;"><select id="TopicsPerPage" name="TopicsPerPage" class="TextBox">
<option selected="selected" value="<?php echo $Settings['max_topics']; ?>">Old Value (<?php echo $Settings['max_topics']; ?>)</option>
<option value="5">5</option>
<option value="10">10</option>
<option value="15">15</option>
<option value="20">20</option>
<option value="25">25</option>
<option value="30">30</option>
<option value="30">35</option>
<option value="30">40</option>
</select></td>
</tr><tr style="text-align: left;">
	<td style="width: 40%;"><label class="TextBoxLabel" for="MessagesPerPage">Messages/Members Per Page:</label></td>
	<td style="width: 60%;"><select id="MessagesPerPage" name="MessagesPerPage" class="TextBox">
<option selected="selected" value="<?php echo $Settings['max_pmlist']; ?>">Old Value (<?php echo $Settings['max_pmlist']; ?>)</option>
<option value="5">5</option>
<option value="10">10</option>
<option value="15">15</option>
<option value="20">20</option>
<option value="25">25</option>
<option value="30">30</option>
<option value="30">35</option>
<option value="30">40</option>
</select></td>
</tr><tr style="text-align: left;">
	<td style="width: 40%;"><label class="TextBoxLabel" for="DST">Is <span title="Daylight Savings Time">DST</span> / <span title="Summer Time">ST</span> on or off:</label></td>
	<td style="width: 60%;"><select id="DST" name="DST" class="TextBox"><?php echo "\n" ?>
<?php if($User1DST=="off"||$User1DST!="on") { ?>
<option selected="selected" value="off">off</option><?php echo "\n" ?><option value="on">on</option>
<?php } if($User1DST=="on") { ?>
<option selected="selected" value="on">on</option><?php echo "\n" ?><option value="off">off</option>
<?php } echo "\n" ?></select></td>
</tr></table>
<table style="text-align: left;">
<tr style="text-align: left;">
<td style="width: 100%;">
<input type="hidden" name="act" value="settings" style="display: none;" />
<input type="hidden" name="update" value="now" style="display: none;" />
<input type="submit" class="Button" value="Save" />
<input class="Button" type="reset" />
</td></tr></table>
</form></td>
</tr>
<tr id="ProfileEnd" class="TableMenuRow4">
<td class="TableMenuColumn4">&nbsp;</td>
</tr>
</table>
</div>
<?php sql_free_result($result); }
if($_POST['update']=="now") {
if($_POST['act']=="settings"&&
	$_SESSION['UserGroup']!=$Settings['GuestGroup']) {
	$NewDay=GMTimeStamp();
	$NewIP=$_SERVER['REMOTE_ADDR'];
	if(!is_numeric($_POST['YourOffSet'])) { $_POST['YourOffSet'] = "0"; }
	if(!is_numeric($_POST['MinOffSet'])) { $_POST['MinOffSet'] = "00"; }
	if($_POST['MinOffSet']<0) { $_POST['MinOffSet'] = "00"; }
	$_POST['YourOffSet'] = $_POST['YourOffSet'].":".$_POST['MinOffSet'];
	$_SESSION['UserTimeZone'] = $_POST['YourOffSet'];
	$_SESSION['UserDST'] = $_POST['DST'];
	if(!is_numeric($_POST['RepliesPerPage'])) { $_POST['RepliesPerPage'] = "10"; }
	if(!is_numeric($_POST['TopicsPerPage'])) { $_POST['TopicsPerPage'] = "10"; }
	if(!is_numeric($_POST['MessagesPerPage'])) { $_POST['MessagesPerPage'] = "10"; }
	$_POST['iDBTimeFormat'] = convert_strftime($_POST['iDBTimeFormat']);
	$_POST['iDBDateFormat'] = convert_strftime($_POST['iDBDateFormat']);
	$querynewskin = sql_pre_query("UPDATE \"".$Settings['sqltable']."members\" SET \"UseTheme\"='%s',\"TimeZone\"='%s',\"DateFormat\"='%s',\"TimeFormat\"='%s',\"DST\"='%s',\"LastActive\"=%i,\"RepliesPerPage\"=%i,\"TopicsPerPage\"=%i,\"MessagesPerPage\"=%i,\"IP\"='%s' WHERE \"id\"=%i", array(chack_themes($_POST['skin']),$_POST['YourOffSet'],$_POST['iDBTimeFormat'],$_POST['iDBDateFormat'],$_POST['DST'],$NewDay,$_POST['RepliesPerPage'],$_POST['TopicsPerPage'],$_POST['MessagesPerPage'],$NewIP,$_SESSION['UserID']));
	sql_query($querynewskin,$SQLStat); } } }
if($_GET['act']=="profile") {
if($_POST['update']!="now") {
$query = sql_pre_query("SELECT * FROM \"".$Settings['sqltable']."members\" WHERE \"id\"=%i LIMIT 1", array($_SESSION['UserID']));
$result=sql_query($query,$SQLStat);
$num=sql_num_rows($result);
$i=0;
$YourID=sql_result($result,$i,"id");
$User1Interests=sql_result($result,$i,"Interests"); 
$User1Title=sql_result($result,$i,"Title");
$User1Website=sql_result($result,$i,"Website"); 
$User1Website = urlcheck($User1Website);
$User1Gender=sql_result($result,$i,"Gender");
$User1TimeZone=sql_result($result,$i,"TimeZone");
$User1DateFormat=sql_result($result,$i,"DateFormat");
$User1DateFormat = htmlspecialchars($User1DateFormat, ENT_QUOTES, $Settings['charset']);
$User1TimeFormat=sql_result($result,$i,"TimeFormat");
$User1TimeFormat= htmlspecialchars($User1TimeFormat, ENT_QUOTES, $Settings['charset']);
$BirthDay=sql_result($result,$i,"BirthDay");
$BirthMonth=sql_result($result,$i,"BirthMonth");
$BirthYear=sql_result($result,$i,"BirthYear");
$User1Birthday = "MM/DD/YYYY";
if($BirthMonth!=null&&$BirthDay!=null&&$BirthYear!=null) { 
	if($BirthYear=="0") { $BirthYear = "YYYY"; }
	if($BirthDay=="0") { $BirthDay = "DD"; }
	if($BirthMonth=="0") { $BirthMonth = "MM"; }
	if(pre_strlen($BirthMonth)=="1") { $BirthMonth = "0".$BirthMonth; }
	if(pre_strlen($BirthDay)=="1") { $BirthDay = "0".$BirthDay; }
    if($BirthYear!="MM"&&$BirthYear!="DD"&&$BirthYear!="YYYY"&&
	checkdate($BirthMonth,$BirthDay,$BirthYear)===false) {
	$BirthMonth = "MM"; $BirthDay = "DD"; $BirthYear = "YYYY"; }
	$User1Birthday = $BirthMonth."/".$BirthDay."/".$BirthYear; }
$tsa_mem = explode(":",$User1TimeZone);
$TimeZoneArray = array("offset" => $User1TimeZone, "hour" => $tsa_mem[0], "minute" => $tsa_mem[1]);
$User1DST=sql_result($result,$i,"DST");
$profileact = url_maker($exfile['profile'],$Settings['file_ext'],"act=profile",$Settings['qstr'],$Settings['qsep'],$prexqstr['profile'],$exqstr['profile']);
$profiletitle = " ".$ThemeSet['TitleDivider']." Profile Editor";
?>
<div class="TableMenuBorder">
<?php if($ThemeSet['TableStyle']=="div") { ?>
<div class="TableMenuRow1">
<span style="text-align: left;">
<?php echo $ThemeSet['TitleIcon']; ?><a href="<?php echo $profileact; ?>">Profile Editer</a>
</span></div>
<?php } ?>
<table class="TableMenu" style="width: 100%;">
<?php if($ThemeSet['TableStyle']=="table") { ?>
<tr class="TableMenuRow1">
<td class="TableMenuColumn1"><span style="text-align: left;">
<?php echo $ThemeSet['TitleIcon']; ?><a href="<?php echo $profileact; ?>">Profile Editer</a>
</span></td>
</tr><?php } ?>
<tr id="ProfileTitle" class="TableMenuRow2">
<th class="TableMenuColumn2">Profile Editor</th>
</tr>
<tr class="TableMenuRow3" id="ProfileEditor">
<td class="TableMenuColumn3">
<form style="display: inline;" method="post" action="<?php echo $profileact; ?>">
<table style="text-align: left;">
<tr style="text-align: left;">
	<td style="width: 40%;"><label class="TextBoxLabel" for="Interests">Your Interests</label></td>
	<td style="width: 60%;"><input type="text" class="TextBox" name="Interests" id="Interests" value="<?php echo $User1Interests; ?>" /></td>
</tr><tr style="text-align: left;">
	<td style="width: 40%;"><label class="TextBoxLabel" for="Title">Your Title</label></td>
	<td style="width: 60%;"><input type="text" class="TextBox" name="Title" id="Title" value="<?php echo $User1Title; ?>" /></td>
</tr><tr style="text-align: left;">
	<td style="width: 40%;"><label class="TextBoxLabel" for="Website">Your Website</label></td>
	<td style="width: 60%;"><input type="text" class="TextBox" name="Website" id="Website" value="<?php echo $User1Website; ?>" /></td>
</tr><tr style="text-align: left;">
	<td style="width: 40%;"><label class="TextBoxLabel" for="EventDay">Your Birthday</label></td>
	<td style="width: 60%;"><input maxlength="10" type="text" class="TextBox" name="EventDay" id="EventDay" value="<?php echo $User1Birthday; ?>" /></td>
</tr><tr style="text-align: left;">
	<td style="width: 40%;"><label class="TextBoxLabel" for="YourOffSet">Your TimeZone:</label></td>
	<td style="width: 60%;"><select id="YourOffSet" name="YourOffSet" class="TextBox">
<option selected="selected" value="<?php echo $TimeZoneArray['hour']; ?>">Old Value (<?php echo $TimeZoneArray['hour'].":00 hours"; ?>)</option>
<?php
$plusi = 1; $minusi = 12;
$plusnum = 15; $minusnum = 0;
while ($minusi > $minusnum) {
echo "<option value=\"-".$minusi."\">GMT - ".$minusi.":00 hours</option>\n";
--$minusi; }
?>
<option value="0">GMT +/- 0:00 hours</option>
<?php
while ($plusi < $plusnum) {
echo "<option value=\"".$plusi."\">GMT + ".$plusi.":00 hours</option>\n";
++$plusi; }
?></select></td>
</tr><tr style="text-align: left;">
	<td style="width: 40%;"><label class="TextBoxLabel" for="MinOffSet">Minute OffSet:</label></td>
	<td style="width: 60%;"><select id="MinOffSet" name="MinOffSet" class="TextBox">
<option selected="selected" value="<?php echo $TimeZoneArray['minute']; ?>">Old Value (<?php echo "0:".$TimeZoneArray['minute']." minutes"; ?>)</option>
<?php
$mini = 0; $minnum = 60;
while ($mini < $minnum) {
if(strlen($mini)==2) { $showmin = $mini; }
if(strlen($mini)==1) { $showmin = "0".$mini; }
echo "<option value=\"".$showmin."\">0:".$showmin." minutes</option>\n";
++$mini; }
?></select></td>
</tr><tr style="text-align: left;">
	<td style="width: 40%;"><label class="TextBoxLabel" for="iDBTimeFormat">Insert time format string:</label></td>
	<td style="width: 60%;"><input type="text" class="TextBox" name="iDBTimeFormat" id="iDBTimeFormat" value="<?php echo $User1DateFormat; ?>" /></td>
</tr><tr style="text-align: left;">
	<td style="width: 40%;"><label class="TextBoxLabel" for="iDBDateFormat">Insert date format string:</label></td>
	<td style="width: 60%;"><input type="text" class="TextBox" name="iDBDateFormat" id="iDBDateFormat" value="<?php echo $User1TimeFormat; ?>" /></td>
</tr><tr style="text-align: left;">
	<td style="width: 40%;"><label class="TextBoxLabel" for="YourGender">Your Gender:</label></td>
	<td style="width: 60%;"><select id="YourGender" name="YourGender" class="TextBox">
<option selected="selected" value="<?php echo $User1Gender; ?>">Old Value (<?php echo $User1Gender; ?>)</option>
<option value="Male">Male</option>
<option value="Female">Female</option>
<option value="Unknown">Unknown</option>
</select></td>
</tr><tr style="text-align: left;">
	<td style="width: 40%;"><label class="TextBoxLabel" for="RepliesPerPage">Replies Per Page:</label></td>
	<td style="width: 60%;"><select id="RepliesPerPage" name="RepliesPerPage" class="TextBox">
<option selected="selected" value="<?php echo $Settings['max_posts']; ?>">Old Value (<?php echo $Settings['max_posts']; ?>)</option>
<option value="5">5</option>
<option value="10">10</option>
<option value="15">15</option>
<option value="20">20</option>
<option value="25">25</option>
<option value="30">30</option>
<option value="30">35</option>
<option value="30">40</option>
</select></td>
</tr><tr style="text-align: left;">
	<td style="width: 40%;"><label class="TextBoxLabel" for="TopicsPerPage">Topics Per Page:</label></td>
	<td style="width: 60%;"><select id="TopicsPerPage" name="TopicsPerPage" class="TextBox">
<option selected="selected" value="<?php echo $Settings['max_topics']; ?>">Old Value (<?php echo $Settings['max_topics']; ?>)</option>
<option value="5">5</option>
<option value="10">10</option>
<option value="15">15</option>
<option value="20">20</option>
<option value="25">25</option>
<option value="30">30</option>
<option value="30">35</option>
<option value="30">40</option>
</select></td>
</tr><tr style="text-align: left;">
	<td style="width: 40%;"><label class="TextBoxLabel" for="MessagesPerPage">Messages/Members Per Page:</label></td>
	<td style="width: 60%;"><select id="MessagesPerPage" name="MessagesPerPage" class="TextBox">
<option selected="selected" value="<?php echo $Settings['max_pmlist']; ?>">Old Value (<?php echo $Settings['max_pmlist']; ?>)</option>
<option value="5">5</option>
<option value="10">10</option>
<option value="15">15</option>
<option value="20">20</option>
<option value="25">25</option>
<option value="30">30</option>
</select></td>
</tr><tr style="text-align: left;">
	<td style="width: 40%;"><label class="TextBoxLabel" for="DST">Is <span title="Daylight Savings Time">DST</span> / <span title="Summer Time">ST</span> on or off:</label></td>
	<td style="width: 60%;"><select id="DST" name="DST" class="TextBox"><?php echo "\n" ?>
<?php if($User1DST=="off"||$User1DST!="on") { ?>
<option selected="selected" value="off">off</option><?php echo "\n" ?><option value="on">on</option>
<?php } if($User1DST=="on") { ?>
<option selected="selected" value="on">on</option><?php echo "\n" ?><option value="off">off</option>
<?php } echo "\n" ?></select></td>
</tr></table>
<table style="text-align: left;">
<tr style="text-align: left;">
<td style="width: 100%;">
<input type="hidden" name="act" value="profile" style="display: none;" />
<input type="hidden" name="update" value="now" style="display: none;" />
<input type="submit" class="Button" value="Save" />
<input class="Button" type="reset" />
</td></tr></table>
</form></td>
</tr>
<tr id="ProfileEnd" class="TableMenuRow4">
<td class="TableMenuColumn4">&nbsp;</td>
</tr>
</table>
</div>
<?php sql_free_result($result); }
if($_POST['update']=="now") {
if($_POST['act']=="profile"&&
	$_SESSION['UserGroup']!=$Settings['GuestGroup']) {
	$_POST['Interests'] = htmlspecialchars($_POST['Interests'], ENT_QUOTES, $Settings['charset']);
	$_POST['Interests'] = remove_spaces($_POST['Interests']);
	$_POST['Title'] = htmlspecialchars($_POST['Title'], ENT_QUOTES, $Settings['charset']);
	$_POST['Title'] = remove_spaces($_POST['Title']);
	$_POST['Website'] = htmlentities($_POST['Website'], ENT_QUOTES, $Settings['charset']);
	$_POST['Website'] = remove_spaces($_POST['Website']);
	//$_POST['Signature'] = preg_replace("/&amp;#(x[a-f0-9]+|[0-9]+);/i", "&#$1;", $_POST['Signature']);
	//$_POST['Signature'] = remove_spaces($_POST['Signature']);
	//$_POST['Signature'] = remove_bad_entities($_POST['Signature']);
	/*    <_<  iWordFilter  >_>      
    by Kazuki Przyborowski - Cool Dude 2k */
	$katarzynaqy=sql_pre_query("SELECT * FROM \"".$Settings['sqltable']."wordfilter\"", array(null));
	$katarzynart=sql_query($katarzynaqy,$SQLStat);
	$katarzynanm=sql_num_rows($katarzynart);
	$katarzynas=0;
	while ($katarzynas < $katarzynanm) {
	$Filter=sql_result($katarzynart,$katarzynas,"FilterWord");
	$Replace=sql_result($katarzynart,$katarzynas,"Replacement");
	$CaseInsensitive=sql_result($katarzynart,$katarzynas,"CaseInsensitive");
	if($CaseInsensitive=="on") { $CaseInsensitive = "yes"; }
	if($CaseInsensitive=="off") { $CaseInsensitive = "no"; }
	if($CaseInsensitive!="yes"||$CaseInsensitive!="no") { $CaseInsensitive = "no"; }
	$WholeWord=sql_result($katarzynart,$katarzynas,"WholeWord");
	if($WholeWord=="on") { $WholeWord = "yes"; }
	if($WholeWord=="off") { $WholeWord = "no"; }
	if($WholeWord!="yes"&&$WholeWord!="no") { $WholeWord = "no"; }
	$Filter = preg_quote($Filter, "/");
	if($CaseInsensitive!="yes"&&$WholeWord=="yes") {
	$_POST['Interests'] = preg_replace("/\b(".$Filter.")\b/", $Replace, $_POST['Interests']);
	$_POST['Title'] = preg_replace("/\b(".$Filter.")\b/", $Replace, $_POST['Title']); }
	if($CaseInsensitive=="yes"&&$WholeWord=="yes") {
	$_POST['Interests'] = preg_replace("/\b(".$Filter.")\b/i", $Replace, $_POST['Interests']);
	$_POST['Title'] = preg_replace("/\b(".$Filter.")\b/i", $Replace, $_POST['Title']); }
	if($CaseInsensitive!="yes"&&$WholeWord!="yes") {
	$_POST['Interests'] = preg_replace("/".$Filter."/", $Replace, $_POST['Interests']);
	$_POST['Title'] = preg_replace("/".$Filter."/", $Replace, $_POST['Title']); }
	if($CaseInsensitive=="yes"&&$WholeWord!="yes") {
	$_POST['Interests'] = preg_replace("/".$Filter."/i", $Replace, $_POST['Interests']); 
	$_POST['Title'] = preg_replace("/".$Filter."/i", $Replace, $_POST['Title']); }
	++$katarzynas; } sql_free_result($katarzynart);
	if(!is_numeric($_POST['RepliesPerPage'])) { $_POST['RepliesPerPage'] = "10"; }
	if(!is_numeric($_POST['TopicsPerPage'])) { $_POST['TopicsPerPage'] = "10"; }
	if(!is_numeric($_POST['MessagesPerPage'])) { $_POST['MessagesPerPage'] = "10"; }
	if(!isset($_POST['EventDay'])) { $_POST['EventDay'] = null; }
	if($_POST['EventDay']!=null) {
	$BirthExpl = explode("/",$_POST['EventDay']);
	if(count($BirthExpl)!="3") { 
	$BirthExpl[0] = "0"; $BirthExpl[1] = "0"; $BirthExpl[2] = "0"; }
	if(!is_numeric($BirthExpl[0])) { $BirthExpl[0] = "0"; }
	if(!is_numeric($BirthExpl[1])) { $BirthExpl[1] = "0"; }
	if(!is_numeric($BirthExpl[2])) { $BirthExpl[2] = "0"; }
	if(count($BirthExpl)=="3"&&checkdate($BirthExpl[0],$BirthExpl[1],$BirthExpl[2])===true) {
	if(is_numeric($BirthExpl[0])&&is_numeric($BirthExpl[1])&&is_numeric($BirthExpl[2])) {
	if(pre_strlen($BirthExpl[0])=="1") { $BirthExpl[0] = "0".$BirthExpl[0]; }
	if(pre_strlen($BirthExpl[1])=="1") { $BirthExpl[1] = "0".$BirthExpl[1]; }
	if(pre_strlen($BirthExpl[0])=="2"&&pre_strlen($BirthExpl[1])=="2"&&pre_strlen($BirthExpl[2])=="4") {
	$BirthIn = mktime(12,12,12,$BirthExpl[0],$BirthExpl[1],$BirthExpl[2]);
	$BirthMonth=GMTimeChange("m",$BirthIn,0,0,"off");
	$BirthDay=GMTimeChange("d",$BirthIn,0,0,"off");
	$BirthYear=GMTimeChange("Y",$BirthIn,0,0,"off"); }
	if(pre_strlen($BirthExpl[0])!="2"||pre_strlen($BirthExpl[1])!="2"||pre_strlen($BirthExpl[2])!="4") { 
		$BirthMonth="0"; $BirthDay="0"; $BirthYear="0"; } }
	if (!is_numeric($BirthExpl[0])||!is_numeric($BirthExpl[1])||!is_numeric($BirthExpl[2])) { 
		$BirthMonth="0"; $BirthDay="0"; $BirthYear="0"; } }
	if(count($BirthExpl)=="3"&&
	checkdate($BirthExpl[0],$BirthExpl[1],$BirthExpl[2])===false) {
	$BirthMonth="0"; $BirthDay="0"; $BirthYear="0"; }
	if(count($BirthExpl)!="3") { $BirthMonth="0"; $BirthDay="0"; $BirthYear="0"; } }
	if($_POST['EventDay']==null) { $BirthMonth="0"; $BirthDay="0"; $BirthYear="0"; }
	if(!is_numeric($_POST['YourOffSet'])) { $_POST['YourOffSet'] = "0"; }
	if(!is_numeric($_POST['MinOffSet'])) { $_POST['MinOffSet'] = "00"; }
	if($_POST['MinOffSet']<0) { $_POST['MinOffSet'] = "00"; }
	$_POST['YourOffSet'] = $_POST['YourOffSet'].":".$_POST['MinOffSet'];
	$_SESSION['UserTimeZone'] = $_POST['YourOffSet'];
	$_SESSION['UserDST'] = $_POST['DST'];
	$NewDay=GMTimeStamp();
	$NewIP=$_SERVER['REMOTE_ADDR'];
	$_POST['Website'] = urlcheck($_POST['Website']);
	$_POST['iDBTimeFormat'] = convert_strftime($_POST['iDBTimeFormat']);
	$_POST['iDBDateFormat'] = convert_strftime($_POST['iDBDateFormat']);
	$querynewprofile = sql_pre_query("UPDATE \"".$Settings['sqltable']."members\" SET \"Interests\"='%s',\"Title\"='%s',\"Website\"='%s',\"TimeZone\"='%s',\"DateFormat\"='%s',\"TimeFormat\"='%s',\"Gender\"='%s',\"DST\"='%s',\"LastActive\"=%i,\"BirthMonth\"=%i,\"BirthDay\"=%i,\"BirthYear\"=%i,\"RepliesPerPage\"=%i,\"TopicsPerPage\"=%i,\"MessagesPerPage\"=%i,\"IP\"='%s' WHERE \"id\"=%i", array($_POST['Interests'],$_POST['Title'],$_POST['Website'],$_POST['YourOffSet'],$_POST['iDBTimeFormat'],$_POST['iDBDateFormat'],$_POST['YourGender'],$_POST['DST'],$NewDay,$BirthMonth,$BirthDay,$BirthYear,$_POST['RepliesPerPage'],$_POST['TopicsPerPage'],$_POST['MessagesPerPage'],$NewIP,$_SESSION['UserID']));
	sql_query($querynewprofile,$SQLStat); } } }
if($_GET['act']=="userinfo") {
if($_POST['update']!="now") {
$query = sql_pre_query("SELECT * FROM \"".$Settings['sqltable']."members\" WHERE \"id\"=%i LIMIT 1", array($_SESSION['UserID']));
$result=sql_query($query,$SQLStat);
$num=sql_num_rows($result);
$i=0;
$YourID=sql_result($result,$i,"id");
$User1Email=sql_result($result,$i,"Email"); 
$userinfoact = url_maker($exfile['profile'],$Settings['file_ext'],"act=userinfo",$Settings['qstr'],$Settings['qsep'],$prexqstr['profile'],$exqstr['profile']);
$profiletitle = " ".$ThemeSet['TitleDivider']." User Info Editer";
?>
<div class="TableMenuBorder">
<?php if($ThemeSet['TableStyle']=="div") { ?>
<div class="TableMenuRow1">
<span style="text-align: left;">
<?php echo $ThemeSet['TitleIcon']; ?><a href="<?php echo $userinfoact; ?>">User Info Editer</a>
</span></div>
<?php } ?>
<table class="TableMenu" style="width: 100%;">
<?php if($ThemeSet['TableStyle']=="table") { ?>
<tr class="TableMenuRow1">
<td class="TableMenuColumn1"><span style="text-align: left;">
<?php echo $ThemeSet['TitleIcon']; ?><a href="<?php echo $userinfoact; ?>">User Info Editer</a>
</span></td>
</tr><?php } ?>
<tr id="ProfileTitle" class="TableMenuRow2">
<th class="TableMenuColumn2">User Info Editer</th>
</tr>
<tr class="TableMenuRow3" id="UserInfoEditor">
<td class="TableMenuColumn3">
<form style="display: inline;" method="post" action="<?php echo $userinfoact; ?>">
<table style="text-align: left;">
<tr style="text-align: left;">
	<td style="width: 40%;"><label class="TextBoxLabel" for="OldPass">Insert old Password:</label></td>
	<td style="width: 60%;"><input maxlength="30" type="password" class="TextBox" name="OldPass" size="20" id="OldPass" /></td>
</tr><tr style="text-align: left;">
	<td style="width: 40%;"><label class="TextBoxLabel" for="Password">Insert a Password:</label></td>
	<td style="width: 60%;"><input maxlength="30" type="password" class="TextBox" name="Password" size="20" id="Password" /></td>
</tr><tr style="text-align: left;">
	<td style="width: 40%;"><label class="TextBoxLabel" for="RePassword">ReInsert a Password:</label></td>
	<td style="width: 60%;"><input maxlength="30" type="password" class="TextBox" name="RePassword" size="20" id="RePassword" /></td>
</tr><tr style="text-align: left;">
	<td style="width: 40%;"><label class="TextBoxLabel" for="Email">Insert Your Email:</label></td>
	<td style="width: 60%;"><input type="text" class="TextBox" name="Email" size="20" id="Email" value="<?php echo $User1Email; ?>" /></td>
</tr></table>
<table style="text-align: left;">
<tr style="text-align: left;">
<td style="width: 100%;">
<input type="hidden" name="act" value="userinfo" style="display: none;" />
<input type="hidden" name="update" value="now" style="display: none;" />
<input type="submit" class="Button" value="Save" />
<input class="Button" type="reset" />
</td></tr></table>
</form></td>
</tr>
<tr id="ProfileEnd" class="TableMenuRow4">
<td class="TableMenuColumn4">&nbsp;</td>
</tr>
</table>
</div>
<?php sql_free_result($result); }
if($_POST['update']=="now") {
if($_POST['act']=="userinfo"&&
	$_SESSION['UserGroup']!=$Settings['GuestGroup']) {
	$query = sql_pre_query("SELECT * FROM \"".$Settings['sqltable']."members\" WHERE \"id\"=%i LIMIT 1", array($_SESSION['UserID']));
	$result=sql_query($query,$SQLStat);
	$num=sql_num_rows($result);
	$i=0;
	$OldPassword=sql_result($result,$i,"UserPassword");
	$OldHashType=sql_result($result,$i,"HashType");
	$OldJoined=sql_result($result,$i,"Joined");
	$OldSalt=sql_result($result,$i,"Salt");
	$UpdateHash = false;
if($OldHashType=="ODFH") { 
	$YourPassword = PassHash2x($_POST['OldPass']); }
if($OldHashType=="IPB2") { 
	$YourPassword = hash2xkey($_POST['OldPass'],$OldSalt); }
if($OldHashType=="DF4H") { 
	$YourPassword = b64e_hmac($_POST['OldPass'],$OldJoined,$OldSalt,"sha1"); }
if($OldHashType=="iDBH2") { 
	$YourPassword = b64e_hmac($_POST['OldPass'],$OldJoined,$OldSalt,"md2"); }
if($OldHashType=="iDBH4") { 
	$YourPassword = b64e_hmac($_POST['OldPass'],$OldJoined,$OldSalt,"md4"); }
if($OldHashType=="iDBH5") { 
	$YourPassword = b64e_hmac($_POST['OldPass'],$OldJoined,$OldSalt,"md5"); }
if($OldHashType=="iDBH") { 
	$YourPassword = b64e_hmac($_POST['OldPass'],$OldJoined,$OldSalt,"sha1"); }
if($OldHashType=="iDBH1") { 
	$YourPassword = b64e_hmac($_POST['OldPass'],$OldJoined,$OldSalt,"sha1"); }
if($OldHashType=="iDBH224") { 
	$YourPassword = b64e_hmac($_POST['OldPass'],$OldJoined,$OldSalt,"sha224"); }
if($OldHashType=="iDBH256") { 
	$YourPassword = b64e_hmac($_POST['OldPass'],$OldJoined,$OldSalt,"sha256"); }
if($OldHashType=="iDBH384") { 
	$YourPassword = b64e_hmac($_POST['OldPass'],$OldJoined,$OldSalt,"sha384"); }
if($OldHashType=="iDBH512") { 
	$YourPassword = b64e_hmac($_POST['OldPass'],$OldJoined,$OldSalt,"sha512"); }
if($OldHashType=="iDBHRMD128") { 
	$YourPassword = b64e_hmac($_POST['OldPass'],$OldJoined,$OldSalt,"ripemd128"); }
if($OldHashType=="iDBHRMD160") { 
	$YourPassword = b64e_hmac($_POST['OldPass'],$OldJoined,$OldSalt,"ripemd160"); }
if($OldHashType=="iDBHRMD256") { 
	$YourPassword = b64e_hmac($_POST['OldPass'],$OldJoined,$OldSalt,"ripemd256"); }
if($OldHashType=="iDBHRMD320") { 
	$YourPassword = b64e_hmac($_POST['OldPass'],$OldJoined,$OldSalt,"ripemd320"); }
if($OldHashType=="iDBHSALSA10") { 
	$YourPassword = b64e_hmac($_POST['OldPass'],$OldJoined,$OldSalt,"salsa10"); }
if($OldHashType=="iDBHSALSA20") { 
	$YourPassword = b64e_hmac($_POST['OldPass'],$OldJoined,$OldSalt,"salsa20"); }
if($OldHashType=="iDBHSFRU") { 
	$YourPassword = b64e_hmac($_POST['OldPass'],$OldJoined,$OldSalt,"snefru"); }
if($OldHashType=="iDBHSFRU256") { 
	$YourPassword = b64e_hmac($_POST['OldPass'],$OldJoined,$OldSalt,"snefru256"); }
if($OldHashType=="iDBHGOST") { 
	$YourPassword = b64e_hmac($_POST['OldPass'],$OldJoined,$OldSalt,"gost"); }
if($OldHashType=="iDBHJOAAT") {
	$YourPassword = b64e_hmac($_POST['OldPass'],$OldJoined,$OldSalt,"joaat"); }
if($YourPassword!=$OldPassword) { $Error="Yes"; ?>
<div class="TableMessage" style="text-align: center;">Your old Password did not match.<br />&nbsp;</div>
<?php } if(pre_strlen($_POST['Password'])>"60") { $Error="Yes"; ?>
<div class="TableMessage" style="text-align: center;">Your password is too big.<br />&nbsp;</div>
<?php } if(pre_strlen($_POST['OldPass'])>"60") { $Error="Yes"; ?>
<div class="TableMessage" style="text-align: center;">Your old password is too big.<br />&nbsp;</div>
<?php } if ($_POST['Password']!=$_POST['RePassword']) { $Error="Yes";  ?>
<div class="TableMessage" style="text-align: center;">Your passwords did not match.<br />&nbsp;</div>
<?php }
	$NewIP=$_SERVER['REMOTE_ADDR'];
	if($Error!="Yes") { 
	if($_POST['Password']!="") {
	$NewSalt = salt_hmac(); $NewDay = GMTimeStamp();
	if($Settings['use_hashtype']=="md2") { $iDBHash = "iDBH2";
	$NewPassword = b64e_hmac($_POST['Password'],$OldJoined,$NewSalt,"md2"); }
	if($Settings['use_hashtype']=="md4") { $iDBHash = "iDBH4";
	$NewPassword = b64e_hmac($_POST['Password'],$OldJoined,$NewSalt,"md4"); }
	if($Settings['use_hashtype']=="md5") { $iDBHash = "iDBH5";
	$NewPassword = b64e_hmac($_POST['Password'],$OldJoined,$NewSalt,"md5"); }
	if($Settings['use_hashtype']=="sha1") { $iDBHash = "iDBH";
	$NewPassword = b64e_hmac($_POST['Password'],$OldJoined,$NewSalt,"sha1"); }
	if($Settings['use_hashtype']=="sha224") { $iDBHash = "iDBH224";
	$NewPassword = b64e_hmac($_POST['Password'],$OldJoined,$NewSalt,"sha224"); }
	if($Settings['use_hashtype']=="sha256") { $iDBHash = "iDBH256";
	$NewPassword = b64e_hmac($_POST['Password'],$OldJoined,$NewSalt,"sha256"); }
	if($Settings['use_hashtype']=="sha384") { $iDBHash = "iDBH384";
	$NewPassword = b64e_hmac($_POST['Password'],$OldJoined,$NewSalt,"sha384"); }
	if($Settings['use_hashtype']=="sha512") { $iDBHash = "iDBH512";
	$NewPassword = b64e_hmac($_POST['Password'],$OldJoined,$NewSalt,"sha512"); }
	if($Settings['use_hashtype']=="ripemd128") { $iDBHash = "iDBHRMD128";
	$NewPassword = b64e_hmac($_POST['Password'],$OldJoined,$NewSalt,"ripemd128"); }
	if($Settings['use_hashtype']=="ripemd160") { $iDBHash = "iDBHRMD160";
	$NewPassword = b64e_hmac($_POST['Password'],$OldJoined,$NewSalt,"ripemd160"); }
	if($Settings['use_hashtype']=="ripemd256") { $iDBHash = "iDBHRMD256";
	$NewPassword = b64e_hmac($_POST['Password'],$OldJoined,$NewSalt,"ripemd256"); }
	if($Settings['use_hashtype']=="ripemd320") { $iDBHash = "iDBHRMD320";
	$NewPassword = b64e_hmac($_POST['Password'],$OldJoined,$NewSalt,"ripemd320"); }
	if($Settings['use_hashtype']=="salsa10") { $iDBHash = "iDBHSALSA10";
	$NewPassword = b64e_hmac($_POST['Password'],$OldJoined,$NewSalt,"salsa10"); }
	if($Settings['use_hashtype']=="salsa20") { $iDBHash = "iDBHSALSA20";
	$NewPassword = b64e_hmac($_POST['Password'],$OldJoined,$NewSalt,"salsa20"); }
	if($Settings['use_hashtype']=="snefru") { $iDBHash = "iDBHSFRU";
	$NewPassword = b64e_hmac($_POST['Password'],$OldJoined,$NewSalt,"snefru"); }
	if($Settings['use_hashtype']=="snefru256") { $iDBHash = "iDBHSFRU256";
	$NewPassword = b64e_hmac($_POST['Password'],$OldJoined,$NewSalt,"snefru256"); }
	if($Settings['use_hashtype']=="gost") { $iDBHash = "iDBHGOST";
	$NewPassword = b64e_hmac($_POST['Password'],$OldJoined,$NewSalt,"gost"); }
	if($Settings['use_hashtype']=="joaat") { $iDBHash = "iDBHJOAAT";
	$NewPassword = b64e_hmac($_POST['Password'],$OldJoined,$NewSalt,"joaat"); }
	$_SESSION['UserPass']=$NewPassword;
	if($cookieDomain==null) {
	setcookie("SessPass", $NewPassword, time() + (7 * 86400), $cbasedir); }
	if($cookieDomain!=null) {
	if($cookieSecure===true) {
	setcookie("SessPass", $NewPassword, time() + (7 * 86400), $cbasedir, $cookieDomain, 1); }
	if($cookieSecure===false) {
	setcookie("SessPass", $NewPassword, time() + (7 * 86400), $cbasedir, $cookieDomain); } } }
	$_POST['Email'] = remove_spaces($_POST['Email']);
	if($_POST['Password']!="") {
	$querynewuserinfo = sql_pre_query("UPDATE \"".$Settings['sqltable']."members\" SET \"UserPassword\"='%s',\"HashType\"='%s',\"Email\"='%s',\"LastActive\"=%i,\"IP\"='%s',\"Salt\"='%s' WHERE \"id\"=%i", array($NewPassword,$iDBHash,$_POST['Email'],$NewDay,$NewIP,$NewSalt,$_SESSION['UserID']));
	sql_query($querynewuserinfo,$SQLStat); }
	if($_POST['Password']=="") {
	echo $querynewuserinfo = sql_pre_query("UPDATE \"".$Settings['sqltable']."members\" SET \"Email\"='%s',\"LastActive\"=%i,\"IP\"='%s' WHERE \"id\"=%i", array($_POST['Email'],$NewDay,$NewIP,$_SESSION['UserID']));
	sql_query($querynewuserinfo,$SQLStat); } } } } }
?>
<?php if($_POST['update']=="now"&&$_GET['act']!=null) {
	$profiletitle = " ".$ThemeSet['TitleDivider']." Updating Settings"; ?>
</td></tr>
<tr id="ProfileTitleEnd" class="TableMenuRow4">
<td class="TableMenuColumn4">&nbsp;</td>
</tr></table></div><?php } ?>
</td></tr>
</table>
<div class="DivProfile">&nbsp;</div>