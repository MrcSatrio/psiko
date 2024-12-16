<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Auth::login');
$routes->post('/action_login', 'Auth::action_login');
$routes->get('/logout', 'Auth::logout');


$routes->group('admin', ['filter' => 'roleFilter'], function ($routes) {

    $routes->get('dashboard', 'Admin::dashboard');
    $routes->get('data_user', 'Admin::data_user');
    $routes->get('create_user', 'Admin::create_user');
    $routes->post('action_create_user', 'Admin::action_create_user');
    $routes->post('action_edit_user', 'Admin::action_edit_user');


    $routes->get('data_perusahaan', 'Admin::data_perusahaan');
    $routes->get('create_perusahaan', 'Admin::create_perusahaan');
    $routes->post('action_create_perusahaan', 'Admin::action_create_perusahaan');

    $routes->get('data_soal', 'Admin::data_soal');
    $routes->get('create_soal', 'Admin::create_soal');
    $routes->post('action_create_soal', 'Admin::action_create_soal');
    $routes->post('action_create_jawaban', 'Admin::action_create_jawaban');
    $routes->get('delete_jawaban/(:segment)', 'Admin::delete_jawaban/$1');
    $routes->get('detail_soal/(:segment)', 'Admin::detail_soal/$1');
    $routes->post('upload', 'Admin::upload');

    $routes->get('create_test', 'Admin::create_test');
    $routes->get('read_test', 'Admin::read_test');
    $routes->get('detail_test/(:segment)', 'Admin::detail_test/$1');
    $routes->post('action_create_test', 'Admin::action_create_test');
    $routes->post('action_create_peserta', 'Admin::action_create_peserta');
    $routes->get('delete_peserta/(:segment)', 'Admin::delete_peserta/$1');
});

$routes->group('user', ['filter' => 'roleFilter'], function ($routes) {

    $routes->get('dashboard', 'User::dashboard');
    $routes->get('test/(:any)', 'User::test/$1');
    $routes->get('cfit/(:any)', 'Cfit::test/$1');
    $routes->post('verification', 'Cfit::setMicAndCameraStatus');
    $routes->post('cfit/submit-test', 'Cfit::submit_test');
    $routes->post('cfit/submit_bagian', 'Cfit::submit_bagian');
    $routes->post('videotest', 'Test::videotest');
    $routes->post('cfit/save_answer_single', 'Cfit::save_answer_single');
    $routes->post('cfit/save_answer_double', 'Cfit::save_answer_double');
});
