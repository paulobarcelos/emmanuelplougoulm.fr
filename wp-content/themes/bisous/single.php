<?php get_header(); ?>
<?php the_post(); ?>
<?php 
$projectDetails = simple_fields_get_post_group_values(get_the_ID(),"Project Details", true, 1);			
$credits = $projectDetails["Credits"][0];
$translation = $projectDetails["French Description (Optional)"][0];

$projectVideos = simple_fields_get_post_group_values(get_the_ID(),"Project Videos", true, 1);			
$videos = $projectVideos["Vimeo Embed Code"];
$totalVideos = count($videos);

?>
<div id="center-title" class="main-title grid-3col fxd-span-1col fxd-top-content">
	<p>
		<?php
		$posttags = get_the_tags();
		$totalTags = count($posttags);
		$tagIndex = 0;
		if ($posttags) {
			foreach($posttags as $tag) {
				echo $tag->name;
				if($tagIndex < ($totalTags-1)) echo ", ";
				$tagIndex++;
			}
		}?>
	</p>
</div>

<div id="post-info" class="grid-1col fxd-span-4col fxd-top-content">
	<div class="main-title">
		<h2><?php the_title(); ?></h2>
	</div>
	<div id="post-date"><?php echo get_the_date('F Y'); ?></div>
	<div id="post-credits"><p><?php echo $credits; ?></p></div>
	<div id="post-content"><p><?php the_content(); ?></p></div>
	<?php if ($translation != ""){ ?>
		<div id="post-translation"><p><?php echo $translation; ?></p></div>
	<?php }?>
</div>

<div id="main-content" class="grid-3col abs-span-1col">

<?php
$attachments = attachments_get_attachments();
$total_attachments = count($attachments);
$last_attachement = $total_attachments -1;
?>
<?php if( $total_attachments > 0 || $totalVideos > 0) {?>
	<ul>
		<?php for ($i=0; $i < $totalVideos; $i++) { ?>
		     <li><?php echo $videos[$i]; ?></li>
	    <?php }?>
		<?php for ($i=0; $i < $total_attachments; $i++) { ?>
			<?php if ($i != $last_attachement) {?>
				<li>
			<?php } else {?>
				<li class="last-item">
		     <?php }?>
		     <img src="<?=$attachments[$i]['location']?>" alt="<?php the_title(); ?>" title="<?php the_title(); ?>"/></li>
	    <?php }?>
	</ul>
<?php } ?>
</div>
<?php get_footer(); ?>