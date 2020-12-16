<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	/**
	 * 
	 */
	class Category_model extends CI_Model
	{
		
		public function create($formArray)
		{
			$this->db->insert('categories',$formArray);
		}

		public function getCategories($params=[])
		{
			/*serach in list*/
			if (!empty($params['queryString'])) {
				$this->db->like('name',$params['queryString']);
			}
			$result = $this->db->get('categories')->result_array();
		
			return $result;
		}

		public function getCategory($id)
		{
			//select * from categories where id=$id
			$category = $this->db->where('id',$id)->get('categories')->row_array();

			return $category;
		}

		public function update($id, $formArray)
		{
			$this->db->where('id',$id);
			$this->db->update('categories', $formArray);
		}

		public function delete($id)
		{
			$this->db->where('id',$id);
			$this->db->delete('categories');
		}

		/* Front Function*/


		public function getCategoriesFront($params=[])
		{
			/*serach in list*/
			// if (!empty($params['queryString'])) {
			// 	$this->db->like('name',$params['queryString']);
			// }

			$this->db->where('categories.status','1');

			$result = $this->db->get('categories')->result_array();
		
			return $result;
		}
	}
?>