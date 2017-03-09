<?php namespace Modules\Faq\Http\Controllers;

use Modules\Core\Http\Controllers\BasePublicController;
use Modules\Faq\Entities\Question;


class PublicController extends BasePublicController
{
	public function index()
	{
        $questions = Question::orderBy('weight')->get();

        return view('faq.index', compact('questions'));
	}
}