<?php

namespace Musonza\Form\Http\Controllers;

use Form;
use Musonza\Form\Http\Requests\CreateFormQuestionRequest;
use Musonza\Form\Http\Requests\UpdateFormQuestionRequest;
use Musonza\Form\Models\Form as FormModel;
use Musonza\Form\Models\Question;

class FormQuestionController extends Controller
{
    /**
     * Creates and stores form question.
     *
     * @param  CreateFormQuestionRequest $request
     * @param  FormModel                 $form
     * @return \Illuminate\Http\Response
     */
    public function store(CreateFormQuestionRequest $request, FormModel $form)
    {
        $question = $form->questions()->create($request->validated());

        return response($question);
    }

    /**
     * Delete Form Question.
     *
     * @param  FormModel $form
     * @param  Question  $question
     * @return \Illuminate\Http\Response
     */
    public function destroy(FormModel $form, Question $question)
    {
        $form->questions()->findOrFail($question->id)->delete();

        if (request()->wantsJson()) {
            return response('', 201);
        }

        return back();
    }

    /**
     * Update Form Question.
     *
     * @param  UpdateFormQuestionRequest $request
     * @param  FormModel                 $form
     * @param  Question                  $question
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateFormQuestionRequest $request, FormModel $form, Question $question)
    {
        $question->update($request->validated());

        if (request()->wantsJson()) {
            return response($question);
        }
    }
}
