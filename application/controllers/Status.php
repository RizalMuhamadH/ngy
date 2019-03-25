<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Status extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Status_model');
        $this->load->library('form_validation');        
	$this->load->library('datatables');
    }

    public function index()
    {
        $data['page'] = 'status/status_list';
        $this->load->view('dashboard/dashboard', $data);
    } 
    
    public function json() {
        header('Content-Type: application/json');
        echo $this->Status_model->json();
    }

    public function read($id) 
    {
        $row = $this->Status_model->get_by_id($id);
        if ($row) {
            $data = array(
		's_id' => $row->s_id,
		's_name' => $row->s_name,
	    );
            $this->load->view('status/status_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('status'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('status/create_action'),
	    's_id' => set_value('s_id'),
	    's_name' => set_value('s_name'),
        'page' => 'status/status_form',
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
		's_name' => $this->input->post('s_name',TRUE),
	    );

            $this->Status_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('status'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Status_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('status/update_action'),
		's_id' => set_value('s_id', $row->s_id),
		's_name' => set_value('s_name', $row->s_name),
        'page' => 'status/status_form',
	    );            
            $this->load->view('dashboard/dashboard', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('status'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('s_id', TRUE));
        } else {
            $data = array(
		's_name' => $this->input->post('s_name',TRUE),
	    );

            $this->Status_model->update($this->input->post('s_id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('status'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Status_model->get_by_id($id);

        if ($row) {
            $this->Status_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('status'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('status'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('s_name', 's name', 'trim|required');

	$this->form_validation->set_rules('s_id', 's_id', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "status.xls";
        $judul = "status";
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
	xlsWriteLabel($tablehead, $kolomhead++, "S Name");

	foreach ($this->Status_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteLabel($tablebody, $kolombody++, $data->s_name);

	    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

    public function word()
    {
        header("Content-type: application/vnd.ms-word");
        header("Content-Disposition: attachment;Filename=status.doc");

        $data = array(
            'status_data' => $this->Status_model->get_all(),
            'start' => 0
        );
        
        $this->load->view('status/status_doc',$data);
    }

}

/* End of file Status.php */
/* Location: ./application/controllers/Status.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2019-03-25 10:33:34 */
/* http://harviacode.com */