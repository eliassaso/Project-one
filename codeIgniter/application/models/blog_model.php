<?php 

    

 class Blog_model extends CI_Model {

 	    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }
	function validate_credentials($username, $password){
            //query = $this->db->where('user', $username);
            //$query = $this->db->where('pass', $password);
            //$query = $this->db->get('usuario');
            //$query = $this->db->where('usuario', ('pass' => $password));
            $query = $this->db->query("SELECT * FROM usuario where user = '$username' and pass = $password");
            return $query->row();
            //return ($username.$password);
            

            //return $resultado;
    }
 }
?>