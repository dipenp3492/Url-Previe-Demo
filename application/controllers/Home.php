<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	/**
	 * Constructor for the class
	*/
	public function __construct(){
		parent::__construct();
		$this->load->model('urlDetails_model','urlDetails');
		$this->load->model('common_model','common');
	}

   /**
	* @author Dipen Patel(DPL)
	* 
	* made for loading Home page
	*/
	public function index(){
		$this->load->view('home');
	}

  /**
	* @author Dipen Patel(DPL)
	*
	* made for geting URL info for preview
	*
	*/
	public function getUrlInfo(){
		$url = $this->input->post('url');
		$query = file_get_contents($url);
		$ogdata = $this->urlDetails->getOgDataFromUrl($url);
	    if(!$ogdata){
	    	$ogdata = $this->urlDetails->getMetaDataFromUrl($url);
	    }
	    echo json_encode($ogdata);
	}

	/**
	* @author Dipen Patel(DPL)
	*
	* made for storing Url Information in to table
	*
	*/
	public function saveInfo(){
		$data = array(
	        'site_title'=>$this->input->post('title'),
	        'site_description'=>$this->input->post('description'),
	        'site_url'=>$this->input->post('url'),
	        'image'=>$this->input->post('image')
	    );
	    $response= $this->urlDetails->saveUrlInfo($data);
	    echo json_encode($response);
	}

	/**
	* @author Dipen Patel(DPL)
	*
	* made for datatable listing of url details
	*
	*/
	public function detail_datatable() {
		$arrayList = [];
		$result 	= $this->common->getRows($this->input->get()); 
		$i 			= $this->input->get('start');
		foreach($result as $row) {
			
			$arrayList [] = [
				++$i,
				$row->site_url,
				$row->site_title,
				$row->site_description				
			];
		}
		$output = array(
			"draw" 				=> $this->input->get('draw'),
			"recordsTotal" 		=> $this->common->countAll(),
			"recordsFiltered"	=> $this->common->countFiltered($this->input->get()),
			"data" 				=> $arrayList,
		);
		echo json_encode($output);
	}
}
