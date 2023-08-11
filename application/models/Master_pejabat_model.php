<?php
class Master_pejabat_model extends CI_Model {
    
    public function get_all()
    {
        return $this->db->get('master_pejabat')->result();
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

    public function get_pejabat_options() 
    {
        $this->db->select('id, nama'); // Kolom yang ingin ditampilkan sebagai pilihan
        $query = $this->db->get('master_pejabat');
        return $query->result();
    }

    public function searchNamaJabatan($search) {
        $this->db->like('nama', $search); // Melakukan pencarian pada kolom 'nama'
        $query = $this->db->get('master_pejabat'); //tabel yang diambil

        return $query->result();
    }

    public function countPejabat()
    {
        return $this->db->count_all_results('master_pejabat'); // Ganti 'pejabat' sesuai dengan tabel Anda
    }

    public function getPejabat($limit, $offset)
    {
        $this->db->limit($limit, $offset); // Menetapkan limit dan offset
        $query = $this->db->get('master_pejabat'); // Mengambil data dari tabel 'master_pejabat'
        return $query->result();
    }

}
?>