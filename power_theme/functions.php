<?php
// Setup  -- Probably want to keep this stuff... 

/**
 * Hello and welcome to Base! First, lets load the PageLines core so we have access to the functions 
 */	
require_once( dirname(__FILE__) . '/setup.php' );
	
// For advanced customization tips & code see advanced file.
	//--> require_once(STYLESHEETPATH . "/advanced.php");
	
// ====================================================
// = YOUR FUNCTIONS - Where you should add your code  =
// ====================================================


$support = new PageLinesThemeSupport;

// Disable the color control panel in admin, also prevent defaults from showing (the false)

//$support->DisableCoreColor();

$support->SetBaseColor( '#F1F1F1' );

$support->Integration('vanilla');
$support->Integration('wiki');


// Set default settings when users activate your theme or reset their settings.
pl_default_setting( array( 'key' => 'type_headers', 'value' => array('font' => 'molengo', 'weight' => 'bold' ) ) );
pl_default_setting( array( 'key' => 'type_primary', 'value' => array('font' => 'lucida_grande' ) ) );


pl_support_section( array( 'slug' => 'pagelines-reader', 'class_name' => 'plReader', 'disable_color' => false ) );
pl_support_section( array( 'slug' => 'pagelines-profiles', 'class_name' => 'PLProfiles', 'disable_color' => true ) );
pl_support_section( array( 'slug' => 'pagelines-pricing', 'class_name' => 'PLPricing', 'disable_color' => false ) );
pl_support_section( array( 'slug' => 'about_set_1', 'class_name' => 'fboxes', 'disable_color' => false ) );

	// Add Base Page
if ( function_exists( 'pagelines_add_page' ) ) pagelines_add_page('about', 'About Us Page');

// ABOUT HOOKS --------//
	// Hooks are a way to easily add custom functions and content to PageLines. There are hooks placed strategically throughout the theme 
	// so that you insert code and content with ease.


// ABOUT FILTERS ----------//

	// Filters allow data modification on-the-fly. Which means you can change something after it was read and compiled from the database,
	// but before it is shown to your visitor. Or, you can modify something a visitor sent to your database, before it is actually written there.

// FILTERS EXAMPLE ---------//

	// The following filter will add the font  Ubuntu into the font array $thefoundry.
	// This makes the font available to the framework and the user via the admin panel.

	function get_my_welcome_billboard(){
		
		$my_bill = '<div class="admin_billboard fix"><div class="admin_billboard_pad fix">';
		$my_bill .= '<div class="admin_theme_screenshot"><img class="" src="'.CHILD_URL.'/screenshot.png" alt="Screenshot" /></div>';
		$my_bill .= sprintf( '<div class="admin_billboard_content"><div class="admin_header"><h3 class="admin_header_main">%s</h3></div>' , __( 'Bring on the Power!', 'pagelines' ) );
		$my_bill .= __( "<div class='admin_billboard_text'>Welcome to your PageLines site. Hope you enjoy your new theme!<br/> Here are a few tips to get you started...<br/><small>(Note: This intro can be removed below.)</small></div>", 'pagelines' );
		$my_bill .= '<div class="clear"></div></div></div></div>';
		
		return apply_filters('pagelines_welcome_billboard', $my_bill);
	}	