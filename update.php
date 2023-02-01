<?php
	if(ISSET($_POST['edit'])){
		$members = simplexml_load_file('member.xml');
		foreach($members->member as $member){
			if($member->mem_id == $_POST['id']){
				$member->firstname = $_POST['firstname'];
				$member->lastname = $_POST['lastname'];
				$member->address = $_POST['address'];
				break;
			}
		}

		file_put_contents('member.xml', $members->asXML());
		header("location: phpxml.php");
	}
?>