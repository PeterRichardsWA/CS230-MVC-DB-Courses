<?php
// my model for courses.

class Course extends CI_model {

	public function get_all_data() {
		return $this->db->query('SELECT * FROM courses ORDER BY created_at DESC')->result_array();
	}

	public function get_data_id($id) {
		return $this->db->query('SELECT * FROM courses WHERE id = ?', array($id))->row_array();
	}

	public function add_data($course) {
		
		$myDate = date('Y-m-d H:m');
		// echo $myDate;
		// exit;

		// only put in title and desc since we are doing triggers for auto updates on timestamp and created
		$query = 'INSERT INTO courses (title,description,created_at,updated_at) VALUES (?,?,?,?)';
		$values = array($course['title'], $course['description'],$myDate,$myDate);

		// doesn't return anything but a value to show it succeeded. if 0 then broke.
		return $this->db->query($query, $values);
	}

	public function remove_data($id) {
		// only put in title and desc since we are doing triggers for auto updates on timestamp and created
		
		$query = 'DELETE FROM courses WHERE id = ?';
		$values = array('id' => $id);

		// doesn't return anything but a value to show it succeeded. if 0 then broke.
		return $this->db->query($query, $values);
	}

}
?>