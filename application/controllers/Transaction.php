<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Transaction extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Transaction_model');
        $this->load->library('form_validation');        
	$this->load->library('datatables');
    }

    public function index()
    {
        $this->load->view('transaction/transaction_list');
    } 
    
    public function json() {
        header('Content-Type: application/json');
        echo $this->Transaction_model->json();
    }

    public function read($id) 
    {
        $row = $this->Transaction_model->get_by_id($id);
        if ($row) {
            $data = array(
		't_id' => $row->t_id,
		't_no_trans' => $row->t_no_trans,
		't_date_delivery' => $row->t_date_delivery,
		't_date_reception' => $row->t_date_reception,
		't_status' => $row->t_status,
		't_desc' => $row->t_desc,
		'dt_id' => $row->dt_id,
		'c_id' => $row->c_id,
	    );
            $this->load->view('transaction/transaction_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('transaction'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('transaction/create_action'),
	    't_id' => set_value('t_id'),
	    't_no_trans' => set_value('t_no_trans'),
	    't_date_delivery' => set_value('t_date_delivery'),
	    't_date_reception' => set_value('t_date_reception'),
	    't_status' => set_value('t_status'),
	    't_desc' => set_value('t_desc'),
	    'dt_id' => set_value('dt_id'),
	    'c_id' => set_value('c_id'),
	);
        $this->load->view('transaction/transaction_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		't_no_trans' => $this->input->post('t_no_trans',TRUE),
		't_date_delivery' => $this->input->post('t_date_delivery',TRUE),
		't_date_reception' => $this->input->post('t_date_reception',TRUE),
		't_status' => $this->input->post('t_status',TRUE),
		't_desc' => $this->input->post('t_desc',TRUE),
		'dt_id' => $this->input->post('dt_id',TRUE),
		'c_id' => $this->input->post('c_id',TRUE),
	    );

            $this->Transaction_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('transaction'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Transaction_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('transaction/update_action'),
		't_id' => set_value('t_id', $row->t_id),
		't_no_trans' => set_value('t_no_trans', $row->t_no_trans),
		't_date_delivery' => set_value('t_date_delivery', $row->t_date_delivery),
		't_date_reception' => set_value('t_date_reception', $row->t_date_reception),
		't_status' => set_value('t_status', $row->t_status),
		't_desc' => set_value('t_desc', $row->t_desc),
		'dt_id' => set_value('dt_id', $row->dt_id),
		'c_id' => set_value('c_id', $row->c_id),
	    );
            $this->load->view('transaction/transaction_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('transaction'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('t_id', TRUE));
        } else {
            $data = array(
		't_no_trans' => $this->input->post('t_no_trans',TRUE),
		't_date_delivery' => $this->input->post('t_date_delivery',TRUE),
		't_date_reception' => $this->input->post('t_date_reception',TRUE),
		't_status' => $this->input->post('t_status',TRUE),
		't_desc' => $this->input->post('t_desc',TRUE),
		'dt_id' => $this->input->post('dt_id',TRUE),
		'c_id' => $this->input->post('c_id',TRUE),
	    );

            $this->Transaction_model->update($this->input->post('t_id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('transaction'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Transaction_model->get_by_id($id);

        if ($row) {
            $this->Transaction_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('transaction'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('transaction'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('t_no_trans', 't no trans', 'trim|required');
	$this->form_validation->set_rules('t_date_delivery', 't date delivery', 'trim|required');
	$this->form_validation->set_rules('t_date_reception', 't date reception', 'trim|required');
	$this->form_validation->set_rules('t_status', 't status', 'trim|required');
	$this->form_validation->set_rules('t_desc', 't desc', 'trim|required');
	$this->form_validation->set_rules('dt_id', 'dt id', 'trim|required');
	$this->form_validation->set_rules('c_id', 'c id', 'trim|required');

	$this->form_validation->set_rules('t_id', 't_id', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "transaction.xls";
        $judul = "transaction";
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
	xlsWriteLabel($tablehead, $kolomhead++, "T No Trans");
	xlsWriteLabel($tablehead, $kolomhead++, "T Date Delivery");
	xlsWriteLabel($tablehead, $kolomhead++, "T Date Reception");
	xlsWriteLabel($tablehead, $kolomhead++, "T Status");
	xlsWriteLabel($tablehead, $kolomhead++, "T Desc");
	xlsWriteLabel($tablehead, $kolomhead++, "Dt Id");
	xlsWriteLabel($tablehead, $kolomhead++, "C Id");

	foreach ($this->Transaction_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteLabel($tablebody, $kolombody++, $data->t_no_trans);
	    xlsWriteLabel($tablebody, $kolombody++, $data->t_date_delivery);
	    xlsWriteLabel($tablebody, $kolombody++, $data->t_date_reception);
	    xlsWriteLabel($tablebody, $kolombody++, $data->t_status);
	    xlsWriteLabel($tablebody, $kolombody++, $data->t_desc);
	    xlsWriteNumber($tablebody, $kolombody++, $data->dt_id);
	    xlsWriteNumber($tablebody, $kolombody++, $data->c_id);

	    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

    public function word()
    {
        header("Content-type: application/vnd.ms-word");
        header("Content-Disposition: attachment;Filename=transaction.doc");

        $data = array(
            'transaction_data' => $this->Transaction_model->get_all(),
            'start' => 0
        );
        
        $this->load->view('transaction/transaction_doc',$data);
    }

}

/* End of file Transaction.php */
/* Location: ./application/controllers/Transaction.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2019-03-24 16:27:39 */
/* http://harviacode.com */