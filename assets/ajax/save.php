<?php
	ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include(dirname(__FILE__) . '/include/db.php');
include(dirname(__FILE__) . '/include/config.php');
//include(dirname(__FILE__) . '/include/states.php');

$et = new Config();
$config = $et->connect();
$db = new MysqliDb ($config[0],$config[1],$config[2],$config[3]);
$postingDelete = [];
$locationDelete = [];

$categories = array("853" => 'Administrative Services',
					"814" => 'Behavioral Health',
					"815" => 'Compliance',
					"4757" => 'Corporate Development',
					"816" => 'Finance',
					"817" => 'Foundation',
					"818" => 'Government Affairs',
					"819" => 'Human Resources',
					"822" => 'Information Systems',
					"820" => 'Legal',
					"5703" => 'Long Term Services and Supports',
					"821" => 'Management',
					"823" => 'Marketing & Communications',
					"824" => 'Medical Management',
					"825" => 'Medicare',
					"827" => 'Operations',
					"833" => 'Other',
					"828" => 'Pharmacy',
					"829" => 'Project Management Office',
					"5704" => 'Provider Network',
					"830" => 'Public Affairs',
					"831" => 'Public Policy',
					"5556" => 'Quality - Clinical',
					"832" => 'Strategic Planning & Execution',
					"5697" => 'Summer Intern'
);

foreach($categories as $key => $r){

$xml = simplexml_load_file('https://chk.tbe.taleo.net/chk05/ats/servlet/Rss?org=AMERINC&cws=1&WebPage=SRCHR&WebVersion=0&_rss_version=2&CUSTOM_1025='.$key);


foreach ($xml->channel->item as $row):

	
	$coord = getCoor((string)$row->children('taleo', true)->location);

    $posting = [
       'JobTitle'         => (string)$row->title,
       'JobDescription'   =>  (string)$row->children('taleo', true)->{'html-description'},
       'PostDate'		  => (string)$row->pubDate,
       'JobLink'		  => (string)$row->link,
       'ReqGuid'   		  => (int)$row->children('taleo', true)->reqId,
       'JobLocation'	  => (string)$row->children('taleo', true)->location,
       'JobLocationCountry'	  => (string)$row->children('taleo', true)->locationCountry,
       'JobLocationState'	  => (string)$row->children('taleo', true)->locationState,
       'JobLocationCity'	  => (string)$row->children('taleo', true)->locationCity,
       'jobCategory'		  => $r,
       'JobLocationLat'		  => $coord['lat'],
       'JobLocationLng'		  => $coord['lng']   
    ];
	print_r($posting);

   if(!empty($posting['ReqGuid'])){
       $postingDelete[] =$posting['ReqGuid'];
   }

   $db->where("ReqGuid", $posting['ReqGuid']);
   $postings = $db->getOne("postings");

   if (empty($postings)){
       $posting['created_at'] = date('Y-m-d h:i:s');
       $id = $db->insert('postings', $posting);
   } else {
       $posting['updated_at'] = date('Y-m-d h:i:s');
       $posting['deleted_at'] = '0000-00-00 00:00:00';
       $id = $db->where('ReqGuid',$posting['ReqGuid'])->update('postings', $posting);
   }

endforeach;

}

// Delete Location
$delete = Array(date('Y-m-d h:i:s'));
// Delete Posting
print_r($postingDelete);
$delete_postings = $db->rawQuery('UPDATE postings SET deleted_at = ? WHERE ReqGuid NOT IN ("'.implode('","',$postingDelete).'")', $delete);

echo 'Saved!';



function getCoor($location){
	// Get Office LAT/LONG via Google Maps API:
	$url = "https://maps.googleapis.com/maps/api/geocode/json?address=". urlencode($location) ."&sensor=false&key=AIzaSyCdoqgcGktm6DY2lbw6zHhSktXiw86VBSg";
    $result_string = file_get_contents($url);
    if(isset($result_string)){
       $result = json_decode($result_string, true);
       if(isset($result['results'][0])){
           $result1[]=$result['results'][0];
           $result2[]=$result1[0]['geometry'];
           $result3[]=$result2[0]['location'];
           $coord = $result3[0];
           return $coord;
       }
    }

}