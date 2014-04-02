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
            $queryUsuario = $this->db->query("SELECT * FROM usuario where user = '$username' and pass = $password");

            if ($queryUsuario->num_rows == 1) {           
                    return $queryUsuario->row();

            }else{

                return 'incorrect';
            } 
    }
        function db_blogger(){

            $queryBlogger = $this->db->get('blogger');
            return $queryBlogger->row();

    }
        function db_blog(){

            $queryBlog= $this->db->get('blog');         
            return $queryBlog->row();

 
    }
        function db_post_blogger(){

            //$queryPostBlogger = $this->db->query("SELECT * from post;");         
            //return $queryPostBlogger->row();

            $this->db->order_by('fecha DESC');
            return $this->db->get('post')->result();

 
    }

    function insert_content_post($db_post){

            //print_r($db_post);
            //print_r($db_post['title']);
      
            
     $this->db->query("INSERT INTO post (id_blog, id_blogger, titulo, fecha, contenido) 
                               VALUES (".$db_post['id_blog'].", ".$db_post['id_blogger'].", 
                                      '".$db_post['title']."','".$db_post['fecha']."',
                                      '".$db_post['contenido']."')");   
        //print_r("INSERT INTO post (id_blog, id_blogger, titulo, fecha, contenido) 
                               /*VALUES (".$db_post['id_blog'].", ".$db_post['id_blogger'].", 
                                      '".$db_post['title']."','".$db_post['fecha']."',
                                      '".$db_post['contenido']."')");*/
            return "Insert sucessfully!!!";
 
    }
    function insert_coment($db_coment){
    
            
     $this->db->query("INSERT INTO comentario (id_post, nombre_comentarista, estado, fecha_comentario, contenido_comentario) 
                               VALUES (".$db_coment['id_post'].", '".$db_coment['nombre_usuario']."', 
                                      '".$db_coment['estado']."','".$db_coment['fecha_comentario']."',
                                      '".$db_coment['coment_post']."')");   
        //print_r("INSERT INTO post (id_blog, id_blogger, titulo, fecha, contenido) 
                               /*VALUES (".$db_post['id_blog'].", ".$db_post['id_blogger'].", 
                                      '".$db_post['title']."','".$db_post['fecha']."',
                                      '".$db_post['contenido']."')");*/
            //return "Insert sucessfully!!!";
 
    }
 }
?>