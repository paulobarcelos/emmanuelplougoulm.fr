<?php define("USE_JQUERY", 1);?>
<?php get_header(); ?>
<script>
	function catClick(cat){
		var cb = document.getElementById(cat);
		var classname = '.tb-'+cat;
		if(cb.checked){
			show(classname);
		}else{
			hide(classname);
		};
	};
	function show(classname){
		$(classname).removeClass("hidden");
	};
	function hide(classname){
		$(classname).addClass("hidden");
	};
	
	$(document).ready(function(){
		$("div > #thumbnail").hover(function() {
				$(this).find("#thumbnail-info").removeClass("hidden");
				$(this).find("#thumbnail-image-container").addClass("transparent");
			}, function(){
				$(this).find("#thumbnail-info").addClass("hidden");
				$(this).find("#thumbnail-image-container").removeClass("transparent");
			});
	});
	

</script>
<div id="center-title" class="main-title grid-4col fxd-span-1col fxd-top-content">
<?php if (is_home()){?>
	<label for="graphic-design" class="graphic-design"><input id="graphic-design" type="checkbox" name="category" value="Graphic Design" onclick="catClick('graphic-design')" checked> Graphic Design</label>
	<label for="video" class="video"><input id="video" type="checkbox" name="category" value="Video" onclick="catClick('video')" checked> Video</label>
	<label for="experiment" class="experiment"><input id="experiment" type="checkbox" name="category" value="Experiment" onclick="catClick('experiment')" checked> Experiment</label>
<?php } else {?>
	<h2>Not Found</h2>
<?php }?>
</div>

<div id="main-content" class="grid-extra-4col abs-span-1col">
<?php if (is_home()){?>
		<?php $postlist = get_posts('numberposts=-1&order=DESC&orderby=date'); ?>
		<?php //print_r($postlist); ?>
		<?php foreach ($postlist as $post){ ?>
			<?php setup_postdata($post); ?> 
			<?php if(has_post_thumbnail()) { ?>
				<?php $thumbnail = wp_get_attachment_image_src(get_post_thumbnail_id(), "thumbnail");?>
				<?php $category = get_the_category(); ?>
				<div id="thumbnail" class="grid-1col tb-<?php echo $category[0]->slug; ?>">
					<div id="thumbnail-color" class="<?php echo $category[0]->slug; ?>"></div>
					<div id="thumbnail-image-container"><img src="<?php echo $thumbnail[0]; ?>" width="<?php echo $thumbnail[1]; ?>" height="<?php echo $thumbnail[2]; ?>" alt="<?php the_title(); ?>" title="<?php the_title(); ?>"/></div>
					<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>" alt="<?php the_title(); ?>" id="thumbnail-info" class="hidden">
						<div id="thumbnail-title"><?php the_title(); ?></div>
						<div id="thumbnail-date"><?php echo get_the_date('F Y'); ?></div>
					</a>
				</div>
			<?php }?>
		<?php } ?>

<?php } else {?>
	<p>Sorry, but you are looking for something that isn't here.</p>
<?php }?>
</div>
<?php get_footer(); ?>