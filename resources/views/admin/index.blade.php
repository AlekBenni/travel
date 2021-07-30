
@extends('admin.layouts.layout')

@section('content')

    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Главная</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Панель администратора</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Панель администратора</h3>

          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
              <i class="fas fa-minus"></i></button>
            <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
              <i class="fas fa-times"></i></button>
          </div>
        </div>
        <div class="card-body">
          <h4 class="mb-5">Добро пожаловать в панель управления администратора!</h4>

          <h5>Последние зарегистрированные пользователи</h5>
          <div class="table-responsive">
                <table class="table table-bordered">
                  <thead>
                    <tr>
                      <th style="width:30px">#</th>
                      <th>Имя</th>
                      <th>Мыло</th>
                      <th>Дата регистрации</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($last_users as $last_user)
                    <tr>
                      <td>{{$last_user->id}}</td>
                      <td>{{$last_user->name}}</td>
                      <td>{{$last_user->email}}</td>
                      <td>{{$last_user->getRegDate()}}</td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
            </div>

          <h5 class="mt-5">Запросы на предложения:</h5>

          @if(count($request_offers))
                <div class="table-responsive">
                <table class="table table-bordered">
                  <thead>
                    <tr>
                      <th style="width:30px">#</th>
                      <th>Автор</th>
                      <th>Телефон</th>
                      <th>Сообщение</th>
                      <th>Предложение</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($request_offers as $request_offer)
                    <tr>
                      <td>{{$request_offer->id}}</td>
                      <td>{{$request_offer->author}}</td>
                      <td>{{$request_offer->phone}}</td>
                      <td>{!!$request_offer->content!!}</td>
                      <th>
                          @foreach($offers as $offer)
                            @if($offer->slug == $request_offer->offer_slug)
                                <a href="{{route('requestoffer.show', ['requestoffer' => $request_offer->id])}}">{{$offer->title}}</ф>
                            @endif
                          @endforeach
                      </th>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
                </div>
                @else
                <h4>Запросов пока нет</h4>
                @endif

                <div>
                    {{$request_offers->links()}}
                </div>

                <h5 class="mt-5">Последние комментарии</h5>
          <div class="table-responsive">
                <table class="table table-bordered">
                  <thead>
                    <tr>
                      <th style="width:30px">#</th>
                      <th>Автор комментария</th>
                      <th>Статья или автор</th>
                      <th>Дата комментария</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($comments as $comment)
                    <tr>
                      <td>{{$comment->id}}</td>
                      <td>{{$comment->author}}</td>
                      <td>
                          @foreach($posts as $post)
                            @if($post->slug == $comment->post_slug)
                            {{$post->title}}
                            @endif
                          @endforeach

                          @foreach($authors as $author)
                            @if($author->slug == $comment->post_slug)
                            {{$author->name}}
                            @endif
                          @endforeach
                      </td>
                      <td>{{$comment->getCommentDate()}}</td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
            </div>

            </div>
        <!-- /.card-body -->





        <div class="card-footer">
          Footer
        </div>
        <!-- /.card-footer-->
      </div>
      <!-- /.card -->

    </section>
    <!-- /.content -->

@endsection
