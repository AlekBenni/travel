@extends('layouts.layout')

@section('content')
<div class="page_wrapper">
    @foreach($posts as $post)
        <div class="post_wrapper">
            <div class="img_wrapper">
                <a href="{{route('article.single', ['slug' => $post->slug])}}"><img src="{{$post->getImage()}}" alt=""></a>
            </div>
            <div class="post_title mt-3">
                <a href=""><h3>{{$post->title}}</h3></a>
            </div>
            <div class="post_description">
                {!! $post->description !!}
            </div>
            <div class="post_data">
                <a href="{{route('author.single', ['slug' => $post->author->slug])}}">{{$post->author->name}}</a>
                <span>|</span>
                <p>{{$post->getPostDate()}}</p>
                <span>|</span>
                <p><i class="fa fa-eye"></i> {{$post->view}}</p>
            </div>
        </div>
    @endforeach

    <div class="row">
        <div class="col-md-12">
            {{$posts->links()}}
        </div><!-- end col -->
    </div><!-- end row -->
</div>
@endsection
