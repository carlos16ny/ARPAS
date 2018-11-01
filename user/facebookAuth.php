<?php
session_start();
require_once '../assets/php/classes/classDatabase.php';
require_once '../assets/php/classes/classUser.php';
require_once '../assets/lib/Facebook/autoload.php';

$user = new User();

$fb = new \Facebook\Facebook([
  'app_id' => '209793493035278',
  'app_secret' => '34482a9799ea91dccf4c32c55409d968',
  'default_graph_version' => 'v2.10',
  //'default_access_token' => '{access-token}', // optional
]);
$helper = $fb->getRedirectLoginHelper();
//var_dump($helper);
$permissions = ['email']; // Optional permissions

try {
	if(isset($_SESSION['face_access_token'])){
		$accessToken = $_SESSION['face_access_token'];
	}else{
		$accessToken = $helper->getAccessToken();
	}
	
} catch(Facebook\Exceptions\FacebookResponseException $e) {
	// When Graph returns an error
	echo 'Graph returned an error: ' . $e->getMessage();
	exit;
} catch(Facebook\Exceptions\FacebookSDKException $e) {
	// When validation fails or other local issues
	echo 'Facebook SDK returned an error: ' . $e->getMessage();
	exit;
}

if (! isset($accessToken)) {
	$url_login = 'http://localhost/ARPAS/user/index.php';
	$loginUrl = $helper->getLoginUrl($url_login, $permissions);
}else{
	$url_login = 'http://localhost/ARPAS/user/index.php';
	$loginUrl = $helper->getLoginUrl($url_login, $permissions);
	//Usuário ja autenticado
	if(isset($_SESSION['face_access_token'])){
		$fb->setDefaultAccessToken($_SESSION['face_access_token']);
	}//Usuário não está autenticado
	else{
		$_SESSION['face_access_token'] = (string) $accessToken;
		$oAuth2Client = $fb->getOAuth2Client();
		$_SESSION['face_access_token'] = (string) $oAuth2Client->getLongLivedAccessToken($_SESSION['face_access_token']);
		$fb->setDefaultAccessToken($_SESSION['face_access_token']);	
	}
	
	try {
		// Returns a `Facebook\FacebookResponse` object
		$response = $fb->get('/me?fields=name, picture, email, accounts');
		$us = $response->getGraphUser();
		
	} catch(Facebook\Exceptions\FacebookResponseException $e) {
		echo 'Graph returned an error: ' . $e->getMessage();
		exit;
	} catch(Facebook\Exceptions\FacebookSDKException $e) {
		echo 'Facebook SDK returned an error: ' . $e->getMessage();
		exit;
	}

	$user->setEmail($us['email']);
	$user->setFoto("https://graph.facebook.com/{$us['id']}/picture?width=400");
	
	$stmt = $user->getUserByEmail()->fetch(PDO::FETCH_OBJ);
    
	if($stmt->email == ""){
		
		$user->setFoto("https://graph.facebook.com/{$us['id']}/picture?width=400");
		$user->setEmail($us['email']);
		$user->setName($us['name']);
		$user->setUser($us['id']);

		if($user->createUserFromFacebook() != null){
			$_SESSION['email_user'] = $us['email'];
			$_SESSION['foto_user'] = "https://graph.facebook.com/{$us['id']}/picture?width=400";
			$_SESSION['nome_user'] = $us['name'];
			$u_id = $user->getUserByEmail($_SESSION['email_user'])->fetch(PDO::FETCH_OBJ)->id;
			$_SESSION['id_user'] = $u_id;
		}

	}else{
		$_SESSION['email_user'] = $us['email'];
		$_SESSION['foto_user'] = "https://graph.facebook.com/{$us['id']}/picture?width=400";
		$_SESSION['nome_user'] = $us['name'];
		$_SESSION['id_user'] = $stmt->id;
	}
}
?>





