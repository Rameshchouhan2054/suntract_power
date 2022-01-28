<?php

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

/**
 * Class Payment
 */
class Frontent extends CI_Model
{

    /**
     * initializes the class inheriting the
     * methods of the class My_Model
     */
    public function __construct()
    {
        parent::__construct();
    }

    public function get_testimonial_data()
    {        
        $this->db->order_by("id", "DESC");
        return $this->db->get('testimonial')->result();
    }
    public function get_news_data()
    {
        
        $this->db->order_by("id", "DESC");
        return $this->db->get('news')->result();
    }

    public function get_member_data()
    {        
        // $this->db->order_by("id", "DESC");
        return $this->db->get('team_members')->result();
    }

    public function get_gallery_data()
    {        
        // $this->db->order_by("id", "DESC");
        return $this->db->get('gallery')->result();
    }
    public function get_slider_data()
    {        
        $this->db->order_by("id", "DESC");
        return $this->db->get('slider')->result();
    }

    public function get_full_exam_data($exam_id = null)
    {
        $this->db->select('e.*,c.category_name,sc.SubCategory_name');
        $this->db->from('exams as e');
        $this->db->join('category as c', 'c.category_id = e.category_id', 'left');
        $this->db->join('SubCategory as sc', 'sc.SubCategory_id = e.SubCategory_id', 'left');
        $this->db->where('e.exam_id', $exam_id);

        $this->db->order_by("e.exam_id", "DESC");
        return $this->db->get()->row();
    }

    public function get_category_data()
    {
        $category_subcribe_status_by_user_id = "";
        if (!empty($this->session->user->id)) {
            $category_subcribe_status_by_user_id = 'and s.user_id =' . $this->session->user->id;
        }

        $this->db->select('c.*,s.id as subscription_status');
        $this->db->from('category as c');
        $this->db->join('subscription as s', 's.related_id =c.Category_id and s.type="Category" and s.status = "Subscribed" ' . $category_subcribe_status_by_user_id, 'left');
        $this->db->order_by("s.related_id", "DESC");

        return $this->db->get()->result();
    }

    public function get_subCategory_data_by_category_id($category_id)
    {
        $this->db->where('category_id', $category_id);
        return $this->db->get('SubCategory')->result();
    }

    public function get_exam_data_by_subCategory_id($where)
    {
        $this->db->where($where);
        return $this->db->get('exams')->result();
    }

    public function get_links($where)
    {
        $this->db->select('d.*,e.exam_name');
        $this->db->from('declaration d');
        $this->db->join('exams e', 'e.exam_id =d.exam_id', 'left');
        $this->db->where($where);
        $this->db->order_by('id', 'DESC');
        return $this->db->get()->result();
    }

    public function add_query($dataValues)
    {
        $this->db->insert('query', $dataValues);
    }


    public function questions_data()
    {
        $this->db->order_by("id", "DESC");
        return $this->db->get('faq')->result();
    }
 
    public function notification_data()
    {
        $this->db->where('status','Global');
        $this->db->order_by('id','DESC');
       return  $this->db->get('notification')->result();
    }

    public function get_statistics_data()
  {
    // $this->db->where('id',$id);
   return  $this->db->get('statistics')->row();
  }

  public function get_projects_data()
  {
      return $this->db->get('projects')->result();
  }
}
