<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\QuestionRequest;
use App\Models\QuestionAndAnswer;
use Illuminate\Http\Request;

class QuestionAndAnswerController extends Controller
{

    public function index()
    {
        $questionAndAnswers = QuestionAndAnswer::get();
        return view('dashboard.questionAndAnswer.index',compact('questionAndAnswers'));
    }


    public function create()
    {
        return view('dashboard.questionAndAnswer.create');
    }


    public function store(QuestionRequest $request)
    {
        try{

            $data = $request->except('_token');

            QuestionAndAnswer::create($data);

            return redirect()->route('question_and_answer.index')->with(['success' => 'تم ألاضافة بنجاح']);

        }catch(\Exception $ex)
        {

            return redirect()->route('question_and_answer.index')->with(['error'=>' هناك خطاء ما برجاء المحاولة فيما بعد']);
        }
    }

    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        $questionAndAnswer = QuestionAndAnswer::find($id);
        return view('dashboard.questionAndAnswer.edit', compact('questionAndAnswer'));

    }


    public function update(QuestionRequest $request, $id)
    {
        try{
            $questionAndAnswer = QuestionAndAnswer::find($id);
            $data = $request->except('_token');

            $questionAndAnswer->update($data);

            return redirect()->route('question_and_answer.index')->with(['success' => 'تم التحديث بنجاح']);

        }catch(\Exception $ex)
        {

            return redirect()->route('question_and_answer.index')->with(['error'=>' هناك خطاء ما برجاء المحاولة فيما بعد']);
        }
    }



    public function destroy($id)
    {

        try {
            $questionAndAnswer = QuestionAndAnswer::find($id);

            if (!$questionAndAnswer)
                return redirect()->route('question_and_answer.index')->with(['error' => 'هذا الQ$A غير موجود ']);

            $questionAndAnswer->delete();

            return redirect()->route('question_and_answer.index')->with(['success' => 'تم التحديث بنجاح']);

        } catch (\Exception $ex) {
            return redirect()->route('question_and_answer.index')->with(['error' => 'حدث خطا ما برجاء المحاوله لاحقا']);
        }

    }
}
