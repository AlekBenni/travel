
@extends('admin.layouts.layout')

@section('content')

    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Страница запросов</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ url('/') }}">Главная</a></li>
              <li class="breadcrumb-item active">Страница запросов</li>
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
          <h3 class="card-title">Запросы:</h3>

          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
              <i class="fas fa-minus"></i></button>
            <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
              <i class="fas fa-times"></i></button>
          </div>
        </div>

        <div class="card-body">

        @foreach($offers as $offer)
            @if($offer->slug == $request_offer->offer_slug)
                <h2>Предложение: {{$offer->title}}</h2>
            @endif
        @endforeach

        <h5> <b>Автор:</b>  {{$request_offer->author}} </h5>
        <p><b>Телефон:</b>  {{$request_offer->phone}}</p>

        <p><b>Мыло:</b> {{$author_mail}}</p>

        <p><b>Сообщение: </b>{{$request_offer->content}}</p>
        <p><b>Дата и время сообщения: </b>{{$request_offer->getRequestDate()}}</p>

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

