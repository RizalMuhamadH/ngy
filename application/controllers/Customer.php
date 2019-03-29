<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Customer extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Customer_model');
        $this->load->model('Transaction_model');
        $this->load->model('Desc_transaction_model');
        $this->load->model('Product_model');
        $this->load->model('Packing_model');
        $this->load->model('Status_model');
        $this->load->library('form_validation');        
        $this->load->library('datatables');
        $this->load->helper('string');

        if ($this->session->userdata('logged') !=TRUE) {
			redirect(base_url());
		}
    }

    public function index()
    {
        $data['page'] = 'customer/customer_list';
        $this->load->view('dashboard/dashboard', $data);
    } 
    
    public function json() {
        header('Content-Type: application/json');
        echo $this->Customer_model->json();
    }

    public function read($id) 
    {
        $row = $this->Customer_model->get_by_id($id);
        if ($row) {
            $tmp = '';
            $items = '';
            $product = count($this->Product_model->get_products());
            $p = $this->Product_model->get_products();
            
            for($i = 0; $i < $product; $i++){
                $b = explode(',',$row->dt_list_products);
                foreach($b as $item){
                    $tmp = $item;
                    if($tmp == $p[$i]['p_id']){
                        $items = $items.$p[$i]['p_name'].",";
                        break;
                    }
                }
            }


            $data = array(
		'c_id' => $row->c_id,
		'c_name_sender' => $row->c_name_sender,
		'c_address_sender' => $row->c_address_sender,
		'c_city_sender' => $row->c_city_sender,
		'c_postcode_sender' => $row->c_postcode_sender,
		'c_phone_sender' => $row->c_phone_sender,
		'c_name_receiver' => $row->c_name_receiver,
		'c_address_receiver' => $row->c_address_receiver,
		'c_city_receiver' => $row->c_city_receiver,
		'c_postcode_receiver' => $row->c_postcode_receiver,
        'c_phone_receiver' => $row->c_phone_receiver,
        'dt_list_products' => set_value('dt_list_products', $items),
        'dt_total_items' => set_value('dt_total_items', $row->dt_total_items),
		'dt_total_weight' => set_value('dt_total_weight', $row->dt_total_weight),
	    'dt_total_price' => set_value('dt_total_price', $row->dt_total_price),
		'dt_packing' => set_value('dt_packing', $row->dt_packing),
		'dt_desc' => set_value('dt_desc', $row->dt_desc),
		't_no_trans' => set_value('t_no_trans', $row->t_no_trans),
		't_date_delivery' => set_value('t_date_delivery', $row->t_date_delivery),
		't_date_reception' => set_value('t_date_reception', $row->t_date_reception),
		't_status' => set_value('t_status', $row->t_status),
		't_desc' => set_value('t_desc', $row->t_desc),
	    'dt_id' => set_value('dt_id', $row->dt_id),
	    't_id' => set_value('t_id', $row->t_id),
	    'product' => $this->Product_model->get_products(),
	    'packing' => $this->Packing_model->get_all(),
	    'status' => $this->Status_model->get_all(),
	    );
            $this->load->view('customer/customer_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('customer'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('customer/create_action'),
	    'c_id' => set_value('c_id'),
	    'c_name_sender' => set_value('c_name_sender'),
	    'c_address_sender' => set_value('c_address_sender'),
	    'c_city_sender' => set_value('c_city_sender'),
	    'c_postcode_sender' => set_value('c_postcode_sender'),
	    'c_phone_sender' => set_value('c_phone_sender'),
	    'c_name_receiver' => set_value('c_name_receiver'),
	    'c_address_receiver' => set_value('c_address_receiver'),
	    'c_city_receiver' => set_value('c_city_receiver'),
	    'c_postcode_receiver' => set_value('c_postcode_receiver'),
	    'c_phone_receiver' => set_value('c_phone_receiver'),
	    'dt_list_products' => set_value('dt_list_products'),
	    'dt_total_weight' => set_value('dt_total_weight'),
	    'dt_total_price' => set_value('dt_total_price'),
	    'dt_packing' => set_value('dt_packing'),
	    'dt_desc' => set_value('dt_desc'),
	    't_no_trans' => set_value('t_no_trans'),
	    't_date_delivery' => set_value('t_date_delivery'),
	    't_date_reception' => set_value('t_date_reception'),
	    't_status' => set_value('t_status'),
	    't_desc' => set_value('t_desc'),
	    'dt_id' => set_value('dt_id'),
	    't_id' => set_value('t_id'),
	    'product' => $this->Product_model->get_products(),
	    'packing' => $this->Packing_model->get_all(),
	    'status' => $this->Status_model->get_all(),
        'page' => 'customer/customer_form',
	);
        $this->load->view('dashboard/dashboard', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $product_tags = $this->input->post('product_tags');
            $pt = '';
            foreach ($product_tags as $product) {
                $pt = $pt.$product.",";
                
            }

            $data = array(
            'c_name_sender' => $this->input->post('c_name_sender',TRUE),
            'c_address_sender' => $this->input->post('c_address_sender',TRUE),
            'c_city_sender' => $this->input->post('c_city_sender',TRUE),
            'c_postcode_sender' => $this->input->post('c_postcode_sender',TRUE),
            'c_phone_sender' => $this->input->post('c_phone_sender',TRUE),
            'c_name_receiver' => $this->input->post('c_name_receiver',TRUE),
            'c_address_receiver' => $this->input->post('c_address_receiver',TRUE),
            'c_city_receiver' => $this->input->post('c_city_receiver',TRUE),
            'c_postcode_receiver' => $this->input->post('c_postcode_receiver',TRUE),
            'c_phone_receiver' => $this->input->post('c_phone_receiver',TRUE),
            );

            $idCustomer = $this->Customer_model->insert($data);

            $desc_trans = array(
                'dt_list_products' => $pt,
                'dt_total_items' => sizeof($product_tags),
                'dt_total_weight' => $pt,
                'dt_total_weight' => $this->input->post('dt_total_weight'),
                'dt_packing' => $this->input->post('dt_packing'),
                'dt_total_price' => $this->input->post('dt_total_price'),
                'dt_desc' => $this->input->post('dt_desc'),
                'dt_date' => date("Y/m/d H:i:s"),
            );

            $idDescTrans = $this->Desc_transaction_model->insert($desc_trans);

            $trans = array(
                't_no_trans' => $idCustomer.$idDescTrans.date("Y").date("m").date("d").strtoupper(random_string('alnum', 4)),
                't_date_delivery' => $this->input->post('t_date_delivery'),
                't_date_reception' => $this->input->post('t_date_reception'),
                't_status' => $this->input->post('t_status'),
                't_desc' => $this->input->post('t_desc'),
                'dt_id ' => $idDescTrans,
                'c_id ' => $idCustomer,
            );

            $this->Transaction_model->insert($trans);

            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('customer'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Customer_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('customer/update_action'),
		'c_id' => set_value('c_id', $row->c_id),
		'c_name_sender' => set_value('c_name_sender', $row->c_name_sender),
		'c_address_sender' => set_value('c_address_sender', $row->c_address_sender),
		'c_city_sender' => set_value('c_city_sender', $row->c_city_sender),
		'c_postcode_sender' => set_value('c_postcode_sender', $row->c_postcode_sender),
		'c_phone_sender' => set_value('c_phone_sender', $row->c_phone_sender),
		'c_name_receiver' => set_value('c_name_receiver', $row->c_name_receiver),
		'c_address_receiver' => set_value('c_address_receiver', $row->c_address_receiver),
		'c_city_receiver' => set_value('c_city_receiver', $row->c_city_receiver),
		'c_postcode_receiver' => set_value('c_postcode_receiver', $row->c_postcode_receiver),
        'c_phone_receiver' => set_value('c_phone_receiver', $row->c_phone_receiver),
        'dt_total_items' => set_value('dt_total_items', $row->dt_total_items),
		'dt_list_products' => set_value('dt_list_products', $row->dt_list_products),
		'dt_total_weight' => set_value('dt_total_weight', $row->dt_total_weight),
	    'dt_total_price' => set_value('dt_total_price', $row->dt_total_price),
		'dt_packing' => set_value('dt_packing', $row->dt_packing),
		'dt_desc' => set_value('dt_desc', $row->dt_desc),
		't_no_trans' => set_value('t_no_trans', $row->t_no_trans),
		't_date_delivery' => set_value('t_date_delivery', $row->t_date_delivery),
		't_date_reception' => set_value('t_date_reception', $row->t_date_reception),
		't_status' => set_value('t_status', $row->t_status),
		't_desc' => set_value('t_desc', $row->t_desc),
	    'dt_id' => set_value('dt_id', $row->dt_id),
	    't_id' => set_value('t_id', $row->t_id),
	    'product' => $this->Product_model->get_products(),
	    'packing' => $this->Packing_model->get_all(),
	    'status' => $this->Status_model->get_all(),
        'page' => 'customer/customer_form',
	    );
            $this->load->view('dashboard/dashboard', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('customer'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('c_id', TRUE));
        } else {
            $data = array(
                'c_name_sender' => $this->input->post('c_name_sender',TRUE),
                'c_address_sender' => $this->input->post('c_address_sender',TRUE),
                'c_city_sender' => $this->input->post('c_city_sender',TRUE),
                'c_postcode_sender' => $this->input->post('c_postcode_sender',TRUE),
                'c_phone_sender' => $this->input->post('c_phone_sender',TRUE),
                'c_name_receiver' => $this->input->post('c_name_receiver',TRUE),
                'c_address_receiver' => $this->input->post('c_address_receiver',TRUE),
                'c_city_receiver' => $this->input->post('c_city_receiver',TRUE),
                'c_postcode_receiver' => $this->input->post('c_postcode_receiver',TRUE),
                'c_phone_receiver' => $this->input->post('c_phone_receiver',TRUE),
            );

            $this->Customer_model->update($this->input->post('c_id', TRUE), $data);

            $product_tags = $this->input->post('product_tags');
            $pt = '';
            foreach ($product_tags as $product) {
                $pt = $pt.$product.",";
                
            }

            $desc_trans = array(
                'dt_list_products' => $pt,
                'dt_total_items' => sizeof($product_tags),
                'dt_total_weight' => $pt,
                'dt_total_weight' => $this->input->post('dt_total_weight'),
                'dt_packing' => $this->input->post('dt_packing'),
                'dt_total_price' => $this->input->post('dt_total_price'),
                'dt_desc' => $this->input->post('dt_desc'),
                // 'dt_date' => date("Y/m/d H:i:s"),
            );

            
            $this->Desc_transaction_model->update($this->input->post('dt_id', TRUE), $desc_trans);

            $trans = array(
                // 't_no_trans' => $idCustomer.$idDescTrans.date("Y").date("m").date("d").strtoupper(random_string('alnum', 4)),
                't_date_delivery' => $this->input->post('t_date_delivery'),
                't_date_reception' => $this->input->post('t_date_reception'),
                't_status' => $this->input->post('t_status'),
                't_desc' => $this->input->post('t_desc'),
                // 'dt_id ' => $idDescTrans,
                // 'c_id ' => $idCustomer,
            );

            $this->Transaction_model->update($this->input->post('t_id', TRUE), $trans);

            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('customer'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Customer_model->get_by_id($id);

        if ($row) {
            $this->Customer_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('customer'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('customer'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('c_name_sender', 'nama', 'trim|required');
	$this->form_validation->set_rules('c_address_sender', 'alamat', 'trim|required');
	$this->form_validation->set_rules('c_city_sender', 'kota', 'trim|required');
	$this->form_validation->set_rules('c_postcode_sender', 'kode pos', 'trim|required');
	$this->form_validation->set_rules('c_phone_sender', 'telepon', 'trim|required');
	$this->form_validation->set_rules('c_name_receiver', 'nama', 'trim|required');
	$this->form_validation->set_rules('c_address_receiver', 'alamat', 'trim|required');
	$this->form_validation->set_rules('c_city_receiver', 'kota', 'trim|required');
	$this->form_validation->set_rules('c_postcode_receiver', 'kode pos', 'trim|required');
	$this->form_validation->set_rules('c_phone_receiver', 'telepon', 'trim|required');

	$this->form_validation->set_rules('c_id', 'c_id', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "customer.xls";
        $judul = "customer";
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
	xlsWriteLabel($tablehead, $kolomhead++, "C Name Sender");
	xlsWriteLabel($tablehead, $kolomhead++, "C Address Sender");
	xlsWriteLabel($tablehead, $kolomhead++, "C City Sender");
	xlsWriteLabel($tablehead, $kolomhead++, "C Postcode Sender");
	xlsWriteLabel($tablehead, $kolomhead++, "C Phone Sender");
	xlsWriteLabel($tablehead, $kolomhead++, "C Name Receiver");
	xlsWriteLabel($tablehead, $kolomhead++, "C Address Receiver");
	xlsWriteLabel($tablehead, $kolomhead++, "C City Receiver");
	xlsWriteLabel($tablehead, $kolomhead++, "C Postcode Receiver");
	xlsWriteLabel($tablehead, $kolomhead++, "C Phone Receiver");

	foreach ($this->Customer_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteLabel($tablebody, $kolombody++, $data->c_name_sender);
	    xlsWriteLabel($tablebody, $kolombody++, $data->c_address_sender);
	    xlsWriteLabel($tablebody, $kolombody++, $data->c_city_sender);
	    xlsWriteLabel($tablebody, $kolombody++, $data->c_postcode_sender);
	    xlsWriteLabel($tablebody, $kolombody++, $data->c_phone_sender);
	    xlsWriteLabel($tablebody, $kolombody++, $data->c_name_receiver);
	    xlsWriteLabel($tablebody, $kolombody++, $data->c_address_receiver);
	    xlsWriteLabel($tablebody, $kolombody++, $data->c_city_receiver);
	    xlsWriteLabel($tablebody, $kolombody++, $data->c_postcode_receiver);
	    xlsWriteLabel($tablebody, $kolombody++, $data->c_phone_receiver);

	    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

    public function word()
    {
        header("Content-type: application/vnd.ms-word");
        header("Content-Disposition: attachment;Filename=customer.doc");

        $data = array(
            'customer_data' => $this->Customer_model->get_all(),
            'start' => 0
        );
        
        $this->load->view('customer/customer_doc',$data);
    }

}

/* End of file Customer.php */
/* Location: ./application/controllers/Customer.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2019-03-21 11:28:35 */
/* http://harviacode.com */