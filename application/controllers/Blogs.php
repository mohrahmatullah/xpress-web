<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Blogs extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Blogs_model');
        $this->load->library('form_validation');        
	   $this->load->library('datatables');
        if ($this->session->userdata('logged')<>1) {
                redirect(site_url('auth'));
            }
    }

    public function index()
    {
        $this->load->view('admin/blogs/blogs_list');
    } 
    
    public function json() {
        header('Content-Type: application/json');
        echo $this->Blogs_model->json();
    }

    public function read($id) 
    {
        $row = $this->Blogs_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id' => $row->id,
		'title' => $row->title,
		'description' => $row->description,
		'image' => $row->image,
		'status' => $row->status,
	    );
            $this->load->view('admin/blogs/blogs_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('blogs'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('blogs/create_action'),
	    'id' => set_value('id'),
	    'title' => set_value('title'),
	    'description' => set_value('description'),
	    'image' => set_value('image'),
	    'status' => set_value('status'),
	);
        $this->load->view('admin/blogs/blogs_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'title' => $this->input->post('title',TRUE),
		'description' => $this->input->post('description',TRUE),
		'image' => $this->input->post('image',TRUE),
		'status' => $this->input->post('status',TRUE),
	    );

            $this->Blogs_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('blogs'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Blogs_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('blogs/update_action'),
		'id' => set_value('id', $row->id),
		'title' => set_value('title', $row->title),
		'description' => set_value('description', $row->description),
		'image' => set_value('image', $row->image),
		'status' => set_value('status', $row->status),
	    );
            $this->load->view('admin/blogs/blogs_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('blogs'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id', TRUE));
        } else {
            $data = array(
		'title' => $this->input->post('title',TRUE),
		'description' => $this->input->post('description',TRUE),
		'image' => $this->input->post('image',TRUE),
		'status' => $this->input->post('status',TRUE),
	    );

            $this->Blogs_model->update($this->input->post('id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('blogs'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Blogs_model->get_by_id($id);

        if ($row) {
            $this->Blogs_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('blogs'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('blogs'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('title', 'title', 'trim|required');
	$this->form_validation->set_rules('description', 'description', 'trim|required');
	$this->form_validation->set_rules('image', 'image', 'trim|required');
	$this->form_validation->set_rules('status', 'status', 'trim|required');

	$this->form_validation->set_rules('id', 'id', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "blogs.xls";
        $judul = "blogs";
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
	xlsWriteLabel($tablehead, $kolomhead++, "Title");
	xlsWriteLabel($tablehead, $kolomhead++, "Description");
	xlsWriteLabel($tablehead, $kolomhead++, "Image");
	xlsWriteLabel($tablehead, $kolomhead++, "Status");

	foreach ($this->Blogs_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteLabel($tablebody, $kolombody++, $data->title);
	    xlsWriteLabel($tablebody, $kolombody++, $data->description);
	    xlsWriteLabel($tablebody, $kolombody++, $data->image);
	    xlsWriteNumber($tablebody, $kolombody++, $data->status);

	    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

}

/* End of file Blogs.php */
/* Location: ./application/controllers/Blogs.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2018-10-29 05:10:56 */
/* http://harviacode.com */