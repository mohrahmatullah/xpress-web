<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Carrier extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Carrier_model');
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
            $config['base_url'] = base_url() . 'carrier?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'carrier?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'carrier';
            $config['first_url'] = base_url() . 'carrier';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Carrier_model->total_rows($q);
        $carrier = $this->Carrier_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'carrier_data' => $carrier,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $this->load->view('admin/carrier/72_carrier_list', $data);
    }

    public function read($id) 
    {
        $row = $this->Carrier_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id' => $row->id,
		'car' => $row->car,
		'cp' => $row->cp,
		'carco' => $row->carco,
		'ph' => $row->ph,
		'mob' => $row->mob,
		'almt' => $row->almt,
		'city' => $row->city,
		'country' => $row->country,
		'zip' => $row->zip,
		'mail' => $row->mail,
		'sosmed' => $row->sosmed,
		'bank' => $row->bank,
		'taxid' => $row->taxid,
		'del' => $row->del,
	    );
            $this->load->view('admin/carrier/72_carrier_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('carrier'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('carrier/create_action'),
	    'id' => set_value('id'),
	    'car' => set_value('car'),
	    'cp' => set_value('cp'),
	    'carco' => set_value('carco'),
	    'ph' => set_value('ph'),
	    'mob' => set_value('mob'),
	    'almt' => set_value('almt'),
	    'city' => set_value('city'),
	    'country' => set_value('country'),
	    'zip' => set_value('zip'),
	    'mail' => set_value('mail'),
	    'sosmed' => set_value('sosmed'),
	    'bank' => set_value('bank'),
	    'taxid' => set_value('taxid'),
	    'del' => set_value('del'),
	);
        $this->load->view('admin/carrier/72_carrier_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'car' => $this->input->post('car',TRUE),
		'cp' => $this->input->post('cp',TRUE),
		'carco' => $this->input->post('carco',TRUE),
		'ph' => $this->input->post('ph',TRUE),
		'mob' => $this->input->post('mob',TRUE),
		'almt' => $this->input->post('almt',TRUE),
		'city' => $this->input->post('city',TRUE),
		'country' => $this->input->post('country',TRUE),
		'zip' => $this->input->post('zip',TRUE),
		'mail' => $this->input->post('mail',TRUE),
		'sosmed' => $this->input->post('sosmed',TRUE),
		'bank' => $this->input->post('bank',TRUE),
		'taxid' => $this->input->post('taxid',TRUE),
		'del' => $this->input->post('del',TRUE),
	    );

            $this->Carrier_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('carrier'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Carrier_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('carrier/update_action'),
		'id' => set_value('id', $row->id),
		'car' => set_value('car', $row->car),
		'cp' => set_value('cp', $row->cp),
		'carco' => set_value('carco', $row->carco),
		'ph' => set_value('ph', $row->ph),
		'mob' => set_value('mob', $row->mob),
		'almt' => set_value('almt', $row->almt),
		'city' => set_value('city', $row->city),
		'country' => set_value('country', $row->country),
		'zip' => set_value('zip', $row->zip),
		'mail' => set_value('mail', $row->mail),
		'sosmed' => set_value('sosmed', $row->sosmed),
		'bank' => set_value('bank', $row->bank),
		'taxid' => set_value('taxid', $row->taxid),
		'del' => set_value('del', $row->del),
	    );
            $this->load->view('admin/carrier/72_carrier_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('carrier'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id', TRUE));
        } else {
            $data = array(
		'car' => $this->input->post('car',TRUE),
		'cp' => $this->input->post('cp',TRUE),
		'carco' => $this->input->post('carco',TRUE),
		'ph' => $this->input->post('ph',TRUE),
		'mob' => $this->input->post('mob',TRUE),
		'almt' => $this->input->post('almt',TRUE),
		'city' => $this->input->post('city',TRUE),
		'country' => $this->input->post('country',TRUE),
		'zip' => $this->input->post('zip',TRUE),
		'mail' => $this->input->post('mail',TRUE),
		'sosmed' => $this->input->post('sosmed',TRUE),
		'bank' => $this->input->post('bank',TRUE),
		'taxid' => $this->input->post('taxid',TRUE),
		'del' => $this->input->post('del',TRUE),
	    );

            $this->Carrier_model->update($this->input->post('id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('carrier'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Carrier_model->get_by_id($id);

        if ($row) {
            $this->Carrier_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('carrier'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('carrier'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('car', 'car', 'trim|required');
	$this->form_validation->set_rules('cp', 'cp', 'trim|required');
	$this->form_validation->set_rules('carco', 'carco', 'trim|required');
	$this->form_validation->set_rules('ph', 'ph', 'trim|required');
	$this->form_validation->set_rules('mob', 'mob', 'trim|required');
	$this->form_validation->set_rules('almt', 'almt', 'trim|required');
	$this->form_validation->set_rules('city', 'city', 'trim|required');
	$this->form_validation->set_rules('country', 'country', 'trim|required');
	$this->form_validation->set_rules('zip', 'zip', 'trim|required');
	$this->form_validation->set_rules('mail', 'mail', 'trim|required');
	$this->form_validation->set_rules('sosmed', 'sosmed', 'trim|required');
	$this->form_validation->set_rules('bank', 'bank', 'trim|required');
	$this->form_validation->set_rules('taxid', 'taxid', 'trim|required');
	$this->form_validation->set_rules('del', 'del', 'trim|required');

	$this->form_validation->set_rules('id', 'id', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "72_carrier.xls";
        $judul = "72_carrier";
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
	xlsWriteLabel($tablehead, $kolomhead++, "Car");
	xlsWriteLabel($tablehead, $kolomhead++, "Cp");
	xlsWriteLabel($tablehead, $kolomhead++, "Carco");
	xlsWriteLabel($tablehead, $kolomhead++, "Ph");
	xlsWriteLabel($tablehead, $kolomhead++, "Mob");
	xlsWriteLabel($tablehead, $kolomhead++, "Almt");
	xlsWriteLabel($tablehead, $kolomhead++, "City");
	xlsWriteLabel($tablehead, $kolomhead++, "Country");
	xlsWriteLabel($tablehead, $kolomhead++, "Zip");
	xlsWriteLabel($tablehead, $kolomhead++, "Mail");
	xlsWriteLabel($tablehead, $kolomhead++, "Sosmed");
	xlsWriteLabel($tablehead, $kolomhead++, "Bank");
	xlsWriteLabel($tablehead, $kolomhead++, "Taxid");
	xlsWriteLabel($tablehead, $kolomhead++, "Del");

	foreach ($this->Carrier_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteLabel($tablebody, $kolombody++, $data->car);
	    xlsWriteLabel($tablebody, $kolombody++, $data->cp);
	    xlsWriteLabel($tablebody, $kolombody++, $data->carco);
	    xlsWriteLabel($tablebody, $kolombody++, $data->ph);
	    xlsWriteLabel($tablebody, $kolombody++, $data->mob);
	    xlsWriteLabel($tablebody, $kolombody++, $data->almt);
	    xlsWriteLabel($tablebody, $kolombody++, $data->city);
	    xlsWriteLabel($tablebody, $kolombody++, $data->country);
	    xlsWriteLabel($tablebody, $kolombody++, $data->zip);
	    xlsWriteLabel($tablebody, $kolombody++, $data->mail);
	    xlsWriteLabel($tablebody, $kolombody++, $data->sosmed);
	    xlsWriteLabel($tablebody, $kolombody++, $data->bank);
	    xlsWriteLabel($tablebody, $kolombody++, $data->taxid);
	    xlsWriteNumber($tablebody, $kolombody++, $data->del);

	    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

}

/* End of file Carrier.php */
/* Location: ./application/controllers/Carrier.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2018-10-18 16:29:59 */
/* http://harviacode.com */