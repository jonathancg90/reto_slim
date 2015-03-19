<?php
namespace controllers;

use models\User;
use models\UserGroup;


class UserCtrl extends Controller{

	static function get_json_users($app) {
		$user = new User();
		$users = $user->getUsers();
		$app->contentType('application/json');
		echo json_encode($users);
	}

	static function get_index($app) {
		$user = new User();
		$users = $user->getUsers();
	    $data['users'] = $users;
	    $app->render('user/list.php', $data);
	}

	static function show_create($app) {
		$user_groups = new UserGroup();
		$user_groups = $user_groups->getGroups();
		$data['groups'] = $user_groups;
	    $app->render('user/create.php', $data);
	}

	static function show_edit($app, $user_id) {
		$user_groups = new UserGroup();
		$user = new User();

		$user_groups = $user_groups->getGroups();
		$user = $user->getUserById($user_id);
		$data['groups'] = $user_groups;
		$data['user'] = $user;
	    $app->render('user/update.php', $data);
	}

 	static function save_user($app){
 		$request = $app->request;
		$params = array(
			":email" 	=> $request->post("email"),
			":password" => crypt($request->post("password")),
			":name" 	=> $request->post("name"),
			":last_name"=> $request->post("last_name"),
			":address" 	=> $request->post("address"),
			":photo" 	=> $request->post("photo"),
			":group_id" => $request->post("group")
		);
		$user = new User();
		$response = $user->insertUser($params);
		if($response) {
			$app->flash('success',array("message"=>'Usuario registrado'));
			$app->redirect($app->urlFor('user_list'));
		} else {
			$app->flash('warning',array("message"=>'No se pudo registrar al usuario'));
			$app->redirect($app->urlFor('new_user'));
		}
 	}

 	static function update_user($app, $user_id) {
 		$request = $app->request;

		$user = new User();
		$user = $user->getUserById($user_id);
		if($user){
			$params = array(
				":id" 		=> $user_id,
				":email" 	=> $request->put("email"),
				":name" 	=> $request->put("name"),
				":last_name"=> $request->put("last_name"),
				":address" 	=> $request->put("address"),
				":photo" 	=> $request->put("photo"),
				":group_id" => $request->put("group_id")
			);
			// echo json_encode($params);
			$user = new User();
			$response = $user->updateUser($params);
			if($response){
				echo json_encode(array(
		            "status" => true,
		            "message" => "Usuario actualizado"
		        ));
			} else {
				echo json_encode(array(
		            "status" => false,
		            "message" => "No se pudo actualziar al usuario"
		        ));
			}
		}
 	}

 	static function delete_user($app, $user_id) {
 		$user = new User();
		$response = $user->deleteUser($user_id);
		if($response){
			echo json_encode(array(
	            "status" => true,
	            "message" => "Usuario eliminado"
	        ));
		} else {
			echo json_encode(array(
	            "status" => false,
	            "message" => "No se pudo eliminar al usuario"
	        ));
		}
 	}

}