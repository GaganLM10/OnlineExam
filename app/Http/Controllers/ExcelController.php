<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PhpOffice\PhpSpreadsheet\IOFactory;
use Illuminate\Support\Facades\DB; // Import the DB facade

class ExcelController extends Controller
{
    // ...
    
    public function upload(Request $request)
    {
        $file = $request->file('excel_file');

        if ($file) {
            $spreadsheet = IOFactory::load($file);
            $worksheet = $spreadsheet->getActiveSheet();
            $data = $worksheet->toArray();

            for ($i = 1; $i < count($data); $i++) {
                $row = $data[$i];
                DB::table('questions')->insert([
                    'question' => $row[1],
                    'option_1' => $row[2],
                    'option_2' => $row[3],
                    'option_3' => $row[4],
                    'option_4' => $row[5],
                    'correct_answer' => $row[6],
                ]);
            }

            
            $uploadedData = DB::table('questions')->get();

            return view('uploaded_data', compact('uploadedData'));
        }

        return redirect()->back()->with('error', 'File not uploaded.');
    }
    public function showUploadForm()
    {
    return view('upload_form'); 
    }

}
?>