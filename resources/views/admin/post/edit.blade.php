
@extends('admin.layouts.layout')

@section('custom_css')
  <!-- Select2 -->
  <link rel="stylesheet" href="/plugins/select2/css/select2.min.css">
  <link rel="stylesheet" href="/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
@endsection

@section('custom_js')
<!-- Select2 -->
<script src="/plugins/select2/js/select2.full.min.js"></script>
<script>
    $('.select2').select2()
    //Initialize Select2 Elements
    $('.select2bs4').select2({
      theme: 'bootstrap4'
    })
</script>

@endsection

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
              <li class="breadcrumb-item active">Изменить статью</li>
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
          <h3 class="card-title">Изменить статью</h3>

          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
              <i class="fas fa-minus"></i></button>
            <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
              <i class="fas fa-times"></i></button>
          </div>
        </div>

        <form role="form" method="post" action="{{route('post.update', ['post' => $post->id])}}" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="card-body">
                <div class="form-group">
                    <label for="title">Изменить название статьи</label>
                    <input name="title" type="text" class="form-control @error('title') is-invalid @enderror" id="title" value="{{$post->title}}">
                </div>

                <div class="form-group">
                    <label for="description">Цитата</label>
                    <textarea id="description" name="description" class="form-control @error('title') is-invalid @enderror" rows="3">{{$post->description}}</textarea>
                </div>

                <div class="form-group">
                    <label for="content">Контент</label>
                    <textarea id="content" name="content" class="form-control @error('title') is-invalid @enderror" rows="5">{{$post->content}}</textarea>
                </div>

                <div class="form-group">
                    <label for="category_id">Категория</label>
                    <select id="category_id" name="category_id" class="form-control @error('title') is-invalid @enderror">
                        <option>Выбор категории</option>
                        @foreach($categories as $k => $v)
                        <option @if($post->category_id == $k) selected @endif value="{{$k}}">{{$v}}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                  <label for="tags">Теги</label>
                  <div class="select2-primary">
                  <select id="tags" name="tags[]" class="select2" multiple="multiple" data-placeholder="Выбор тегов" style="width: 100%;">
                        @foreach($tags as $k => $v)
                        <option @if(in_array($k, $post->tag->pluck('id')->all()) ) selected @endif value="{{$k}}">{{$v}}</option>
                        @endforeach
                  </select>
                  </div>
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
                <img class="img-thumbnail" style="width:200px" src="{{ $post->getImage() }}" alt="">

                <hr class="mt-4">

                <div class="form-group">
                    <label for="meta_title">Meta title статьи</label>
                    <input type="text" class="form-control" id="meta_title" placeholder="meta_title" value="{{$post->meta_title}}">
                </div>

                <div class="form-group">
                    <label for="meta_keywords">Ключевые слова</label>
                    <textarea id="meta_keywords" name="meta_keywords" class="form-control" rows="3" >{{$post->meta_keywords}}</textarea>
                </div>

                <div class="form-group">
                    <label for="meta_description">Описание (meta description)</label>
                    <textarea id="meta_description" name="meta_description" class="form-control" rows="5">{{$post->meta_description}}</textarea>
                </div>

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
