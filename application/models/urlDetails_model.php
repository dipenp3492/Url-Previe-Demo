<?php
defined('BASEPATH') || exit('No direct script access allowed');

class urlDetails_model extends CI_Model
{
	/**
	 * @author DIPEN PATEL(DPL)
	 *
	 * made for getting Og: data from Url
	 *
	 * @param str $url               Url
	 *
	 */
	public function getOgDataFromUrl($url){
		libxml_use_internal_errors(true);
		$query = file_get_contents($url);
		$doc = new DomDocument();
		$doc->loadHTML($query);
		$xpath = new domxpath($doc);
		$title = '';
		$description = '';
		foreach ($xpath->query("//meta[@property='og:title']") as $el) {
		    $title = $el->getAttribute("content");
		}
		foreach ($xpath->query("//meta[@property='og:description']") as $el) {
		    $description = $el->getAttribute("content");
		}
		foreach ($xpath->query("//meta[@property='og:image']") as $el) {
		    $image = $el->getAttribute("content");
		}
		$result['title'] = $title;
		$result['description'] = $description;
		$result['image_src'] = (isset($image)) ? $image : $this->getRandomImageFromPage($url);
		return $result;
	}

	/**
	 * @author DIPEN PATEL(DPL)
	 *
	 * made for getting meta data from Url
	 *
	 * @param str $url               Url
	 *
	 */
	public function getMetaDataFromUrl($url){
		$result = get_meta_tags($url);
	    $contents = getUrlContents($url);
	    $title = '';
	    
		if (isset($contents) && is_string($contents)) {
		    preg_match('/<title>([^>]*)<\/title>/si', $contents, $match);
		    if (isset($match) && is_array($match) && count($match) > 0) {
		        $title = strip_tags($match[1]);
		    }
		}
		$result['title'] = $title;
		$result['image_src'] = getRandomImageFromPage($url);
		return $result;
	}

	/**
	 * @author DIPEN PATEL(DPL)
	 *
	 * made for getting Image fromm URL
	 *
	 * @param str $url               Url
	 *
	 */
	public function getRandomImageFromPage($url){
		$image = '';
		$contents = file_get_contents($url);
		if(strpos($contents,"<img"))
		{
		    $imgpart1 = explode('<img src=',$contents);
		    $imgpart2 = explode('"',$imgpart1[1]);
		     if (!filter_var($imgpart2[1], FILTER_VALIDATE_URL) === false) {
		     	$image = $imgpart2[1];
		     }else{
		     	$image = $url.$imgpart2[1];
		     }
		}
		return $image;
	}

	/**
	 * @author DIPEN PATEL(DPL)
	 *
	 * made for storing url related data in to table
	 *
	 * @param str $data       title,description,url,image_url
	 *
	 */
	public function saveUrlInfo($data){
    	$checkUrlIsexit = $this->db->from(TBL_URL_INFO)->where('site_url', $data['site_url'] )->get()->row_array();
    	$response = array('success'=>0,'title'=> 'Sorry!','message'=>'Something went wrong.');
   		if($checkUrlIsexit){
   			if($this->db->update(TBL_URL_INFO,$data,array('site_url' => $checkUrlIsexit['id']))){
   				$response = array('success'=>1,'title'=> 'Updated!','message'=>'Updated Successfully.');	
   			}
   		}else{
   			if($this->db->insert(TBL_URL_INFO,$data)){
		    	$response = array('success'=>1,'title'=> 'Inserted!','message'=>'Insert Successfully.');
		    }
   		}
   		return $response;
   	}
}
