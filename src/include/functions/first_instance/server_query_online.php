<?php
	/********************************

	Author: Tymoteusz `Razor Meister` Bartnik

	Contact: battnik90@gmail.com

	Function: server_query_online()

	********************************/
	function server_query_online($cfg)
	{
		global $query, $clients, $language;

		$cfg = $cfg['server_query_online'];

		global $connect, $name;
		if(strpos($connect['bot_name'], "(XBOT)") === false)
			die(write_info($name."Bot musi mieć w nazwie frazę (XBOT)"));

		
		$desc = "[hr][center][size=14][b][I]Server Query Online[/I][/b][/size][/center][hr]\n";
		$count = 1;

		foreach($clients as $client)
		{
			if($client['client_type'] == 1)
			{
				$channel = $query->getElement('data', $query->channelInfo($client['cid']));

				$desc .= "[size=11]".$count++.".[/size] [size=9] [b][URL=client://".$client['clid']."/".$client['client_unique_identifier']."]".$client['client_nickname']."[/url] -> [b][url=channelId://".$client['cid']."]".$channel['channel_name']."[/url][/size]\n";

			}
		}	
					
		$desc .= $language['function']['down_desc'];
		$query->channelEdit($cfg['channel_id'], array('channel_description' => $desc));


	}
?>