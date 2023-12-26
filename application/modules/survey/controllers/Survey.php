<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Survey extends MY_Controller
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
        $response = [];
        $responden = 0;
        $codeSurvey = $this->input->get('unique_code');
        $dataEvent = $this->db->get_where('events', ['code' => $codeSurvey])->row_array();
        if (!$dataEvent) {
            $response = ['code' => 404, 'status' => false, 'data' => null, 'message' => 'Event tidak ditemukan'];
            $this->load->view('vw_404', $response);
        } else {
            if ($dataEvent['is_active'] != 1) {
                $response = ['code' => 404, 'status' => false, 'data' => null, 'message' => 'Event tidak aktif'];
                $this->load->view('vw_404', $response);
            } else {
                if (date('Y-m-d H:i:s') >= $dataEvent['event_start'] && date('Y-m-d H:i:s') <= $dataEvent['event_end']) {
                    if ($responden <= $dataEvent['min_responden']) {

                        // Get item pertanyaan
                        $itemPernyataan = $this->db->get('perilaku')->result_array();
                        $groupedData = array_chunk($itemPernyataan, 30);


                        // Get kompetensi
                        $itemKompetensi  = $this->db->get('kompetensi')->result_array();
                        $max_group = 30;
                        $data = [
                            'title' => '',
                            'item_pernyataan' => $groupedData,
                            'item_kompetensi' => $itemKompetensi,
                            'max_loop' => count($itemPernyataan) / $max_group
                        ];

                        $this->load->view('vw_survey', $data);
                    } else {
                        $response = ['code' => 404, 'status' => false, 'data' => null, 'message' => 'Responden sudah terpenuhi'];
                        $this->load->view('vw_404', $response);
                    }
                } else {
                    $response = ['code' => 404, 'status' => false, 'data' => null, 'message' => 'Event sudah selesai'];
                    $this->load->view('vw_404', $response);
                }
            }
        }
    }

    public function finish()
    {
        $codeSurvey = $this->input->get('unique_code');
        $dataEvent = $this->db->get_where('events', ['code' => $codeSurvey])->row_array();
        if (!$dataEvent) {
            $response = ['code' => 404, 'status' => false, 'data' => null, 'message' => 'Event tidak ditemukan'];
            $this->load->view('vw_404', $response);
        } else {
            $this->load->view('vw_thanks');
        }
    }

    public function getKompetensi()
    {
        // var_dump($where_not);
        $results = [];
        $this->db->select('kompetensi.id, kompetensi.kompetensi as text');
        // $this->db->like('kompetensi', $this->input->get('search'));
        $response = $this->db->get('kompetensi')->result_array();

        foreach ($response as $key) {
            $row = [];
            $row['id'] = intval($key['id']);
            $row['text'] = $key['text'];

            $results[] = $row;
        }
        echo json_encode($results);
    }

    public function getKompetensi_()
    {
        $data = json_decode(json_encode($this->input->post('data')), true);

        $where_not = [];

        foreach ($data as $key) {
            array_push($where_not, $key['value']);
        }
        $this->db->select('kompetensi.id, kompetensi.kompetensi as text');
        $this->db->like()('kompetensi.id', $where_not);
        $response = $this->db->get('kompetensi')->result_array();

        foreach ($response as $key) {
            $row = [];
            $row['id'] = intval($key['id']);
            $row['text'] = $key['text'];

            $results[] = $row;
        }
        echo json_encode($results);
    }

    public function SubmitSurvey()
    {
        $itemPernyataan = $this->db->get('perilaku')->result_array();
        $itemKompetensi = $this->db->get('kompetensi')->result_array();
        $nameKepentingan = 'kepentingan';
        $nameFrekuensi = 'frekuensi';
        $nameRank = 'rank';
        $nameKepentinganKompetensi = 'kepentingan_kompetensi';


        $finals_answer = [];
        $distribusi_jawaban = [];
        $distribusi_perkategori = [];
        $distribusi_rank = [];
        $distribusi_value_rank = [];


        // Mullai hitung jawaban 
        foreach ($itemPernyataan as $key) {
            $kepentingan = $this->input->post($nameKepentingan . '_' . $key['id']);
            $frekuensi = $this->input->post($nameFrekuensi . '_' . $key['id']);
            $row = [
                'id' => $key['id'],
                'name' => 'pernyataan_' . $key['id'],
                'kepentingan' => $kepentingan,
                'frekuensi' => $frekuensi,
                'kompetensi' => $key['kompetensi_id']
            ];
            $distribusi_jawaban[] = $row;
        }

        foreach ($itemKompetensi as $key) {
            $rowKompetensi = array(
                'id' => $key['id'],
                'name' => $key['kompetensi'],
                'kepentingan' => 0,
                'frekuensi' => 0,

            );
            foreach ($distribusi_jawaban as $jawaban) {
                if ($key['id'] == $jawaban['kompetensi']) {
                    $rowKompetensi['kepentingan'] += $jawaban['kepentingan'];
                    $rowKompetensi['frekuensi'] += $jawaban['frekuensi'];
                }
            }
            $distribusi_perkategori[] = $rowKompetensi;
        }


        // RANK
        $dummyRank = [];
        $indexMinRank = 45;
        for ($i = 1; $i <= 45; $i++) {
            $row = [];
            $rank =  $this->input->post($nameRank . '_' . $i);


            $row['rank'] = $i;
            $row['name_rank'] = 'rank_' . $i;
            $row['value_kategori'] = $rank;
            $row['value'] = $indexMinRank;
            $dummyRank[] = $row;
            $indexMinRank--;
        }

        // var_dump($dummyRank);
        foreach ($dummyRank as $key) {
            $row = [];
            foreach ($itemKompetensi as $kompetensi) {

                if ($key['value_kategori'] == $kompetensi['id']) {
                    $row['rank'] = $key['rank'];
                    $row['name_rank'] = $key['name_rank'];
                    $row['name'] = $kompetensi['kompetensi'];
                    $row['kompetensi_id'] = $key['value_kategori'];
                    $row['value'] = $key['value'];
                }
            }
            $kepentinganKompetensi = $this->input->post($nameKepentinganKompetensi . '_' . $key['rank']);
            $row['kepentingan_kompetensi'] = $kepentinganKompetensi;
            $distribusi_rank[] = $row;
        }


        $data_survey = [
            'distribusi_jawaban' => $distribusi_jawaban,
            'jawaban_perkategori' => $distribusi_perkategori,
            'distribusi_kompetensi' => $distribusi_rank
        ];
        // Selesai hitung jawaban

        $codeSurvey = $this->input->get('unique_code');
        $dataEvent = $this->db->get_where('events', ['code' => $codeSurvey])->row_array();


        $response = [];
        $responden = 0;
        $codeSurvey = $this->input->get('unique_code');
        $dataEvent = $this->db->get_where('events', ['code' => $codeSurvey])->row_array();
        if (!$dataEvent) {
            $response = ['code' => 404, 'status' => false, 'data' => null, 'message' => 'Event tidak ditemukan'];
        } else {
            if ($dataEvent['is_active'] != 1) {
                $response = ['code' => 404, 'status' => false, 'data' => null, 'message' => 'Event tidak aktif'];
            } else {
                if (date('Y-m-d H:i:s') >= $dataEvent['event_start'] && date('Y-m-d H:i:s') <= $dataEvent['event_end']) {
                    if ($responden <= $dataEvent['min_responden']) {
                        $finals_answer = [
                            'client_id' => $dataEvent['client_id'],
                            'event_id' => $dataEvent['id'],
                            'responden_name' => $this->input->post('username'),
                            'email' => $this->input->post('email'),
                            'no_telp' => $this->input->post('no_telp'),
                            'born_date' => $this->input->post('born_date'),
                            'work_level' => $this->input->post('position'),
                            'gender' => $this->input->post('gender'),
                            'survey' => json_encode($data_survey, JSON_NUMERIC_CHECK | JSON_PARTIAL_OUTPUT_ON_ERROR | JSON_HEX_APOS),
                        ];



                        $this->db->trans_start();
                        $this->db->insert('trn_survey', $finals_answer);
                        $this->db->trans_complete();

                        if ($this->db->trans_status() === FALSE) {
                            $response = [
                                'code' => 403, 'status' => false, 'data' => null, 'message' => 'Gagal submit survey'
                            ];
                        } else {
                            $response = ['code' => 200, 'status' => true, 'data' => null, 'message' => 'Berhasil submit survey'];
                        }
                    } else {
                        $response = ['code' => 404, 'status' => false, 'data' => null, 'message' => 'Responden sudah terpenuhi'];
                    }
                } else {
                    $response = ['code' => 404, 'status' => false, 'data' => null, 'message' => 'Event sudah selesai'];
                }
            }
        }


        echo json_encode($response);
    }
}
