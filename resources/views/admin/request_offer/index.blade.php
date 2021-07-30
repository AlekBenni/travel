
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
                            <a href="{{route('requestoffer.show', ['requestoffer' => $request_offer->id])}}">{{$offer->title}}</a>
                            @endif
                          @endforeach
                      </th>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
                </div>
                @else
                <h4>Категорий пока нет</h4>
                @endif

                <div>
                    {{$request_offers->links()}}
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

