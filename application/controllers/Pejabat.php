<?php
class Pejabat extends CI_Controller {
    
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Pejabat_model');
        $this->load->model('Master_pejabat_model');
    }

    public function index() {

        $this->load->view('pejabat/index');
    }

    public function get_data() {
        $draw = $this->input->post('draw');
        $start = $this->input->post('start');
        $length = $this->input->post('length');
        $search = $this->input->post('search')['value'];

        $recordsTotal = $this->Pejabat_model->get_total_records();
        $recordsFiltered = $this->Pejabat_model->get_filtered_records($search);
        $data = $this->Pejabat_model->get_data($start, $length, $search); 

        $response = array(
            "draw" => intval($draw),
            "recordsTotal" => $recordsTotal,
            "recordsFiltered" => $recordsFiltered,
            "data" => $data
        );

        echo json_encode($response);
    }

/*     public function search_pejabat() //fungsi untuk JSON pada create dan edit data pejabat bagian input jabatan
{
    $search_query = $this->input->get('q'); //parameter yang mau diambil bisa diisi bebas

    $this->load->model('Master_pejabat_model');
    $pejabat_data = $this->Master_pejabat_model->search_pejabat($search_query); 

    $response = array();
    foreach ($pejabat_data as $pejabat) {
        $response[] = array(
            'id' => $pejabat->id, 
            'text' => $pejabat->nama, //kolom data yang akan diambil
        );
    }

    echo json_encode($response);
} */



public function select_data() {
    $this->load->model('Master_pejabat_model'); // Ganti dengan model yang sesuai

    $search = $this->input->get('q');
    $page = $this->input->get('page');
    $page_limit = 10; // Jumlah item per halaman

    $data = $this->Master_pejabat_model->get_data_paginated($search, $page, $page_limit);
    $response = array();
    foreach ($data as $pejabat) {
        $response[] = array(
            'id' => $pejabat->id, 
            'text' => $pejabat->nama, //kolom data yang akan diambil
        );
    }

    header('Content-Type: application/json');
    echo json_encode($response);
    
}



    public function create()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
           $data = array(
               'nama' => $this->input->post('nama'),
               'jenis_kelamin' => $this->input->post('jenis_kelamin'),
               'alamat' => $this->input->post('alamat'),
               'm_pejabat_id' => $this->input->post('m_pejabat_id'),
           );

           $result = $this->Pejabat_model->insert($data); // Panggil method simpan dari model
           if ($result) {
               $this->session->set_flashdata('error', 'Gagal menyimpan data');
            } else {
                $this->session->set_flashdata('success', 'Data berhasil disimpan');
           }
            redirect('pejabat');//nama controller
        } else {
            $this->load->model('Master_pejabat_model');
            $data = $this->Master_pejabat_model->get_pejabat_options();
            $this->load->view('pejabat/create', $data);
        }        
    }


    public function edit($id)
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $data = array(
                'nama' => $this->input->post('nama'),
                'jenis_kelamin' => $this->input->post('jenis_kelamin'),
                'alamat' => $this->input->post('alamat'),
                'm_pejabat_id' => $this->input->post('m_pejabat_id'),
            );

            $result = $this->Pejabat_model->update($id, $data); // Panggil method ubah dari model
            if ($result) {
                $this->session->set_flashdata('error', 'Gagal mengubah data');
            } else {
                $this->session->set_flashdata('success', 'Data berhasil diubah');
            }
            redirect('pejabat');
        } else {
            $data['pejabat'] = $this->Pejabat_model->get_by_id($id);
            $this->load->model('Master_pejabat_model');
            $data['pejabat_options'] = $this->Master_pejabat_model->get_pejabat_options();           
            $this->load->view('pejabat/edit', $data);
        }
    }

    
    public function delete($id)
    {
        $deleted = $this->Pejabat_model->delete($id);
        if ($deleted) {
            // Jika berhasil dihapus, set pesan alert sukses
            $this->session->set_flashdata('success', 'Data berhasil dihapus');
        } else {
            // Jika gagal dihapus, set pesan alert error
            $this->session->set_flashdata('error', 'Gagal menghapus data');
        }
        redirect('pejabat');
    }
    

}
?>
