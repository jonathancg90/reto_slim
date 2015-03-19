<?php
use models\User;
use models\UserGroup;

use controllers\UserCtrl;

$app->group('/user', function () use($app) {

	$app->get('/data-user', function () use($app){
		UserCtrl::get_json_users($app);
	})->name('user_data_list');

	$app->get('/', function () use($app){
		UserCtrl::get_index($app);
	})->name('user_list');

	$app->get('/new', function () use($app){
		UserCtrl::show_create($app);
	})->name('new_user');

	$app->get('/edit/:user_id', function ($user_id) use($app){
		UserCtrl::show_edit($app, $user_id);
	})->name('edit_user');

	$app->post('/save', function () use($app){
		UserCtrl::save_user($app);
	})->name('user_save');

	$app->put('/update/:user_id', function ($user_id) use($app){
		UserCtrl::update_user($app, $user_id);
	})->name('user_update');

	$app->delete("/delete/:user_id", function ($user_id) use($app) {
		UserCtrl::delete_user($app, $user_id);
	})->name('user_delete');

});
