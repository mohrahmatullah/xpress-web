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
    }

    public function index()
    {
        $this->load->view('user/0_user_list');
    } 
    
    public function json() {
        header('Content-Type: application/json');
        echo $this->User_model->json();
    }

    public function read($id) 
    {
        $row = $this->User_model->get_by_id($id);
        if ($row) {
            $data = array(
		'uid' => $row->uid,
		'unick' => $row->unick,
		'upass' => $row->upass,
		'ugrp' => $row->ugrp,
	    );
            $this->load->view('user/0_user_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('user'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('user/create_action'),
	    'uid' => set_value('uid'),
	    'unick' => set_value('unick'),
	    'upass' => set_value('upass'),
	    'ugrp' => set_value('ugrp'),
	);
        $this->load->view('user/0_user_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'unick' => $this->input->post('unick',TRUE),
		'upass' => $this->input->post('upass',TRUE),
		'ugrp' => $this->input->post('ugrp',TRUE),
	    );

            $this->User_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('user'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->User_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('user/update_action'),
		'uid' => set_value('uid', $row->uid),
		'unick' => set_value('unick', $row->unick),
		'upass' => set_value('upass', $row->upass),
		'ugrp' => set_value('ugrp', $row->ugrp),
	    );
            $this->load->view('user/0_user_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('user'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('uid', TRUE));
        } else {
            $data = array(
		'unick' => $this->input->post('unick',TRUE),
		'upass' => $this->input->post('upass',TRUE),
		'ugrp' => $this->input->post('ugrp',TRUE),
	    );

            $this->User_model->update($this->input->post('uid', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('user'));
        }
    }
    
    public function delete($id) 
    {
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

    public function _rules() 
    {
	$this->form_validation->set_rules('unick', 'unick', 'trim|required');
	$this->form_validation->set_rules('upass', 'upass', 'trim|required');
	$this->form_validation->set_rules('ugrp', 'ugrp', 'trim|required');

	$this->form_validation->set_rules('uid', 'uid', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "0_user.xls";
        $judul = "0_user";
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
	xlsWriteLabel($tablehead, $kolomhead++, "Unick");
	xlsWriteLabel($tablehead, $kolomhead++, "Upass");
	xlsWriteLabel($tablehead, $kolomhead++, "Ugrp");

	foreach ($this->User_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteLabel($tablebody, $kolombody++, $data->unick);
	    xlsWriteLabel($tablebody, $kolombody++, $data->upass);
	    xlsWriteLabel($tablebody, $kolombody++, $data->ugrp);

	    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

}

/* End of file User.php */
/* Location: ./application/controllers/User.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2018-10-24 12:59:44 */
/* http://harviacode.com */