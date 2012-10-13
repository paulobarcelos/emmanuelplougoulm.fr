<?php get_header(); ?>
<?php the_post(); ?>
<?php 
$simpleFields = simple_fields_get_post_group_values(get_the_ID(),"Info", true, 1);			
$education = $simpleFields["Education"][0];
$experience = $simpleFields["Experience"][0];
$collaborators = $simpleFields["Collaborators"][0];
?>
<div id="page-content" class="grid-4col abs-span-1col">
	<div class="grid-1col">
		<div class="main-title">
			<h2><?php the_title(); ?></h2>
		</div>
		<?php the_content(); ?>
	</div>
	<div class="grid-1col">
		<div class="main-title">
			<h2>Education</h2>
		</div>
		<p><?php echo $education; ?></p>
	</div>
	<div class="grid-1col">
		<div class="main-title">
			<h2>Experience</h2>
		</div>
		<p><?php echo $experience; ?></p>
	</div>
	<div class="grid-1col grid-last">
		<div class="main-title">
			<h2>Collaborators</h2>
		</div>
		<p><?php echo $collaborators; ?></p>
	</div>
</div>
<?php get_footer(); ?>