<?php

namespace Modules\Faq\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Modules\Faq\Entities\Question;
use Modules\Faq\Http\Requests\CreateFaqRequest;
use Modules\Faq\Repositories\QuestionRepository;
use Modules\Core\Http\Controllers\Admin\AdminBaseController;

class QuestionController extends AdminBaseController
{
    /**
     * @var QuestionRepository
     */
    private $question;

    public function __construct(QuestionRepository $question)
    {
        parent::__construct();

        $this->question = $question;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $questions = Question::orderBy('weight')->get();

        return view('faq::admin.questions.index', compact('questions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('faq::admin.questions.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request $request
     * @return Response
     */
    public function store(CreateFaqRequest $request)
    {
        $this->question->create($request->all());

        if($request->has('createAndReturn')) {
            return redirect()->route('admin.faq.question.create')
                ->withSuccess(trans('core::core.messages.resource created', ['name' => trans('faq::questions.title.questions')]));
        }

        return redirect()->route('admin.faq.question.index')
            ->withSuccess(trans('core::core.messages.resource created', ['name' => trans('faq::questions.title.questions')]));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Question $question
     * @return Response
     */
    public function edit(Question $question)
    {
        return view('faq::admin.questions.edit', compact('question'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Question $question
     * @param  Request $request
     * @return Response
     */
    public function update(Question $question, CreateFaqRequest $request)
    {
        $this->question->update($question, $request->all());

        return redirect()->route('admin.faq.question.index')
            ->withSuccess(trans('core::core.messages.resource updated', ['name' => trans('faq::questions.title.questions')]));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Question $question
     * @return Response
     */
    public function destroy(Question $question)
    {
        $this->question->destroy($question);

        return redirect()->route('admin.faq.question.index')
            ->withSuccess(trans('core::core.messages.resource deleted', ['name' => trans('faq::questions.title.questions')]));
    }

    /**
     * Update weight values of questions
     *
     * @param $request
     * @return mixed
     */
    public function updateSort(Request $request)
    {
        foreach ($request->input('weight') as $key => $value) {
            Question::where('id', $key)->update(['weight' => $value]);
        }

        return redirect()->back()->withSuccess(trans('faq::questions.messages.order is saved'));
    }
}
