<?php

	Class extension_gravatar extends Extension{
	
		public function about(){
			return array('name' => 'Data Source: Gravatar',
						 'version' => '1.3',
						 'release-date' => '2012-10-26',
						 'author' => array('name' => 'Nick Dunn',
										   'website' => 'http://airlock.com')
				 		);
		}

		public function install()
		{
			Symphony::Configuration()->set('comments-section', 'ds-comments', 'gravatars');
			Symphony::Configuration()->set('size', '40', 'gravatars');
			Symphony::Configuration()->write();
		}

		public function uninstall()
		{
			Symphony::Configuration()->remove('comments-section', 'gravatars');
			Symphony::Configuration()->remove('size', 'gravatars');
			Symphony::Configuration()->write();
		}
			
	}

?>