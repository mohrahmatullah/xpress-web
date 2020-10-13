<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Rpk_model extends CI_Model
{

    public $table = '70_rpk';
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
	$this->db->or_like('kodrpk', $q);
	$this->db->or_like('country', $q);
	$this->db->or_like('car', $q);
	$this->db->or_like('iso2', $q);
	$this->db->or_like('shc', $q);
	$this->db->or_like('kg1', $q);
	$this->db->or_like('kg2', $q);
	$this->db->or_like('kg5', $q);
	$this->db->or_like('kg10', $q);
	$this->db->or_like('kg20', $q);
	$this->db->or_like('kg30', $q);
	$this->db->or_like('ltime', $q);
	$this->db->or_like('jenis', $q);
	$this->db->or_like('ket', $q);
	$this->db->from($this->table);
        return $this->db->count_all_results();
    }

    // get data with limit and search
    function get_limit_data($limit, $start = 0, $q = NULL) {
        $this->db->order_by($this->id, $this->order);
        $this->db->like('id', $q);
	$this->db->or_like('kodrpk', $q);
	$this->db->or_like('country', $q);
	$this->db->or_like('car', $q);
	$this->db->or_like('iso2', $q);
	$this->db->or_like('shc', $q);
	$this->db->or_like('kg1', $q);
	$this->db->or_like('kg2', $q);
	$this->db->or_like('kg5', $q);
	$this->db->or_like('kg10', $q);
	$this->db->or_like('kg20', $q);
	$this->db->or_like('kg30', $q);
	$this->db->or_like('ltime', $q);
	$this->db->or_like('jenis', $q);
	$this->db->or_like('ket', $q);
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

/* End of file Rpk_model.php */
/* Location: ./application/models/Rpk_model.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2018-10-18 16:27:43 */
/* http://harviacode.com */