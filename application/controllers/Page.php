<?php

	/**
	 * 
	 */
	class Page extends CI_Controller
	{
		
		public function about()
		{
			$this->load->view('front/about');
		}

		public function services()
		{
			$this->load->view('front/services');
		}

		public function contact()
		{
			$this->form_validation->set_rules('name','Name','required|trim');
			$this->form_validation->set_rules('email','Email','required|valid_email');
			$this->form_validation->set_error_delimiters('<p class="invalid-feedback">','</p>');

			if ($this->form_validation->run() == true) {
				
				//Here we will process contact us form

				$config=array();

				$this->load->library('email',$config);

				$this->email->set_newline("\r\n");

				$this->email->to();
				$this->email->from();
				$this->email->subject();
				$this->email->from();

				$name = $this->input->post('name');
				$email = $this->input->post('email');
				$message = $this->input->post('message');

				$html = 'thank';

				$this->email->message($html);
				$this->email->send()

				redirect(base_url('page/contact'));

			}else{
			   $this->load->view('front/contact-us');

			}

		}
	}
?>