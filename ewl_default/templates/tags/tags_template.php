<?php


if (!defined('e107_INIT')) { exit; }

// main page
$TAGS_TEMPLATE['mainpage']['start'] = " ";
$TAGS_TEMPLATE['mainpage']['tagcloud'] =  "{TAGSCLOUD}";
$TAGS_TEMPLATE['mainpage']['end'] =  " ";


//  result page
$TAGS_TEMPLATE['results']['header'] =   "  <div style='text-align:center'>	<div class='spacer'>";

$TAGS_TEMPLATE['results']['body'] = "
<div class='content-box box-default'>
	<div class='row'>
		<div class='col-md-4'> <h3>{TITLE}</h3> {PRETITLE}  {PRESUMMARY}</div>
		<div class='col-md-8'> {SUMMARY} </div>
		<div class='col-md-12'>
				<div> {OTHERTAGS} </div>
			 
		</div>
	</div>
</div>
";

$TAGS_TEMPLATE['results']['footer'] =  "   
</div> </div>
";

// final look of cloud is in parameter: number=$number&type=news&order=&template='menu' 
// tagcloud menu
$TAGS_TEMPLATE['tagcloud']['menu']['start'] = "<div class='tags'>";
$TAGS_TEMPLATE['tagcloud']['menu']['tagcloud'] =  '<a href="{TAGLINK}"  class="mind-box"  {TAGTITLE}  >{TAGKEY}</a> &nbsp;&nbsp;';  
$TAGS_TEMPLATE['tagcloud']['menu']['end'] =  "</div>";


// tagcloud menu
$TAGS_TEMPLATE['tagcloud']['default']['start'] = "<div class='tags'>";
$TAGS_TEMPLATE['tagcloud']['default']['tagcloud'] =  '<a href="{TAGLINK}"  class="mind-box"  {TAGTITLE}  >{TAGKEY}</a> &nbsp;&nbsp;';  
$TAGS_TEMPLATE['tagcloud']['default']['end'] =  "</div>";


// single item
$TAGS_TEMPLATE['tagcloud']['single']['start'] = "<div class='tags'>";
$TAGS_TEMPLATE['tagcloud']['single']['tagcloud'] =  '<a href="{TAGLINK}"  class="mind-box"  {TAGTITLE}  >{TAGKEY}</a> &nbsp;&nbsp;';
$TAGS_TEMPLATE['tagcloud']['single']['end'] =  "</div>";
 
?>