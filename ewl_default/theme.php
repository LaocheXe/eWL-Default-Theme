<?php
//////////////////////////////////////////////////////////////
/************************************************************
 * eWL Default - A Bootstrap 3 styled theme for e107 v2.x	*
 * Created on 04-16-2020									*
 * By Travis "LaocheXe" Thoene								*
 ************************************************************
 *CHANGE LOG:												*
 *	04-16-2020:Creation Date								*
 *	04-17-2020:Start Desiging off old theme from 2012		*
 *	04-18-2020:Continuation of styling of theme				*
 ************************************************************
 *///////////////////////////////////////////////////////////
if (!defined('e107_INIT')) { exit; }

define("BOOTSTRAP", 	3);
define("FONTAWESOME", 	4);
define('VIEWPORT', 		"width=device-width, initial-scale=1.0");

// you need this if your login page has header and footer  
if((strpos(e_REQUEST_URI, 'login') !== false)) {define('e_IFRAME','0');} 

e107::lan('theme');

e107::library('load', 'bootstrap');
e107::library('load', 'fontawesome');


e107::css('theme',    'css/animate.min.css');
//e107::css('theme',    'css/lightbox.css');


e107::js("theme", "js/jquery.matchHeight-min.js");

e107::js("footer-inline",   "$('.contentCard').matchHeight({
    byRow: true,
    property: 'height',
    target: null,
    remove: false
});");

// @see https://www.cdnperf.com
// Warning: Some bootstrap CDNs are not compiled with popup.js
// use https if e107 is using https.
//e107::js("url", 			"https://cdn.jsdelivr.net/bootstrap/3.3.6/js/bootstrap.min.js", 'jquery', 2);

//e107::css('theme',		"css/OverlayScrollbars.css");

//if(e107::isInstalled('livetime'))
//{
//	e107::js('livetime', "js/libs/moment/moment.js");
//	e107::js('livetime', "js/libs/livestamp/livestamp.min.js");
//}

e107::css('url',    'https://cdn.jsdelivr.net/fontawesome/4.5.0/css/font-awesome.min.css');

e107::js('theme',		    'js/bootstrap-dropdown-multilevel.js');
//e107::css('theme', 			'css/bootstrap-dropdown-multilevel.css'); // <-- Was moved into style.css


e107::js("footer-inline", 	"$('.e-tip').tooltip({container: 'body'})"); // activate bootstrap tooltips.

					
define('OTHERNEWS_COLS',false); // no tables, only divs. 
define('OTHERNEWS_LIMIT', 3); // Limit to 3. 
define('OTHERNEWS2_COLS',false); // no tables, only divs. 
define('OTHERNEWS2_LIMIT', 3); // Limit to 3. 
//define('COMMENTLINK', 	e107::getParser()->toGlyph('fa-comment'));
define('COMMENTOFFSTRING', '');

define('PRE_EXTENDEDSTRING', '<br />');

/**
 * @param string $caption
 * @param string $text
 * @param string $id : id of the current render
 * @param array $info : current style and other menu data. 
 */
function tablestyle($caption, $text, $id='', $info=array()) 
{	
	$style = $info['setStyle'];
	
	echo "<!-- tablestyle: style=".$style." id=".$id." -->\n\n";
	
	$type = $style;
	if(empty($caption))
	{
		$type = 'box';
	}
	
	if($style == 'navdoc' || $style == 'none')
	{
		echo $text;
		return;
	}
	
	/*
	if($id == 'wm') // Example - If rendered from 'welcome message' 
	{
		
	}
	
	if($id == 'featurebox') // Example - If rendered from 'featurebox' 
	{
		
	}	
	*/
	
	
	if($style == 'jumbotron')
	{
		echo '<div class="jumbotron">
      	<div class="container">';
        	if(!empty($caption))
	        {
	            echo '<h1>'.$caption.'</h1>';
	        }
        echo '
        	'.$text.'
      	</div>
    	</div>';	
		return;
	}
	
	if($style == 'col-md-4' || $style == 'col-md-6' || $style == 'col-md-8')
	{
		echo ' <div class="col-xs-12 '.$style.'">';
		
		if(!empty($caption))
		{
            echo '<h2>'.$caption.'</h2>';
		}

		echo '
          '.$text.'
        </div>';
		return;	
		
	}
		
	if($style == 'menu')
	{
		echo '<div class="panel panel-default">
	  <div class="panel-heading">'.$caption.'</div>
	  <div class="panel-body">
	   '.$text.'
	  </div>
	</div>';
		return;
		
	}	

	if($style == 'portfolio')
	{
		 echo '
		 <div class="col-lg-4 col-md-4 col-sm-6">
            '.$text.'
		</div>';	
		return;
	}



	// default.

	if(!empty($caption))
	{
		echo '<h2 class="caption">'.$caption.'</h2>';
	}

	echo $text;


					
	return;
	
	
	
}


