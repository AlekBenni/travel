@extends('layouts.layout')

@section('content')
<div class="post_wrapper">
    <div class="article_bred_crams">
        <a href="{{route('home')}}">Главная</a>
        <span>/</span>
        <a href="{{route('category.single', ['slug' => $post->category->slug])}}">{{$post->category->title}}</a>
        <span>/</span>
        <p>{{$post->title}}</p>
    </div>
    <div class="article_single_tag">
        <a href="{{route('category.single', ['slug' => $post->category->slug])}}">{{$post->category->title}}</a>
    </div>
    <h1 class="article_single_title">{{$post->title}}</h1>
    <div class="article_single_info">
        <p>{{$post->getPostDate()}}</p>
        <span>/</span>
        <p>Автор: <a href="{{route('author.single', ['slug' => $post->author->slug])}}">{{$post->author->name}}</a></p>
        <span>/</span>
        <p><i class="fa fa-eye"></i> {{$post->view}}</p>
    </div>
    <img class="article_single_img" src="{{$post->getImage()}}" alt="">

    <div class="article_single_content">
        {!!$post->content!!}
    </div>

    @if($post->tag->count())
    <div class="article_single_tags">
        <p>Tags</p>
        @foreach($post->tag as $tag)
            <a href="{{route('tag.single', ['slug' => $tag->slug])}}">{{$tag->title}}</a>
        @endforeach
    </div>
    @endif

    <div class="article_single_author">
        <p class="article_single_about_author">Об авторе:</p>
        <div class="article_single_author_img">
            <img src="{{$post->author->getImage()}}" alt="">
        </div>
        <div class="article_single_author_content">
            <a href="{{route('author.single', ['slug' => $post->author->slug])}}">{{$post->author->name}}</a>
            <p>{!! $post->author->description !!}</p>
        </div>
    </div>

    @if($other_post->count())
    <div class="article_single_also">
        <p class="article_single_also_title">Вам может также понравиться:</p>
        @foreach($other_post as $poste)
        <div class="article_single_also_block">
            <div class="article_single_also_inner">
                <a href="{{route('article.single', ['slug' => $poste->slug])}}"><img src="{{$poste->getImage()}}" alt=""></a>
            </div>
            <a class="article_single_also_block_link" href="{{route('article.single', ['slug' => $poste->slug])}}"><h4>{{$poste->title}}</h4></a>
            <div class="article_single_also_info">
                <a href="{{route('author.single', ['slug' => $poste->author->slug])}}">{{$poste->author->name}}</a>
                <span>/</span>
                <p>{{$poste->getPostDate()}}</p>
            </div>
        </div>
        @endforeach

    </div>
    @else
    <h1>Ничего не найдено</h1>
    @endif

    @if(count($comments))
    <div class="article_single_comments">
        <p class="article_single_comments_title">{{$comments->count()}} комментария</p>
        <div class="article_single_comments_body">
            @foreach($comments as $comment)
            <div>
                <div class="article_single_comments_top">
                    <h4>{{$comment->author}}</h4>
                    <p>{{$comment->getCommentDate()}}</p>
                </div>
                <div class="article_single_comments_body">
                    <p>{{$comment->comment}}</p>
                </div>
            </div>
            <hr>
            @endforeach
        </div>
    </div>
    @else
        <h4>У этой статьи нет комментариев</h4>
    @endif

    @if(Auth::user())
    <div class="article_single_form">
        <form action="{{route('comment.store', ['slug' => $post->slug])}}" method="post">
            @csrf
            <p class="article_single_form_title">Оставьте комментарий</p>
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul class="list-unstyled mb-0">
                            @foreach ($errors->all() as $error)
                                <li><h4 class="mb-0">{{ $error }}</h4></li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <textarea class="form-control @error('comment') is-invalid @enderror" name="comment"></textarea>
            <button type="submit" class="btn btn-primary mt-3">Комментировать</button>
        </form>
    </div>
    @endif

</div>
@endsection
