<?php
class Files_Model extends CI_Model {

	public function __construct()
	{
		$this->load->database();
	}

    public function insert($fileArray)
    {
        $this->db->insert('files', $fileArray);
		return $this->db->insert_id();
	}

	public function get_files()
	{
	    return $this->db->select()
	            ->from('files')
	            ->get()
	            ->result();
	}
}