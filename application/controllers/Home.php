<?php

	/**
	 * 
	 */
	class Home extends CI_Controller
	{
		
		public function index()
		{	
			/*Article*/

			$param['offset'] = '4';
			$param['limit'] = '0';

			$articles = $this->Article_model->getArticlesFront($param);

			// print_r($articles);

			$data['articles'] = $articles;

			$this->load->view('front/home',$data);
		}
	}

?>