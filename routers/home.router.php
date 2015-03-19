<?php
use models\User;
use controllers\HomeCtrl;

$app->get('/', function () use($app){
	HomeCtrl::get_index($app);
})->name('home');

$app->post('/login', function () use($app){
	HomeCtrl::login($app);
})->name('login');

$app->get('/logout', function () use($app){
	HomeCtrl::logout($app);
})->name('logout');