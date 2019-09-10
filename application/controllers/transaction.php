<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Transaction extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
    }

    public function index()
    {
        $data['title'] = 'Transaction Management';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $this->load->model('Students_model', 'students');

        $data['students'] = $this->students->getStudents();
        $data['class'] = $this->db->get('students_class')->result_array();
        $data['major'] = $this->db->get('students_major')->result_array();

        $this->form_validation->set_rules('nis', 'Nis', 'required');

        if ($this->form_validation->run() == false) {

            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('transaction/index', $data);
            $this->load->view('templates/footer');
        } else {
            $data = $this->input->post('nis_search');
            $data['students'] = $this->Students_model->searchbynis(); 
        }

    }
}