<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	function __construct()
    {
        parent::__construct();
        $this->load->model('User_model');
        $this->load->model('Customer_model');
        $this->load->model('Packing_model');
        $this->load->model('Product_model');
        $this->load->model('Status_model');
        $this->load->library('form_validation');        
		$this->load->library('datatables');

		if ($this->session->userdata('logged') !=TRUE) {
			redirect(base_url());
		}
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
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		$data['page'] = "dashboard/index";
		
		// $data['count_user'] = $this->Users_model->total_rows();
		// $data['count_article'] = $this->News_model->total_rows();
		// $data['count_news_cat'] = $this->News_cat_model->total_rows();
		// $data['count_foto'] = $this->Photo_model->total_rows();
		// $data['count_video'] = $this->Video_model->total_rows();

		$data['count_user'] = $this->User_model->total_rows();
		$data['count_customer'] = $this->Customer_model->total_rows();
		$data['count_packing'] = $this->Packing_model->total_rows();
		$data['count_product'] = $this->Product_model->total_rows();
		$data['count_status'] = $this->Status_model->total_rows();
	
		$this->load->view('dashboard/dashboard', $data);
	}
}
