<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Response;

class FileController extends Controller
{
    function downloadFile($file_name){
        $file = Storage::disk('public')->get($file_name);
  
        dd($file);

        return (new Response($file, 200))
              ->header('Content-Type', 'application/pdf');
    }
}
