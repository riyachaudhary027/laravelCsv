<?php
 
namespace App\Http\Controllers;
 
use Illuminate\Http\Request;
use App\Imports\UsersImport;
use Maatwebsite\Excel\Facades\Excel;
 
class UserImportController extends Controller
{
    public function showImportForm()
    {
        return view('import');
    }
 
    public function import(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:csv,txt',
        ]);
 
        Excel::import(new UsersImport, $request->file('file'));
 
        return redirect()->back()->with('success', 'Users imported successfully!');
    }
}