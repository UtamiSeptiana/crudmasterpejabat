<?php
class Dashboard extends CI_Controller {
    public function index()
    {
        $this->load->model('Master_pejabat_model');
        $data['total_master'] = $this->Master_pejabat_model->get_total_records();

        $this->load->model('Pejabat_model');
        $data['total_pejabat'] = $this->Pejabat_model->get_total_records();

        $this->load->view('dashboard', $data);
    }
}
?>
