<?php
class Master_pejabat_model extends CI_Model {


     public function get_data($start, $length, $search) {
        $this->db->select('*');
        $this->db->from('master_pejabat');
        if (!empty($search)) {
            $this->db->like('nama', $search); 
        }
            $this->db->order_by('id', 'asc'); 
            $this->db->limit($length, $start);
            return $this->db->get()->result();
    }
        
    public function get_by_id($id)
    {
        return $this->db->get_where('master_pejabat', array('id' => $id))->row();
    }

    public function insert($data)
    {
        $this->db->insert('master_pejabat', $data);
        return $this->db->insert_id();
    }
    
    public function update($id, $data)
    {
        $this->db->where('id', $id);
        $this->db->update('master_pejabat', $data);
    }

    public function delete($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('master_pejabat');

        if ($this->db->affected_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }

    //untuk ambil data nama dari tabel master_pejabat di select untuk tabel pejabat
    public function get_pejabat_options() 
    {
        $this->db->select('id, nama'); // Kolom yang ingin ditampilkan / diambil datanya
        $query = $this->db->get('master_pejabat');

        return $query->result();
    }

    public function get_total_records() {
        return $this->db->count_all('master_pejabat');
    }

    public function get_filtered_records($search) {
        $this->db->like('nama', $search); // kolom yang ingin Anda cari
        return $this->db->get('master_pejabat')->num_rows();
    }

    //buat select2
    public function search_pejabat($search_query) {
        $this->db->select('id, nama');
        $this->db->like('nama', $search_query); 
        $query = $this->db->get('master_pejabat'); 

        return $query->result(); 
    }

}
?>