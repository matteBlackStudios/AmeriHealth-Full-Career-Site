<?php
/*
Template Name: Posting
*/

include('/Applications/MAMP/htdocs/amerihealth-full/wp-content/themes/amerihealth-careers/assets/ajax/include/db.php');
include('/Applications/MAMP/htdocs/amerihealth-full/wp-content/themes/amerihealth-careers/assets/ajax/include/config.php');

$et = new Config();
$config = $et->connect();
$db = new MysqliDb ($config[0],$config[1],$config[2],$config[3]);

$posting_id = $_GET['ReqGuid'];
if(!isset($posting_id)){
    header('Location: http://localhost:8888/amerihealth-full/search');
}
$db->where('ReqGuid',$posting_id);
$db->where('deleted_at', '0000-00-00 00:00:00');
$post = $db->getOne('postings');

get_header(); ?>

<div class="mast posting">
	<div class="row align-justify align-middle">
		<div class="small-12 medium-6 columns" id="back">
			<a href="<?php echo esc_url( home_url( '/' ) ); ?>search"><i class="fa fa-chevron-left" aria-hidden="true"></i> BACK TO JOB LISTINGS</a>
		</div>
		<div class="small-12 medium-6 columns" id="returning">
			<a href="http://chk.tbe.taleo.net/chk05/ats/careers/jobSearch.jsp?org=AMERINC&cws=1">RETURNING CANDIDATE? LOG IN</a>
		</div>
	</div>
</div>

<div class="row align-center" id="posting-title">
	<div class="small-11 medium-9 columns">
		<h1><?php echo $post['JobTitle'] ?></h1>
		<p><i class="fa fa-map-marker" aria-hidden="true"></i> <?php echo $post['JobLocation'] ?></p>
	</div>
	<div class="small-11 medium-3 columns">
		<a target="_blank" class="button" href="http://chk.tbe.taleo.net/chk05/ats/careers/apply.jsp;jsessionid=DBF4802B8403F9B36DEEBC382273D289?org=AMERINC&cws=1&rid=1<?php echo $post['ReqGuid'] ?>">APPLY FOR JOB</a>
	</div>
	<div class="small-11 medium-12 columns">
		<hr>
	</div>
</div>

<div class="row align-center" id="posting-info">
	<div class="small-11 medium-10 large-9 columns">
		<?php echo $post['JobDescription'] ?>
	</div>
</div>

<div class="row align-center" id="posting-apply">
	<div class="small-11 medium-12 columns">
		<hr>
	</div>
	<div class="small-11 medium-5 large-3 columns">
		<a href="http://chk.tbe.taleo.net/chk05/ats/careers/apply.jsp;jsessionid=DBF4802B8403F9B36DEEBC382273D289?org=AMERINC&cws=1&rid=1<?php echo $post['ReqGuid'] ?>" target="_blank" class="button">APPLY FOR JOB</a>
	</div>
</div>

<?php get_footer();
