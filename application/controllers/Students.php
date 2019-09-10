<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Students extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
    }
    
    public function index()
    {
        $data['title'] = 'Students Management';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $this->load->model('Students_model', 'students');

        $data['students'] = $this->students->getStudents();
        $data['class'] = $this->db->get('students_class')->result_array();
        $data['major'] = $this->db->get('students_major')->result_array();

        $this->form_validation->set_rules('nis', 'Nis', 'required');
        $this->form_validation->set_rules('name', 'Name', 'required');
        $this->form_validation->set_rules('class_id', 'Class', 'required');
        $this->form_validation->set_rules('major_id', 'Major', 'required');
        if ($this->form_validation->run() == false) {

            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('students/index', $data);
            $this->load->view('templates/footer');
        } else {
            $upload_image = $_FILES['photo']['name'];
            if ($upload_image) {
                $config['allowed_types'] = 'gif|jpg|png';
                $config['max_size']     = '2048';
                $config['upload_path'] = './assets/img/students/';

                $this->load->library('upload', $config);

                if ($this->upload->do_upload('photo')) {
                    $student_photo = $data['students']['photo'];
                } else {
                    echo $this->upload->display_errors();
                }
            }
            $data = [
                'nis' => $this->input->post('nis'),
                'name' => $this->input->post('name'),
                'class_id' => $this->input->post('class_id'),
                'major_id' => $this->input->post('major_id'),
                'photo' => $this->upload->data('file_name')
            ];

            $this->db->insert('students', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
                New student added!
                </div>');
            redirect('students');
        }
    }
    public function edit($id)
    {
       $data['title'] = 'Students Management';
       $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
       $this->load->model('Students_model', 'students');

       $data['students'] = $this->db->get_where('students',['id' => $id])->row_array($id);
       $data['class'] = $this->db->get('students_class')->result_array();
       $data['major'] = $this->db->get('students_major')->result_array();

       $this->form_validation->set_rules('nis', 'Nis', 'required');
       $this->form_validation->set_rules('name', 'Name', 'required');
       $this->form_validation->set_rules('class_id', 'Class', 'required');
       $this->form_validation->set_rules('major_id', 'Major', 'required');
       if ($this->form_validation->run() == false) {

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('students/index', $data);
        $this->load->view('templates/footer');
    } else {

        $nis = $this->input->post('nis');
        $name = $this->input->post('name');
        $class_id = $this->input->post('class_id');
        $major_id = $this->input->post('major_id');

        $upload_image = $_FILES['photo']['name'];

        if ($upload_image) {
            $config['allowed_types'] = 'gif|jpg|png';
            $config['max_size']     = '2048';
            $config['upload_path'] = './assets/img/students/';

            $this->load->library('upload', $config);

            if ($this->upload->do_upload('photo')) {
                $old_image = $data['students']['photo'];
                if ($old_image != 'default.jpg'){
                    unlink(FCPATH . 'assets/img/students/' . $old_image);
                }

                $new_image = $this->upload->data('file_name');
                $this->db->set('photo', $new_image);

            } else {

                echo $this->upload->display_errors();
            }

        }

        $this->db->set('name', $name);
        $this->db->set('class_id', $class_id);
        $this->db->set('major_id', $major_id);
        $this->db->where('nis', $nis);
        $this->db->update('students');

        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Congratulation! Your profile has been update!
            </div>');
        redirect('students');
    }
}
 public function detail($id)
    {
       $data['title'] = 'Students Management';
       $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
       $this->load->model('Students_model', 'students');

       $data['students'] = $this->db->get_where('students',['id' => $id])->row_array($id);
       $data['class'] = $this->db->get('students_class')->result_array();
       $data['major'] = $this->db->get('students_major')->result_array();

       $this->form_validation->set_rules('nis', 'Nis', 'required');
       $this->form_validation->set_rules('name', 'Name', 'required');
       $this->form_validation->set_rules('class_id', 'Class', 'required');
       $this->form_validation->set_rules('major_id', 'Major', 'required');
       if ($this->form_validation->run() == false) {

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('students/index', $data);
        $this->load->view('templates/footer');
    } else {

        $nis = $this->input->post('nis');
        $name = $this->input->post('name');
        $class_id = $this->input->post('class_id');
        $major_id = $this->input->post('major_id');

        $upload_image = $_FILES['photo']['name'];

        if ($upload_image) {
            $config['allowed_types'] = 'gif|jpg|png';
            $config['max_size']     = '2048';
            $config['upload_path'] = './assets/img/students/';

            $this->load->library('upload', $config);

            if ($this->upload->do_upload('photo')) {
                $old_image = $data['students']['photo'];
                if ($old_image != 'default.jpg'){
                    unlink(FCPATH . 'assets/img/students/' . $old_image);
                }

                $new_image = $this->upload->data('file_name');
                $this->db->set('photo', $new_image);

            } else {

                echo $this->upload->display_errors();
            }

        }

        $this->db->set('name', $name);
        $this->db->set('class_id', $class_id);
        $this->db->set('major_id', $major_id);
        $this->db->where('nis', $nis);
        $this->db->update('students');

        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Congratulation! Your profile has been update!
            </div>');
        redirect('students');
    }
}
public function deleteStudents($id)
{
    $_id = $this->db->get_where('students',['id' => $id])->row();
    $query = $this->db->delete('students',['id'=>$id]);
    if($query){
        unlink("assets/img/students/".$_id->photo);
    }
    $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
        Student deleted!
        </div>');
    redirect('students');
}

public function printStudents()
{
  $this->load->model('Students_model', 'students');

  $data['students'] = $this->students->getStudents();
  $data['class'] = $this->db->get('students_class')->result_array();
  $data['major'] = $this->db->get('students_major')->result_array();
  
  $this->load->library('Pdf');
  $this->load->view('Students/printStudents', $data);
}
}