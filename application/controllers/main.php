<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Main extends CI_Controller {

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
	
	public function __construct() {
		parent::__construct();
	}

	public function index()
	{
		$this->output->enable_profiler(TRUE);

		// whenever we hit this page we show the courses.
		$courses['mydata'] = $this->Course->get_all_data();
		// send the array of our results.  no error check yet.
		$this->load->view('course_display',$courses);
	}

	public function Add_Course() {
		$this->output->enable_profiler(TRUE);
		
		// set the post to this so we are only accessing the variable and not all of the classes
		$mytitle = $this->input->post('title');
		
		if(!empty($mytitle) && strlen($mytitle)<16) {

			$mydescription = $this->input->post('description');
			
			// die('$mytitle'." ---> ".strlen($mytitle));

			$course = array('title' => $mytitle, 'description' => $mydescription);

			$this->Course->add_data($course);
			redirect('/');
			exit;

		} else {
			// otherwise go to bad entry page and pass my title to explain it.
			$this->load->view('bad_entry',array('title' => $mytitle));
		}
		
	}

	// bring in url parameter.  we would check against user to make sure they are
	// able to remove this course, etc.
	public function VerifyRemoveCourse($cid=0) {

		// load info from model to pass to view
		$course['mydata'] = $this->Course->get_data_id($cid);
		$this->load->view('verify_remove',$course);
	}

	public function RemoveCourse($cid=0) {
		$this->output->enable_profiler(TRUE);
		// echo "erased";
		// exit;

		$this->Course->remove_data($cid);

		redirect('/');
	}
}