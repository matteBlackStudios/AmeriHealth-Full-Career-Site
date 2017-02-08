<?php
/*
Template Name: Search
*/
get_header(); ?>

<div id="search-mast">
	<section class="map-container">
		<div id="map" style="height: 800px; width: 100%;"></div>
	</section>
	<div id="search-filters">
		<div class="row align-middle align-center">
			<div class="small-11 medium-9 columns">
				<h1>SEARCH JOBS</h1>
				<form>
					<div class="row">
						<div class="small-12 medium-8 columns">
							<label>LOCATION
						    	<select id="location" name="location">
								</select>
						    </label>
						</div>
						<div class="small-12 medium-4 columns">
							<label>ZIP
						    	<input name="zip" id="zip" type="text" placeholder="...">
						    </label>
						</div>
						<div class="small-12 columns">
							<label>CATEGORY
						    	<select id="category" name="category">
								</select>
						    </label>
						</div>
						<div class="small-12 columns">
					      <label>KEYWORD(S)
					        <input name="keywords" type="text" placeholder="...">
					      </label>
					    </div>
					</div>
					<div class="row align-center">
					    <div class="small-11 medium-6 columns">
						    <button class="submit submit-search" type="button">Search <i class="fa fa-search"></i></button>
					    </div>
				    </div>
				</form>
			</div>
		</div>
	</div>
</div>

<div id="postings"></div>

<div class="pagination-container" ></div>

<div class="cta" style='background: url(<?= types_render_field('search-cta-background-image', array('size'=>'full', 'output'=>'raw')) ;?>'>
	<div class="row align-center align-middle text-center">
		<div class="small-11 medium-6 large-4 columns">
			<h3><?= types_render_field('search-cta-header', array('output'=>'raw')) ;?></h3>
			<p><?= types_render_field('search-cta-copy', array('output'=>'raw')) ;?></p>
			<a class="button"><i class="fa fa-linkedin-square" aria-hidden="true"></i> CONNECT ACCOUNT</a>
		</div>
	</div>
</div>


<script>
	function initMap() {
		// Map Style:
		var styleArray = [{"featureType":"administrative","elementType":"all","stylers":[{"saturation":"-100"}]},{"featureType":"administrative.province","elementType":"all","stylers":[{"visibility":"off"}]},{"featureType":"landscape","elementType":"all","stylers":[{"saturation":-100},{"lightness":65},{"visibility":"on"}]},{"featureType":"poi","elementType":"all","stylers":[{"saturation":-100},{"lightness":"50"},{"visibility":"simplified"}]},{"featureType":"road","elementType":"all","stylers":[{"saturation":"-100"}]},{"featureType":"road.highway","elementType":"all","stylers":[{"visibility":"simplified"}]},{"featureType":"road.arterial","elementType":"all","stylers":[{"lightness":"30"}]},{"featureType":"road.local","elementType":"all","stylers":[{"lightness":"40"}]},{"featureType":"transit","elementType":"all","stylers":[{"saturation":-100},{"visibility":"simplified"}]},{"featureType":"water","elementType":"geometry","stylers":[{"hue":"#ffff00"},{"lightness":-25},{"saturation":-97}]},{"featureType":"water","elementType":"labels","stylers":[{"lightness":-25},{"saturation":-100}]}];

		// Initialize map (id="map") & Customize: 
		var map = new google.maps.Map(document.getElementById('map'), {
		    scrollwheel: false,
		    zoom: 5,
    		center: {lat: 37.8349694, lng: -89.7942933},
		    styles: styleArray,
		    streetViewControl: false,
		    mapTypeControl:false
		});
			
		<?php
		    include('/Applications/MAMP/htdocs/amerihealth-full/wp-content/themes/amerihealth-careers/assets/ajax/include/db.php');
		    include('/Applications/MAMP/htdocs/amerihealth-full/wp-content/themes/amerihealth-careers/assets/ajax/include/config.php');
		    $et = new Config();
		    $config = $et->connect();
		    $db = new MysqliDb ($config[0],$config[1],$config[2],$config[3]);
		    $get = $_GET;
		    $locations = $db->rawQuery('SELECT count(ReqGuid) as count, JobLocation, deleted_at, JobLocationLat, JobLocationLng FROM postings WHERE JobLocation IS NOT NULL AND deleted_at = "0000-00-00 00:00:00" GROUP BY JobLocation ORDER BY JobLocation ASC');
		    //$locations = $db->where('JobLocation',NULL,' IS NOT')->where('deleted_at', '0000-00-00 00:00:00')->orderBy('JobLocation', 'asc')->groupBy('JobLocation')->get('postings');
		    ?>
		    var infowindow = new google.maps.InfoWindow();
		    <?
		    foreach ($locations as $row) {
			    if (strlen($row['JobLocationLat']) > 2) { ?>
					var latlngset_ = new google.maps.LatLng(<?php echo $row['JobLocationLat']; ?>, <?php echo $row['JobLocationLng']; ?>);
					var marker = new google.maps.Marker({
						map: map,
						title: name ,
						position: latlngset_,
						icon: {
							url: '/amerihealth-full/wp-content/themes/amerihealth-careers/assets/images/search/marker.png',
							animation:google.maps.Animation.DROP
						}
					});
					var content_ = '<div class="content-window"><a><h3><?php echo $row['JobLocation']; ?></h3><h3><?php echo $row['count']; ?></h3></a></div>';
					google.maps.event.addListener(marker,'click', (function(marker,content_,infowindow){
					return function() {
					       infowindow.close()
						    infowindow.setContent('<div class="content-window"><a><h3 class="joblocation"><?php echo $row['JobLocation']; ?></h3><h3 class="locationcount"><?php echo $row['count']; ?> Job(s)</h3></a></div>');
						    infowindow.open(map, marker);
					};
					})(marker,content_,infowindow));	
					  
			    <?
			    }
		    }
		  
		?>
	}
</script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCwY-6J-JSSjrZnAzMoo5mnbyxpX2i8IYg&callback=initMap" async defer></script>
<?php get_footer();
