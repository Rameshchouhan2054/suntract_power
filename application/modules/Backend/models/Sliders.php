<?php
class Sliders extends My_Model
{

  public function __construct()
  {
    parent::__construct();
  }

  public function slider_list()
  {
    $this->db->order_by('id', "DESC");
    return $this->db->get('slider')->result();
  }
  public function get_testimonial_by_id($id)
  {
    $this->db->where('id', $id);
    return $this->db->get('testimonial')->row();
  }

  public function save_sliderImage($dataValue)
  {
    $return = null;

    if (!empty($dataValue)) {
      if (!empty($dataValue['id'])) {
        $this->db->where('id', $dataValue['id']);
        $this->db->update('slider', $dataValue);
        $id = $dataValue['id'];
        $message = 'updated';
      } else {
        $this->db->insert('slider', $dataValue);
        $id = $this->db->insert_id();
        $message =  'inserted';
      }
      $this->db->where('id', $id);
      $row = $this->db->get('slider')->row();
    }
    $return = array(
      'id' => $id,
      'slider_image_address' => $row->slider_image_address,
      'message' => $message
    );
    return json_encode($return);
  }

  public function get_sliderImage_by_id($id)
  {
    $this->db->where('id', $id);
    return $this->db->get('slider')->row();
  }

  public function update_slider_image_address($update, $where)
  {
    $this->db->where($where);
    $this->db->update('slider', $update);
  }

  public function get_active_slider()
  {
    $this->db->where('slider_status', 'Active');
    return  $this->db->get('slider')->num_rows();
  }
}
