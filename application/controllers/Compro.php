<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Compro extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Compro_model');
        $this->load->library('form_validation');
        if ($this->session->userdata('logged')<>1) {
                redirect(site_url('auth'));
            }
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'compro?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'compro?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'compro';
            $config['first_url'] = base_url() . 'compro';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Compro_model->total_rows($q);
        $compro = $this->Compro_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'compro_data' => $compro,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $this->load->view('admin/compro/compro_list', $data);
    }

    public function read($id) 
    {
        $row = $this->Compro_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id' => $row->id,
		'menu' => $row->menu,
		'isi' => $row->isi,
	    );
            $this->load->view('admin/compro/compro_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('compro'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('compro/create_action'),
	    'id' => set_value('id'),
	    'menu' => set_value('menu'),
	    'isi' => set_value('isi'),
	);
        $this->load->view('admin/compro/compro_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'menu' => $this->input->post('menu',TRUE),
		'isi' => $this->input->post('isi',TRUE),
	    );

            $this->Compro_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('compro'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Compro_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('compro/update_action'),
		'id' => set_value('id', $row->id),
		'menu' => set_value('menu', $row->menu),
		'isi' => set_value('isi', $row->isi),
	    );
            $this->load->view('admin/compro/compro_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('compro'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id', TRUE));
        } else {
            $data = array(
		'menu' => $this->input->post('menu',TRUE),
		'isi' => $this->input->post('isi',TRUE),
	    );

            $this->Compro_model->update($this->input->post('id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('compro'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Compro_model->get_by_id($id);

        if ($row) {
            $this->Compro_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('compro'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('compro'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('menu', 'menu', 'trim|required');
	$this->form_validation->set_rules('isi', 'isi', 'trim|required');

	$this->form_validation->set_rules('id', 'id', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "compro.xls";
        $judul = "compro";
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
	xlsWriteLabel($tablehead, $kolomhead++, "Menu");
	xlsWriteLabel($tablehead, $kolomhead++, "Isi");

	foreach ($this->Compro_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteLabel($tablebody, $kolombody++, $data->menu);
	    xlsWriteLabel($tablebody, $kolombody++, $data->isi);

	    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

}

/* End of file Compro.php */
/* Location: ./application/controllers/Compro.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2018-10-18 16:26:21 */
/* http://harviacode.com */