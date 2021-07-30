<footer class="footer">
    <div class="container mt-5 mb-5 footer_inner">
        <div class="recent">
            <h4 class="mb-4">Топ туров</h4>
            @foreach($thurs as $thur)
            <a href="{{route('article.single', ['slug' => $thur->slug])}}">
                <div class="footer__content_wrapper mb-3">
                    <div class="footer__content_img">
                        <img src="{{$thur->getImage()}}" alt="">
                    </div>
                    <div class="footer__content_info">
                        <h5>{{$thur->title}}</h5>
                        <p>{{$thur->getPostDate()}}</p>
                    </div>
                </div>
            </a>
            @endforeach
        </div>
        <div class="popular">
            <h4 class="mb-4">Топ статей</h4>
            @foreach($posts as $post)
            <a href="{{route('article.single', ['slug' => $post->slug])}}">
                <div class="footer__content_wrapper mb-3">
                    <div class="footer__content_img">
                        <img src="{{$post->getImage()}}" alt="">
                    </div>
                    <div class="footer__content_info">
                        <h5>{{$post->title}}</h5>
                        <p>{{$post->getPostDate()}}</p>
                    </div>
                </div>
            </a>
            @endforeach
        </div>
        <div class="categories">
            <h4 class="mb-3">Популярные категории</h4>
            @foreach($popular_tags as $popular_tag)
            <a class="footer__categories_link" href="">
                <div class="footer_category">
                    <p>{{$popular_tag->title}}</p>
                    <p>{{$popular_tag->posts_count}}</p>
                </div>
            </a>
            @endforeach
        </div>
    </div>
    <div class="container">
        <h4 class="text-center copy">Made with <i class="fas fa-heart"></i> by Alek Benny</h4>
    </div>
</footer>
