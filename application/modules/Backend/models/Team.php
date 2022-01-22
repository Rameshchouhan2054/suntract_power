<?php
class Team extends My_Model
{

  public function __construct()
  {
    parent::__construct();
  }
  
  public function team_member_list()
  {    
    return $this->db->get('team_members')->result();    
  }
  public function get_team_member_by_id($id)
  {
      $this->db->where('id',$id);
      return $this->db->get('team_members')->row();
  }


  public function save_team_member($dataValue)
  {
    $return = null;

    if (!empty($dataValue)) {
      if (!empty($dataValue['id'])) {        
        $this->db->where('id', $dataValue['id']);
        $this->db->update('team_members', $dataValue);
        $id= $dataValue['id'];
        $message = 'updated';
      } else {
        $this->db->insert('team_members', $dataValue);
        $id = $this->db->insert_id();
        $message =  'inserted';
      }
    }
    $return =array(
            'id' => $id,
            'message' => $message
    );
    return json_encode($return);
  }

  public function delete_team_member_by_id($member_id)
  {
    $this->db->where('id',$member_id);
    $this->db->delete('team_members');
  }


  //--------------------------statistics---------------------------------
  public function get_statistics_data()
  {
    // $this->db->where('id',$id);
   return  $this->db->get('statistics')->row();
  }

  public function save_statistics($dataValue)
  {
    $return = null;

    if (!empty($dataValue)) {
      if (!empty($dataValue['id'])) {        
        $this->db->where('id', $dataValue['id']);
        $this->db->update('statistics', $dataValue);
        $id= $dataValue['id'];
        $message = 'updated';
      } else {
        $this->db->insert('statistics', $dataValue);
        $id = $this->db->insert_id();
        $message =  'inserted';
      }
    }
    $return =array(
            'id' => $id,
            'message' => $message
    );
    return json_encode($return);
  }
}