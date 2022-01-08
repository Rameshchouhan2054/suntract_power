<?php

class HomeModel extends CI_Model
{
    public function save_category($data_arr)
    {
        
        
      $this->db->insert('category',$data_arr);

    }
    public function Pickup_Request()
    {
        $query = $this->db->get('Pickup_Request');
        return $query;
    }
    public function Message()
    {
        $query = $this->db->get('message');
        return $query;
    }
    public function AssociateUs()
    {
        $query = $this->db->get('associateUs');
        return $query;
    }
    public function AssociateVehicle()
    {
        $query = $this->db->get('AssociateVehicle');
        return $query;
    }

}
