<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Students_model extends CI_Model
{
	public function getStudents()
	{
		$query = "SELECT students.*, students_class.class, students_major.major
		FROM students JOIN students_class JOIN students_major
		ON students.class_id = students_class.id and students.major_id = students_major.id
		";
		return $this->db->query($query)->result_array();
	}

}