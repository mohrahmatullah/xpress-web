<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Vendor_model extends CI_Model
{

    public $table = '73_vendor';
    public $id = 'id';
    public $order = 'DESC';

    function __construct()
    {
        parent::__construct();
    }

    // get all
    function get_all()
    {
        $this->db->order_by($this->id, $this->order);
        return $this->db->get($this->table)->result();
    }

    // get data by id
    function get_by_id($id)
    {
        $this->db->where($this->id, $id);
        return $this->db->get($this->table)->row();
    }
    
    // get total rows
    function total_rows($q = NULL) {
        $this->db->like('id', $q);
	$this->db->or_like('kod', $q);
	$this->db->or_like('cp', $q);
	$this->db->or_like('venco', $q);
	$this->db->or_like('ph', $q);
	$this->db->or_like('mob', $q);
	$this->db->or_like('almt', $q);
	$this->db->or_like('city', $q);
	$this->db->or_like('country', $q);
	$this->db->or_like('zip', $q);
	$this->db->or_like('mail', $q);
	$this->db->or_like('sosmed', $q);
	$this->db->or_like('bank', $q);
	$this->db->or_like('taxid', $q);
	$this->db->from($this->table);
        return $this->db->count_all_results();
    }

    // get data with limit and search
    function get_limit_data($limit, $start = 0, $q = NULL) {
        $this->db->order_by($this->id, $this->order);
        $this->db->like('id', $q);
	$this->db->or_like('kod', $q);
	$this->db->or_like('cp', $q);
	$this->db->or_like('venco', $q);
	$this->db->or_like('ph', $q);
	$this->db->or_like('mob', $q);
	$this->db->or_like('almt', $q);
	$this->db->or_like('city', $q);
	$this->db->or_like('country', $q);
	$this->db->or_like('zip', $q);
	$this->db->or_like('mail', $q);
	$this->db->or_like('sosmed', $q);
	$this->db->or_like('bank', $q);
	$this->db->or_like('taxid', $q);
	$this->db->limit($limit, $start);
        return $this->db->get($this->table)->result();
    }

    // insert data
    function insert($data)
    {
        $this->db->insert($this->table, $data);
    }

    // update data
    function update($id, $data)
    {
        $this->db->where($this->id, $id);
        $this->db->update($this->table, $data);
    }

    // delete data
    function delete($id)
    {
        $this->db->where($this->id, $id);
        $this->db->delete($this->table);
    }

}

/* End of file Vendor_model.php */
/* Location: ./application/models/Vendor_model.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2018-10-18 16:30:30 */
/* http://harviacode.com */