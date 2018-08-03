<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Misfit_Foodie
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<!-- Global site tag (gtag.js) - Google Analytics -->
	<!-- <script async src="https://www.googletagmanager.com/gtag/js?id=UA-116340815-1"></script>
	<script>
	  window.dataLayer = window.dataLayer || [];
	  function gtag(){dataLayer.push(arguments);}
	  gtag('js', new Date());

	  gtag('config', 'UA-116340815-1');
	</script> -->

	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<meta name="description" content="Creating food and drinks that are as beautiful and fun as they are delicious." />
	<meta name="keywords" content="partylicious, party, parties, macarons, cake, cookies, cupcakes, cocktails, baking, party appetizers" />
	<?php wp_head(); ?>
		
	<!-- HTML5 shiv and Respond.js IE8 support of HTML5 elements and media queries -->
	<!--[if lt IE 9]>
	<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
	<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->
</head>

<body class="m-0 p-0" <?php body_class(); ?> >
	<?php 
		$siteLogo       = esc_attr( get_option('site-header-logo') );
		
	?>

	<div id="page" class="site">
		<div class="fixed_top">
			
		</div>
		<!-- HEADER
		================================================== -->
		<div class="container">
		<header class="header" role="banner">
			<div class="header__logo-container">
				<!-- SITE LOGO -->
				<div class="col header__logo">
					<a href="<?php echo home_url();?>">
						<img src="<?php echo $siteLogo; ?>"/>
						<h1>Partylicious Food Blog</h1>
					</a>
				</div>
				
				<div class="col mobile-container p-0">
					<!-- MOBILE NAVIGATION -->
					<div class="mobile-navigation">
						<input type="checkbox" id="mobile-nav" class="mobile-navigation__checkbox">
						<label for="mobile-nav" class="mobile-navigation__button">
							<span class="mobile-navigation__icon"></span>
						</label>
						<!-- DROPDOWN -->
						<?php 
							wp_nav_menu( array(
								'theme_location'    => 'mobile',
								'container'         => 'nav',
								'container_class'   => 'mobile-navigation__nav',
								'menu_class'        => 'mobile-navigation__ul',
								'container_id'      => 'mobileNav'
							) );
						?>
					</div> 
				
					<!-- TOP NAVIGATION -->
					<?php 
						wp_nav_menu( array(
							'theme_location'    => 'top_header',
							'container'         => 'nav',
							'container_class'   => 'navigation',
							'menu_class'        => 'navigation__ul navigation__social',
							'container_id'      => 'topNav'
						) );
					?>
					
				</div>
			</div>
			<div class="row mb-4">
				<div class="col-md-6" id="bottom_nav_menu">
					<?php 
						wp_nav_menu( array(
							'theme_location'    => 'primary',
							'container'         => 'nav',
							'container_class'   => 'navigation',
							'menu_class'        => 'navigation__ul',
							'container_id'      => 'mainNav'
						) );
					?>
				</div>
				<div class="col-6 search">
					<?php 
						get_search_form(); 
					?>
				</div>
			</div>
		
		<!-- MOBILE SEARCH -->
		<div class="mobile_search mt-4 mb-4">
			<form role="search" method="get" action="<?php echo home_url('/');?>"class="mobile_search__form">
				<input type="search" class="mobile_search__input" placeholder="Search" value="<?php get_search_query(); ?>" name="s" title="Search">
				<input type="submit" value="Search" class="mobile_search__button">
			</form>		
		</div>
	
		</header> <!-- End Header -->
		
		<div id="content" class="site-content">