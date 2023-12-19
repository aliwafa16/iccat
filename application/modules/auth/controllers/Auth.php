<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends MY_Controller
{

    public function index()
    {
        $this->load->view('vw_auth');
    }

    public function login()
    {
        $response = [];
        $password = $this->input->post('password');
        $username = $this->input->post('username');

        $cekUser = $this->db->get_where('users', ['username' => $this->input->post('username')])->row_array();

        if ($cekUser) {
            if (password_verify($password, $cekUser['password'])) {
                $data_session = [
                    'username' => $cekUser['username'],
                    'id_user' => $cekUser['id'],
                    'email' => $cekUser['email'],
                    'date_login' => date('Y-m-d'),
                    'is_login' => true,
                    'role' => $cekUser['role']
                ];

                if ($cekUser['role'] == 1) {
                    $data_session['is_admin'] = true;
                } else {
                    $data_session['is_admin'] = true;
                }
                $this->session->set_userdata($data_session);
                $response = ['code' => 200, 'status' => true, 'data' => $cekUser, 'message' => 'Berhasil login'];
            } else {
                $response = ['code' => 404, 'status' => false, 'data' => null, 'message' => 'user tidak ditemukan'];
            }
        } else {
            $response = ['code' => 404, 'status' => false, 'data' => null, 'message' => 'user tidak ditemukan'];
        }

        echo json_encode($response);
    }

    public function logout()
    {
        session_destroy();
        redirect('Auth');
    }
}
