<?php
class news extends CI_Model{
    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }

	public function get_news($id = FALSE)
	{
			if ($id === FALSE)
			{
					$sql = 'select id,title,post,author,image,DATE_FORMAT(date,"%d-%m-%Y") as newdate from news_posts order by newdate DESC limit 4';
					$query = $this->db->query($sql);
					return $query->result_array();
			}

			$query = $this->db->get_where('news_posts', array('id' => $id));
			return $query->row_array();
	}
	
	public function create_news($username)
	{
    $this->load->helper('url');

    $data = array(
        'title' => $this->input->post('title'),
		'author' => $username,
        'image' => $this->input->post('image'),
        'post' => $this->input->post('text')
    );
	$this->db->set('date', 'NOW()', FALSE);
    return $this->db->insert('news_posts', $data);
	}
	
	public function edit_news($id)
	{
    $this->load->helper('url');

    $data = array(
        'title' => $this->input->post('title'),
		'author' => $username,
        'image' => $this->input->post('image'),
        'post' => $this->input->post('text')
    );
	$this->db->set('date', 'NOW()', FALSE);
	$this->db->where('id', $id);
    return $this->db->update('news_posts', $data);
	}
	
	public function delete_news($id)
	{
	$this->db->delete('news_posts', array('id' => $id)); 
    return true;
	}
}
?>