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

        $this->db->select('events.*,clients.name as client_name, clients.logo as logo');
        $this->db->from('events');
        $this->db->join('clients', 'events.client_id=clients.id');
        $this->db->where('events.id', $this->input->post('event_id'));
        $dataEvents =  $this->db->get()->row_array();


        // Count jumlah pengisi
        $dataResponden = $this->db->get_where('trn_survey', ['event_id' => $this->input->post('event_id')])->result_array();
        $jumlah_responden = count($dataResponden);
        $dmy_distribusi_jawaban = array();
        $dmy_distribusi_kompetensi = array();
        foreach ($dataResponden as $responden) {
            $dataSurvey = json_decode($responden['survey'], true);
            // Olah data distribusi_jawaban
            foreach ($dataSurvey['distribusi_jawaban'] as $key_distribusi_jawaban) {
                $id = $key_distribusi_jawaban['id'];
                if (!isset($dmy_distribusi_jawaban[$id])) {
                    // Jika 'id' belum ada di hasil, tambahkan sebagai elemen baru
                    $dmy_distribusi_jawaban[$id] = $key_distribusi_jawaban;
                } else {
                    // Jika 'id' sudah ada, tambahkan 'value' ke nilai yang sudah ada
                    $dmy_distribusi_jawaban[$id]['total_value'] += $key_distribusi_jawaban['total_value'];
                    $dmy_distribusi_jawaban[$id]['kepentingan'] += $key_distribusi_jawaban['kepentingan'];
                    $dmy_distribusi_jawaban[$id]['frekuensi'] += $key_distribusi_jawaban['frekuensi'];
                }
            }

            // Olah data komptensi
            foreach ($dataSurvey['distribusi_kompetensi'] as $key_kompetensi) {
                $id = $key_kompetensi['kompetensi_id'];
                if (!isset($dmy_distribusi_kompetensi[$id])) {
                    // Jika 'id' belum ada di hasil, tambahkan sebagai elemen baru
                    $dmy_distribusi_kompetensi[$id] = [
                        'name' => $key_kompetensi['name'],
                        'kompetensi_id' => $key_kompetensi['kompetensi_id'],
                        'total_value' => $key_kompetensi['total_value'],
                        'kepentingan_kompetensi' => $key_kompetensi['kepentingan_kompetensi'],
                        'value' => $key_kompetensi['value']
                    ];
                } else {
                    // Jika 'id' sudah ada, tambahkan 'value' ke nilai yang sudah ada
                    $dmy_distribusi_kompetensi[$id]['total_value'] += $key_kompetensi['total_value'];
                    $dmy_distribusi_kompetensi[$id]['kepentingan_kompetensi'] += $key_kompetensi['kepentingan_kompetensi'];
                    $dmy_distribusi_kompetensi[$id]['value'] += $key_kompetensi['value'];
                }
            }
        }

        // Ubah hasil dari associative array menjadi indexed array
        $distribusi_jawaban = array_values($dmy_distribusi_jawaban);
        // $distribusi_kompetensi = array_values($dmy_distribusi_kompetensi);


        // Olah data perilaku
        $getItemPertanyaan = $this->db->get('perilaku')->result_array();
        $results_distribusi_jawaban = [];
        $indexArray = 0;
        foreach ($distribusi_jawaban as $key) {
            $kompetensi = $key['kompetensi'];
            $item = array(
                'id' => $key['id'],
                'name' => $key['name'],
                'pertanyaan' => $getItemPertanyaan[$indexArray]['perilaku'],
                'kepentingan' => $key['kepentingan'],
                'frekuensi' => $key['frekuensi'],
                'total_value' => number_format((float)$key['total_value'], 2, '.', ''),
                'kompetensi' => $key['kompetensi'],
                'hasil_bagi_responden' => number_format((float)($key['total_value'] / $jumlah_responden), 2, '.', '')
            );
            if (!isset($results_distribusi_jawaban[$kompetensi])) {
                $results_distribusi_jawaban[$kompetensi] = array(
                    'kompetensi' => $kompetensi,
                    'item_pertanyaan' => array()
                );
            }
            $results_distribusi_jawaban[$kompetensi]['item_pertanyaan'][] = $item;
            $indexArray++;
        }

        foreach ($results_distribusi_jawaban as &$group) {
            usort($group['item_pertanyaan'], function ($a, $b) {
                return $b['hasil_bagi_responden'] <=> $a['hasil_bagi_responden'];
            });
        }


        // Olah data kompetensi
        $results_distribusi_kompetensi = [];
        $getItemKompetensi = $this->db->get('kompetensi')->result_array();
        foreach ($dmy_distribusi_kompetensi as $key => $value) {
            $value['hasil_bagi_responden'] = number_format((float)($value['total_value'] / $jumlah_responden), 2, '.', '');
            foreach ($getItemKompetensi as $kompetensi) {
                if ($key == $kompetensi['id']) {
                    $value['deskripsi'] = $kompetensi['deskripsi'];
                    $results_distribusi_kompetensi[] = $value;
                }
            }
        }

        usort(
            $results_distribusi_kompetensi,
            function ($a, $b) {
                return $b['hasil_bagi_responden'] <=> $a['hasil_bagi_responden'];
            }
        );



        // Olahan data hasil akhir
        $results_finals = [];
        foreach ($results_distribusi_kompetensi as $key => $value) {
            foreach ($results_distribusi_jawaban as $jawaban) {
                if (
                    $value['kompetensi_id'] == $jawaban['kompetensi']
                ) {
                    $value['item_pertanyaan'] = $jawaban['item_pertanyaan'];
                }
            }
            $results_finals[] = $value;
        }

        $data = [
            'events' => $dataEvents,
            'jumlah_responden' => count($dataResponden),
            'data' => $results_finals
        ];
        $response = $this->load->view('reports/vw_show_reports', $data, TRUE);
        echo json_encode($response);
    }

    public function prints_reports_pdf()
    {

        $dataSurvey =  json_decode($this->input->post('data'), true);
        $this->db->select('events.*,clients.name as client_name, clients.logo as logo');
        $this->db->from('events');
        $this->db->join('clients', 'events.client_id=clients.id');
        $this->db->where('events.id', json_decode($this->input->post('event'), true));
        $dataEvents =  $this->db->get()->row_array();

        $dataResponden = $this->db->get_where('trn_survey', ['event_id' => json_decode($this->input->post('event'), true)])->result_array();

        $results_finals = [];
        foreach ($dataSurvey as $key) {
            $results_finals[] = $key;
        }


        // Logo Client
        $path = base_url('assets/uploads/logo_clients/') . $dataEvents['logo'];
        $type = pathinfo($path, PATHINFO_EXTENSION);
        $datas = file_get_contents($path);
        $base64 = 'data:image/' . $type . ';base64,' . base64_encode($datas);


        // Logo ACT
        $path_act = base_url('assets/images/logo2.jpg');
        $type_act = pathinfo($path_act, PATHINFO_EXTENSION);
        $data_act = file_get_contents($path_act);
        $base64_act = 'data:image/' . $type_act . ';base64,' . base64_encode($data_act);

        $data = [
            'events' => $dataEvents,
            'jumlah_responden' => count($dataResponden),
            'data' => $results_finals,
            'logo_clients' => $base64,
            'logo_act' => $base64_act,
            'bobot' => json_decode($this->input->post('bobot'), true),
            'title' => 'Reports'
        ];

        $filename = "Report_" . str_replace(' ', '_', $dataEvents['client_name'])  . "_" . str_replace(' ', '_', $dataEvents['name']) . "_" . date('Ymdhis') . ".pdf";
        $this->load->library('pdf');
        $this->pdf->setPaper('A4', 'landscape');
        $this->pdf->filename = $filename;
        // $this->pdf->load_view('vw_reports_download', $data);

        // Your existing code to generate PDF content
        $pdf_content = $this->pdf->load_view('vw_reports_download', $data);

        // Send the PDF content and filename back to the client
        $response = array('pdf_content' => $pdf_content, 'filename' => $filename);
        echo json_encode($response);
    }

    public function prints_kompetensi_pdf()
    {
        $dataSurvey =  json_decode($this->input->post('data'), true);
        $this->db->select('events.*,clients.name as client_name, clients.logo as logo');
        $this->db->from('events');
        $this->db->join('clients', 'events.client_id=clients.id');
        $this->db->where('events.id', json_decode($this->input->post('event'), true));
        $dataEvents =  $this->db->get()->row_array();

        $dataResponden = $this->db->get_where('trn_survey', ['event_id' => json_decode($this->input->post('event'), true)])->result_array();

        $results_finals = [];
        foreach ($dataSurvey as $key) {
            $results_finals[] = $key;
        }

        // Logo Client
        $path = base_url('assets/uploads/logo_clients/') . $dataEvents['logo'];
        $type = pathinfo($path, PATHINFO_EXTENSION);
        $datas = file_get_contents($path);
        $base64 = 'data:image/' . $type . ';base64,' . base64_encode($datas);


        // Logo ACT
        $path_act = base_url('assets/images/logo2.jpg');
        $type_act = pathinfo($path_act, PATHINFO_EXTENSION);
        $data_act = file_get_contents($path_act);
        $base64_act = 'data:image/' . $type_act . ';base64,' . base64_encode($data_act);

        $data = [
            'events' => $dataEvents,
            'jumlah_responden' => count($dataResponden),
            'data' => $results_finals,
            'logo_clients' => $base64,
            'logo_act' => $base64_act,
            'title' => 'Reports'
        ];

        $filename = "Report_Kompetensi_" . str_replace(' ', '_', $dataEvents['client_name'])  . "_" . str_replace(' ', '_', $dataEvents['name']) . "_" . date('Ymdhis') . ".pdf";
        $this->load->library('pdf');
        $this->pdf->setPaper('A4', 'landscape');
        $this->pdf->filename = $filename;
        // $this->pdf->load_view('vw_reports_download', $data);

        // Your existing code to generate PDF content
        $pdf_content = $this->pdf->load_view('vw_kompetensi_download', $data);

        // Send the PDF content and filename back to the client
        $response = array('pdf_content' => $pdf_content, 'filename' => $filename);
        echo json_encode($response);
    }
}
