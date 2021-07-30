
@extends('layouts.layout')

@section('content')
<div class="post_wrapper">

    <h1 class="article_single_title">{{$offer->title}}</h1>
    <h4 class="mb-3 text-danger">{{$offer->second_title}}</h4>
    <img class="article_single_img" src="{{$offer->getImage()}}" alt="">

    <div class="article_single_content">
        {!!$offer->content!!}
    </div>

    <div class="article_single_form">
        <form action="{{route('request.offer.store', ['slug' => $offer->slug])}}" method="post">
            @csrf
            <p class="article_single_form_title">Отправьте запрос админу</p>
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul class="list-unstyled mb-0">
                            @foreach ($errors->all() as $error)
                                <li><h4 class="mb-0">{{ $error }}</h4></li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                @if (session()->has('success'))
                    <div class="alert alert-success">
                        <h4 class="mb-0">{{session('success')}}</h4>
                    </div>
                @endif
                <input class="form-control mb-3 @error('phone') is-invalid @enderror" type="tel" name="phone">
                <textarea class="form-control @error('content') is-invalid @enderror" name="content"></textarea>
            <button type="submit" class="btn btn-primary mt-3">Отправить запрос</button>
        </form>
    </div>

</div>
@endsection
