<?php
/*
Template Name: Home
*/
get_header(); ?>

<div class="mast homepage" style="background: url(<?= types_render_field('home-header-image', array('size'=>'full', 'output'=>'raw')) ;?>) center center / cover no-repeat;">
	<div class="row align-middle text-center">
		<div class="small-12 columns">
			<h1><?= types_render_field('home-header-text', array('output'=>'raw')) ;?></h1>
		</div>
	</div>
	<div class="row align-center">
		<div class="small-11 medium-8 large-4 columns relative">
			<form action="search" method="get">
				<div class="row collapse">
					<div class="small-9 columns">
						<input type="text" name="keywords" placeholder="SEARCH JOBS...">
					</div>
					<div class="small-3 columns">
						<button class="button"><i class="fa fa-search" aria-hidden="true"></i></button>
					</div>
				</div>
			</form>
		</div>
	</div>
</div>

<div class="row align-center" id="home-intro">
	<div class="small-11 medium-10 large-8">
		<p><?= types_render_field('home-intro-text', array('output'=>'raw')) ;?></p>
		<h1><?= types_render_field('home-subhead', array('output'=>'raw')) ;?>	</h1>
	</div>
</div>

<div class="row" id="home-cta" data-equalizer data-equalize-on="medium">
	<div class="small-12 medium-6 columns">
		<div class="row align-center">
			<div class="small-11 medium-9 columns">
				<h4 class="text-center"><?= types_render_field('home-cta-left-header', array('output'=>'raw')) ;?></h4>
				<div class="row small-up-1 medium-up-2" data-equalizer-watch>
					<div class="columns"><a href="">Clinical Care</a></div>
					<div class="columns"><a href="">College Internship</a></div>
					<div class="columns"><a href="">Clinical Care</a></div>
					<div class="columns"><a href="">College Internship</a></div>
					<div class="columns"><a href="">Lorem Ipsum Program</a></div>
					<div class="columns"><a href="">Clinical Care</a></div>
					<div style="margin-bottom: 15px;">&nbsp;</div>
				</div>
				<div class="row align-center">
					<div class="small-11 medium-8 columns">
						<a href="<?= types_render_field('home-cta-left-button-url', array('output'=>'raw')) ;?>	" class="button">
							<?= types_render_field('home-cta-left-button-copy', array('output'=>'raw')) ;?>
						</a>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="small-12 medium-6 columns text-center border-left">
		<div class="row align-center">
			<div class="small-11 medium-9 columns">
				<h4><?= types_render_field('home-cta-right-header', array('output'=>'raw')) ;?>	</h4>
				<p data-equalizer-watch><?= types_render_field('home-cta-right-copy', array('output'=>'raw')) ;?></p>
				<div class="row align-center">
					<div class="small-11 medium-8 columns">
						<a href="<?= types_render_field('home-cta-right-button-url', array('output'=>'raw')) ;?>	" class="button">
							<?= types_render_field('home-cta-right-button-copy', array('output'=>'raw')) ;?>
						</a>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<?php get_footer();
