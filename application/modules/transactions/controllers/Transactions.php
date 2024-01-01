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


        $dataSurvey[] = json_decode($dataTransaksi['survey'], true);


        // Get data pertanyaan;
        $getItemPertanyaan = $this->db->get('perilaku')->result_array();
        $getItemKompetensi = $this->db->get('kompetensi')->result_array();


        // Proses distribusi jawaban
        $groupedArrays = array();
        $indexArray = 0;
        foreach ($dataSurvey[0]['distribusi_jawaban'] as $array) {
            $kompetensi = $array['kompetensi'];

            $item = array(
                'id' => $array['id'],
                'name' => $array['name'],
                'pertanyaan' => $getItemPertanyaan[$indexArray]['perilaku'],
                'kepentingan' => $array['kepentingan'],
                'frekuensi' => $array['frekuensi'],
                'total_value' => number_format((float)$array['total_value'], 2, '.', ''),
                'kompetensi' => $array['kompetensi'],
            );

            if (!isset($groupedArrays[$kompetensi])) {
                $groupedArrays[$kompetensi] = array(
                    'kompetensi' => $kompetensi,
                    'item_pertanyaan' => array()
                );
            }

            $groupedArrays[$kompetensi]['item_pertanyaan'][] = $item;

            $indexArray++;
        }
        // Sort the "item_pertanyaan" arrays based on the "id" key
        foreach ($groupedArrays as &$group) {
            usort($group['item_pertanyaan'], function ($a, $b) {
                return $b['total_value'] <=> $a['total_value'];
            });
        }

        // Convert associative array to indexed array
        $result = array_values($groupedArrays);

        $distribusi_jawaban = [];
        foreach ($result as $key => $value) {
            $value['nama_kompetensi'] = $getItemKompetensi[$key]['kompetensi'];
            $value['deskripsi'] = $getItemKompetensi[$key]['deskripsi'];
            $distribusi_jawaban[] = $value;
        }

        // Endproses


        // Proses ranking
        usort(
            $dataSurvey[0]['distribusi_kompetensi'],
            function ($a, $b) {
                return $b['total_value'] <=> $a['total_value'];
            }
        );


        // Olahan data akhir ( merge distribusi jawaban dan kompetensi)
        $data_finals = [];
        foreach ($dataSurvey[0]['distribusi_kompetensi'] as $key => $value) {
            foreach ($distribusi_jawaban as $jawaban) {
                if ($value['kompetensi_id'] == $jawaban['kompetensi']) {
                    $value['item_pertanyaan'] = $jawaban['item_pertanyaan'];
                    $value['deskripsi'] = $jawaban['deskripsi'];
                }
                    
            }
            $data_finals[] = $value;
        }

        $data = [
            'title' => 'Detail Responden',
            'data_transaksi' => $dataTransaksi,
            'data_kompetensi' => $dataSurvey[0]['jawaban_perkategori'],
            'distribusi_jawaban' => $distribusi_jawaban,
            'data_ranking' => $dataSurvey[0]['distribusi_kompetensi'],
            'data_finals' => $data_finals
        ];
        $this->admin_template->view('transactions/vw_responden', $data);
    }
}
