<?php 

    

 class Blog_model extends CI_Mode {

 	    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }
	function validate_credentials(){
            /*$this->db->where('username', $username);
            $this->db->where('password', $password);
            return $this->db->get('usuario')->row();*/
            //return ($username.$password);
            return "test";
    }
 }
?>