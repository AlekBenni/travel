
@extends('admin.layouts.layout')

@section('content')

    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Страница Авторов</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ url('/') }}">Главная</a></li>
              <li class="breadcrumb-item active">Страница Авторов</li>
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
          <h3 class="card-title">Автор {{$author->name}}</h3>

          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
              <i class="fas fa-minus"></i></button>
            <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
              <i class="fas fa-times"></i></button>
          </div>
        </div>

        <div class="card-body">
            <div class="row">
                <div class="col-6">
                    <img class="img-thumbnail" src="{{$author->getImage()}}" alt="">
                </div>
                <div class="col-6">
                    <h3>{{$author->name}}</h3>
                    <p>{!!$author->description!!}</p>
                    <h4>Посты автора {{$author->name}}:
                        @foreach($posts->pluck('title', 'id') as $k => $v)
                            <a href="{{route('post.show', ['post' => $k])}}">{{$v}}  </a>
                        @endforeach
                    </h4>
                </div>
            </div>
            <div class="row mt-5">
                <div class="col">
                    {!!$author->content!!}
                </div>
            </div>

            <div class="row mt-3">
                <div class="col">
                    <a href="{{route('author.edit', ['author' => $author->id])}}" class="btn btn-info btn-sm float-left mr-1">
                        <i class="fas fa-pencil-alt"></i>
                    </a>
                    <form action="{{route('author.destroy', ['author' => $author->id])}}" method="post" class="float-left">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm"
                            onclick="return confirm('Подтвердите удаление')">
                            <i class="fas fa-trash-alt"></i>
                        </button>
                    </form>
                </div>
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
