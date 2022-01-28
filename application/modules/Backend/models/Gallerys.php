<?php
class Gallerys extends My_Model
{

  public function __construct()
  {
    parent::__construct();
  }
  
  public function gallery_image_list()
  {    
    return $this->db->get('gallery')->result();    
  }

  public function get_galleryImage_by_id($id)
  {
      $this->db->where('id',$id);
      return $this->db->get('gallery')->row();
  }

  public function save_galleryImage($dataValue)
  {
    $return = null;

    if (!empty($dataValue)) {
      if (!empty($dataValue['id'])) {        
        $this->db->where('id', $dataValue['id']);
        $this->db->update('gallery', $dataValue);
        $id= $dataValue['id'];
        $message = 'updated';
      } else {
        $this->db->insert('gallery', $dataValue);
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

  public function delete_image($id)
  {
    $this->db->where('id',$id);
    $this->db->delete('gallery');
  }

  public function update_filename($id,$uploaded_filename)
  {
    $this->db->where('id',$id);
    $this->db->update('gallery',array('image_address'=>$uploaded_filename));
  }
}

