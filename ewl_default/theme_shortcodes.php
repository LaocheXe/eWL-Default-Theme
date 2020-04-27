<?php
/*
 * e107 website system
 *
 * Copyright (C) 2008-2013 e107 Inc (e107.org)
 * Released under the terms and conditions of the
 * GNU General Public License (http://www.gnu.org/licenses/gpl.txt)
 *
 * e107 Bootstrap Theme Shortcodes. 
 *
*/


class theme_shortcodes extends e_shortcode
{

  var $override = true; // override core shortcodes.
  
	protected $userReg  = false; // user registration pref.
	public $var;	
	public $pref;  
  
	function __construct()
	{
		$this->pref = e107::getPref();
    $this->themeoptions = e107::pref('themeoptions');
    // needed for login shortcodes
		$this->userReg = intval($this->pref['user_reg']);	   
	}
	
  /* general shortcode for any theme */
  /* type:  tag (default), link */
  /* class: classes list or empty  example: {THEME_FPW_LINK: class=btn btn-warning} */
 	function sc_theme_fpw_link($parm='')
	{
    $type  = vartrue($parm['type'],'tag');    
    $class = vartrue($parm['class']) ? "class='".$parm['class']."'" : ' ';
		if (!$this->pref['auth_method'] || $this->pref['auth_method'] == 'e107')
		{
			return $type == 'link' ? SITEURL.'fpw.php' : 
      "<a ".$class." id='xlogin_menu_link_fpw' href='".SITEURL."fpw.php' title=\"".LAN_LOGIN_12."\">".LAN_LOGIN_12."</a>";
		}
		return '';
	}

  /* general shortcode for any theme */
  /* type:  tag (default), link */
  /* class: classes list or empty  example: {THEME_FPW_LINK: class=btn btn-warning} */
  /* id: tag id or empty  example: {THEME_SIGNUP_LINK: class=btn btn-warning&id=login_menu_link_signup} */     
 	function sc_theme_signup_link($parm='')
	{     
    $type  = vartrue($parm['type'],'tag');    
    $class = vartrue($parm['class']) ? "class='".$parms['class']."'" : ' ';
    $id = vartrue($parms['id']) ? "id='".$parms['id']."'" : ' ';
 
		if ($this->pref['user_reg'] == 1)
		{
			if (!$this->pref['auth_method'] || $this->pref['auth_method'] == 'e107')
			{
				return $parm == 'link' ? e_SIGNUP : 
        "<a ".$class." ".$id." href='".e_SIGNUP."' title=\"".LAN_LOGIN_11."\">".LAN_LOGIN_11."</a>";
			}
 		}
		return '';
	}

  /* general shortcode for any theme, on progress, just workaround for now */	
 	function sc_theme_pagetitle($parm='')
	{   
   if(defined('PAGE_NAME') )  { return PAGE_NAME; }
   if(defined('e_PAGETITLE') )  { return e_PAGETITLE; }
   if((strpos(e_REQUEST_URI, 'login') !== false)) {return LAN_TO_LOGINPAGENAME;}
   if((strpos(e_REQUEST_URI, 'download') !== false)) {return LAN_PLUGIN_DOWNLOAD_NAME;}
  }
	
  /* level :  1  home + page stop */    
 	function sc_themebreadcrumbs($parm='')
	{
    $parms = eHelper::scParams($parm);
    $level = empty($parm['level']) ? '1' : $parm['level'];	
    //$home 	= e107::getUrl()->create('/');
    $breadcrumb = array();
    $breadcrumb[] = array('text'=> $this->sc_theme_pagetitle()); 
    if($level == 1) {
      return e107::getForm()->breadcrumb($breadcrumb);
    }
  }
 
  /*
	function sc_sitedisclaimer($copyYear = null)
	{
	  $default = "Proudly powered by <a href='http://e107.org'>e107</a> which is released under the terms of the GNU GPL License.";
		$sitedisclaimer = $this->themeoptions['site_disclaimer'][e_LANGUAGE];

		$copyYear = vartrue($copyYear, '20 BBY');
		$curYear = '22 BBY';
		$text = '&copy; ' . $copyYear . (($copyYear != $curYear) ? ' - ' . $curYear : '');

		$text .= ' ' . $sitedisclaimer;

		return e107::getParser()->toHtml($text, true, 'SUMMARY');
	}
 		
*/		
  /* custom shortcode for openmind theme using e107 menus */	
	 function sc_mind_features()  {
	 $text = '
		<section id="mind-features">
		  <div class="container">
		    <div class="row">
		      <div class="col-md-3 col-sm-6">
		      <article class="mind-features-item hover animated bounceInLeft animation-delay-8">'
		      .e107::getParser()->parseTemplate('{CMENU=mind-features-1}').'</article> <!-- mind-features-item --></div>
		      <div class="col-md-3 col-sm-6">
		      <article class="mind-features-item hover animated bounceInLeft animation-delay-3">'
		      .e107::getParser()->parseTemplate('{CMENU=mind-features-2}').'</article> <!-- mind-features-item --></div>
		      <div class="col-md-3 col-sm-6">
		      <article class="mind-features-item hover animated bounceInRight animation-delay-6">
		      '.e107::getParser()->parseTemplate('{CMENU=mind-features-3}').'</article> <!-- mind-features-item --></div>
		      <div class="col-md-3 col-sm-6">
		      <article class="mind-features-item hover animated bounceInRight animation-delay-10">'
		      .e107::getParser()->parseTemplate('{CMENU=mind-features-4}').'</article> <!-- mind-features-item --></div>      
		    </div>
		  </div>
		</section>';  
	    return $text;
	 }
  
 
 
