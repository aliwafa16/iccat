<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Reports extends MY_Controller
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
            'title' => 'Report',
            'clients' => $this->db->get('clients')->result_array(),
            'events' => $this->db->get('events')->result_array()
        ];
        $this->admin_template->view('reports/vw_reports', $data);
    }

    public function load()
    {
        $results = $this->db->get('reports')->result_array();
        echo json_encode($results);
    }

    public function show_reports()
    {

        // Get Event dan Client;

        $this->db->select('events.*,clients.name as client_name');
        $this->db->from('events');
        $this->db->join('clients', 'events.client_id=clients.id');
        $this->db->where('events.id', $this->input->post('event_id'));
        $dataEvents =  $this->db->get()->row_array();


        // Count jumlah pengisi
        $jmlResponden = $this->db->get_where('trn_survey', ['event_id' => $this->input->post('event_id')])->result_array();
        $data = [
            'events' => $dataEvents,
            'jumlah_responden' => count($jmlResponden)
        ];
        $response = $this->load->view('reports/vw_show_reports', $data, TRUE);
        echo json_encode($response);
    }
}
