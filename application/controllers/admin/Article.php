<?php

	/**
	 * 
	 */
	class Article extends CI_Controller
	{
		public function __construct()
		{
			parent::__construct();

			$admin = $this->session->userdata('admin');

			if (empty($admin)) {
				$this->session->set_flashdata('msg','your session has been expried');

				redirect(base_url().'admin/login/index');
			}
		}
		
		public function index($page = 1)
		{
			$config['per_page'] = '10';

			$queryString = $this->input->get('q');

			$params['queryString'] = $queryString;
			$params['offset'] = $config['per_page'];
			$params['limit'] = ($page * $config['per_page']) - $config['per_page'];

			/*------- Pagination ----------*/
			$this->load->library('pagination');

			$config['base_url'] = base_url('admin/article/index');
			$config['total_rows'] = $this->Article_model->getArticlesCount($params);
			$config['use_page_numbers'] = true;

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

			/*----------- Get Category -----------*/
			$categories=$this->Category_model->getCategories();



			/* ---------- Get Articles ---------- */
			$article=$this->Article_model->getArticles($params);

			$data['categories'] = $categories;
			$data['articles'] = $article;
			$data['queryString'] = $queryString;
			$data['pagination_links'] = $pagination_links;
			$data['mainModule'] = 'article';
			$data['subModule'] = 'viewArticle';

			$this->load->view('admin/article/list',$data);
		}

		public function create()
		{
			$this->load->helper('common_helper');


			$categorys['mainModule'] = 'article';
			$categorys['subModule'] = 'createArticle';

			/*------------image validation------------*/
			$config['upload_path']          = './public/uploads/articles/';
            $config['allowed_types']        = 'gif|jpg|png';
            $config['encrypt_name']        	=  true;
            // $config['max_size']             = 100;
            // $config['max_width']            = 1024;
            // $config['max_height']           = 768;

			/*Model Load*/
			$this->load->library('upload',$config);

			/*--------- Get Category--------*/

			$categories=$this->Category_model->getCategories();

			$categorys['categories'] = $categories;

			/*---------- Form Validation ----------*/
			$this->form_validation->set_error_delimiters('<p class="invalid-feedback">','</p>');

			$this->form_validation->set_rules('category_id','Category','required');
			$this->form_validation->set_rules('title','Title','trim|required|min_length[20]');
			$this->form_validation->set_rules('description','Description','trim|required');
			$this->form_validation->set_rules('author','Author','trim|required');

			if ($this->form_validation->run() == true) {

				if (!empty($_FILES['image']['name'])) {

					/* -------------- Image Upload -------------- */
					if ($this->upload->do_upload('image')) {

						/* ------- Image all data ------- */
						$data = $this->upload->data();

						/*resizing part*/
						resizeImage($config['upload_path'].$data['file_name'],$config['upload_path'].'thumb_front/'.$data['file_name'],1120,800);

						resizeImage($config['upload_path'].$data['file_name'],$config['upload_path'].'thumb_admin/'.$data['file_name'],300,250);
											
						/* ---------- Input Code ---------- */
						$formArray['image'] = $data['file_name'];
						$formArray['category'] = $this->input->post('category_id');
						$formArray['title'] = $this->input->post('title');
						$formArray['description'] = $this->input->post('description');
						$formArray['author'] = $this->input->post('author');
						$formArray['status'] = $this->input->post('status');
						$formArray['created_at'] = date('Y-m-d H:i:s');

						/* -------  Create Article Model ------- */
						$this->Article_model->create($formArray);

						$this->session->set_flashdata('success','Article added successfully');

						redirect(base_url().'admin/article/index');
					}else{

						$errors = $this->upload->display_errors("<p class='invalid-feedback'>",'</p>');
						$data['imageError'] = $errors;

				    	$this->load->view('admin/article/create',array($categorys, $data));

					}

				}else{
					$this->session->set_flashdata('error','Article Image is not found.');

				    $this->load->view('admin/article/create',$categorys);

				}

			}else{
				$this->load->view('admin/article/create',$categorys);
			}

		}
		
		public function edit($id)
		{


			$categorys['mainModule'] = 'article';
			$categorys['subModule'] = '';
			/*--------- Get Category--------*/

			$categories=$this->Category_model->getCategories();

			/* --------- Get Article --------- */

			$articles = $this->Article_model->getArticle($id);
			
			if (empty($articles)) {
				$this->session->set_flashdata('error','Article not found');

				redirect(base_url('admin/article/index'));
			}

			$rows['article'] = $articles;
			$rows['categories'] = $categories;

			$this->load->helper('common_helper');

			/*------------image validation------------*/
			$config['upload_path']          = './public/uploads/articles/';
            $config['allowed_types']        = 'gif|jpg|png';
            $config['encrypt_name']        	=  true;
            // $config['max_size']             = 100;
            // $config['max_width']            = 1024;
            // $config['max_height']           = 768;

			/*Model Load*/
			$this->load->library('upload',$config);



			/*---------- Form Validation ----------*/
			$this->form_validation->set_error_delimiters('<p class="invalid-feedback">','</p>');

			$this->form_validation->set_rules('category_id','Category','required');
			$this->form_validation->set_rules('title','Title','trim|required|min_length[20]');
			$this->form_validation->set_rules('description','Description','trim|required');
			$this->form_validation->set_rules('author','Author','trim|required');

			if ($this->form_validation->run() == true) {

				if (!empty($_FILES['image']['name'])) {

					/* -------------- Image Upload -------------- */
					if ($this->upload->do_upload('image')) {

						/* ------- Image all data ------- */
						$data = $this->upload->data();

						/*delete image from folder*/
						$paths = './public/uploads/articles/thumb_front/';
						if (file_exists($paths.$articles['image'])) {
							unlink($paths.$articles['image']);
						}

						$paths2 = './public/uploads/articles/thumb_admin/';
						if (file_exists($paths2.$articles['image'])) {
							unlink($paths2.$articles['image']);
						}
						
						$paths3 = './public/uploads/articles/';
						if (file_exists($paths3.$articles['image'])) {
							unlink($paths3.$articles['image']);
						}

						/*resizing part*/
						resizeImage($config['upload_path'].$data['file_name'],$config['upload_path'].'thumb_front/'.$data['file_name'],1120,800);

						resizeImage($config['upload_path'].$data['file_name'],$config['upload_path'].'thumb_admin/'.$data['file_name'],300,250);
											
						/* ---------- Input Code ---------- */
						$formArray['image'] = $data['file_name'];
						$formArray['category'] = $this->input->post('category_id');
						$formArray['title'] = $this->input->post('title');
						$formArray['description'] = $this->input->post('description');
						$formArray['author'] = $this->input->post('author');
						$formArray['status'] = $this->input->post('status');
						$formArray['updated_at'] = date('Y-m-d H:i:s');

						/* -------  Edit Article Model ------- */
						$this->Article_model->updateArticle($id,$formArray);

						$this->session->set_flashdata('success','Article updated successfully');

						redirect(base_url('admin/article/index'));
					}else{

						$errors = $this->upload->display_errors("<p class='invalid-feedback'>",'</p>');
						$rows['imageError'] = $errors;

						$this->load->view('admin/article/edit',$rows);
				    	

					}

				}else{
					$formArray['category'] = $this->input->post('category_id');
						$formArray['title'] = $this->input->post('title');
						$formArray['description'] = $this->input->post('description');
						$formArray['author'] = $this->input->post('author');
						$formArray['status'] = $this->input->post('status');
						$formArray['updated_at'] = date('Y-m-d H:i:s');

						/* -------  Edit Article Model ------- */
						$this->Article_model->updateArticle($id,$formArray);
					$this->session->set_flashdata('success','Article updated');

						redirect(base_url('admin/article/index'));
					
				    

				}

			}else{
				
				$this->load->view('admin/article/edit',$rows);
				
			}


		}
		
		public function delete($id)
		{

			$articles = $this->Article_model->getArticle($id);
			
			if (empty($articles)) {
				$this->session->set_flashdata('error','Article not found');

				redirect(base_url('admin/article/index'));
			}

			/*delete image from folder*/
						$paths = './public/uploads/articles/thumb_front/';
						if (file_exists($paths.$articles['image'])) {
							unlink($paths.$articles['image']);
						}

						$paths2 = './public/uploads/articles/thumb_admin/';
						if (file_exists($paths2.$articles['image'])) {
							unlink($paths2.$articles['image']);
						}
						
						$paths3 = './public/uploads/articles/';
						if (file_exists($paths3.$articles['image'])) {
							unlink($paths3.$articles['image']);
						}

			$this->Article_model->deleteArticle($id);

			$this->session->set_flashdata('success','Article has been deleted');

				redirect(base_url('admin/article/index'));

		}
		
		
	}

?>