<?php

use Illuminate\Routing\Router;
/** @var Router $router */

$router->get('faq', ['as' => 'faq.index', 'uses' => 'PublicController@index']);