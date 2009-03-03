<?php

	Class extension_gravatar extends Extension{
	
		public function about(){
			return array('name' => 'Data Source: Gravatar',
						 'version' => '1.1',
						 'release-date' => '2008-10-21',
						 'author' => array('name' => 'Nick Dunn',
										   'website' => 'http://airlock.com',
										   'email' => 'nick.dunn@airlock.com')
				 		);
		}
		
		public function uninstall(){

		}


		public function install(){
			
		}
			
	}

?>