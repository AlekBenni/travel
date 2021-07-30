
@extends('admin.layouts.layout')

@section('content')

    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Страница автора</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ url('/') }}">Главная</a></li>
              <li class="breadcrumb-item active">Изменить автора</li>
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
          <h3 class="card-title">Изменить автора</h3>

          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
              <i class="fas fa-minus"></i></button>
            <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
              <i class="fas fa-times"></i></button>
          </div>
        </div>

        <form role="form" method="post" action="{{route('author.update', ['author' => $author->id])}}" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="card-body">
                <div class="form-group">
                    <label for="name">Изменить автора</label>
                    <input name="name" type="text" class="form-control @error('name') is-invalid @enderror" id="name" value="{{$author->name}}">
                </div>

                <div class="form-group">
                    <label for="description">Цитата</label>
                    <textarea id="description" name="description" class="form-control @error('title') is-invalid @enderror" rows="3">{{$author->description}}</textarea>
                </div>

                <div class="form-group">
                    <label for="content">Контент</label>
                    <textarea id="content" name="content" class="form-control @error('title') is-invalid @enderror" rows="5">{{$author->content}}</textarea>
                </div>

                <div class="form-group">
                    <label for="thumbnail">Выберите автарку автора</label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input name="thumbnail" type="file" class="custom-file-input" id="thumbnail">
                        <label class="custom-file-label" for="exampleInputFile">Выбор</label>
                      </div>
                    </div>
                </div>
                <img class="img-thumbnail" style="width:200px" src="{{$author->getImage()}}" alt="">

            </div>


            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Изменить</button>
            </div>
        </form>
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
