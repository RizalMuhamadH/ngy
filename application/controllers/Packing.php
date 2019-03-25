<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Packing extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Packing_model');
        $this->load->library('form_validation');        
	$this->load->library('datatables');
    }

    public function index()
    {
        $data['page'] = 'packing/packing_list';
        $this->load->view('dashboard/dashboard', $data);
    } 
    
    public function json() {
        header('Content-Type: application/json');
        echo $this->Packing_model->json();
    }

    public function read($id) 
    {
        $row = $this->Packing_model->get_by_id($id);
        if ($row) {
            $data = array(
		'pk_id' => $row->pk_id,
		'pk_name' => $row->pk_name,
	    );
            $this->load->view('packing/packing_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('packing'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('packing/create_action'),
	    'pk_id' => set_value('pk_id'),
	    'pk_name' => set_value('pk_name'),
        'page' => 'packing/packing_form',
	);
        $this->load->view('dashboard/dashboard', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'pk_name' => $this->input->post('pk_name',TRUE),
	    );

            $this->Packing_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('packing'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Packing_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('packing/update_action'),
		'pk_id' => set_value('pk_id', $row->pk_id),
		'pk_name' => set_value('pk_name', $row->pk_name),
        'page' => 'packing/packing_form',
	    );
            $this->load->view('dashboard/dashboard', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('packing'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('pk_id', TRUE));
        } else {
            $data = array(
		'pk_name' => $this->input->post('pk_name',TRUE),
	    );

            $this->Packing_model->update($this->input->post('pk_id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('packing'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Packing_model->get_by_id($id);

        if ($row) {
            $this->Packing_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('packing'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('packing'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('pk_name', 'Jenis Packing', 'trim|required');

	$this->form_validation->set_rules('pk_id', 'pk_id', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "packing.xls";
        $judul = "packing";
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
	xlsWriteLabel($tablehead, $kolomhead++, "Pk Name");

	foreach ($this->Packing_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteLabel($tablebody, $kolombody++, $data->pk_name);

	    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

    public function word()
    {
        header("Content-type: application/vnd.ms-word");
        header("Content-Disposition: attachment;Filename=packing.doc");

        $data = array(
            'packing_data' => $this->Packing_model->get_all(),
            'start' => 0
        );
        
        $this->load->view('packing/packing_doc',$data);
    }

}

/* End of file Packing.php */
/* Location: ./application/controllers/Packing.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2019-03-25 10:33:25 */
/* http://harviacode.com */