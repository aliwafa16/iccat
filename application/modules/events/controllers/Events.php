<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Events extends MY_Controller
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
        $clients = $this->db->order_by('clients.created_at')->get('clients')->result_array();
        $data = [
            'title' => 'Events Client',
            'clients' => $clients
        ];
        $this->admin_template->view('events/vw_events', $data);
    }

    public function load()
    {
        $this->db->select('events.*, clients.name as client_name');
        $this->db->from('events');
        $this->db->join('clients', 'events.client_id = clients.id', 'LEFT JOIN');
        $this->db->order_by('events.created_at');
        $results = $this->db->get()->result_array();
        echo json_encode($results);
    }

    public function tambah()
    {
        $response = [];

        $codeUnik = md5(microtime() . $this->input->post('name'));


        $dataEvent = [
            'name' => $this->input->post('name'),
            'code' => $codeUnik,
            'min_responden' => $this->input->post('min_responden'),
            'event_start' => $this->input->post('event_start'),
            'event_end' => $this->input->post('event_end'),
            'pic_event' => $this->input->post('pic_event'),
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
            'client_id' => $this->input->post('client_id'),
            'created_by' => $this->session->userdata('id_user')

        ];

        $this->db->trans_start();
        $this->db->insert('events', $dataEvent);
        $this->db->trans_complete();


        if ($this->db->trans_status() === FALSE) {
            $response = ['code' => 403, 'status' => false, 'data' => null, 'message' => 'Gagal tambah data'];
        } else {
            $response = ['code' => 200, 'status' => true, 'data' => $dataEvent, 'message' => 'Berhasil tambah data'];
        }
        echo json_encode($response);
    }
}
