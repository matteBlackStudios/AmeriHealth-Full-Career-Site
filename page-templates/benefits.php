<?php
/*
Template Name: Benefits
*/
get_header(); ?>
<div class="mast" style="background: url(<?= types_render_field('benefits-header-image', array('size'=>'full', 'output'=>'raw')) ;?>) center center / cover no-repeat;">
	<div class="row align-middle text-center">
		<div class="small-12 columns">
			<h1><?= types_render_field('benefits-header-text', array('output'=>'raw')) ;?></h1>
		</div>
	</div>
</div>

<div class="row align-center text-center" id="benefits-intro">
	<div class="small-11 medium-9 large-8 columns">
		<h4><?= types_render_field('benefits-subhead-text', array('output'=>'raw')) ;?></h4>
	</div>
</div>

<div class="row align-center" id="benefits-hr">
	<div class="small-11 medium-6 large-4 columns">
		<hr>
	</div>
</div>

<div class="row small-up-1 medium-up-2 large-up-4 text-center" id="benefits-list">
	<div class="columns">
		<i class="fa fa-check-square-o" aria-hidden="true"></i>
		<h4><?= types_render_field('benefit-1-copy', array('output'=>'raw')) ;?></h4>
	</div>
	<div class="columns">
		<i class="fa fa-plus-circle" aria-hidden="true"></i>
		<h4><?= types_render_field('benefit-2-copy', array('output'=>'raw')) ;?></h4>
	</div>
	<div class="columns">
		<i class="fa fa-check-square-o" aria-hidden="true"></i>
		<h4><?= types_render_field('benefit-3-copy', array('output'=>'raw')) ;?></h4>
	</div>
	<div class="columns">
		<i class="fa fa-trophy" aria-hidden="true"></i>
		<h4><?= types_render_field('benefit-4-copy', array('output'=>'raw')) ;?></h4>
	</div>
</div>

<div class="row align-center text-center" id="benefits-contact">
	<div class="small-11 medium-9 large-8 columns">
		<h4><?= types_render_field('benefits-contact-message', array('output'=>'raw')) ;?></h4>
	</div>
</div>

<div class="row align-center text-center" id="benefits-contact-button">
	<div class="small-11 medium-6 large-4 columns">
		<a class="button"><?= types_render_field('benefits-contact-button-copy', array('output'=>'raw')) ;?></a>
	</div>
</div>


<?php get_footer();
