<?php
/*
Template Name: About
*/
get_header(); ?>

<div class="mast" style="background: url(<?= types_render_field('about-header-image', array('size'=>'full', 'output'=>'raw')) ;?>) center center / cover no-repeat;">
	<div class="row align-middle text-center">
		<div class="small-12 columns">
			<h1><?= types_render_field('about-header-text', array('output'=>'raw')) ;?></h1>
		</div>
	</div>
</div>

<div class="row align-center" id="about-intro">
	<div class="small-11 medium-9 large-8 columns text-center">
		<h4>As a mission-based Medicaid managed care organization, AmeriHealth Caritas is more than just another health insurance company. Care is the heart of our work.</h4>
	</div>
</div>

<div class="row align-center" id="about-hr">
	<div class="small-11 medium-6 large-4 columns">
		<hr>
	</div>
</div>

<div id="about-heart">
	<div class="row text-center">
		<div class="small-12 columns">
			<h1><?= types_render_field('about-intro-header-text', array('output'=>'raw')) ;?></h1>
		</div>
	</div>
	<div class="row expanded collapse small-uncollapse medium-collapse align-middle">
		<div class="small-12 medium-6 columns">
			<div id="image-left" style="background: url(<?= types_render_field('about-intro-left-image', array('size'=>'full', 'output'=>'raw')) ;?>) center center / cover no-repeat;"></div>
		</div>
		<div class="small-12 medium-6 columns uncollapse-section">
			<?= types_render_field('about-intro-right-copy');?>
		</div>
	</div>  
</div>

<div class="row align-center">
	<div class="small-11 columns" id="about-slider">
		<a id="slider-prev"><i class="fa fa-chevron-left" aria-hidden="true"></i></a>
		<div id="slider-container">
			<div>
				<div class="row align-middle align-center">
					<div class="small-11 medium-8 columns">
						<p>“Slide one: Cras viverra gravida malesuada. Maecenas semper blandit mi eleifend euismod. Donec quis neque eget ligula ultrices varius non vestibulum dolor.”</p>
					</div>
				</div>
			</div>
			<div>
				<div class="row align-middle align-center">
					<div class="small-11 medium-8 columns">
						<p>“Slide Two: Cras viverra gravida malesuada. Maecenas semper blandit mi eleifend euismod. Donec quis neque eget ligula ultrices varius non vestibulum dolor.”</p>
					</div>
				</div>
			</div>
		</div>
		<a id="slider-next"><i class="fa fa-chevron-right" aria-hidden="true"></i></a>
	</div>
</div>

<div id="about-feat-testimonials">
	<div class="row align-center">
		<div class="small-11 medium-8 columns text-center">
			<h3><?= types_render_field('about-featured-testimonials-header', array('output'=>'raw')) ;?></h3>
		</div>
	</div>
	<div class="row align-middle align-left tesimonial">
		<div class="small-12 medium-3 large-3 large-offset-1 columns">
			<?= types_render_field('about-featured-testimonial-1-image') ;?>
		</div>
		<div class="small-12 medium-9 large-6 columns">
			<p><strong><?= types_render_field('about-featured-testimonial-1-name', array('output'=>'raw')) ;?></strong></p>
			<p><?= types_render_field('about-featured-testimonial-1-copy', array('output'=>'raw')) ;?></p>
		</div>
	</div>
	<div class="row align-middle align-left tesimonial">
		<div class="small-12 medium-3 large-3 large-offset-1 columns">
			<?= types_render_field('about-featured-testimonial-2-image') ;?>
		</div>
		<div class="small-12 medium-9 large-6 columns">
			<p><strong><?= types_render_field('about-featured-testimonial-2-name', array('output'=>'raw')) ;?></strong></p>
			<p><?= types_render_field('about-featured-testimonial-2-copy', array('output'=>'raw')) ;?></p>
		</div>
	</div>
	<div class="row align-middle align-left tesimonial">
		<div class="small-12 medium-3 large-3 large-offset-1 columns">
			<?= types_render_field('about-featured-testimonial-3-image') ;?>
		</div>
		<div class="small-12 medium-9 large-6 columns">
			<p><strong><?= types_render_field('about-featured-testimonial-3-name', array('output'=>'raw')) ;?></strong></p>
			<p><?= types_render_field('about-featured-testimonial-3-copy', array('output'=>'raw')) ;?></p>
		</div>
	</div>
</div>

<div class="cta" style='background: url(<?= types_render_field('about-cta-background-image', array('size'=>'full', 'output'=>'raw')) ;?>'>
	<div class="row align-center align-middle text-center">
		<div class="small-11 medium-6 large-4 columns">
			<h3><?= types_render_field('about-cta-header', array('output'=>'raw')) ;?></h3>
			<p><?= types_render_field('about-cta-copy', array('output'=>'raw')) ;?></p>
			<a class="button"><i class="fa fa-linkedin-square" aria-hidden="true"></i> CONNECT ACCOUNT</a>
		</div>
	</div>
</div>

<?php get_footer();
