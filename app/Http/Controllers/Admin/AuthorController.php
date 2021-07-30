<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Author;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AuthorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $authors = Author::paginate(10);
        return view('admin.author.index', compact('authors'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.author.create');
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
            'name' => 'required|unique:authors',
            'description' => 'required',
            'content' => 'required',
            'thumbnail' => 'image'
        ]);

        $data = $request->all();

        if($request->hasFile('thumbnail')){
            $folder = date('Y-m-d');
            $data['thumbnail'] = $request->file('thumbnail')->store("author/{$folder}");
        }

        Author::create($data);

        return redirect()->route('author.index')->with('success', 'Автор добавлен по вашему приказу!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $posts = Post::where('author_id', $id)->get();
        $author = Author::find($id);
        return view('admin.author.show', compact('author', 'posts'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $author = Author::find($id);

        return view('admin.author.edit', compact('author'));
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
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'content' => 'required',
            'thumbnail' => 'image'
        ]);

        $author = Author::find($id);
        $data = $request->all();

        if($request->hasFile('thumbnail')){
            Storage::delete('thumbnail');
            $folder = date('Y-m-d');
            $data['thumbnail'] = $request->file('thumbnail')->store("author/{$folder}");
        }

        $author->update($data);

        return redirect()->route('author.index')->with('success', 'Данные автора были изменён по вашему приказу!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Author::destroy($id);
        return redirect()->route('author.index')->with('success', 'Автор уничтожен по вашему приказу!');
    }
}