if($theme_pref['shrinkenable'] == 'disable')
{
	$shrink_enas = '<div class="navbar navbar-inverse navbar-fixed-top" role="navigation">';
	$shrink_enae = '</div>';
	$active_enae = '';
}
elseif($theme_pref['shrinkenable'] == 'enable')
{
	$shrink_enas = '<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">';
	$shrink_enae = '</nav>';
	$active_enae = '';
}

$portimgw = $theme_pref['imagewport'];
$portimgh = $theme_pref['portimageh'];

if($theme_pref['portfolio'] == 'disable')
{
	$portfolio .='';
}
elseif($theme_pref['portfolio'] == 'enable')
{
	$portfolio .='
		<div class="section">

      <div class="container">

        <div class="row">
          <div class="col-lg-12 text-center">
            <h2>'.$theme_pref['portfoliohd'].'</h2>
            <hr>
          </div>
          
		  {SETSTYLE=portfolio}
		  {SETIMAGE: w='.$portimgw.'&h='.$portimgh.'&crop=1}
		  {GALLERY_PORTFOLIO: placeholder=1&limit=6}   
		  
        </div><!-- /.row -->

      </div><!-- /.container -->

    </div><!-- /.section -->
	';
}

// Default Header for bootstrap - replacing with old header for... testing
/*$LAYOUT['_header_'] = '
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="{SITEURL}">{BOOTSTRAP_BRANDING}</a>
        </div>
        <div class="navbar-collapse collapse {BOOTSTRAP_NAV_ALIGN}">
        	{NAVIGATION=main}
         	{BOOTSTRAP_USERNAV: placement=top}
        </div><!--/.navbar-collapse -->
      </div>
';*/

/*
$LAYOUT['_header_'] = '
	<div class="boxed animated fadeIn animation-delay-5">
    <header id="header" class="hidden-xs">
	<table width="100%" cellspacing="0" cellpadding="0">
		<tbody>
			<tr>
				<div class="left-container">
				{SEARCH}  
				</div>
				<div class="center-container">   
					<div id="header-title">
						<h1 class="animated fadeInDown"><a href="{SITEURL}">{SITELOGO: h=156}</a></h1>           
						<!--<p class="animated fadeInLeft">{SITESLOGAN}</p>-->  
					</div>
					{XURL_ICONS}
               
                
				</div>
				<div class="right-container">
			</div><!-- container -->
		<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
<script>
  (adsbygoogle = window.adsbygoogle || []).push({
    google_ad_client: "ca-pub-8745081078875754",
    enable_page_level_ads: true
  });
</script>
    </header> <!-- header -->

   <nav class="navbar navbar-static-top navbar-mind" role="navigation">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <a class="navbar-brand visible-xs" href="{SITEURL}">{SITETITLE}</a>
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-mind-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <i class="fa fa-bars fa-inverse"></i>
                </button>
            </div>
            
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse navbar-mind-collapse">
               <ul class="nav navbar-nav">
               {NAVIGATION=main}  
               </ul>     
               <ul class="nav navbar-nav navbar-right">      
               {BOOTSTRAP_USERNAV}
               </ul>
            </div><!-- navbar-collapse -->
        </div> <!-- container -->
    </nav> <!-- navbar navbar-default -->        
';
*/

