<?php

//require_once( get_stylesheet_directory(). "/custom-framework/headers/header-v2.php");

/*  add a new menu override the v2 header menu. */
if(! $smof_data['disable_megamenu']) {	
	
	/*  Initialize the mega menu framework */
	require_once( get_template_directory() . '/framework/mega-menu-framework.php' );

	/*  override the Avada Theme menu to create a page indicator */
	function create_avada_child_menu() {
		global $child_main_menu;

		@$child_main_menu = wp_nav_menu(array(
				'theme_location'	=> 'main_navigation',
				'depth'				=> 1,
				'container' 		=> false,
				'items_wrap' 		=> '%3$s',
				'menu_id'			=> 'testing',
				'menu_class'		=> 'nav fusion-navbar-nav flat',
				'fallback_cb'	   => 'FusionCoreFrontendWalker::fallback',
				'walker'			=> new FusionCoreFrontendWalker(),
				'echo' 				=> false,
				'after'				=> '<span class="indicator"></span>'
			));
	}
} else {
	
	function create_avada_child_menu() {
		global $child_main_menu;

		@$child_main_menu = wp_nav_menu(array(
			'theme_location' => 'main_navigation', 
			'depth' => 1, 
			'container' => false, 
			'fallback_cb' => 'default_menu_fallback', 
			'items_wrap' => '%3$s',
			'menu_id'			=> 'flat',			
			'menu_class'	=> 'nav fusion-navbar-nav flat', 
			'echo' => false, 
			'after' => '<span></span>'
		));
	}	
	
	function default_menu_fallback( $args ) {
		return $null;
	}
}
add_action( 'wp_head', 'create_avada_child_menu', 14 );	

/*  create Services page menu. */
function create_services_menu() {
		global $services_menu;
		
		@$services_menu = wp_nav_menu(array(
			'theme_location' => 'services_navigation', 
			'depth' => 5, 
			'container' => false, 
			'fallback_cb' => 'default_menu_fallback', 
			'items_wrap' => '%3$s',		
			'menu_class'	=> 'nav services-navbar-nav', 
			'echo' => false
		));
}
add_action( 'wp_head', 'create_services_menu' );

/*  register the Services page menu */
function register_services_menu() {
  register_nav_menu( 'services_navigation', 'Services Menu' );
}	
add_action( 'after_setup_theme', 'register_services_menu' );


/*
*  Contact Form - Submit and send results to a PDF file.
*/
function save_application_form($cf7) {
	
	$id = $cf7->id();
	$wpcf7 = WPCF7_ContactForm::get_current();
	$wpcf7->skip_mail = true;
	$total_questions = count($wpcf7->posted_data);
	if( $id == 173	)
	{
		$question_one = $cf7->posted_data["question-one"];
		$question_two = $cf7->posted_data["question-two"];
		$question_three = $cf7->posted_data["question-three"];
		$question_four = $cf7->posted_data["question-four"];
		$question_five = $cf7->posted_data["question-five"];
		$question_six = $cf7->posted_data["question-six"];
		$question_seven = $cf7->posted_data["question-seven"];
		$question_eight = $cf7->posted_data["question-eight"];
		$question_nine = $cf7->posted_data["question-nine"];
		$question_ten = $cf7->posted_data["question-ten"];
		
	}
}
add_action( 'wpcf7_before_send_mail', 'save_application_form');
