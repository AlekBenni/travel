
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
          <h3 class="card-title">Авторы</h3>

          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
              <i class="fas fa-minus"></i></button>
            <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
              <i class="fas fa-times"></i></button>
          </div>
        </div>

        <div class="card-body">
        <a href="{{route('author.create')}}" type="button" class="btn btn-primary mb-3">Добавить Автора</a>
                @if(count($authors))
                <div class="table-responsive">
                <table class="table table-bordered">
                  <thead>
                    <tr>
                      <th style="width:30px">#</th>
                      <th>Имя автора</th>
                      <th>Аватарка</th>
                      <th>Посты</th>
                      <th>Действие</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($authors as $author)
                    <tr>
                      <td>{{$author->id}}</td>
                      <td><a href="{{route('author.show', ['author' => $author->id])}}">{{$author->name}}</a>  </td>
                      <td><img class="img-thumbnail" style="width:50px" src="{{$author->getImage()}}" alt=""></td>
                      <td>{{$author->posts->pluck('title')->join(', ')}}</td>
                      <td>
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
                        </td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>

                </div>
                @else
                <h4>Авторов пока нет</h4>
                @endif
        </div>
        <!-- /.card-body -->
        <div class="card-footer clearfix">
            {{$authors->links()}}
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
