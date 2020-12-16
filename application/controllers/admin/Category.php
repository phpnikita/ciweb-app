<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
	
	/**
	 * 
	 */
	class Category extends CI_Controller
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
		
		public function index()
		{
			$this->load->model('Category_model');

			$queryString = $this->input->get('q');
			$params['queryString'] = $queryString;

			$categories = $this->Category_model->getCategories($params);

			$data['categories'] = $categories;
			$data['queryString'] = $queryString;
			$data['mainModule'] = 'category';
			$data['subModule'] = 'viewCategory';

			$this->load->view('admin/category/list',$data);
		}

		public function create()
		{	
			$this->load->helper('common_helper');

			$data['mainModule'] = 'category';
			$data['subModule'] = 'createCategory';

			/*image validation*/
			$config['upload_path']          = './public/uploads/category/';
            $config['allowed_types']        = 'gif|jpg|png';
            $config['encrypt_name']        	=  true;
            // $config['max_size']             = 100;
            // $config['max_width']            = 1024;
            // $config['max_height']           = 768;

			/*Model Load*/
			$this->load->library('upload',$config);

			$this->load->model('Category_model');

			$this->form_validation->set_error_delimiters('<p class="invalid-feedback">','</p>');

			$this->form_validation->set_rules('name','Name','trim|required');

			if ($this->form_validation->run() == true) {
				// print_r($_FILES['image']);

				/*image code*/
				if (!empty($_FILES['image']['name'])) {
					
					if($this->upload->do_upload('image')){

						$data = $this->upload->data();


						/*resizing part*/
						resizeImage($config['upload_path'].$data['file_name'],$config['upload_path'].'thumb/'.$data['file_name'],300,270);


						/*text code*/
						$formArray['image'] = $data['file_name'];
						$formArray['name'] = $this->input->post('name');
						$formArray['status'] = $this->input->post('status');
						$formArray['created_at'] = date('Y-m-d H:i:s');

						$this->Category_model->create($formArray);

						/*success msg*/
						$this->session->set_flashdata('success','Category added successfully');

						redirect(base_url().'admin/category/index');

					}else{
						/*return error of image*/
						$error = $this->upload->display_errors("<p class='invalid-feedback'>",'</p>');
						$data['errorImageUpload'] = $error;

						$this->load->view('admin/category/create',$data);

					}

				}else{
				
					/*text code*/
					$formArray['name'] = $this->input->post('name');
					$formArray['status'] = $this->input->post('status');
					$formArray['created_at'] = date('Y-m-d H:i:s');

					$this->Category_model->create($formArray);

					/*success msg*/
					$this->session->set_flashdata('success','Category added successfully');

					redirect(base_url().'admin/category/index');
				}

			}else{
				$this->load->view('admin/category/create',$data);
			}

			
		}

		public function edit($id)
		{
			$this->load->model('Category_model'); 

			$data['mainModule'] = 'category';
			$data['subModule'] = '';

			$category = $this->Category_model->getCategory($id);
			
			if (empty($category)) {
				$this->session->set_flashdata('error','Category not found');

				redirect(base_url().'admin/category/index');
			}


			$this->load->helper('common_helper');

			/*image validation*/
			$config['upload_path']          = './public/uploads/category/';
            $config['allowed_types']        = 'gif|jpg|png';
            $config['encrypt_name']        	=  true;
            // $config['max_size']             = 100;
            // $config['max_width']            = 1024;
            // $config['max_height']           = 768;

			/*Model Load*/
			$this->load->library('upload',$config);

			$this->form_validation->set_error_delimiters('<p class="invalid-feedback">','</p>');

			$this->form_validation->set_rules('name','Name','trim|required');

			if ($this->form_validation->run() == true) {

				/*image code*/
				if (!empty($_FILES['image']['name'])) {
					
					if($this->upload->do_upload('image')){

						$data = $this->upload->data();
						

						/*resizing part*/
						resizeImage($config['upload_path'].$data['file_name'],$config['upload_path'].'thumb/'.$data['file_name'],300,270);


						/*text code*/
						$formArray['image'] = $data['file_name'];
						$formArray['name'] = $this->input->post('name');
						$formArray['status'] = $this->input->post('status');
						$formArray['created_at'] = date('Y-m-d H:i:s');

						$this->Category_model->update($id, $formArray);

						/*delete image from folder*/
						if (file_exists('./public/uploads/category/'.$category['image'])) {
							unlink('./public/uploads/category/'.$category['image']);
						}

						if (file_exists('./public/uploads/category/thumb/'.$category['image'])) {
							unlink('./public/uploads/category/thumb/'.$category['image']);
						}
						

						/*success msg*/
						$this->session->set_flashdata('success','Category updated successfully');

						redirect(base_url().'admin/category/index');

					}else{
						/*return error of image*/
						$error = $this->upload->display_errors("<p class='invalid-feedback'>",'</p>');
						$data['errorImageUpload'] = $error;

						$this->load->view('admin/category/edit',$data);

					}

				}else{
				
					/*text code*/
					$formArray['name'] = $this->input->post('name');
					$formArray['status'] = $this->input->post('status');
					$formArray['created_at'] = date('Y-m-d H:i:s');

					$this->Category_model->update($id, $formArray);

					/*success msg*/
					$this->session->set_flashdata('success','Category updated successfully');

					redirect(base_url().'admin/category/index');
				}

			}else{
				$data['category'] = $category;

				$this->load->view('admin/category/edit',$data);
			}
		}

		public function delete($id)
		{
			$this->load->model('Category_model'); 

			$category = $this->Category_model->getCategory($id);
			
			if (empty($category)) {
				$this->session->set_flashdata('error','Category not found');

				redirect(base_url().'admin/category/index');
			}

			/*delete image from folder*/
			if (file_exists('./public/uploads/category/'.$category['image'])) {
				unlink('./public/uploads/category/'.$category['image']);
			}

			if (file_exists('./public/uploads/category/thumb/'.$category['image'])) {
				unlink('./public/uploads/category/thumb/'.$category['image']);
			}

			$this->Category_model->delete($id);

			/*success msg*/
			$this->session->set_flashdata('success','Category deleted successfully');

			redirect(base_url().'admin/category/index');
		}

	}
?>