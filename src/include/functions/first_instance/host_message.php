<?php
	/********************************

	Author: Tymoteusz `Razor Meister` Bartnik

	Contact: battnik90@gmail.com

	Function: host_message()

	********************************/
	function host_message($cfg)
	{
		global $query;

		$cfg = $cfg['host_message'];

		global $connect, $name;
		if(strpos($connect['bot_name'], "(XBOT)") === false)
			die(write_info($name."Bot musi mieć w nazwie frazę (XBOT)"));

		$server_info = $query->getElement('data', $query->serverInfo());
		$online = $server_info['virtualserver_clientsonline'] - $server_info['virtualserver_queryclientsonline'];
		
		$query->serverEdit(array('virtualserver_hostmessage' => str_replace(array('[ONLINE]', '[MAX_CLIENTS]'), array($online, $server_info['virtualserver_maxclients']), $cfg['message'])));

	}
?>