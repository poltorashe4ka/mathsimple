@extends('layouts.admin')

@section('content')
<form method="POST" action="/admin/main_banners/store" class="form-horizontal" enctype="multipart/form-data">
    {!! csrf_field() !!}

    <div class="form-group">
        <label for="inputImage" class="col-sm-2 control-label">Изображение</label>
        <div class="col-sm-10">
            <input type="file" id="inputImage" name="image" accept="image/png,image/jpeg">
        </div>
    </div>
    
    <div class="form-group">
        <label for="inputLink" class="col-sm-2 control-label">Ссылка</label>
        <div class="col-sm-10">
            <input type="text"  class="form-control" id="inputLink" name="link" value="{{ old('link') }}">
        </div>
    </div>
    
    <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
            <button type="submit" class="btn btn-info">Добавить</button>
            <a class="btn btn-info" href="/admin/main_banners">Отмена</a>
        </div>
    </div>
</form>
@endsection