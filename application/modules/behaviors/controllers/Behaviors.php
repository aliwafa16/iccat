<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Behaviors extends MY_Controller
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
            'title' => 'Behavior'
        ];
        $this->admin_template->view('behaviors/vw_behaviors', $data);
    }

    public function load()
    {
        $this->db->select('perilaku.*,kompetensi.kompetensi');
        $this->db->from('perilaku');
        $this->db->join('kompetensi', 'perilaku.kompetensi_id=kompetensi.id');
        $this->db->order_by('perilaku.kompetensi_id', 'ASC');
        $results = $this->db->get()->result_array();
        echo json_encode($results);
    }

    public function edit()
    {
        $response = [];
        $cekData = $this->db->get_where('tbl_status', ['status' => $this->input->post('status')])->row_array();

        if (!$cekData) {
            $dataUpdated = [
                'status' => $this->input->post('status'),
                'updated_at' => date('Y-m-d H:i:s'),
            ];
            $this->db->trans_start();
            $this->db->where('id_status', $this->input->post('id_status'));
            $this->db->update('tbl_status', $dataUpdated);
            $this->db->trans_complete();

            if ($this->db->trans_status() === FALSE) {
                $response = ['code' => 403, 'status' => false, 'data' => null, 'message' => 'Gagal edit data'];
            } else {
                $response = ['code' => 200, 'status' => true, 'data' => $dataUpdated, 'message' => 'Berhasil edit data'];
            }
        } else {
            $response = ['code' => 403, 'status' => false, 'data' => null, 'message' => 'Data status sudah tersedia'];
        }

        echo json_encode($response);
    }
}
