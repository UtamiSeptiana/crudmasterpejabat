<?php
class Pejabat extends CI_Controller {
    
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Pejabat_model');
        $this->load->model('Master_pejabat_model');
    }
    
    public function index()
    {

        $search = $this->input->get('search'); // Mendapatkan nilai search dari query string
        if (!empty($search)) {
            $data['pejabat_list'] = $this->Pejabat_model->cariPejabatByNama($search);
        } else {
            $data['pejabat_list']= $this->Pejabat_model->get_all();
        }
        $this->load->view('pejabat/index', $data);
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
        $data['pejabat_options'] = $this->Master_pejabat_model->get_pejabat_options();    
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
