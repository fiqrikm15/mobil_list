<?php 
class MCar extends CI_Model{
    
    function get_data(){
        $data = $this->db->get("tb_mobil");
        return $data->result_array();
    }

    function create_data(){
        $data = array(
            'merk' => $this->input->post('merk'),
            'warna' => $this->input->post('warna'),
            'tahun' => $this->input->post('tahun')
        );

        $rel = $this->db->insert("tb_mobil", $data);
        return $rel;
    }

    function update_data(){
        $id = $this->input->post('id');

        $data = array(
            'merk' => $this->input->post('merk'),
            'warna' => $this->input->post('warna'),
            'tahun' => $this->input->post('tahun')
        );

        $this->db->where("id", $id);
        $this->db->set($data);
        $rel = $this->db->update("tb_mobil");
        return $rel;
    }

    function delete_data(){
        $id = $this->input->post('id');
        $this->db->where("id", $id);
        $rel = $this->db->delete("tb_mobil");
        return $rel;
    }
}