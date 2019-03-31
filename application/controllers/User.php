<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class User extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('User_model');
        $this->load->library('form_validation');        
        $this->load->library('datatables');
        
        // if ($this->session->userdata('logged') !=TRUE) {
		// 	redirect(base_url());
		// }
    }

    public function index()
    {
        if ($this->session->userdata('logged') !=TRUE) {
			redirect(base_url());
		} else {
            $data['page'] = 'user/user_list';
            $this->load->view('dashboard/dashboard', $data);
        }
    } 
    
    public function json() {
        if ($this->session->userdata('logged') !=TRUE) {
			redirect(base_url());
		} else {
            header('Content-Type: application/json');
            echo $this->User_model->json();
        }
    }

    public function login(){
        $username = $this->input->post('username');
        $password = $this->input->post('password');
        
        $this->User_model->login($username, $password);

    }

    public function logout(){
        $this->User_model->logout();
        redirect(base_url());
    }

    public function read($id) 
    {
        if ($this->session->userdata('logged') !=TRUE) {
			redirect(base_url());
		} else {
            $row = $this->User_model->get_by_id($id);
            if ($row) {
                $data = array(
            '_id' => $row->_id,
            '_username' => $row->_username,
            '_password' => $row->_password,
            '_name' => $row->_name,
            '_previllage' => $row->_previllage,
            );
                $this->load->view('user/user_read', $data);
            } else {
                $this->session->set_flashdata('message', 'Record Not Found');
                redirect(site_url('user'));
            }
        }
    }

    public function create() 
    {
        if ($this->session->userdata('logged') !=TRUE) {
			redirect(base_url());
		} else {
            $data = array(
                'button' => 'Create',
                'action' => site_url('user/create_action'),
            '_id' => set_value('_id'),
            '_username' => set_value('_username'),
            '_password' => set_value('_password'),
            '_name' => set_value('_name'),
            '_previllage' => set_value('_previllage'),
            'page' => 'user/user_form',
        );
            $this->load->view('dashboard/dashboard', $data);
        }
    }
    
    public function create_action() 
    {
        if ($this->session->userdata('logged') !=TRUE) {
			redirect(base_url());
		} else {
            $this->_rules();
    
            if ($this->form_validation->run() == FALSE) {
                $this->create();
            } else {
                $data = array(
            '_username' => $this->input->post('_username',TRUE),
            '_password' => md5($this->input->post('_password',TRUE)),
            '_name' => $this->input->post('_name',TRUE),
            '_previllage' => $this->input->post('_previllage',TRUE),
            );
    
                $this->User_model->insert($data);
                $this->session->set_flashdata('message', 'Create Record Success');
                redirect(site_url('user'));
            }
        }
    }
    
    public function update($id) 
    {
        if ($this->session->userdata('logged') !=TRUE) {
			redirect(base_url());
		} else {
            $row = $this->User_model->get_by_id($id);
    
            if ($row) {
                $data = array(
                    'button' => 'Update',
                    'action' => site_url('user/update_action'),
            '_id' => set_value('_id', $row->_id),
            '_username' => set_value('_username', $row->_username),
            '_password' => set_value('_password', $row->_password),
            '_name' => set_value('_name', $row->_name),
            '_previllage' => set_value('_previllage', $row->_previllage),
            'page' => 'user/user_form',
            );
                $this->load->view('dashboard/dashboard', $data);
            } else {
                $this->session->set_flashdata('message', 'Record Not Found');
                redirect(site_url('user'));
            }
        }
    }
    
    public function update_action() 
    {
        if ($this->session->userdata('logged') !=TRUE) {
			redirect(base_url());
		} else {
            $this->_rules();
    
            if ($this->form_validation->run() == FALSE) {
                $this->update($this->input->post('_id', TRUE));
            } else {
                $data = array(
            '_username' => $this->input->post('_username',TRUE),
            '_password' => $this->input->post('_password',TRUE),
            '_name' => $this->input->post('_name',TRUE),
            '_previllage' => $this->input->post('_previllage',TRUE),
            );
    
                $this->User_model->update($this->input->post('_id', TRUE), $data);
                $this->session->set_flashdata('message', 'Update Record Success');
                redirect(site_url('user'));
            }
        }
    }
    
    public function delete($id) 
    {
        if ($this->session->userdata('logged') !=TRUE) {
			redirect(base_url());
		} else {
            $row = $this->User_model->get_by_id($id);
    
            if ($row) {
                $this->User_model->delete($id);
                $this->session->set_flashdata('message', 'Delete Record Success');
                redirect(site_url('user'));
            } else {
                $this->session->set_flashdata('message', 'Record Not Found');
                redirect(site_url('user'));
            }
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('_username', ' username', 'trim|required');
	$this->form_validation->set_rules('_password', ' password', 'trim|required');
	$this->form_validation->set_rules('_name', ' name', 'trim|required');
	$this->form_validation->set_rules('_previllage', ' previllage', 'trim|required');

	$this->form_validation->set_rules('_id', '_id', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "user.xls";
        $judul = "user";
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
	xlsWriteLabel($tablehead, $kolomhead++, " Username");
	xlsWriteLabel($tablehead, $kolomhead++, " Password");
	xlsWriteLabel($tablehead, $kolomhead++, " Name");
	xlsWriteLabel($tablehead, $kolomhead++, " Previllage");

	foreach ($this->User_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteLabel($tablebody, $kolombody++, $data->_username);
	    xlsWriteLabel($tablebody, $kolombody++, $data->_password);
	    xlsWriteLabel($tablebody, $kolombody++, $data->_name);
	    xlsWriteNumber($tablebody, $kolombody++, $data->_previllage);

	    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

    public function word()
    {
        header("Content-type: application/vnd.ms-word");
        header("Content-Disposition: attachment;Filename=user.doc");

        $data = array(
            'user_data' => $this->User_model->get_all(),
            'start' => 0
        );
        
        $this->load->view('user/user_doc',$data);
    }

}

/* End of file User.php */
/* Location: ./application/controllers/User.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2019-03-21 11:28:35 */
/* http://harviacode.com */