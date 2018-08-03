<?php
/**
*
* @package Misfit_Foodie
*/

namespace Inc\Pages; 

use \Inc\Api\SettingsApi;
use \Inc\Api\Callbacks\AdminCallbacks;


class Admin 
{
	public $settings;

	public $callbacks;

	public $pages = array();

	public function register() {
		
		$this->settings = new SettingsApi();
		$this->callbacks = new AdminCallbacks();


		$this->setPages();

		$this->setSettings();
        $this->setSections();
		$this->setFields();

		$this->settings->addPages( $this->pages )->register();

	}
	//Settings for Admin Pages
	public function setPages() {
		$this->pages = [
	    	[
	    		'page_title' =>'Home Page Settings',
	    		'menu_title' =>'Home Page Settings',
	    		'capability' =>'manage_options',
	    		'menu_slug'  =>'home_page_settings',
	    		'callback'   => array( $this->callbacks,'adminDashboard' ),
	    		'icon_url'   =>'dashicons-admin-home',
	    		'position'   =>110
	    	]
    	];
	}

	public function setSettings() {
		$args = [
			[
				"option_group" => "home_page_settings_group",
				"option_name"  => "post_one_id",
				"callback"     => array( $this->callbacks,'homePageSettingsGroup')
			],
			[
				"option_group" => "home_page_settings_group",
				"option_name"  => "post_one_tag",
				"callback"     => array( $this->callbacks,'homePageSettingsGroup')
			],
			[
				"option_group" => "home_page_settings_group",
				"option_name"  => "post_one_pic",
				"callback"     => array( $this->callbacks,'homePageSettingsGroup')
			],
			[
				"option_group" => "home_page_settings_group",
				"option_name"  => "post_two_id",
				"callback"     => array( $this->callbacks,'homePageSettingsGroup')
			],
			[
				"option_group" => "home_page_settings_group",
				"option_name"  => "post_two_tag",
				"callback"     => array( $this->callbacks,'homePageSettingsGroup')
			],
			[
				"option_group" => "home_page_settings_group",
				"option_name"  => "post_two_pic",
				"callback"     => array( $this->callbacks,'homePageSettingsGroup')
			],
			[
				"option_group" => "home_page_settings_group",
				"option_name"  => "post_three_id",
				"callback"     => array( $this->callbacks,'homePageSettingsGroup')
			],
			[
				"option_group" => "home_page_settings_group",
				"option_name"  => "post_three_tag",
				"callback"     => array( $this->callbacks,'homePageSettingsGroup')
			],
			[
				"option_group" => "home_page_settings_group",
				"option_name"  => "post_three_pic",
				"callback"     => array( $this->callbacks,'homePageSettingsGroup')
			],
			[
				"option_group" => "home_page_settings_group",
				"option_name"  => "site-header-logo",
				"callback"     => array( $this->callbacks,'homePageSettingsGroup')
			],
			[
				"option_group" => "home_page_settings_group",
				"option_name"  => "about-author",
				"callback"     => array( $this->callbacks,'homePageSettingsGroup')
			],
			[
				"option_group" => "home_page_settings_group",
				"option_name"  => "author-image",
				"callback"     => array( $this->callbacks,'homePageSettingsGroup')
			],
			[
				"option_group" => "home_page_settings_group",
				"option_name"  => "facebookUrl",
				"callback"     => array( $this->callbacks,'homePageSettingsGroup')
			],
			[
				"option_group" => "home_page_settings_group",
				"option_name"  => "instagramUrl",
				"callback"     => array( $this->callbacks,'homePageSettingsGroup')
			],
			[
				"option_group" => "home_page_settings_group",
				"option_name"  => "pinterestUrl",
				"callback"     => array( $this->callbacks,'homePageSettingsGroup')
			],
			[
				"option_group" => "home_page_settings_group",
				"option_name"  => "facebookIcon",
				"callback"     => array( $this->callbacks,'homePageSettingsGroup')
			],
			[
				"option_group" => "home_page_settings_group",
				"option_name"  => "instagramIcon",
				"callback"     => array( $this->callbacks,'homePageSettingsGroup')
			],
			[
				"option_group" => "home_page_settings_group",
				"option_name"  => "pinterestIcon",
				"callback"     => array( $this->callbacks,'homePageSettingsGroup')
			],

		];
		$this->settings->setSettings( $args );
	}


	public function setSections(){
		$args = [
			[
				"id"       => "site_design_options",
				"title"    => "Site Design Options",
				"callback" => array( $this->callbacks,'homePageAdminOptions' ) ,
				"page"     => "home_page_settings"
			],
			[
				"id"       => "home_page_top_posts_options",
				"title"    => "Top 3 Posts",
				"callback" => array( $this->callbacks,'homePageAdminOptions' ),
				"page"     => "home_page_settings"
			],
			[
				"id"       => "home_page_about_author_options",
				"title"    => "About Author Section",
				"callback" => array( $this->callbacks,'homePageAdminOptions' ),
				"page"     => "home_page_settings"
			],
			[
				"id"       => "social_media_links_options",
				"title"    => "Social Media Links",
				"callback" => array( $this->callbacks,'homePageAdminOptions' ),
				"page"     => "home_page_settings"
			],
		];
		$this->settings->setSections( $args );
	}

	public function setFields(){
		$args = [
			[
				"id"       => "site_logo_image",
				"title"    => "Site Logo",
				"callback" => array( $this->callbacks,'addSiteLogo' ),
				"page"     => "home_page_settings",
				"section"  => "site_design_options",
				"args"     => "",
			],
			[
				"id"       => "top_post_one",
				"title"    => "Top Post One",
				"callback" => array( $this->callbacks,'homePageTopPostOne' ),
				"page"     => "home_page_settings",
				"section"  => "home_page_top_posts_options",
				"args"     => "",
			],
			[
				"id"       => "top_post_two",
				"title"    => "Top Post Two",
				"callback" => array( $this->callbacks,'homePageTopPostTwo'),
				"page"     => "home_page_settings",
				"section"  => "home_page_top_posts_options",
				"args"     => "",
			],
			[
				"id"       => "top_post_three",
				"title"    => "Top Post Three",
				"callback" => array( $this->callbacks,'homePageTopPostThree'),
				"page"     => "home_page_settings",
				"section"  => "home_page_top_posts_options",
				"args"     => "",
			],
			[
				"id"       => "about_author",
				"title"    => "About Author",
				"callback" => array( $this->callbacks,'homePageAboutAuthor'),
				"page"     => "home_page_settings",
				"section"  => "home_page_about_author_options",
				"args"     => "",
			],
			[
				"id"       => "social_media_fb",
				"title"    => "Facebook Url",
				"callback" => array( $this->callbacks,'facebookLink'),
				"page"     => "home_page_settings",
				"section"  => "social_media_links_options",
				"args"     => "",
			],
			[
				"id"       => "social_media_pin",
				"title"    => "Pinterest Url",
				"callback" => array( $this->callbacks,'pinterestLink'),
				"page"     => "home_page_settings",
				"section"  => "social_media_links_options",
				"args"     => "",
			],
			[
				"id"       => "social_media_insta",
				"title"    => "Instagram Url",
				"callback" => array( $this->callbacks,'instagramLink'),
				"page"     => "home_page_settings",
				"section"  => "social_media_links_options",
				"args"     => "",
			],
		];
		$this->settings->setFields( $args );
	}
};