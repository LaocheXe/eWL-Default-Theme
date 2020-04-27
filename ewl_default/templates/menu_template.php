<?php


#### Panel Template - Used by menu_class.php  for Custom Menu Content. 


	$MENU_TEMPLATE['default']['start'] 					= ''; 
	$MENU_TEMPLATE['default']['body'] 					= '{CMENUBODY}'; 
	$MENU_TEMPLATE['default']['end'] 					= ''; 

	$MENU_TEMPLATE['button']['start'] 					= '<div class="cpage-menu">'; 
	$MENU_TEMPLATE['button']['body'] 					= '<div>{CMENUBODY}</div>{CPAGEBUTTON}';
	$MENU_TEMPLATE['button']['end'] 					= '</div>'; 
  
	$MENU_TEMPLATE['mind-features']['start'] 					= ' '; 
	$MENU_TEMPLATE['mind-features']['body'] 					= '                       
                           <div class="item-icon">
                               {CMENUICON}
                           </div>
                           <div class="item-content">
                               <h3>{CMENUTITLE}</h3>
                                {CMENUBODY}   
                                {CPAGEBUTTON}                              
                           </div>
                       ';
	$MENU_TEMPLATE['mind-features']['end'] 					= ' ';

	### Additional control over image thumbnailing is possible via SETIMAGE e.g. {SETIMAGE: w=200&h=150&crop=1}
   
	$MENU_TEMPLATE['buttom-image']['start'] 			= '{SETIMAGE: w=400&h=400&crop=1}<div class="cpage-menu">'; 
	$MENU_TEMPLATE['buttom-image']['body'] 				= '<div>{CMENUIMAGE}</div>{CPAGEBUTTON}';
	$MENU_TEMPLATE['buttom-image']['end'] 				= '</div>'; 

	$MENU_TEMPLATE['image-text-button']['start'] 		= '{SETIMAGE: w=300&h=300&crop=1}<div class="cpage-menu {CMENUNAME}">';
	$MENU_TEMPLATE['image-text-button']['body'] 		= '{CMENUIMAGE}{CMENUBODY}{CPAGEBUTTON}';
	$MENU_TEMPLATE['image-text-button']['end'] 			= '</div>';
    

	$MENU_TEMPLATE['2-column_1:1_text-left']['start'] 	= '{SETIMAGE: w=700&h=450}'; 
	$MENU_TEMPLATE['2-column_1:1_text-left']['body'] 	= '			
													       <div class="cpage-menu col-lg-6 col-md-6 col-sm-6"><h2>{CMENUICON}{CMENUTITLE}</h2>{CMENUBODY}<p>{CPAGEBUTTON}</p></div>
													       <div class="cpage-menu col-lg-6 col-md-6 col-sm-6">{CMENUIMAGE}</div>
													       '; 
	$MENU_TEMPLATE['2-column_1:1_text-left']['end'] 	= ''; 
	
	
	$MENU_TEMPLATE['2-column_1:1_text-right']['start'] = '{SETIMAGE: w=700&h=450}'; 
	$MENU_TEMPLATE['2-column_1:1_text-right']['body'] 	= '
															<div class="cpage-menu col-lg-6 col-md-6 col-sm-6">{CMENUIMAGE}</div>
															<div class="cpage-menu col-lg-6 col-md-6 col-sm-6"><h2>{CMENUICON}{CMENUTITLE}</h2>{CMENUBODY}<p>{CPAGEBUTTON}</p></div>
														'; 		
	$MENU_TEMPLATE['2-column_1:1_text-right']['end'] 	= ''; 
          
 
	$MENU_TEMPLATE['home_recent_work']['start'] 	= '	     <div class="col-xs-12 text-center">
                        <h2 class="section-title text-center"> {CHAPTER_NAME}</h2>
                        <h3 class="section-title"><small> {CHAPTER_DESCRIPTION} </small> </h3>
                    </div>'; 
	$MENU_TEMPLATE['home_recent_work']['body'] 	= '
                    <div class="col-md-4 col-sm-6">
                        <div class="img-caption">
                            {CMENUIMAGE}
                            <div class="caption">
                                <div class="caption-content">
                                    <a href="{CMENUURL}" class="animated fadeInDown"><i class="fa fa-search"></i>'.LAN_READ_MORE.'</a>
                                    <h4>{CMENUTITLE}</h4>
                                </div>
                            </div>
                        </div>
                    </div>
													       '; 
	$MENU_TEMPLATE['home_recent_work']['end'] 	= '';  
 
 
 
       
         
	
	
?>