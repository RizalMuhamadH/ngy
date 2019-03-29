<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Desc_transaction extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Desc_transaction_model');
        $this->load->library('form_validation');        
        $this->load->library('datatables');
        
        if ($this->session->userdata('logged') !=TRUE) {
			redirect(base_url());
		}
    }

    public function index()
    {
        $this->load->view('desc_transaction/desc_transaction_list');
    } 
    
    public function json() {
        header('Content-Type: application/json');
        echo $this->Desc_transaction_model->json();
    }

    public function read($id) 
    {
        $row = $this->Desc_transaction_model->get_by_id($id);
        if ($row) {
            $data = array(
		'dt_id' => $row->dt_id,
		'dt_list_products' => $row->dt_list_products,
		'dt_total_items' => $row->dt_total_items,
		'dt_total_weight' => $row->dt_total_weight,
		'dt_packing' => $row->dt_packing,
		'dt_total_price' => $row->dt_total_price,
		'dt_desc' => $row->dt_desc,
		'dt_date' => $row->dt_date,
	    );
            $this->load->view('desc_transaction/desc_transaction_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('desc_transaction'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('desc_transaction/create_action'),
	    'dt_id' => set_value('dt_id'),
	    'dt_list_products' => set_value('dt_list_products'),
	    'dt_total_items' => set_value('dt_total_items'),
	    'dt_total_weight' => set_value('dt_total_weight'),
	    'dt_packing' => set_value('dt_packing'),
	    'dt_total_price' => set_value('dt_total_price'),
	    'dt_desc' => set_value('dt_desc'),
	    'dt_date' => set_value('dt_date'),
	);
        $this->load->view('desc_transaction/desc_transaction_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'dt_list_products' => $this->input->post('dt_list_products',TRUE),
		'dt_total_items' => $this->input->post('dt_total_items',TRUE),
		'dt_total_weight' => $this->input->post('dt_total_weight',TRUE),
		'dt_packing' => $this->input->post('dt_packing',TRUE),
		'dt_total_price' => $this->input->post('dt_total_price',TRUE),
		'dt_desc' => $this->input->post('dt_desc',TRUE),
		'dt_date' => $this->input->post('dt_date',TRUE),
	    );

            $this->Desc_transaction_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('desc_transaction'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Desc_transaction_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('desc_transaction/update_action'),
		'dt_id' => set_value('dt_id', $row->dt_id),
		'dt_list_products' => set_value('dt_list_products', $row->dt_list_products),
		'dt_total_items' => set_value('dt_total_items', $row->dt_total_items),
		'dt_total_weight' => set_value('dt_total_weight', $row->dt_total_weight),
		'dt_packing' => set_value('dt_packing', $row->dt_packing),
		'dt_total_price' => set_value('dt_total_price', $row->dt_total_price),
		'dt_desc' => set_value('dt_desc', $row->dt_desc),
		'dt_date' => set_value('dt_date', $row->dt_date),
	    );
            $this->load->view('desc_transaction/desc_transaction_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('desc_transaction'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('dt_id', TRUE));
        } else {
            $data = array(
		'dt_list_products' => $this->input->post('dt_list_products',TRUE),
		'dt_total_items' => $this->input->post('dt_total_items',TRUE),
		'dt_total_weight' => $this->input->post('dt_total_weight',TRUE),
		'dt_packing' => $this->input->post('dt_packing',TRUE),
		'dt_total_price' => $this->input->post('dt_total_price',TRUE),
		'dt_desc' => $this->input->post('dt_desc',TRUE),
		'dt_date' => $this->input->post('dt_date',TRUE),
	    );

            $this->Desc_transaction_model->update($this->input->post('dt_id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('desc_transaction'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Desc_transaction_model->get_by_id($id);

        if ($row) {
            $this->Desc_transaction_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('desc_transaction'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('desc_transaction'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('dt_list_products', 'dt list products', 'trim|required');
	$this->form_validation->set_rules('dt_total_items', 'dt total items', 'trim|required');
	$this->form_validation->set_rules('dt_total_weight', 'dt total weight', 'trim|required|numeric');
	$this->form_validation->set_rules('dt_packing', 'dt packing', 'trim|required');
	$this->form_validation->set_rules('dt_total_price', 'dt total price', 'trim|required');
	$this->form_validation->set_rules('dt_desc', 'dt desc', 'trim|required');
	$this->form_validation->set_rules('dt_date', 'dt date', 'trim|required');

	$this->form_validation->set_rules('dt_id', 'dt_id', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "desc_transaction.xls";
        $judul = "desc_transaction";
        $tablehead = 0;
        $tablebody = 1;
        $nourut = 1;
        //penulisan header
        header("Pragma: public");
        header("Expires: 0");
        header("Cache-Control: must-revalidate, post-check=0,pre-check=0");
        header("Content-Type: application/force-download");
        header("Content-Type: application/octet-stream");
        header("Content-Type: application/download");
        header("Content-Disposition: attachment;filename=" . $namaFile . "");
        header("Content-Transfer-Encoding: binary ");

        xlsBOF();

        $kolomhead = 0;
        xlsWriteLabel($tablehead, $kolomhead++, "No");
	xlsWriteLabel($tablehead, $kolomhead++, "Dt List Products");
	xlsWriteLabel($tablehead, $kolomhead++, "Dt Total Items");
	xlsWriteLabel($tablehead, $kolomhead++, "Dt Total Weight");
	xlsWriteLabel($tablehead, $kolomhead++, "Dt Packing");
	xlsWriteLabel($tablehead, $kolomhead++, "Dt Total Price");
	xlsWriteLabel($tablehead, $kolomhead++, "Dt Desc");
	xlsWriteLabel($tablehead, $kolomhead++, "Dt Date");

	foreach ($this->Desc_transaction_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteLabel($tablebody, $kolombody++, $data->dt_list_products);
	    xlsWriteNumber($tablebody, $kolombody++, $data->dt_total_items);
	    xlsWriteNumber($tablebody, $kolombody++, $data->dt_total_weight);
	    xlsWriteLabel($tablebody, $kolombody++, $data->dt_packing);
	    xlsWriteNumber($tablebody, $kolombody++, $data->dt_total_price);
	    xlsWriteLabel($tablebody, $kolombody++, $data->dt_desc);
	    xlsWriteLabel($tablebody, $kolombody++, $data->dt_date);

	    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

    public function word()
    {
        header("Content-type: application/vnd.ms-word");
        header("Content-Disposition: attachment;Filename=desc_transaction.doc");

        $data = array(
            'desc_transaction_data' => $this->Desc_transaction_model->get_all(),
            'start' => 0
        );
        
        $this->load->view('desc_transaction/desc_transaction_doc',$data);
    }

}

/* End of file Desc_transaction.php */
/* Location: ./application/controllers/Desc_transaction.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2019-03-24 16:33:45 */
/* http://harviacode.com */