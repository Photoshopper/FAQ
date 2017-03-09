<?php

use Illuminate\Routing\Router;
/** @var Router $router */

$router->group(['prefix' =>'/faq'], function (Router $router) {
    $router->bind('question', function ($id) {
        return app('Modules\Faq\Repositories\QuestionRepository')->find($id);
    });
    $router->get('questions', [
        'as' => 'admin.faq.question.index',
        'uses' => 'QuestionController@index',
        'middleware' => 'can:faq.questions.index'
    ]);
    $router->get('questions/create', [
        'as' => 'admin.faq.question.create',
        'uses' => 'QuestionController@create',
        'middleware' => 'can:faq.questions.create'
    ]);
    $router->post('questions', [
        'as' => 'admin.faq.question.store',
        'uses' => 'QuestionController@store',
        'middleware' => 'can:faq.questions.create'
    ]);
    $router->get('questions/{question}/edit', [
        'as' => 'admin.faq.question.edit',
        'uses' => 'QuestionController@edit',
        'middleware' => 'can:faq.questions.edit'
    ]);
    $router->put('questions/{question}', [
        'as' => 'admin.faq.question.update',
        'uses' => 'QuestionController@update',
        'middleware' => 'can:faq.questions.edit'
    ]);
    $router->delete('questions/{question}', [
        'as' => 'admin.faq.question.destroy',
        'uses' => 'QuestionController@destroy',
        'middleware' => 'can:faq.questions.destroy'
    ]);
    $router->post('questions/updateSort', [
        'as' => 'admin.faq.question.updateSort',
        'uses' => 'QuestionController@updateSort',
        'middleware' => 'can:faq.questions.edit'
    ]);
});
