<?php

namespace App\Http\Controllers;

use App\Survey;
use App\SurveyRate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class SurveyController extends Controller
{
    public function index()
	{
		$surveys = Survey::latest()
					->get();
		$surveyRates = SurveyRate::latest()
					->get();

		Session::flash('module', 'survey');
		return view('page.survey.index', compact('surveys', 'surveyRates'));
	}

	public function create()
	{
		Session::flash('module', 'survey');
		return view('page.survey.create');
	}

	public function store(Request $request)
	{
		$request->validate([
			'question' => 'required|unique:surveys'
		]);

		$survey = new Survey();
		$survey->question = $request->question;
		if ($survey->save())
		{
			Session::flash('module', 'survey');
		    Session::flash('success', ['title' => 'Success!', 'msg' => 'Question was saved!']);
		    return redirect()->route('survey.index');
		}
		
	}

	public function edit(Request $request, Survey $survey)
	{
		return view('page.survey.edit', compact('survey'));
	}

	public function storeEdit(Request $request, Survey $survey)
	{
		$request->validate([
			'question' => 'required|unique:surveys,question,'.$request->id
		]);

		$survey->question = $request->question;
		if ($survey->save())
		{
			Session::flash('module', 'survey');
		    Session::flash('success', ['title' => 'Success!', 'msg' => 'Question was saved!']);
		    return redirect()->route('survey.index');
		}
	}

	public function destroy(Request $request, Survey $survey)
	{
		if ($survey->surveyRate)
		{
			foreach ($survey->surveyRate as $value) {
				$value->delete();
			}
		}

		if ($survey->delete())
		{
			Session::flash('success', ['title' => 'Success!', 'msg' => 'Survey was deleted!']);
			return back();
		}
	}

	public function fetchSurvey()
	{
		$surveys = Survey::all();
		return response()->json($surveys);
	}

	public function sendSurvey(Request $request)
	{
		$surveyRate = new SurveyRate();
		$surveyRate->survey_id = $request->surveyId;
		$surveyRate->name = $request->name;
		$surveyRate->rate = $request->rate;
		$surveyRate->comment = $request->feedback;
		if ($surveyRate->save())
		{
			return "true";
		}
		else
		{
			return "false";
		}
		//asdas
	}
}