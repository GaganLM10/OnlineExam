<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ResponseController extends Controller
{
    public function saveResponse(Request $request)
    {   $id = $request->input('id');
        $a = $request->input('answer');
        DB::table('responses')
            ->where('qid', '=', $id)
            ->update(['answer' => $a]);
        return response()->json(['message' => 'Response saved successfully']);
    }
    public function testend(){
        $s = DB::table('examstatus')->value('status');
        if($s){
            
            DB::table('examstatus')
            ->update(['status' => 'finished']);
        }
        return view('test_over');
    }
    public function initializeResponses()
    {
        $status = DB::table('examstatus')->value('status');
        $snoValues = DB::table('questions')->pluck('sno')->toArray();
        if (!$status) {
            DB::table('examstatus')->updateOrInsert(['status' => 'started','count'=>'0','start_time'=>now()]);
            foreach ($snoValues as $sno) {
                DB::table('responses')->insert(['qid' => $sno, 'answer' => '0']);
            }
            
            return response()->json(['message' => 'Exam status updated to started']);
        }
        else{
            $count=DB::table('examstatus')->value('count');
            if ($count >= 4) {
                DB::table('examstatus')->update(['status' => 'finished']);
                return response()->json(['message' => 'Exam over']);
            } 
            else {
                DB::table('examstatus')->update(['count'=>$count+1]);
                return response()->json(['message' => 'Exam has already started']);
            }
        }
        
    }
    public function updateCount(Request $request)
    {
    $newCount = $request->input('count');
    DB::table('examstatus')->update(['count' => $newCount]);

    return response()->json(['message' => 'Count updated successfully']);
    }
}
?>
