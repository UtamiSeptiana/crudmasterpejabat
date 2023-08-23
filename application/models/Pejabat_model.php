<?php
class Pejabat_model extends CI_Model {
    
    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    public function get_by_id($id) //ganti jadi ada join
    {
      /*   return $this->db->get_where('pejabat', array('id' => $id))->row(); */
        $this->db->select('pejabat.*, master_pejabat.nama as nama_master');
        $this->db->from('pejabat');
        $this->db->join('master_pejabat', 'pejabat.m_pejabat_id = master_pejabat.id');
        $this->db->where('pejabat.id', $id);
        $query = $this->db->get();
        return $query->row();
       
    }

    public function insert($data)
    {
        $this->db->insert('pejabat', $data);
    }
    
    public function update($id, $data)
    {
        $this->db->where('id', $id);
        $this->db->update('pejabat', $data);
    }

    public function delete($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('pejabat');

        if ($this->db->affected_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }

    public function get_data($start, $length, $search) {
        $this->db->select('pejabat.*, master_pejabat.nama AS nama_master');
        $this->db->from('pejabat');
        $this->db->join('master_pejabat', 'pejabat.m_pejabat_id = master_pejabat.id', 'left');            
        if (!empty($search)) {
            $this->db->like('pejabat.nama', $search); // kolom yang ingin dicari
            $this->db->or_like('pejabat.alamat', $search);
            $this->db->or_like('master_pejabat.nama', $search);
        }
        $this->db->order_by('id', 'asc'); //mengurutkan data berdasarkan id
        $this->db->limit($length, $start);
        $query = $this->db->get();
        return $query->result();
    }

    public function get_total_records() {
        return $this->db->count_all('pejabat'); 
    }

    //pencarian di datatables
    public function get_filtered_records($search) {
        $this->db->join('master_pejabat', 'pejabat.m_pejabat_id = master_pejabat.id', 'left');  

        $this->db->like('pejabat.nama', $search); //kolom yang mau dicari
        $this->db->or_like('pejabat.alamat', $search);
        $this->db->or_like('master_pejabat.nama', $search);
        return $this->db->get('pejabat')->num_rows();  
    }


    //Menghitung tabel relasi
    public function getPejabatCountByDirektur() {
        $this->db->select('COUNT(*) as jumlah_direktur');
        $this->db->from('pejabat');
        $this->db->join('master_pejabat', 'pejabat.m_pejabat_id = master_pejabat.id');
        $this->db->where('master_pejabat.nama', 'Kepala Ruang');
        $query = $this->db->get();
        $result = $query->row_array();
        return $result['jumlah_direktur'];
    }

}

?>