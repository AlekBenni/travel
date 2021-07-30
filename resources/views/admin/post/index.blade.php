
@extends('admin.layouts.layout')

@section('content')

    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Страница статей</h1>
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
          <h3 class="card-title">Статьи</h3>

          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
              <i class="fas fa-minus"></i></button>
            <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
              <i class="fas fa-times"></i></button>
          </div>
        </div>


        <div class="card-body">
        <a href="{{route('post.create')}}" type="button" class="btn btn-primary mb-3">Добавить статью</a>
                @if(count($posts))
                <div class="table-responsive">
                <table class="table table-bordered">
                  <thead>
                    <tr>
                      <th style="width:30px">#</th>
                      <th>Наименование</th>
                      <th>Автор</th>
                      <th>Категория</th>
                      <th>Теги</th>
                      <th>Дата</th>
                      <th>Действие</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($posts as $post)
                    <tr>
                      <td>{{$post->id}}</td>
                      <td><a href="{{route('post.show', ['post' => $post->id])}}">{{$post->title}}</a></td>
                      <td>{{$post->author->name}}</td>
                      <td>{{$post->category->title}}</td>
                      <td>{{$post->tag->pluck('title')->join(', ')}}</td>
                      <td>{{$post->created_at}}</td>
                      <td>
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
                        </td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
                </div>
                @else
                <h4>Статей пока нет</h4>
                @endif
        </div>
        <!-- /.card-body -->
        <div class="card-footer clearfix">
            {{$posts->links()}}
        </div>
        <div class="card-footer">
          Footer
        </div>
        <!-- /.card-footer-->
      </div>
      <!-- /.card -->

    </section>
    <!-- /.content -->

@endsection
