<?php
class Projects extends My_Model
{

  public function __construct()
  {
    parent::__construct();
  }
  
  public function project_list()
  {    
    return $this->db->get('projects')->result();    
  }
  public function get_project_by_id($id)
  {
      $this->db->where('id',$id);
      return $this->db->get('projects')->row();
  }


  public function save_project($dataValue)
  {
    $return = null;

    if (!empty($dataValue)) {
      if (!empty($dataValue['id'])) {        
        $this->db->where('id', $dataValue['id']);
        $this->db->update('projects', $dataValue);
        $id= $dataValue['id'];
        $message = 'updated';
      } else {
        $this->db->insert('projects', $dataValue);
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

  public function delete_project($id)
  {
    $this->db->where('id',$id);
    $this->db->delete('projects');
  }
}