<?php
	if(ISSET($_POST['insert'])){
		
		if(file_exists("member.xml")){
			$members = simplexml_load_file('member.xml');
			$member = $members->addChild('member');
			$member->addChild('mem_id', $_POST['mem_id']);
			$member->addChild('firstname', $_POST['firstname']);
			$member->addChild('lastname', $_POST['lastname']);
			$member->addChild('address', $_POST['address']);
			file_put_contents('member.xml', $members->asXML());
			
			header('location:phpxml.php');
		}
	}

?>