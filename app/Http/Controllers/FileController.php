<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Response;
use App\Models\File;

class FileController extends Controller
{
    function downloadFile($file_name){
        $file = Storage::disk('public')->get($file_name);
  
        return (new Response($file, 200))
              ->header('Content-Type', 'application/xlx,xls,xlsx,pdf');
    }

    public function createForm(){
        return redirect()->back();
      }
    
      public function fileUpload(Request $req){
            $req->validate([
            'file' => 'required|mimes:txt,xlx,xls,xlsx,pdf|max:2048'
            ]);
    
            $fileModel = new File;
    
            if($req->file()) {
                $fileName = time().'_'.$req->file->getClientOriginalName();
                $filePath = $req->file('file')->storeAs('uploads', $fileName, 'public');
    
                $fileModel->name = time().'_'.$req->file->getClientOriginalName();
                $fileModel->file_path = '/storage/' . $filePath;
                $fileModel->save();
    
                return back()
                ->with('success','Failas įkeltas.')
                ->with('file', $fileName);
            }
       }
}