/*
$LAYOUT['_header_'] = '
	<div class="boxed animated fadeIn animation-delay-5">
    <header id="header" class="hidden-xs">
	<table width="100%" cellspacing="0" cellpadding="0">
		<tbody>
			<tr>
				<td style="position:absolute; background: transparent; width:50%; margin-top: 2px;  margin-left: 5px;" align="left">
				{SEARCH}
				</td>
			</tr>
			<tr>
				<td class="header-title" align="center">
					<h1 class="animated fadeInDown"><a href="{SITEURL}">{SITELOGO}</a></h1>           
					<!--<p class="animated fadeInLeft">{SITESLOGAN}</p>-->  
				</td>
			</tr>
			<tr>
				<td align="right">
					{XURL_ICONS}
                </td>
            </tr>
		</tbody>
	</table><!-- container -->
		<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
<script>
  (adsbygoogle = window.adsbygoogle || []).push({
    google_ad_client: "ca-pub-8745081078875754",
    enable_page_level_ads: true
  });
</script>
    </header> <!-- header -->

   <nav class="navbar navbar-static-top navbar-mind" role="navigation">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <a class="navbar-brand visible-xs" href="{SITEURL}">{SITETITLE}</a>
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-mind-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <i class="fa fa-bars fa-inverse"></i>
                </button>
            </div>
            
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse navbar-mind-collapse">
               <ul class="nav navbar-nav">
               {NAVIGATION=main}  
               </ul>     
               <ul class="nav navbar-nav navbar-right">      
               {BOOTSTRAP_USERNAV}
               </ul>
            </div><!-- navbar-collapse -->
        </div> <!-- container -->
    </nav> <!-- navbar navbar-default -->        
';
*/

$LAYOUT['_header_']  ='
	<div class="boxed animated fadeIn animation-delay-5">
    <header id="header" class="hidden-xs">
		  <div class="row">
			{SEARCH}
		  </div>
		  <div class="header-title">
			<h1 class="animated fadeInDown">
			  <a href="{SITEURL}">{SITELOGO}</a>
			</h1><!--<p class="animated fadeInLeft">{SITESLOGAN}</p>-->
		  </div>
		  <div class="row">
			
		  </div>
	</div>
<script>
  (adsbygoogle = window.adsbygoogle || []).push({
    google_ad_client: "ca-pub-8745081078875754",
    enable_page_level_ads: true
  });
</script>
    </header> <!-- header -->

   <nav class="navbar navbar-static-top navbar-mind" role="navigation">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <a class="navbar-brand visible-xs" href="{SITEURL}">{SITETITLE}</a>
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-mind-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <i class="fa fa-bars fa-inverse"></i>
                </button>
            </div>
            
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse navbar-mind-collapse">
               <ul class="nav navbar-nav">
               {NAVIGATION=main}  
               </ul>     
               <ul class="nav navbar-nav navbar-right">      
               {BOOTSTRAP_USERNAV}
               </ul>
            </div><!-- navbar-collapse -->
        </div> <!-- container -->
    </nav> <!-- navbar navbar-default --> 
	';

// applied after every layout. 
$LAYOUT['_footer_'] = '<hr>
</div> <!-- /container -->
{SETSTYLE=default}
<footer>
	<!--<div class="container">-->
	<div class="fullbottom">
		<div class="row">

			<div>
				<div class="col-lg-6">
					<div>{MENU=100}</div>
				</div>
				<div class="col-lg-6">
					<div>{MENU=101}</div>
				</div>
			</div>

			<div>
				<div class="col-sm-12 col-lg-4">
					{MENU=102}
				</div>

				<div class="col-sm-12 col-lg-8">
					{MENU=103}
				</div>
			</div>

			<div >
				<div class="col-lg-12">
					{MENU=104}
				</div>
			</div>

			<div>
				<div class="col-lg-6">
					<div>{MENU=105}</div>
					<div>{NAVIGATION=footer}</div>
					<div>{MENU=106}</div>
				</div>
				<div class="col-lg-6 text-right">
					{XURL_ICONS: size=5x}
				</div>
			</div>

			<div>
				<div class="col-lg-12">
					<div>{MENU=107}</div>
				</div>
			</div>

			<div>
				<div id="sitedisclaimer" class="col-lg-12 text-center">
					<small ><div>{SITEDISCLAIMER}</div></small>
				</div>
			</div>

		</div>	 <!-- /row -->
	</div> <!-- /container -->
</footer>
';


