<?php
namespace App\SocialMedia;

class Facebook{
	public $client_id;
	private $secret_key;
	public $redirect_url;

	public function __construct($facebook){
		// dd($facebook); 
		$this->client_id = $facebook['client_id'];
		$this->secret_key = $facebook['client_secret'];
		$this->redirect_url = $facebook['redirect'];
	}
	// using setter method
	public function setFacebookCred($facebook){
		// dd($facebook);
		$this->client_id = $facebook['client_id'];
		$this->secret_key = $facebook['client_secret'];
		$this->redirect_url = $facebook['redirect'];
	}

	public function getClientID(){
		return $this->client_id;
	}
	public function getSecretKey(){
		return $this->secret_key;
	}
	public function getRedirectUrl(){
		return $this->redirect_url;
	}
}