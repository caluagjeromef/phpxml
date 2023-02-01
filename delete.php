<?php
	$id = $_GET['id'];

	$members = simplexml_load_file('member.xml');
	
	$position = 0;
	$i = 0;

	foreach($members->member as $member){
		if($member->id == $id){
			$position = $i;
			break;
		}
		$i++;
	}
	
	unset($members->member[$position]);
	file_put_contents('member.xml', $members->asXML());

	header('location: phpxml.php');
	exit;

?>