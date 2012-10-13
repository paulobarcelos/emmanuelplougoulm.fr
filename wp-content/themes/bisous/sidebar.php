<?php
	global $wp_query;
	$thePostID = $wp_query->post->ID;
?>
<div id="nav" class="grid-1col fxd-span-0col fxd-top-content">
	<div class="main-title">
		<h3>Works</h3>
	</div>
	<h4>Graphic Design</h4>
	<ul id="posts">
		<?php //$graphicDesignList = get_posts('category_name=Graphic Design&order=DESC&orderby=date'); ?>
		<?php $graphicDesignList = get_posts('category=1&order=DESC&orderby=date&numberposts=20'); ?>
		<?php //print_r($graphicDesignList); ?>
		<?php foreach ($graphicDesignList as $post){ ?>
			<?php setup_postdata($post); ?> 
			<?php if($thePostID == get_the_ID() && is_single()){ ?>
  				<li class="current">
  			<?php } else { ?>
  				<li>
  			<?php } ?>
			<a href="<?php the_permalink() ?>" title="View details of <?php the_title(); ?>"><?php the_title(); ?></a></li>
	 	<?php } ?>
	</ul>
	<h4>Video</h4>
	<ul id="posts">
		<?php //$graphicDesignList = get_posts('category_name=Video&order=DESC&orderby=date'); ?>
		<?php $graphicDesignList = get_posts('category=4&order=DESC&orderby=date&numberposts=20'); ?>
		<?php foreach ($graphicDesignList as $post){ ?>
			<?php setup_postdata($post); ?> 
			<?php if($thePostID == get_the_ID() && is_single()){ ?>
  				<li class="current">
  			<?php } else { ?>
  				<li>
  			<?php } ?>
			<a href="<?php the_permalink() ?>" title="View details of <?php the_title(); ?>"><?php the_title(); ?></a></li>
	 	<?php } ?>
	</ul>
	<h4>Experiment</h4>
	<ul id="posts">
		<?php //$graphicDesignList = get_posts('category_name=Experiment&order=DESC&orderby=date'); ?>
		<?php $graphicDesignList = get_posts('category=5&order=DESC&orderby=date&numberposts=20'); ?>
		<?php foreach ($graphicDesignList as $post){ ?>
			<?php setup_postdata($post); ?> 
			<?php if($thePostID == get_the_ID() && is_single()){ ?>
  				<li class="current">
  			<?php } else { ?>
  				<li>
  			<?php } ?>
			<a href="<?php the_permalink() ?>" title="View details of <?php the_title(); ?>"><?php the_title(); ?></a></li>
	 	<?php } ?>
	</ul>
	
	<ul id="posts">
	<?php 
	  	$pages = get_pages('sort_column=post_date&sort_order=desc'); 
	  	foreach ($pages as $pagg) {
	  		if($thePostID == $pagg->ID){
	  			$pagelink = '<li class="current">';
	  		} else {
	  			$pagelink = '<li>';
	  		}
	  		$pagelink .= '<a href="'.get_page_link($pagg->ID).'" ';
			$pagelink .= 'title="'.$pagg->post_title;
			$pagelink .= '">';
			
			$pagelink .= $pagg->post_title;
			$pagelink .= '</a>';
			$pagelink .= '</li>';
			echo $pagelink;
	 	}?>
 	</ul>
</div>
	