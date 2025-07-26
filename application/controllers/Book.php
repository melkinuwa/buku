<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Book extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Book_model');
        $this->load->model('Buy_model'); // model pembelian
    }

    public function index() {
        $data['books'] = $this->Book_model->get_all_books();
        $this->load->view('layout/header');
        $this->load->view('book/index', $data);
        $this->load->view('layout/footer');
    }

    public function create() {
        if ($_POST) {
            $cover = '';
            $config['upload_path']   = './uploads/';
            $config['allowed_types'] = 'jpg|jpeg|png';
            $this->load->library('upload', $config);

            if (!empty($_FILES['cover']['name']) && $this->upload->do_upload('cover')) {
                $cover = $this->upload->data('file_name');
            }

            $data = [
                'title'    => $this->input->post('title'),
                'author'   => $this->input->post('author'),
                'category' => $this->input->post('category'),
                'cover'    => $cover
            ];
            $this->Book_model->insert_book($data);
            redirect('book');
        }

        $this->load->view('layout/header');
        $this->load->view('book/form');
        $this->load->view('layout/footer');
    }

    public function edit($id) {
        $data['book'] = $this->Book_model->get_book($id);

        if ($_POST) {
            $cover = $data['book']->cover;
            $config['upload_path']   = './uploads/';
            $config['allowed_types'] = 'jpg|jpeg|png';
            $this->load->library('upload', $config);

            if (!empty($_FILES['cover']['name']) && $this->upload->do_upload('cover')) {
                if ($cover && file_exists('./uploads/' . $cover)) {
                    unlink('./uploads/' . $cover);
                }
                $cover = $this->upload->data('file_name');
            }

            $update = [
                'title'    => $this->input->post('title'),
                'author'   => $this->input->post('author'),
                'category' => $this->input->post('category'),
                'cover'    => $cover
            ];
            $this->Book_model->update_book($id, $update);
            redirect('book');
        }

        $this->load->view('layout/header');
        $this->load->view('book/form', $data);
        $this->load->view('layout/footer');
    }

    public function delete($id) {
        $book = $this->Book_model->get_book($id);
        if ($book->cover && file_exists('./uploads/' . $book->cover)) {
            unlink('./uploads/' . $book->cover);
        }
        $this->Book_model->delete_book($id);
        redirect('book');
    }

    // ----------------------------
    // FITUR PEMBELIAN BUKU
    // ----------------------------

    public function buy($id) {
        $data['book'] = $this->Book_model->get_book($id);

        if ($_POST) {
            $buy_data = [
                'book_id'      => $id,
                'buyer_name'   => $this->input->post('buyer_name'),
                'buyer_email'  => $this->input->post('buyer_email'),
                'quantity'     => $this->input->post('quantity'),
                'buy_date'     => date('Y-m-d H:i:s')
            ];
            $this->Buy_model->insert_buy($buy_data);
            $this->session->set_flashdata('success', 'Pembelian berhasil.');
            redirect('book');
        }

        $this->load->view('layout/header');
        $this->load->view('book/buy', $data);
        $this->load->view('layout/footer');
    }

    // (Opsional) Menampilkan daftar pembelian
    public function list_buy() {
        $data['buys'] = $this->Buy_model->get_all_buys();
        $this->load->view('layout/header');
        $this->load->view('book/list_buy', $data);
        $this->load->view('layout/footer');
    }
}
