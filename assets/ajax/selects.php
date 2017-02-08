<?php
include('include/db.php');
include('include/config.php');

$et = new Config();
$config = $et->connect();
$db = new MysqliDb ($config[0],$config[1],$config[2],$config[3]);

$get = $_GET;

$locations = $db->where('JobLocation',NULL,' IS NOT')->orderBy('JobLocation', 'asc')->groupBy('JobLocation')->get('postings');
$category = $db->where('jobCategory',NULL,' IS NOT')->orderBy('jobCategory', 'asc')->groupBy('jobCategory')->get('postings');

$result = array();
$result['locations'] = '<option value="">--</option>';
$result['category'] = '<option value="">--</option>';

foreach($locations as $row){
    if(!empty($row['JobLocation'])){
        $result['locations'] .= '<option value="' . $row['JobLocation'] . '" ' . (isset($get['location']) && $get['location'] == $row['JobLocation'] ? 'selected="selected"' : '') . '>' . $row['JobLocation'] . '</option>';
    }
}
foreach($category as $row){
    if(!empty($row['JobLocation'])){
        $result['category'] .= '<option value="' . $row['jobCategory'] . '" ' . (isset($get['category']) && $get['category'] == $row['jobCategory'] ? 'selected="selected"' : '') . '>' . $row['jobCategory'] . '</option>';
    }
}
echo json_encode($result);