$LAYOUT['classic_four_wide'] =  '   
	{SETSTYLE=default}
	<div class="container_wide">	
	{ALERTS}
		<div class="row">
			{SETSTYLE=menu}  
			<div class="col-xxs-12 col-xs-12 col-md-2 col-sm-4 ffimgfix">  
				{MENU=1}
			</div>
			<div class="col-xxs-12 col-xs-12 col-md-8 col-sm-8  ">
				{MENU=2}  		
					{---}
				{MENU=3}
			</div>
			<div class="col-xxs-12 col-xs-12 col-md-2 col-sm-12  ">
				{MENU=4}
			</div>
      </div>
	  <div class="col-lg-6">
			<div>{MENU=5}</div>
		</div>
		<div class="col-lg-6">
			<div>{MENU=6}</div>
		</div>
	<div class="container">
	';

$LAYOUT['classic_wide'] =  '   
	{SETSTYLE=default}
	<div class="container_wide">	
	{ALERTS}
		<div class="row">
			{SETSTYLE=menu}  
			<div class="col-xxs-12 col-xs-12 col-md-2 col-sm-4 ffimgfix">  
				{MENU=1}
			</div>
			<div class="col-xxs-12 col-xs-12 col-md-8 col-sm-8  ">
				 		
					{---}
				{MENU=3}
			</div>
			<div class="col-xxs-12 col-xs-12 col-md-2 col-sm-12  ">
				{MENU=4}
			</div>
      </div>
	  <div class="col-lg-6">
			<div>{MENU=5}</div>
		</div>
		<div class="col-lg-6">
			<div>{MENU=6}</div>
		</div>
	<div class="container">
	';
	
$LAYOUT['classic_lefty_wide'] =  '   
	{SETSTYLE=default}
	<div class="container_wide">	
	{ALERTS}
		<div class="row">
			{SETSTYLE=menu}  
			<div class="col-xxs-12 col-xs-12 col-md-2 col-sm-4 ffimgfix">  
				{MENU=1}
			</div>
			<div class="col-xxs-12 col-xs-12 col-md-8 col-sm-8  ">
				 		
					{---}
				{MENU=3}
			</div>
			<div class="col-xxs-12 col-xs-12 col-md-2 col-sm-12  ">
				
			</div>
      </div>
	  <div class="col-lg-6">
			<div>{MENU=5}</div>
		</div>
		<div class="col-lg-6">
			<div>{MENU=6}</div>
		</div>
	<div class="container">
	';
	
	$LAYOUT['classic_righty_wide'] =  '   
	{SETSTYLE=default}
	<div class="container_wide">	
	{ALERTS}
		<div class="row">
			{SETSTYLE=menu}  
			<div class="col-xxs-12 col-xs-12 col-md-2 col-sm-4 ffimgfix">  
				
			</div>
			<div class="col-xxs-12 col-xs-12 col-md-8 col-sm-8  ">
				 		
					{---}
				{MENU=3}
			</div>
			<div class="col-xxs-12 col-xs-12 col-md-2 col-sm-12  ">
				{MENU=4}
			</div>
      </div>
	  <div class="col-lg-6">
			<div>{MENU=5}</div>
		</div>
		<div class="col-lg-6">
			<div>{MENU=6}</div>
		</div>
	<div class="container">
	';

/* XXX EVERYTHING BELOW THIS POINT IS UNUSED FOR NOW */



// HERO http://twitter.github.com/bootstrap/examples/hero.html
//FIXME insert shortcodes while maintaining only bootstrap classes. 


 
$NEWSCAT = "\n\n\n\n<!-- News Category -->\n\n\n\n
	<div style='padding:2px;padding-bottom:12px'>
	<div class='newscat_caption'>
	{NEWSCATEGORY}
	</div>
	<div style='width:100%;text-align:left'>
	{NEWSCAT_ITEM}
	</div>
	</div>
";


$NEWSCAT_ITEM = "\n\n\n\n<!-- News Category Item -->\n\n\n\n
		<div style='width:100%;display:block'>
		<table style='width:100%'>
		<tr><td style='width:2px;vertical-align:middle'>&#8226;&nbsp;</td>
		<td style='text-align:left;height:10px'>
		{NEWSTITLELINK}
		</td></tr></table></div>
";

?>
