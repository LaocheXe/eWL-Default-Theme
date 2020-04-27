<?php
/*
+ ----------------------------------------------------------------------------+
|     e107 website system
|
|     Copyright (C) 2001-2002 Steve Dunstan (jalist@e107.org)
|     Copyright (C) 2008-2010 e107 Inc (e107.org)
|
|
|     Released under the terms and conditions of the
|     GNU General Public License (http://gnu.org).
|
|     $URL: https://e107.svn.sourceforge.net/svnroot/e107/trunk/e107_0.7/e107_plugins/content/templates/content_type_template.php $
|     $Revision: 11678 $
|     $Id: content_type_template.php 11678 2010-08-22 00:43:45Z e107coders $
|     $Author: e107coders $
+----------------------------------------------------------------------------+
*/


global $sc_style;

$sc_style['CONTENT_TYPE_TABLE_TOTAL']['pre'] = "";
$sc_style['CONTENT_TYPE_TABLE_TOTAL']['post'] = " ";

$sc_style['CONTENT_TYPE_TABLE_HEADING']['pre'] = "";
$sc_style['CONTENT_TYPE_TABLE_HEADING']['post'] = "";

$sc_style['CONTENT_TYPE_TABLE_SUBHEADING']['pre'] = "";
$sc_style['CONTENT_TYPE_TABLE_SUBHEADING']['post'] = "";

$sc_style['CONTENT_TYPE_TABLE_LINK']['pre'] = "";
$sc_style['CONTENT_TYPE_TABLE_LINK']['post'] = "";

// ##### CONTENT TYPE LIST --------------------------------------------------
if(!isset($CONTENT_TYPE_TABLE_START)){
	$CONTENT_TYPE_TABLE_START = '<div class="row"> ';
}
if(!isset($CONTENT_TYPE_TABLE)){
	$CONTENT_TYPE_TABLE = '
	<div class="col-md-6">
	<div class="content-box box-default contentCard">
                     
                        <div class="col-md-12">
                            {CONTENT_TYPE_TABLE_ICON}
                        </div>
                        <div class="col-md-12 padding-10 ">
                            <h4 class="content-box-title">{CONTENT_TYPE_TABLE_HEADING}</h4>
                            <p>{CONTENT_TYPE_TABLE_SUBHEADING}</p>
                            </div>
                         <div class="col-md-12 padding-10 ">
                            <a href="{CONTENT_CAT_TABLE_URL}"   class="btn  btn-primary">{CONTENT_TYPE_TABLE_TOTAL}</a>
                        </div>
                              
                        <div class="col-md-12 padding-10 ">
												     {CONTENT_TYPE_TABLE_LINK} 
                        </div>
                     
  </div> </div>
	';
 
}
if(!isset($CONTENT_TYPE_TABLE_SUBMIT)){
	$CONTENT_TYPE_TABLE_SUBMIT = "
	<tr class='content_type_table_submit'>
		<td class='forumheader3' style='width:5%; white-space:nowrap; padding-bottom:5px;' rowspan='2'>{CONTENT_TYPE_TABLE_SUBMIT_ICON}</td>
		<td class='fcaption' colspan='2'>{CONTENT_TYPE_TABLE_SUBMIT_HEADING}</td>
	</tr>
	<tr><td class='forumheader2' colspan='2'>{CONTENT_TYPE_TABLE_SUBMIT_SUBHEADING}</td></tr>\n";
}
if(!isset($CONTENT_TYPE_TABLE_MANAGER)){
	$CONTENT_TYPE_TABLE_MANAGER = "
	<tr class='content_type_table_manager'>
		<td class='forumheader3' style='width:5%; white-space:nowrap; padding-bottom:5px;' rowspan='2'>{CONTENT_TYPE_TABLE_MANAGER_ICON}</td>
		<td class='fcaption' colspan='2'>{CONTENT_TYPE_TABLE_MANAGER_HEADING}</td>
	</tr>
	<tr><td class='forumheader2' colspan='2'>{CONTENT_TYPE_TABLE_MANAGER_SUBHEADING}</td></tr>\n";
}
if(!isset($CONTENT_TYPE_TABLE_LINE)){
	$CONTENT_TYPE_TABLE_LINE = "";
}
if(!isset($CONTENT_TYPE_TABLE_END)){
	$CONTENT_TYPE_TABLE_END = "
	</div> ";
}
// ##### ----------------------------------------------------------------------

?>