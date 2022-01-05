<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Studies;
use App\Models\User;
use App\Models\Review;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use App\Exports\InvoiceExport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Database\Eloquent\Collection;




class PostController extends Controller
{



    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

    if(Auth::user()->roles===1){
        $user = User::with(['studijos'])
        ->get();
    }
    else{
        $user = User::with(['studijos'])
        ->where('id', Auth::user()->id)
        ->get();
    }

        // foreach($posts as $post)
        // {
        //     $post->Stud_ID = $Stud_ID;
        //     $post->Metai = $Metai;
        //     $post->Salis = $Salis;
        //     $post->Universitetas = $Universitetas;
        // }

// dd($user);

        return view('dashboard', ['users'=>$user]);

    }

    // public function review_submit(Request $request)
    // {
    //     $request->validate([
    //         'review' => 'required',
    //         ]);


    //     $review = Review::create([
    //         'review' => $request->input('review'),
    //         'Stud_ID' => $request->user()->id,
    //     ]);



    //     return redirect('dashboard');
    // }

    public function export(Excel $excel, Request $request)
    {
$bts = (new Collection($request->f));

    return Excel::download(new InvoiceExport($bts), 'invoices.xlsx');

   }



        // return dd($export);

        // return Excel::download($export, 'invoices.xlsx');


    public function filtravimas(Request $request)
    {
        $filtras = User::join('studies', 'users.studies', 'studies.id')
        ->join('posts', 'users.id', 'posts.Stud_ID')
        ->filter($request)
        ->get();

        // return dd($filtras);
// dd($filtras);

        return view('filtras', ['filtras' => $filtras]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('post.create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $request->validate([
            'Metai' => ['required', 'string', 'max:255'],

            'Salis' => ['required', 'string', 'max:255'],

            'Universitetas' => ['required', 'string', 'max:255'],

            ]);


        $post = Post::create([
            'Metai' => $request->input('Metai'),
            'Salis' => $request->input('Salis'),
            'Stud_ID' => $request->user()->id,
            'Universitetas' => $request->input('Universitetas')
        ]);



        return redirect('dashboard');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::find($id);
        if ($post->Stud_ID===Auth::user()->id || Auth::user()->roles===1)
        {
        return view('post.edit')->with('post', $post);
        die;
        }
        return redirect('/');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $post = Post::where('id', $id)
        ->update([
            'Metai' => $request->input('Metai'),
            'Salis' => $request->input('Salis'),
            // 'author' => $request->user()->name,
            'Universitetas' => $request->input('Universitetas')
        ]);

        return redirect('dashboard');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        $post->delete();

        return redirect('dashboard');
    }
}
