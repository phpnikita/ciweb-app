<?php
	/**
	 * 
	 */
	class Article_model extends CI_Model
	{
		
		public function getArticles($params = array())
		{
			if (!empty($params['queryString'])) {
				$this->db->or_like('title',trim($params['queryString']));
				$this->db->or_like('author',trim($params['queryString']));
			}

			if (isset($params['offset']) && isset($params['limit'])) {
				$this->db->limit($params['offset'],$params['limit']);
			}

				$query = $this->db->get('articles');
			// echo $this->db->last_query();
				
			$articles = $query->result_array();

			return $articles;
		}

		public function getArticlesCount($params = array())
		{	
			if (!empty($params['queryString'])) {
				$this->db->or_like('title',trim($params['queryString']));
				$this->db->or_like('author',trim($params['queryString']));
			}

			if (isset($params['category_id'])) {
				$this->db->where('category',$params['category_id']);
			}

			$count = $this->db->count_all_results('articles');
			return $count;
		}

		
		public function getArticle($id)
		{	
			$this->db->select('articles.*, categories.name as category_name');
			$this->db->where('articles.id',$id);

			$this->db->join('categories','categories.id=articles.category','left');

			$query = $this->db->get('articles');

			$article = $query->row_array();

			return $article;
		}

		public function create($formArray)
		{
			$this->db->insert('articles',$formArray);
		}

		public function updateArticle($id,$formArray)
		{
			$this->db->where('id',$id);
			$this->db->update('articles',$formArray);
		}

		public function deleteArticle($id)
		{
			$this->db->where('id',$id);
			$this->db->delete('articles');
		}

		/* -------------------- Front method -------------------- */

		public function getArticlesFront($params = array())
		{
			if (!empty($params['queryString'])) {
				$this->db->or_like('title',trim($params['queryString']));
				$this->db->or_like('author',trim($params['queryString']));
			}

			if (isset($params['offset']) && isset($params['limit'])) {
				$this->db->limit($params['offset'],$params['limit']);
			}

			if (isset($params['category_id'])) {
				$this->db->where('category',$params['category_id']);
			}

			$this->db->select('articles.*, categories.name as category_name');

			$this->db->where('articles.status','1');

			$this->db->order_by('articles.created_at','DESC');

			/*left join*/
			$this->db->join('categories','categories.id = articles.category','left');

			$query = $this->db->get('articles');
			// echo $this->db->last_query();
				
			$articles = $query->result_array();

			return $articles;
		}
	}
?>