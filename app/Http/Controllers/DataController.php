<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class DataController extends Controller
{
public function extractQuestionsAndOptions()
{
        $questions = DB::table('questions')->get();
        
        $questionsData = [];
        
        foreach ($questions as $question) {
            $questionsData[] = [
                'sno' => $question->sno,
                'question' => $question->question,
                'options' => [$question->option_1, $question->option_2, $question->option_3, $question->option_4],
                'correct_answer'=>$question->correct_answer,
            ];
        }
        
        $responses = DB::table('responses')->get();
        
        $userResponses = [];
        foreach ($responses as $response) {
            $userResponses[] = [
                'qid' => $response->qid,
                'answer' => $response->answer,
            ];
        }
        $i=0;
        if($i===0){
            $this->initializeResponses();
            $i++;
        }
        $countDownStartTime = DB::table('examstatus')->value('start_time');
        $count = DB::table('examstatus')->value('count');
        return view('openTest', compact('questionsData', 'userResponses', 'countDownStartTime','count'));
}

public function initializeResponses()
{
    $status = DB::table('examstatus')->value('status');
    $snoValues = DB::table('questions')->pluck('sno')->toArray();

    if (!$status) {
        $t = now();
        DB::table('examstatus')->insert(['status' => 'started', 'count' => '0', 'start_time' => $t]);

        foreach ($snoValues as $sno) {
            DB::table('responses')->insert(['qid' => $sno, 'answer' => '']);
        }

    } else {
        $count = DB::table('examstatus')->value('count');
        if ($count >= 5) {
            DB::table('examstatus')->update(['status' => 'finished']);
            return response()->json(['message' => 'Exam over']);
        } else {
            DB::table('examstatus')->update(['count' => $count + 1]);
            return response()->json(['message' => 'Exam has already started']);
        }
    }
}

public function saveResponse(Request $request)
{   $id = $request->input('id');
            $a = $request->input('answer');
            DB::table('responses')
                ->where('qid', '=', $id)
                ->update(['answer' => $a]);
            return response()->json(['message' => 'Response saved successfully']);
}
public function testend()
{
    $s = DB::table('examstatus')->value('status');
    if($s){
                
                DB::table('examstatus')
                ->update(['status' => 'finished']);
    }

    $userResponses = DB::table('responses')->get();
    $questions = DB::table('questions')->get();
    $questionsData = [];
    
    foreach ($questions as $question) {
        $questionsData[] = [
            'sno' => $question->sno,
            'question' => $question->question,
            'options' => [$question->option_1, $question->option_2, $question->option_3, $question->option_4],
            'correct_answer' => $question->correct_answer,
        ];
    }

    $results = [];
    foreach ($questionsData as $index => $question) {
        $userAnswer = $userResponses[$index]->answer;
        $userAnswer = str_replace(['r', 's'], '', $userAnswer);
        $optionIndex = ord($userAnswer)-96;
        if ($optionIndex >=0 ) {
            $userAnswerText = $question['options'][$optionIndex-1];
        } else {
            $userAnswerText = 'Not attempted'; 
        }

        $results[] = [
            'sno' => $question['sno'],
            'question' => $question['question'],
            'options' => $question['options'],
            'user_answer' => $userAnswerText,
            'correct_answer' => $question['correct_answer'],
        ];
    }

    return view('test_over', ['results' => $results]);

}

}
    

?>