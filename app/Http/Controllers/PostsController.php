<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $file = Storage::get("public/data.json");
        $data = json_decode($file, true);
        rsort($data);

        return view('post.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $file = Storage::get("public/data.json");
        $data = json_decode($file, true);

        $idlist = array_column($data, 'id');
        $auto_increment_id = end($idlist);

        $data [] = array(
            'id' => $auto_increment_id+1,
            'author' => $request->author,
            'title' => $request->title,
            'content' => $request->content
        );

        $jsonfile = json_encode($data, JSON_PRETTY_PRINT);
        $file = Storage::put("public/data.json", $jsonfile);

        return redirect('/');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $file = Storage::get("public/data.json");
        $data = json_decode($file, true);

        $jsonfile = $data[$id-1];

        return view('post.edit', compact('jsonfile'));

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
        $file = Storage::get("public/data.json");
        $data = json_decode($file, true);

        $data[$id-1] = array(
            'id' => $request->id,
            'author' => $request->author,
            'title' => $request->title,
            'content' => $request->content,
        );

        $jsonfile = json_encode($data, JSON_PRETTY_PRINT);
        $file = Storage::put("public/data.json", $jsonfile);

        return redirect('/');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $file = Storage::get("public/data.json");
        $data = json_decode($file, true);

        unset($data[$id-1]);

        $jsonfile = json_encode($data, JSON_PRETTY_PRINT);
        $file = Storage::put("public/data.json", $jsonfile);

        return redirect('/');
    }
}
