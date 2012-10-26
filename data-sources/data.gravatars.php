<?php

	require_once(TOOLKIT . '/class.datasource.php');
	
	Class datasourcegravatars extends Datasource{
		
		var $ds_comments;
		var $ds_fieldhandle;
		var $size;
		
		var $dsParamROOTELEMENT = 'gravatars';	
		function __construct(&$parent, $env=NULL, $process_params=true){
			$this->ds_comments = Symphony::Configuration()->get('comments-section', 'gravatars');
			$this->ds_fieldhandle = Symphony::Configuration()->get('field-handle', 'gravatars');
			$this->size = Symphony::Configuration()->get('size', 'gravatars');
			parent::__construct($parent, $env, $process_params);
			$this->_dependencies = array('$' . $this->ds_comments);
		}
		
		function about(){
			return array(
					 'name' => 'Gravatars',
					 'author' => array(
							'name' => 'Nick Dunn',
							'website' => 'http://airlock.com'),
					 'version' => '1.3',
					 'release-date' => '2012-10-26');
		}
		
		function execute(&$param_pool){
			
			$result = new XMLElement($this->dsParamROOTELEMENT);			

			$email_list = array();

			$env = Frontend::instance()->Page()->Env();

			if (!is_array($env['pool'][$this->ds_comments.'.'.$this->ds_fieldhandle])) return $result;
			
		    foreach($env['pool'][$this->ds_comments.'.'.$this->ds_fieldhandle] as $email) {
		        $email = strtolower($email);
		        if(!in_array($email, $email_list)) {
		            $email_list[] = $email;
		            $gravatar = new XMLElement("gravatar");
		            $gravatar->setAttribute("email", $email);
		            $gravatar->setAttribute("url", "http://www.gravatar.com/avatar/" . md5(strtolower($email)) . "?s=" . $size . $this->size . "&amp;d=" . $this->_env["param"]["root"] . "/extensions/gravatar/assets/default.gif");
		            $result->appendChild($gravatar);
		        }
		    }
			
			return $result;
		}
		
	}

?>