<?php
/*
Template Name: faq
*/
get_header(); ?>
<div class="mast blue"></div>

<div class="row align-center" id="faq-title">
	<div class="small-11 medium-6 large-4 columns text-center">
		<h1>FAQ</h1>
		<hr>
	</div>
</div>

<div class="row" id="faq-container">
	<div class="small-4 columns">
		<div id="faq-nav">
			<ul>
				<?php
			    $counter = 1;
				$categories = get_categories( array(
				    'orderby' => 'name',
				    'order'   => 'ASC'
				) );
				 
				foreach( $categories as $category ) {
					if (!preg_match('/Uncategorized/',$category->name)) {
				    	echo '<li class=""><a href="#'.urlencode($category->name).'">'.$category->name.'</a></li>';
				    }
				} 
				?>
			</ul>
		</div>
	</div>
	<div class="small-8 columns">		
		<?php
		$categories = get_categories( array(
		    'orderby' => 'name',
		    'order'   => 'ASC'
		) );
		 
		foreach( $categories as $category ) {
			if (!preg_match('/Uncategorized/',$category->name)) {
				
				$output = '<div class="topic-section" id="'.urlencode($category->name).'">';
				$output .= '<h4>'.$category->name.'</h4>';
				
				$loop = new WP_Query( array( 'post_type' => 'single-faq',  'posts_per_page' => 100, 'category_name' => $category->name)); 
				    
				    while ( $loop->have_posts() ) : $loop->the_post();
				    	$output .= '<div class="question">';
				    	$output .= '<p><strong>';
				    	$output .= get_the_title();
				    	$output .= '</strong></p><p>';
				    	$output .= get_the_content();
				    	$output .= '</p></div>';
				   	endwhile; wp_reset_query();
				
		    	$output .= '</div>';
		    	echo $output;
		    }
		} 
		?>
	</div>
</div>
		

<?php get_footer();
