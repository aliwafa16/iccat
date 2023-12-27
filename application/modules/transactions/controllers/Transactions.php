<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Transactions extends MY_Controller
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
            'title' => 'Transaction'
        ];
        $this->admin_template->view('transactions/vw_transactions', $data);
    }

    public function load()
    {
        $this->db->select('trn_survey.*, clients.name as client_name, events.name as event_name');
        $this->db->from('trn_survey');
        $this->db->join('clients', 'trn_survey.client_id=clients.id');
        $this->db->join('events', 'trn_survey.event_id=events.id');
        $this->db->order_by('trn_survey.created_at', 'DESC');
        $results = $this->db->get()->result_array();
        echo json_encode($results);
    }


    public function responden($responden_id)
    {
        $this->db->select('trn_survey.*, clients.name as client_name, events.name as event_name');
        $this->db->from('trn_survey');
        $this->db->join('clients', 'trn_survey.client_id=clients.id');
        $this->db->join('events', 'trn_survey.event_id=events.id');
        $this->db->where('trn_survey.id', $responden_id);
        $dataTransaksi = $this->db->get()->row_array();


        $dataSurvey = json_decode($dataTransaksi['survey'], true);

        // Get data pertanyaan;
        $getItemPertanyaan = $this->db->get('perilaku')->result_array();
        $getItemKompetensi = $this->db->get('kompetensi')->result_array();

        $distribusi_jawaban_final = [];
        // foreach ($dataSurvey['distribusi_jawaban'] as $data) {
        // $row = [];
        // foreach ($dataSurvey[0]['distribusi_jawaban'] as $key => $value) {
        //     $dataSurvey[0]['distribusi_jawaban'][$key]['pertanyaan'] = $getItemPertanyaan[$key]['perilaku'];

        //     // var_dump($data['distribusi_jawaban']);
        //     // }
        // }



        // var_dump($dataSurvey[0]['jawaban_perkategori']);

        foreach ($dataSurvey as $data) {
            $row = [];
            foreach ($data['jawaban_perkategori'] as $key => $value) {
            }
            foreach ($data['distribusi_jawaban'] as $key => $value) {
                $value['pertanyaan'] = $getItemPertanyaan[$key]['perilaku'];
                $value['total'] = ($value['kepentingan'] + $value['frekuensi']) / 2;
                $distribusi_jawaban_final[] = $value;
            }
        }

        $data = [
            'title' => 'Detail Responden',
            'data_transaksi' => $dataTransaksi
        ];
        $this->admin_template->view('transactions/vw_responden', $data);
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
                $this->db->insert('transactions', $dataClient);
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
