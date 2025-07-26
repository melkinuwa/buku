<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Buy_model extends CI_Model {

    public function insert_purchase($data) {
        return $this->db->insert('purchases', $data);
    }

    public function get_all_purchases() {
        return $this->db->get('purchases')->result();
    }

    public function get_purchase_by_book($book_id) {
        return $this->db->get_where('purchases', ['book_id' => $book_id])->result();
    }
}
