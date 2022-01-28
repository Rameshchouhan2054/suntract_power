<?php
class News extends My_Model
{

  public function __construct()
  {
    parent::__construct();
  }
  
  public function news_data()
  {    
    return $this->db->get('news')->result();    
  }

  public function get_news_by_id($id)
  {
      $this->db->where('id',$id);
      return $this->db->get('news')->row();
  }

  public function save_news($dataValue)
  {
    $return = null;

    if (!empty($dataValue)) {
      if (!empty($dataValue['id'])) {        
        $this->db->where('id', $dataValue['id']);
        $this->db->update('news', $dataValue);
        $id= $dataValue['id'];
        $message = 'updated';
      } else {
        $this->db->insert('news', $dataValue);
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

  public function delete_news($id)
  {
    $this->db->where('id',$id);
    $this->db->delete('news');
  }

  public function update_filename($id,$uploaded_filename)
  {
    $this->db->where('id',$id);
    $this->db->update('news',array('image_address'=>$uploaded_filename));
  }
}

