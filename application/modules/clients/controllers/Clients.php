<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Clients extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $is_login = $this->session->userdata('is_login');
        if (!$is_login) {
            redirect('Auth');
        }
    }
    public function index()
    {
        $data = [
            'title' => 'Client'
        ];
        $this->admin_template->view('clients/vw_clients', $data);
    }

    public function load()
    {
        $results = $this->db->get('clients')->result_array();
        echo json_encode($results);
    }

    public function tambah()
    {
        $response = [];
        // $cekData = $this->db->get_where('tbl_category', ['category' => $this->input->post('category')])->row_array();

        if ($this->input->post('password') == $this->input->post('re_password')) {

            // Insert ketabel user (Buat user)
            $dataUser = [
                'username' => $this->input->post('username'),
                'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
                'email' => $this->input->post('email'),
                'role' => 2,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ];

            $this->db->trans_start();
            $this->db->insert('users', $dataUser);
            $last_id_user = $this->db->insert_id();
            $this->db->trans_complete();

            if ($this->db->trans_status() === FALSE) {
                $response = [
                    'code' => 403, 'status' => false, 'data' => null, 'message' => 'Gagal tambah data'
                ];
            } else {

                // Insert ke tabel client 
                $dataClient = [
                    'name' => $this->input->post('name'),
                    'email' => $this->input->post('email'),
                    'pic_client' => $this->input->post('pic_client'),
                    'no_telp' => $this->input->post('no_telp'),
                    'is_active' => 1,
                    'user_id' => $last_id_user,
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s')
                ];

                $this->db->trans_start();
                $this->db->insert('clients', $dataClient);
                $this->db->trans_complete();

                if ($this->db->trans_status() === FALSE) {
                    $response = [
                        'code' => 403, 'status' => false, 'data' => null, 'message' => 'Gagal tambah data'
                    ];
                } else {
                    $response = ['code' => 200, 'status' => true, 'data' => $dataClient, 'message' => 'Berhasil tambah data'];
                }
            }
        } else {
            $response = ['code' => 403, 'status' => false, 'data' => null, 'message' => 'Password tidak sama'];
        }

        echo json_encode($response);
    }
}
