<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $contacts = Contact::get();
        return view('admin.contact.index', compact('contacts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.contact.create');
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
            'title' => 'required',
            'thumbnail' => 'required',
            'content' => 'required'
        ]);

        $data = $request->all();

        if($request->hasFile('thumbnail')){
            $folder = date('Y-m-d');
            $data['thumbnail'] = $request->file('thumbnail')->store('contact/{$folder}');
        }

        Contact::create($data);
        return redirect()->route('contact.index')->with('success', 'Контакт создан по вашему приказу!');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $contact = Contact::find($id);
        return view('admin.contact.edit', compact('contact'));
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
            'title' => 'required',
            'thumbnail' => 'required',
            'content' => 'required'
        ]);

        $contact = Contact::find($id);
        $data = $request->all();

        if($request->hasFile('thumbnail')){
            Storage::delete('thumbnail');
            $folder = date('Y-m-d');
            $data['thumbnail'] = $request->file('thumbnail')->store("contact/{$folder}");
        }

        $contact->update($data);
        return redirect()->route('contact.index')->with('success', 'Контакт изменён по вашему приказу!');

    }


}
