<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

    public function index()
    {
        $this->load->view('template/customer/header');
        $this->load->view('login');
        $this->load->view('template/customer/footer');
    }

    public function register(){
        $this->load->view('template/customer/header');
        $this->load->view('register');
        $this->load->view('template/customer/footer');
    }

    public function process()
    {
        $post = $this->input->post(null, TRUE);
        if (isset($post['login'])) {
            $this->load->model('user_model');
            $query = $this->user_model->login($post);
            if ($query->num_rows() > 0) {
                $row = $query->row();
                $params = array(
                    'id_user' => $row->id_user,
                    'nama' => $row->nama,
                    'level' => $row->level
                );
                if ($row->level == 1) {
                    echo "<script>
                        alert('Selamat, Berhasil Login Admin');
                        window.location='" . site_url('admin/dashboard') . "';
                    </script>";
                    $this->session->set_userdata($params);
                } elseif($row->level == 2){
                    echo "<script>
                        alert('Selamat, Login Berhasil');
                        window.location='" . site_url('home') . "';
                    </script>";
                    $this->session->set_userdata($params);
                }
            } else {
                echo "<script>
                    alert('Login Gagal, email/password salah');
                    window.location='" . site_url('auth') . "';
                </script>";
            }
        }
    }

    public function logout()
    {
        $params = array('id_user', 'level');
        $this->session->unset_userdata($params);
        redirect('home');
    }

}


?>