
@extends('admin.layouts.layout')

@section('content')

    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Страница Статей</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ url('/') }}">Главная</a></li>
              <li class="breadcrumb-item active">Страница статей</li>
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
          <h3 class="card-title">Статья {{$post->title}}</h3>

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
                    <img class="img-thumbnail" style="width:90%" src="{{$post->getImage()}}" alt="">
                </div>
                <div class="col-6">
                    <div class="alert alert-primary" role="alert">
                        <h3>{{$post->title}}</h3>
                    </div>
                    <h4>Автор: <a href="{{ route('author.show', ['author' => $post->author->id]) }}">{{$post->author->name}}</a></h4>
                    <h4>Категория: {{$post->category->title}}</h4>
                    <h4>Теги: {{$post->tag->pluck('title')->join(', ')}}</h4>
                </div>
            </div>
            <div class="mt-5">
                <h4>Описание поста:</h4>
                {!!$post->description!!}
            </div>
            <div class="mt-5">
                <h4>Контент поста:</h4>
                {!!$post->content!!}
            </div>
            <div>
            <a href="{{route('post.edit', ['post' => $post->id])}}" class="btn btn-info btn-sm float-left mr-1">
                    <i class="fas fa-pencil-alt"></i>
            </a>
            <form action="{{route('post.destroy', ['post' => $post->id])}}" method="post" class="float-left">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger btn-sm"
                onclick="return confirm('Подтвердите удаление')">
                <i class="fas fa-trash-alt"></i>
                </button>
            </form>
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