 function sc_sitetitle() {  
  return  $this->themeoptions['sitetitle'][e_LANGUAGE];
 } 
 
 function sc_siteslogan() {    
  return $this->themeoptions['siteslogan'][e_LANGUAGE];
 } 
 

 
	function sc_social_login($parm=null)
	{
		$pref = e107::pref('core', 'social_login_active');
		
		if(empty($pref))
		{
			return; 
		}
		
		$sc = e107::getScBatch('signup');

		$text = '';

		if(!empty($parm['label']))
		{
			$text .= "<p>Sign in with:</p>";
		}

		$text .= $sc->sc_signup_xup_login($parm);
 
		
		return $text; 	
	}

	function sc_bootstrap_usernav($parm='')
	{
		include_lan(e_PLUGIN."login_menu/languages/".e_LANGUAGE.".php");
		$tp = e107::getParser();		   
		require(e_PLUGIN."login_menu/login_menu_shortcodes.php"); // don't use 'require_once'.
		
    
    if(!USERID) // Logged Out. 
		{		
      	$text = '';

				if($this->userReg == 1)
				{
					$signuplink = '<li><a class="nav-link" href="' . e_SIGNUP . '"><span class="hidden-md">' . LAN_LOGINMENU_3 . '</span></a></li>';
				}
        
        if(!empty($this->userReg)) // value of 1 or 2 = login okay.
				{
          $loginlink = '<li><a class="nav-link" href="' . e_LOGIN . '"><span class="hidden-md">' . LAN_LOGINMENU_51  . '</span></a></li>';
   
		    }
        $text =  $signuplink. $loginlink;
         
				return $tp->parseTemplate($text, true, $login_menu_shortcodes);	 
		}   
  
  
			// Logged in.
		//TODO Generic LANS. (not theme LANs)
		if(ADMIN)
		{
			$adminlink = '<li><a href="' . e_ADMIN_ABS . '"><span class="fa fa-cogs"></span> ' . LAN_LOGINMENU_11 . '</a></li>';
		}
		else
		{
			$adminlink = '';
		}
    /* PM plugin installed */
    if (e107::isInstalled('pm'))    {
      $pmlink = '<li class="dropdown">{PM_NAV}</li>';
    } 
    else '';
		$text = $pmlink.
    '<li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown">{SETIMAGE: w=20} {USER_AVATAR: shape=circle} '. USERNAME.' <b class="caret"></b></a>
		<ul class="dropdown-menu">
		<li>
			<a href="{LM_USERSETTINGS_HREF}"><span class="glyphicon glyphicon-cog"></span> '.LAN_SETTINGS.'</a>
		</li>
		<li>
			<a class="dropdown-toggle no-block" role="button" href="{LM_PROFILE_HREF}"><span class="glyphicon glyphicon-user"></span> '.LAN_LOGINMENU_13.'</a>
		</li>
		<li class="divider"></li>
    ' . $adminlink . '
		<li><a href="'.e_HTTP.'index.php?logout"><span class="glyphicon glyphicon-off"></span> '.LAN_LOGOUT.'</a></li>  	
		</ul>
		</li>';

		return $tp->parseTemplate($text,true,$login_menu_shortcodes); 
	}	
	
 	function sc_latestnews($parm='')
	{ 
    $parms = eHelper::scParams($parm);
    $tp = e107::getParser();
    $text  = $tp->parseTemplate("{MENU=news/other_news}");
		return $text;
	}	

 	function sc_latestpages($parm='')
	{ 
    $parms = eHelper::scParams($parm);
    $tp = e107::getParser();
    $text  = $tp->parseTemplate("{MENU=themeoptions/news_categories_tabs}");             
		return $text;
	}	
 
	/* example {LOGIN_TABLE_SUBMIT} */  
	/* example {LOGIN_TABLE_SUBMIT: class=btn btn-primary btn-large btn-lg pull-right} */  
	function sc_login_table_submit($parm= NULL) //FIXME use $frm
	{
    if(empty($this->pref['user_reg']))
		{
			return null;
		}
 
    $class = (!empty($parm['class'])) ? $parm['class'] : 'btn btn-primary '.$class.' button';
		return "<input class='".$class."' type='submit' name='userlogin' value=\"".LAN_LOGIN_9."\" />";
	}
}





?>
