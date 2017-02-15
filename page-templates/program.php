<?php
/*
Template Name: Program Template 1
*/
get_header(); ?>
<div class="mast blue"></div>

<div class="row" id="program-header">
	<div class="small-12 columns text-center">
		<h1><?= types_render_field('template-1-header', array('output'=>'raw')) ;?></h1>
		<div class="row align-center">
			<div class="small-11 medium-4 columns">
				<hr>
			</div>
		</div>
	</div>
</div>

<div id="program-top">
	<div class="row expanded collapse small-uncollapse medium-collapse align-middle">
		<div class="small-12 medium-6 columns">
			<div id="image-left" style="background: url(<?= types_render_field('template-1-left-image', array('size'=>'full', 'output'=>'raw')) ;?>) center center / cover no-repeat;"></div>
		</div>
		<div class="small-12 medium-6 columns uncollapse-section">
			<h2><?= types_render_field('template-1-right-header');?></h2>
			<h3><?= types_render_field('template-1-right-subheader');?></h3>
			<?= types_render_field('template-1-right-copy');?>
		</div>
	</div>  
</div>

<div id="program-video">
	<div class="row align-center">
		<div class="small-11 medium-8 columns text-center">
			<h4><?= types_render_field('template-1-video-header');?></h4>
			<?= types_render_field('template-1-video');?>
		</div>
	</div>
</div>

<div class="program-copy">
	<div class="row align-center">
		<div class="small-11 medium-8 columns">
			<h4 class="text-center"><?= types_render_field('template-1-centered-copy-section-1-header', array('output'=>'raw')) ;?></h4>
			<?= types_render_field('template-1-centered-copy-section-1-copy');?>
		</div>
	</div>
</div>

<div class="program-copy">
	<div class="row align-center">
		<div class="small-11 medium-8 columns">
			<h4 class="text-center"><?= types_render_field('template-1-centered-copy-section-2-header', array('output'=>'raw')) ;?></h4>
			<?= types_render_field('template-1-centered-copy-section-2-copy');?>
		</div>
	</div>
</div>

<div id="program-bar">
	<div class="row align-center">
		<div class="small-11 columns text-center">
			<h3><?= types_render_field('template-1-blue-bar-header', array('output'=>'raw')) ;?></h3>
			<?php
			    include('/Applications/MAMP/htdocs/amerihealth-full/wp-content/themes/amerihealth-careers/assets/ajax/include/db.php');
			    include('/Applications/MAMP/htdocs/amerihealth-full/wp-content/themes/amerihealth-careers/assets/ajax/include/config.php');
			    $et = new Config();
			    $config = $et->connect();
			    $db = new MysqliDb ($config[0],$config[1],$config[2],$config[3]);
			    $get = $_GET;
			    $job = $db->rawQuery('SELECT ReqGuid, JobLocation, deleted_at, JobTitle, jobCategory FROM postings WHERE jobCategory = "'.types_render_field('template-1-job-list-category', array('output'=>'raw')).'" AND deleted_at = "0000-00-00 00:00:00" ORDER BY PostDate ASC LIMIT 3');

			    foreach ($job as $row) { ?>
					<a href="<?php echo esc_url( home_url( '/' ) ); ?>posting/?ReqGuid=<?php echo $row['ReqGuid']; ?>">
						<?php echo $row['JobTitle']; ?> | <?php echo $row['JobLocation']; ?>
					</a>
				<?php    
			    }
			  
			?>
			<div class="row align-center">
				<div class="small-11 medium-8 large-5 columns">
					<a class="button category" href="<?php echo esc_url( home_url( '/' ) ); ?><?= types_render_field('template-1-search-button-link', array('output'=>'raw')) ;?>"><?= types_render_field('template-search-button-copy', array('output'=>'raw')) ;?></a>
				</div>
			</div>
			<div class="row align-center">
				<div class="small-11 medium-8 large-5 columns">
					<a class="button" href="<?php echo esc_url( home_url( '/' ) ); ?>search">SEE ALL JOBS</a>
				</div>
			</div>
		</div>
	</div>
</div>
<?php get_footer();
