<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

//load::models('blog_model');


class Blog extends CI_Controller {



	public function __construct()
    	{
        	parent::__construct();
        	$data['post'] = '';
        	//$this->load->library('database');
    	}

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -  
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in 
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
	/*public function index()
	{
		$this->load->view('welcome_message');
	}*/

	public function index()
	{
		$data['post'] = '';
		$this->load->view('blog_show',$data);
	}
 	
 	public function consultPassword()
 	{
		
 		$frmLogin = array(
        'user' => $this->input->post('user'),
        'pass' => $this->input->post('pass')
        );

 		$frmLogin["pass"] = "SHA('".$frmLogin["pass"]."')";
        $this->load->model('blog_model');
        $data['post'] = $this->blog_model->validate_credentials($frmLogin["user"], $frmLogin["pass"]);
        //print_r($data["post"]);
        

        	if ($data) {
        				
        			$this->load->view('blog_admin', $data);
        			
        	} else {

        			$data['post'] = "incorrect password or user";
        			$this->load->view('blog_show',$data);
        			
   
        	}

        //$this->load->view(‘blog/list_posts’,$data);


       


        //$user = $this->validate_credentials($frmLogin["user"], $frmLogin["pass"]);
        //var_dump($user);


            /*if($user = $this->validate_credentials($frmLogin["user"], $frmLogin["pass"])){
                redirect(base_url());
            }else{
                $this->load->view('blog_show', array('error'=>TRUE));
            }*/
    	}

 	}
	/*public function show($id){
		//$data['user_id'] = $id;
		$this->load->view('blog_show', $data);
		//echo "the id is: $id";
	}*/


/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */