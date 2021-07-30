
@extends('admin.layouts.layout')

@section('content')

    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Страница предложений</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ url('/') }}">Главная</a></li>
              <li class="breadcrumb-item active">Добавление предложение</li>
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
          <h3 class="card-title">Добавить предложение</h3>

          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
              <i class="fas fa-minus"></i></button>
            <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
              <i class="fas fa-times"></i></button>
          </div>
        </div>

        <form role="form" method="post" action="{{route('offer.store')}}" enctype="multipart/form-data">
            @csrf
            <div class="card-body">
                <div class="form-group">
                    <label for="title">Добавьте предложение</label>
                    <input name="title" type="text" class="form-control @error('title') is-invalid @enderror" id="title" placeholder="Введите название предложения">
                </div>

                <div class="form-group">
                    <label for="second_title">Второе предложение (необязательно)</label>
                    <input id="second_title" name="second_title" class="form-control" rows="3" placeholder="Введите второе название"></input>
                </div>

                <div class="form-group">
                    <label for="content">Контент</label>
                    <textarea id="content" name="content" class="form-control @error('content') is-invalid @enderror" rows="5" placeholder="Введите контент"></textarea>
                </div>

                <div class="form-group">
                    <label for="discount">Скидка</label>
                    <input id="discount" name="discount" class="form-control @error('discount') is-invalid @enderror" rows="5" placeholder="Введите скидку"></input>
                </div>

                <div class="form-group">
                    <label for="thumbnail">Выберите картинку</label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input name="thumbnail" type="file" class="custom-file-input" id="thumbnail">
                        <label class="custom-file-label" for="exampleInputFile">Выбор</label>
                      </div>
                    </div>
                </div>

            </div>


            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Добавить</button>
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
