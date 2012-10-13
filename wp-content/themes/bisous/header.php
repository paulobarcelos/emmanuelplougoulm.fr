<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes(); ?>>
	<head profile="http://gmpg.org/xfn/11">
		<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
		<link rel="icon" href="<?php bloginfo('stylesheet_directory');?>/images/favicon.png" />
		<?php if (is_home()) {?>
			<?php 
			$aboutPage = get_page_by_title('About');
			$aboutPageID = $aboutPage->ID;
					
			$simpleFields = simple_fields_get_post_group_values($aboutPageID,"Info", true, 1);
			
			$metaDescription = $simpleFields["About this site (Google - 160 characters)"][0];
			?>
			<meta name="description" content ="<?php echo $metaDescription;?>"/>
		<?php }elseif (is_single() || is_page()) { ?>
			<?php if (have_posts()){?>
				<?php while (have_posts()){?>
				 	<?php the_post(); ?>
				 	<?php $excerpt =  htmlentities(get_the_excerpt());?>
				 	<?php if ($excerpt != ""){?>
				 		<meta name="description" content="<?php echo $excerpt; ?>" />
				 	<?php }?>
				 <?php }?>
			<?php } ?>
		<?php } ?>
		
		
		<?php if (is_home()) {?>		
		<title><?php bloginfo('name'); ?></title>
		<?php } else{ ?>
		<title><?php wp_title('-', true, 'right'); ?><?php bloginfo('name'); ?></title>
		<?php } ?>
		
		<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" media="screen" />
		<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />

		<!-- Load JS libraries -->
		<?php if(defined('USE_JQUERY')){ ?>
			<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.5/jquery.min.js"></script>
		<?php }?>	

		<!-- google analytics -->
		<script type="text/javascript">
		  var _gaq = _gaq || [];
		  _gaq.push(['_setAccount', 'UA-6603360-9']);
		  _gaq.push(['_trackPageview']);
		
		  (function() {
		    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
		    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
		    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
		  })();		
		</script>
		<?php wp_head(); ?>
	</head>

	<body>
		<div id="header" class="grid-1col fxd-span-0col fxd-top-logo">
			<a href="<?php bloginfo('url'); ?>" title="<?php bloginfo('name'); ?>" id="home-link-type"><h1 class="hidden" alt="<?php bloginfo('name');?>"><?php bloginfo('name');?></h1></a>
			<a href="<?php bloginfo('url'); ?>" title="<?php bloginfo('name'); ?>" id="tagline"><span class="hidden"><?php echo get_bloginfo ('description');?></span></a>		
		</div><!-- END header -->
		<?php get_sidebar(); ?>