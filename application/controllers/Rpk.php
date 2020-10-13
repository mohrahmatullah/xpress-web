<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Rpk extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Rpk_model');
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
            $config['base_url'] = base_url() . 'rpk?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'rpk?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'rpk';
            $config['first_url'] = base_url() . 'rpk';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Rpk_model->total_rows($q);
        $rpk = $this->Rpk_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'rpk_data' => $rpk,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $this->load->view('admin/rpk/70_rpk_list', $data);
    }

    public function read($id) 
    {
        $row = $this->Rpk_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id' => $row->id,
		'kodrpk' => $row->kodrpk,
		'country' => $row->country,
		'car' => $row->car,
		'iso2' => $row->iso2,
		'shc' => $row->shc,
		'kg1' => $row->kg1,
		'kg2' => $row->kg2,
		'kg5' => $row->kg5,
		'kg10' => $row->kg10,
		'kg20' => $row->kg20,
		'kg30' => $row->kg30,
		'ltime' => $row->ltime,
		'jenis' => $row->jenis,
		'ket' => $row->ket,
	    );
            $this->load->view('admin/rpk/70_rpk_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('rpk'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('rpk/create_action'),
	    'id' => set_value('id'),
	    'kodrpk' => set_value('kodrpk'),
	    'country' => set_value('country'),
	    'car' => set_value('car'),
	    'iso2' => set_value('iso2'),
	    'shc' => set_value('shc'),
	    'kg1' => set_value('kg1'),
	    'kg2' => set_value('kg2'),
	    'kg5' => set_value('kg5'),
	    'kg10' => set_value('kg10'),
	    'kg20' => set_value('kg20'),
	    'kg30' => set_value('kg30'),
	    'ltime' => set_value('ltime'),
	    'jenis' => set_value('jenis'),
	    'ket' => set_value('ket'),
	);
        $this->load->view('admin/rpk/70_rpk_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'kodrpk' => $this->input->post('kodrpk',TRUE),
		'country' => $this->input->post('country',TRUE),
		'car' => $this->input->post('car',TRUE),
		'iso2' => $this->input->post('iso2',TRUE),
		'shc' => $this->input->post('shc',TRUE),
		'kg1' => $this->input->post('kg1',TRUE),
		'kg2' => $this->input->post('kg2',TRUE),
		'kg5' => $this->input->post('kg5',TRUE),
		'kg10' => $this->input->post('kg10',TRUE),
		'kg20' => $this->input->post('kg20',TRUE),
		'kg30' => $this->input->post('kg30',TRUE),
		'ltime' => $this->input->post('ltime',TRUE),
		'jenis' => $this->input->post('jenis',TRUE),
		'ket' => $this->input->post('ket',TRUE),
	    );

            $this->Rpk_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('rpk'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Rpk_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('rpk/update_action'),
		'id' => set_value('id', $row->id),
		'kodrpk' => set_value('kodrpk', $row->kodrpk),
		'country' => set_value('country', $row->country),
		'car' => set_value('car', $row->car),
		'iso2' => set_value('iso2', $row->iso2),
		'shc' => set_value('shc', $row->shc),
		'kg1' => set_value('kg1', $row->kg1),
		'kg2' => set_value('kg2', $row->kg2),
		'kg5' => set_value('kg5', $row->kg5),
		'kg10' => set_value('kg10', $row->kg10),
		'kg20' => set_value('kg20', $row->kg20),
		'kg30' => set_value('kg30', $row->kg30),
		'ltime' => set_value('ltime', $row->ltime),
		'jenis' => set_value('jenis', $row->jenis),
		'ket' => set_value('ket', $row->ket),
	    );
            $this->load->view('admin/rpk/70_rpk_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('rpk'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id', TRUE));
        } else {
            $data = array(
		'kodrpk' => $this->input->post('kodrpk',TRUE),
		'country' => $this->input->post('country',TRUE),
		'car' => $this->input->post('car',TRUE),
		'iso2' => $this->input->post('iso2',TRUE),
		'shc' => $this->input->post('shc',TRUE),
		'kg1' => $this->input->post('kg1',TRUE),
		'kg2' => $this->input->post('kg2',TRUE),
		'kg5' => $this->input->post('kg5',TRUE),
		'kg10' => $this->input->post('kg10',TRUE),
		'kg20' => $this->input->post('kg20',TRUE),
		'kg30' => $this->input->post('kg30',TRUE),
		'ltime' => $this->input->post('ltime',TRUE),
		'jenis' => $this->input->post('jenis',TRUE),
		'ket' => $this->input->post('ket',TRUE),
	    );

            $this->Rpk_model->update($this->input->post('id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('rpk'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Rpk_model->get_by_id($id);

        if ($row) {
            $this->Rpk_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('rpk'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('rpk'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('kodrpk', 'kodrpk', 'trim|required');
	$this->form_validation->set_rules('country', 'country', 'trim|required');
	$this->form_validation->set_rules('car', 'car', 'trim|required');
	$this->form_validation->set_rules('iso2', 'iso2', 'trim|required');
	$this->form_validation->set_rules('shc', 'shc', 'trim|required');
	$this->form_validation->set_rules('kg1', 'kg1', 'trim|required');
	$this->form_validation->set_rules('kg2', 'kg2', 'trim|required');
	$this->form_validation->set_rules('kg5', 'kg5', 'trim|required');
	$this->form_validation->set_rules('kg10', 'kg10', 'trim|required');
	$this->form_validation->set_rules('kg20', 'kg20', 'trim|required');
	$this->form_validation->set_rules('kg30', 'kg30', 'trim|required');
	$this->form_validation->set_rules('ltime', 'ltime', 'trim|required');
	$this->form_validation->set_rules('jenis', 'jenis', 'trim|required');
	$this->form_validation->set_rules('ket', 'ket', 'trim|required');

	$this->form_validation->set_rules('id', 'id', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "70_rpk.xls";
        $judul = "70_rpk";
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
	xlsWriteLabel($tablehead, $kolomhead++, "Kodrpk");
	xlsWriteLabel($tablehead, $kolomhead++, "Country");
	xlsWriteLabel($tablehead, $kolomhead++, "Car");
	xlsWriteLabel($tablehead, $kolomhead++, "Iso2");
	xlsWriteLabel($tablehead, $kolomhead++, "Shc");
	xlsWriteLabel($tablehead, $kolomhead++, "Kg1");
	xlsWriteLabel($tablehead, $kolomhead++, "Kg2");
	xlsWriteLabel($tablehead, $kolomhead++, "Kg5");
	xlsWriteLabel($tablehead, $kolomhead++, "Kg10");
	xlsWriteLabel($tablehead, $kolomhead++, "Kg20");
	xlsWriteLabel($tablehead, $kolomhead++, "Kg30");
	xlsWriteLabel($tablehead, $kolomhead++, "Ltime");
	xlsWriteLabel($tablehead, $kolomhead++, "Jenis");
	xlsWriteLabel($tablehead, $kolomhead++, "Ket");

	foreach ($this->Rpk_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteLabel($tablebody, $kolombody++, $data->kodrpk);
	    xlsWriteLabel($tablebody, $kolombody++, $data->country);
	    xlsWriteLabel($tablebody, $kolombody++, $data->car);
	    xlsWriteLabel($tablebody, $kolombody++, $data->iso2);
	    xlsWriteNumber($tablebody, $kolombody++, $data->shc);
	    xlsWriteNumber($tablebody, $kolombody++, $data->kg1);
	    xlsWriteNumber($tablebody, $kolombody++, $data->kg2);
	    xlsWriteNumber($tablebody, $kolombody++, $data->kg5);
	    xlsWriteNumber($tablebody, $kolombody++, $data->kg10);
	    xlsWriteNumber($tablebody, $kolombody++, $data->kg20);
	    xlsWriteNumber($tablebody, $kolombody++, $data->kg30);
	    xlsWriteLabel($tablebody, $kolombody++, $data->ltime);
	    xlsWriteLabel($tablebody, $kolombody++, $data->jenis);
	    xlsWriteLabel($tablebody, $kolombody++, $data->ket);

	    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

}

/* End of file Rpk.php */
/* Location: ./application/controllers/Rpk.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2018-10-18 16:27:43 */
/* http://harviacode.com */