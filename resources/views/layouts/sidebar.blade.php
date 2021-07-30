<aside class="sidebar">

    <div class="authorization">
            @if(!Auth::user())
            <h4>Авторизуйтесь на сайте</h4>
            <a class="authorization_link" href="{{ route('register.create') }}" class="nav-link">Регистрация</a>

            <a class="authorization_link" href="{{ route('login') }}" class="nav-link">Авторизация</a>
            @endif

            @if(Auth::user())
            <h4>Здравствуйте {{Auth::user()->name}}</h4>
            <a class="authorization_link" href="{{ route('logout') }}" class="nav-link">Выход</a>
            @endif
    </div>

    <div class="recent_post_wrapper">
        <h4>Лучшие посты:</h4>

        @foreach($popular_posts as $qwerty)
        <a class="link_recent_post" href="{{route('article.single', ['slug' => $qwerty->slug])}}">
        <div class="recent_post">
            <div class="recent_post_img">
                <img src="{{$qwerty->getImage()}}" alt="">
            </div>
            <div class="recent_post_content">
                <h5 class="recent_post_content_title">{{$qwerty->title}}</h5>
                <p class="">Автор: {{$qwerty->author->name}}</p>
            </div>
        </div>
        <div>
            <p>Дата: {{$qwerty->getPostDate()}} <i class="fa fa-eye"></i> {{$qwerty->view}}</p>
        </div>
        </a>
        @endforeach

    </div>

    <div class="best_offer">
        <h4>Лучшее предложение:</h4>
        @foreach($offers as $offer)
        <a href="{{route('offer_page.show', ['slug' => $offer->slug])}}">
            <img src="{{$offer->getImage()}}" alt="">
        <h5 class="mt-3">{{$offer->title}}</h5>
        <h5 class="text-end"><b>{{$offer->second_title}}</b></h5>
        <p class="best_offer_text">{{$offer->discount}} </p>
        </a>
        <hr>
        @endforeach
    </div>

    <div class="best_authors_wrapper">
        <h4>Лучшие авторы</h4>
        @foreach($authors as $author)
        <div class="best_author">
            <div class="best_author_content">
                <p><b>Name:</b> <a class="link_author" href="{{route('author.single', ['slug' => $author->slug])}}">{{$author->name}}</a> </p>
                <p><b>Post count:</b> {{$author->posts_count}}</p>
                <p><b>Лучший пост:</b></p>

                    <a class="link_author" href="{{route('article.single', ['slug' => $author->getBestPost($author->id)->pluck('slug')->join('')] )}}">{{$author->getBestPost($author->id)->pluck('title')->join('')}}</a>

            </div>
            <div class="best_author_img">
                <a href="{{route('author.single', ['slug' => $author->slug])}}"><img src="{{$author->getImage()}}" alt=""></a>
            </div>
        </div>
        @endforeach

    </div>

    <div class="popular_tags_wrapper">
        <h4>Популярные тэги</h4>

        @foreach($popular_tags as $tag)
        <a href="{{route('tag.single', ['slug' => $tag->slug])}}">
            <div class="popular_tags">
                <p>{{$tag->title}}</p>
                <p>{{$tag->posts_count}}</p>
            </div>
        </a>
        @endforeach

    </div>
</aside>
