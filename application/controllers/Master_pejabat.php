<?php
class Master_pejabat extends CI_Controller {
    
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Master_pejabat_model');
        $this->load->library('form_validation');
    }

    public function index()
    {     
        $this->load->view('master_pejabat/index');
    }

    public function get_data() {
        $draw = $this->input->post('draw');
        $start = $this->input->post('start');
        $length = $this->input->post('length');
        $search = $this->input->post('search')['value'];

        $recordsTotal = $this->Master_pejabat_model->get_total_records(); 
        $recordsFiltered = $this->Master_pejabat_model->get_filtered_records($search);
        $data = $this->Master_pejabat_model->get_data($start, $length, $search);

        $response = array(
            "draw" => intval($draw),
            "recordsTotal" => $recordsTotal,
            "recordsFiltered" => $recordsFiltered,
            "data" => $data
        );

        echo json_encode($response);
    }

    public function create()
    {
        // Handle form submission for create operation
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $data = array(
                'nama' => $this->input->post('nama'),
            );

            $result = $this->Master_pejabat_model->insert($data); // Panggil method simpan dari model

            if ($result) {
                $this->session->set_flashdata('success', 'Data berhasil disimpan');
            } else {
                $this->session->set_flashdata('error', 'Gagal menyimpan data');
            }

            redirect('master_pejabat');
        } else {
            $this->load->view('master_pejabat/create');
        }
    }
    
    public function edit($id)
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $data = array(
                'nama' => $this->input->post('nama'),
            );
            

            $result = $this->Master_pejabat_model->update($id, $data); // Panggil method update dari model

            if ($result) {
                $this->session->set_flashdata('error', 'Gagal mengubah data');
            } else {
                $this->session->set_flashdata('success', 'Data berhasil diubah');
            }
            redirect('master_pejabat');
        } else {
            $data['pejabat'] = $this->Master_pejabat_model->get_by_id($id);
            $this->load->view('master_pejabat/edit', $data);
        }
    }
    
    public function delete($id)
    {
        // Panggil model untuk menghapus data berdasarkan ID
        $deleted = $this->Master_pejabat_model->delete($id);

        if ($deleted) {
            $this->session->set_flashdata('success', 'Data berhasil dihapus');
        } else {
            $this->session->set_flashdata('error', 'Gagal menghapus data');
        }

        redirect('master_pejabat');

    }

}
?>
