<?php

class Querys extends CI_Model
{
    public function settled_query_list()
    {
        $this->db->where('status', 'Settled');
        $this->db->order_by('id', 'DESC');
        return $this->db->get('query')->result();
    }

    public function unsettled_query_list()
    {
        $this->db->where('status', 'Unsettled');
        $this->db->order_by('id', 'DESC');
        return $this->db->get('query')->result();
    }

    public function settle_query($where, $dataArray)
    {
        $this->db->where($where);
        $this->db->update('query', $dataArray);
    }

    public function get_query_by_id($id)
    {
        $this->db->select('q.*,b.ufname,b.ulname');
        $this->db->from('query q');
        $this->db->join('backend-users b','b.id = q.updated_by','left');
        $this->db->where('q.id', $id);
        
        return   $this->db->get()->row();
    }
}
