@extends('layouts.category_layout')

@section('title', $author->title)

@section('page_title')
<div class="page_title">
    <div class="container page_title_container">
        <h2 class="page_title_title">
            {{$author->name}}
        </h2>
        <div class="page_title_info">
            <a href="{{route('home')}}"><h4>Главная</h4></a>
            <h4>{{$author->name}}</h4>
        </div>
    </div>
</div>
@endsection

@section('content')
<div class="post_wrapper">
    <div class="article_bred_crams">
        <a href="{{route('home')}}">Главная</a>
        <span>/</span>
        <p>Author</p>
        <span>/</span>
        <p>{{$author->name}}</p>
    </div>
    <h1 class="article_single_title">{{$author->name}}</h1>
    <img class="article_single_img" src="{{$author->getImage()}}" alt="">
    <div class="article_single_content">
        {!!$author->content!!}
    </div>

    <div class="author_post__wrapper">
    <p class="author_post__wrapper_title">Посты автора {{$author->name}}:</p>

        @foreach($posts as $post)
        <div class="author_posts">
            <div class="author_post__img">
                <a href="{{route('article.single', ['slug' => $post->slug])}}"><img src="{{$post->getImage()}}" alt=""></a>
            </div>
            <div class="author_posts__content">
                <a class="author_posts__post_link" href="{{route('article.single', ['slug' => $post->slug])}}"><h5>{{$post->title}}</h5></a>
                <p>{{$post->getPostDate()}}</p>
                <p>Теги:
                    @foreach($post->tag->pluck('slug', 'title') as $k => $v)
                        <a class="author_posts__tag_link" href="{{route('tag.single', ['slug' => $v])}}">{{$k}}</a>
                    @endforeach
                </p>
            </div>
        </div>
        @endforeach
    {{$posts->links()}}
    </div>

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
            @endforeach
        </div>
    </div>
    @else
        <h4>У этого автора нет комментариев</h4>
    @endif

    <div class="article_single_form">
        <form action="{{route('comment.store', ['slug' => $author->slug])}}" method="post">
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




</div>
@endsection
