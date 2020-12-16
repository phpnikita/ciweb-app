<?php

	/**
	 * 
	 */
	class Blog extends CI_Controller
	{
		
		public function index($page = 1)
		{	
			/*text */
			$this->load->helper('text');

			/*------- Pagination ----------*/
			$this->load->library('pagination');

			$perpage = '5';

			$param['offset'] = $perpage;
			$param['limit'] = ($page * $perpage) - $perpage;

			$config['base_url'] = base_url('blog/index');
			$config['total_rows'] = $this->Article_model->getArticlesCount();
			$config['use_page_numbers'] = true;
			$config['per_page'] = $perpage;

			$config['first_link'] = 'First';
			$config['last_link'] = 'Last';
			$config['next_link'] = 'Next';
			$config['prev_link'] = 'Prev';
			$config['full_tag_open'] = '<ul class="pagination">';
			$config['full_tag_close'] = '</ul>';
			$config['num_tag_open'] = '<li class="page-item">';
			$config['num_tag_close'] = '</li>';
			$config['cur_tag_open'] = "<li class='disabled page-item'><li class='active page-item'><a href='#' class='page-link'>";
			$config['cur_tag_close'] = '<span class="sr-only"></span></a></li>';
			$config['next_tag_open'] = "<li class=\"page-item\">";
			$config['next_tag_close'] = "</li>";
			$config['prev_tag_open'] = "<li class=\"page-item\">";
			$config['prev_tag_close'] = "</li>";
			$config['first_tag_open'] = "<li class=\"page-item\">";
			$config['first_tag_close'] = "</li>";
			$config['last_tag_open'] = "<li class=\"page-item\">";
			$config['last_tag_close'] = "</li>";
			$config['attributes'] = array('class' => 'page-link');

			$this->pagination->initialize($config);

			$pagination_links = $this->pagination->create_links();

			$articles = $this->Article_model->getArticlesFront($param);

			$data['articles'] = $articles;
			$data['pagination_links'] = $pagination_links;

			$this->load->view('front/blog',$data);
		}

		public function categories()
		{
			$categories = $this->Category_model->getCategoriesFront();

			$data['categories'] = $categories;

			$this->load->view('front/categories',$data);
		}

		public function detail($id)
		{	
			$article = $this->Article_model->getArticle($id);

			if (empty($article)) {
				redirect(base_url('front/blog'));
			}

			$data['article'] = $article;

			$this->load->view('front/detail',$data);
		}

		public function category($category_id, $page=1)
		{	
			/*text */
			$this->load->helper('text');

			/*------- Pagination ----------*/
			$this->load->library('pagination');

			$perpage = '2';

			$param['offset'] = $perpage;
			$param['limit'] = ($page * $perpage) - $perpage;
			$param['category_id'] = $category_id;

			$config['base_url'] = base_url('blog/category/'.$category_id);
			$config['total_rows'] = $this->Article_model->getArticlesCount($param);
			$config['uri_segment'] = 4;
			$config['use_page_numbers'] = true;
			$config['per_page'] = $perpage;

			$config['first_link'] = 'First';
			$config['last_link'] = 'Last';
			$config['next_link'] = 'Next';
			$config['prev_link'] = 'Prev';
			$config['full_tag_open'] = '<ul class="pagination">';
			$config['full_tag_close'] = '</ul>';
			$config['num_tag_open'] = '<li class="page-item">';
			$config['num_tag_close'] = '</li>';
			$config['cur_tag_open'] = "<li class='disabled page-item'><li class='active page-item'><a href='#' class='page-link'>";
			$config['cur_tag_close'] = '<span class="sr-only"></span></a></li>';
			$config['next_tag_open'] = "<li class=\"page-item\">";
			$config['next_tag_close'] = "</li>";
			$config['prev_tag_open'] = "<li class=\"page-item\">";
			$config['prev_tag_close'] = "</li>";
			$config['first_tag_open'] = "<li class=\"page-item\">";
			$config['first_tag_close'] = "</li>";
			$config['last_tag_open'] = "<li class=\"page-item\">";
			$config['last_tag_close'] = "</li>";
			$config['attributes'] = array('class' => 'page-link');

			$this->pagination->initialize($config);

			$pagination_links = $this->pagination->create_links();

			$articles = $this->Article_model->getArticlesFront($param);

			$data['articles'] = $articles;
			$data['pagination_links'] = $pagination_links;

			// $category = $this->Category_model->getCategory($category_id);

			// $data['category'] = $category;

			$this->load->view('front/category-articles',$data);
		}

	}
?>