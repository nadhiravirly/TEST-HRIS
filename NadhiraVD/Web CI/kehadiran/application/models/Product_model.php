<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Product_model extends CI_Model
{
    private $_table = "absen";

    public $id;
    public $in;
    public $out;
    public $hour;
    public $location;
    public $deviceid;

    public function rules()
    {
        return [
            ['field' => 'in',
            'label' => 'Tanggal Masuk',
            'rules' => 'required'],

            ['field' => 'deviceid',
            'label' => 'Device',
            'rules' => 'required'],

            ['field' => 'location',
            'label' => 'Lokasi',
            'rules' => 'required']  
        ];
    }

    public function getAll()
    {
        return $this->db->get($this->_table)->result();
    }
    
    public function getById($id)
    {
        return $this->db->get_where($this->_table, ["id" => $id])->row();
    }

    public function save()
    {
        $post = $this->input->post();
        // $this->product_id = uniqid();
        $this->in = $post["in"];
        $this->out = $post["out"];
        $t1 = strtotime($post["out"]);
		$t2 = strtotime($post["in"]);
		$diff = $t1 - $t2;
		if ($diff > 0) $hours = $diff / ( 60 * 60 );
		else $hours = 0;
        $this->hour = $hours;
        $this->location = $post["location"];
        $this->deviceid = $post["deviceid"];
        $this->db->insert($this->_table, $this);
    }

    public function update()
    {
        $post = $this->input->post();
        $this->id = $post["id"];
        $this->in = $post["in"];
        $this->out = $post["out"];
        $t1 = strtotime($post["out"]);
		$t2 = strtotime($post["in"]);
		$diff = $t1 - $t2;
		if ($diff > 0) $hours = $diff / ( 60 * 60 );
		else $hours = 0;
        $this->hour = $hours;
        $this->location = $post["location"];
        $this->deviceid = $post["deviceid"];
        $this->db->update($this->_table, $this, array('id' => $post['id']));
    }

    public function delete($id)
    {
        return $this->db->delete($this->_table, array("id" => $id));
    }
}
