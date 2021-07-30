<?php

namespace App\Http\Controllers;

use App\Models\Requestoffer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RequestOfferController extends Controller
{
    public function store(Request $request, $slug)
    {
        $request->validate([
            'content' => 'required',
            'phone' => 'required'
        ]);

        $data = $request->all();
        $data['author'] = Auth::user()->name;
        $data['offer_slug'] = $slug;

        Requestoffer::create($data);

        return redirect()->back()->with('success', 'Ваше сообщение успешно отправлено Администратору');
    }
}
