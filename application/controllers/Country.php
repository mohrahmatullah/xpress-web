<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Country extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Country_model');
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
            $config['base_url'] = base_url() . 'country?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'country?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'country';
            $config['first_url'] = base_url() . 'country';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Country_model->total_rows($q);
        $country = $this->Country_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'country_data' => $country,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $this->load->view('admin/country/71_country_list', $data);
    }

    public function read($id) 
    {
        $row = $this->Country_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id' => $row->id,
		'iso2' => $row->iso2,
		'country' => $row->country,
		'iso3' => $row->iso3,
		'kodph' => $row->kodph,
		'continent' => $row->continent,
		'capital' => $row->capital,
		'ztime' => $row->ztime,
		'currency' => $row->currency,
	    );
            $this->load->view('admin/country/71_country_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('country'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('country/create_action'),
	    'id' => set_value('id'),
	    'iso2' => set_value('iso2'),
	    'country' => set_value('country'),
	    'iso3' => set_value('iso3'),
	    'kodph' => set_value('kodph'),
	    'continent' => set_value('continent'),
	    'capital' => set_value('capital'),
	    'ztime' => set_value('ztime'),
	    'currency' => set_value('currency'),
	);
        $this->load->view('admin/country/71_country_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'iso2' => $this->input->post('iso2',TRUE),
		'country' => $this->input->post('country',TRUE),
		'iso3' => $this->input->post('iso3',TRUE),
		'kodph' => $this->input->post('kodph',TRUE),
		'continent' => $this->input->post('continent',TRUE),
		'capital' => $this->input->post('capital',TRUE),
		'ztime' => $this->input->post('ztime',TRUE),
		'currency' => $this->input->post('currency',TRUE),
	    );

            $this->Country_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('country'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Country_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('country/update_action'),
		'id' => set_value('id', $row->id),
		'iso2' => set_value('iso2', $row->iso2),
		'country' => set_value('country', $row->country),
		'iso3' => set_value('iso3', $row->iso3),
		'kodph' => set_value('kodph', $row->kodph),
		'continent' => set_value('continent', $row->continent),
		'capital' => set_value('capital', $row->capital),
		'ztime' => set_value('ztime', $row->ztime),
		'currency' => set_value('currency', $row->currency),
	    );
            $this->load->view('admin/country/71_country_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('country'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id', TRUE));
        } else {
            $data = array(
		'iso2' => $this->input->post('iso2',TRUE),
		'country' => $this->input->post('country',TRUE),
		'iso3' => $this->input->post('iso3',TRUE),
		'kodph' => $this->input->post('kodph',TRUE),
		'continent' => $this->input->post('continent',TRUE),
		'capital' => $this->input->post('capital',TRUE),
		'ztime' => $this->input->post('ztime',TRUE),
		'currency' => $this->input->post('currency',TRUE),
	    );

            $this->Country_model->update($this->input->post('id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('country'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Country_model->get_by_id($id);

        if ($row) {
            $this->Country_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('country'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('country'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('iso2', 'iso2', 'trim|required');
	$this->form_validation->set_rules('country', 'country', 'trim|required');
	$this->form_validation->set_rules('iso3', 'iso3', 'trim|required');
	$this->form_validation->set_rules('kodph', 'kodph', 'trim|required');
	$this->form_validation->set_rules('continent', 'continent', 'trim|required');
	$this->form_validation->set_rules('capital', 'capital', 'trim|required');
	$this->form_validation->set_rules('ztime', 'ztime', 'trim|required');
	$this->form_validation->set_rules('currency', 'currency', 'trim|required');

	$this->form_validation->set_rules('id', 'id', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "71_country.xls";
        $judul = "71_country";
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
	xlsWriteLabel($tablehead, $kolomhead++, "Iso2");
	xlsWriteLabel($tablehead, $kolomhead++, "Country");
	xlsWriteLabel($tablehead, $kolomhead++, "Iso3");
	xlsWriteLabel($tablehead, $kolomhead++, "Kodph");
	xlsWriteLabel($tablehead, $kolomhead++, "Continent");
	xlsWriteLabel($tablehead, $kolomhead++, "Capital");
	xlsWriteLabel($tablehead, $kolomhead++, "Ztime");
	xlsWriteLabel($tablehead, $kolomhead++, "Currency");

	foreach ($this->Country_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteLabel($tablebody, $kolombody++, $data->iso2);
	    xlsWriteLabel($tablebody, $kolombody++, $data->country);
	    xlsWriteLabel($tablebody, $kolombody++, $data->iso3);
	    xlsWriteLabel($tablebody, $kolombody++, $data->kodph);
	    xlsWriteLabel($tablebody, $kolombody++, $data->continent);
	    xlsWriteLabel($tablebody, $kolombody++, $data->capital);
	    xlsWriteLabel($tablebody, $kolombody++, $data->ztime);
	    xlsWriteLabel($tablebody, $kolombody++, $data->currency);

	    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

}

/* End of file Country.php */
/* Location: ./application/controllers/Country.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2018-10-18 16:28:49 */
/* http://harviacode.com */