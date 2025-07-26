<?php
class Book_model extends CI_Model {

    public function get_all_books() {
        return $this->db->get('books')->result(); // pastikan nama tabel adalah 'books'
    }

    public function insert_book($data) {
        return $this->db->insert('books', $data);
    }

    public function get_book($id) {
        return $this->db->get_where('books', ['id' => $id])->row();
    }

    public function update_book($id, $data) {
        return $this->db->where('id', $id)->update('books', $data);
    }

    public function delete_book($id) {
        return $this->db->delete('books', ['id' => $id]);
    }
}
