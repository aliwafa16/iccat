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
                        $max_group = 30;
                        $data = [
                            'title' => '',
                            'item_pernyataan' => $groupedData,
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
}
