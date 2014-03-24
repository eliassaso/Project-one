<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

//load::models('blog_model');


class Blog extends CI_Controller {



	public function __construct()
    	{
        	parent::__construct();
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

		$this->load->view('blog_show');
	}
 	
 	public function consultPassword()
 	{
		
 		//Load::models('blog_model');
 		$frmLogin = array(
        'user' => $this->input->post('user'),
        'pass' => $this->input->post('pass')
        );

 		$frmLogin["pass"] = "SHA('".$frmLogin["pass"]."')";
 		//var_dump("$test");
        $this->load->application('models/blog_model');
        //Load::_models('blog_model');
        //$data["post"] = $this->blog_model->validate_credentials($frmLogin["user"], $frmLogin["pass"]);
        $data["post"] = $this->blog_model->validate_credentials();
        var_dump("$data");
        //$this->load->view('blog_show', $data);


       


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