<?php
namespace controllers;

use models\User;

class HomeCtrl extends Controller{

	static function get_index($app){
		// $app->flash('warning',array("message"=>'Form submitted!'));
	    // $app->flash('success',array("message"=>'Form submitted!'));
	    // $app->flash('error', array("message"=>'Login required'));
	    // $app->render('home.php');
		$app->render('home.php');
	}

	static function login($app){
		$request = $app->request;

        if(!empty($username = $request->post("email")) && !empty($password = $request->post("password"))) {

            $password = $request->post("password");
            $num = User::login($request->post("email"), $password);
            if($num > 0) {
            	$app->flash('success',array("message"=>'Bienvenido!'));
            	$app->redirect($app->urlFor('user_list'));
            } else {
                $app->flash('warning',array("message"=>'Credenciales invalidas'));
                $app->redirect($app->urlFor('home'));
            }
        } else {
            $app->flash('warning',array("message"=>'Formulario invalido'));
            $app->redirect($app->urlFor('home'));
        }
	}

	static function logout($app){

	}

}