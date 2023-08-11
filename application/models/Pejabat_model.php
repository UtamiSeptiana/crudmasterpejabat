<?php
class Pejabat_model extends CI_Model {
    
    public function __construct() {
        parent::__construct();
        $this->load->database();
    }
    
    public function get_all()
    {
        $this->db->select('pejabat.*, master_pejabat.nama AS nama_master');
        $this->db->from('pejabat');
        $this->db->join('master_pejabat', 'pejabat.m_pejabat_id = master_pejabat.id', 'left');            
        $query = $this->db->get();
        return $query->result();
    }

    public function get_by_id($id)
    {
        return $this->db->get_where('pejabat', array('id' => $id))->row();
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

    public function cariPejabatByNama($search) {
        $this->db->select('pejabat.*, master_pejabat.nama AS nama_master');
        $this->db->from('pejabat' );
        $this->db->join('master_pejabat', 'pejabat.m_pejabat_id = master_pejabat.id', 'left'); 
        $this->db->like('pejabat.nama', $search);
        $query = $this->db->get();
        return $query->result();
    }

}

?>