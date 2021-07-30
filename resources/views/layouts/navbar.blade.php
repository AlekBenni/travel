<nav class="navbar fixed-top navbar-expand-lg navbar-dark bg-dark nav_height">
  <div class="container">
    <a class="navbar-brand navbar_font" href="{{url('/')}}"><h2>TRAVEL.com</h2></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">

        @foreach($categories as $category)
            <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="{{route('category.single', ['slug' => $category->slug])}}"><h5>{{$category->title}}</h5></a>
            </li>
        @endforeach

        <li class="nav-item">
          <a class="nav-link" href="{{route('contact')}}"><h5>Контакты</h5></a>
        </li>
      </ul>
      <form class="d-flex" method="get" action="{{route('search')}}">
        <input name="search" class="form-control me-2 @error('search') is-invalid @enderror" type="search" placeholder="Поиск по сайту" aria-label="Search" >
        <button class="btn btn-success" type="submit">Найти</button>
      </form>
    </div>
  </div>
</nav>
