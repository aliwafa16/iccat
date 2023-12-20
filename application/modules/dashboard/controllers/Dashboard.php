<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends MY_Controller
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
            'title' => 'Dashboard'
        ];
        $this->admin_template->view('dashboard/vw_dashboard', $data);
    }

    public function load()
    {
        $response = [];
        $this->db->select('events.*, clients.name as client_name, clients.email as client_email');
        $this->db->from('events');
        $this->db->join('clients', 'events.client_id=clients.id', 'LEFT JOIN');
        $this->db->order_by('events.created_at', 'DESC');
        $results = $this->db->get()->result_array();
        foreach ($results as $key) {
            $key['link'] =  base_url() . 'Survey?unique_code=' . $key['code'];
            $response[] = $key;
        }

        echo json_encode($response);
    }
}
