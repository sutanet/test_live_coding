<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class TestLiveController extends CI_Controller {

	public function __construct() {
        parent::__construct();
        $this->load->model('mmodels','_model');
    }

	public function index(){
		$this->load->view('live_test');
	}

	public function list_user(){
		$output = $this->_model->fetch();
		echo json_encode($output);
	}
}

?>
