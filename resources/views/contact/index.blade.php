@extends('layouts.layout')

@section('content')
<div class="post_wrapper">
<div class="container">
        @foreach($contacts as $contact)
        <div class="contact__header">
            <div class="contact__header_img">
                <img src="{{$contact->getImage()}}" alt="">
            </div>
            <div class="contact__header_title">
                <h4>{{$contact->title}}</h4>
            </div>
        </div>
        <hr>

            {!! $contact->description !!}
        <div class="text-center">
            {!!$contact->content!!}
        </div>

        @endforeach
    </div>
</div>
@endsection
