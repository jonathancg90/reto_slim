<?php
include_once('../models/User.php');
use models\User;

$app->get('/', function () use($app){
	$user = new User();
	$users = $user->getUsers();
    $data['users'] = $users;
    $app->render('user/list.php', $data);
});

$app->get('/prueba', function (){
    echo "prueba";
});

$app->group('/user', function () use($app) {

	$app->get('/', function () use($app) {
		$user = new User();
		$users = $user->getUsers();
		$app->contentType('application/json');
		echo json_encode($users);
	});


	$app->post('/save', function () use($app){
		$request = $app->request;
		$params = array(
			":email" 	=> $request->post("email"),
			":password" => $request->post("password"),
			":name" 	=> $request->post("name"),
			":last_name"=> $request->post("last_name"),
			":address" 	=> $request->post("address"),
			":photo" 	=> $request->post("photo"),
			":group_id" => $request->post("group_id")
		);

		$user = new User();
		$response = $user->insertUser($params);
		echo json_encode($response);
	});

	$app->put('/update/:user_id', function ($user_id) use($app){
		$request = $app->request;

		$user = new User();
		$user = $user->getUserById($user_id);
		if($user){
			$params = array(
				":id" 		=> $user_id,
				":email" 	=> $request->put("email"),
				":password" => $request->put("password"),
				":name" 	=> $request->put("name"),
				":last_name"=> $request->put("last_name"),
				":address" 	=> $request->put("address"),
				":photo" 	=> $request->put("photo"),
				":group_id" => $request->put("group_id")
			);
			// echo json_encode($params);
			$user = new User();
			$response = $user->updateUser($params);
			echo json_encode($response);
		}
	});

});
