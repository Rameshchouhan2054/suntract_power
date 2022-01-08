<?php
class Testimonials extends My_Model
{

  public function __construct()
  {
    parent::__construct();
  }
  
  public function testimonial_list()
  {    
    return $this->db->get('testimonial')->result();    
  }
  public function get_testimonial_by_id($id)
  {
      $this->db->where('id',$id);
      return $this->db->get('testimonial')->row();
  }


  public function save_testimonial($dataValue)
  {
    $return = null;

    if (!empty($dataValue)) {
      if (!empty($dataValue['id'])) {        
        $this->db->where('id', $dataValue['id']);
        $this->db->update('testimonial', $dataValue);
        $id= $dataValue['id'];
        $message = 'updated';
      } else {
        $this->db->insert('testimonial', $dataValue);
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