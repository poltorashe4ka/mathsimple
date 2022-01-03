@extends('layouts.admin')

@section('content')
<form method="POST" action="/admin/credit_banners/store" class="form-horizontal" enctype="multipart/form-data">
    {!! csrf_field() !!}

    <div class="form-group">
        <label for="inputImage" class="col-sm-2 control-label">Изображение</label>
        <div class="col-sm-10">
            <input type="file" id="inputImage" name="image" accept="image/png,image/jpeg">
        </div>
    </div>
    
    <div class="form-group">
        <label for="inputParameter" class="col-sm-2 control-label">Метка</label>
        <div class="col-sm-10">
            <input type="text" id="inputParameter" name="parameter">
        </div>
    </div>
    
    <div class="form-group">
        <label for="inputMarker" class="col-sm-2 control-label">Значение метки</label>
        <div class="col-sm-10">
            <input type="text" id="inputMarker" name="marker">
        </div>
    </div>
    
    <div class="form-group">
        <label for="inputLink" class="col-sm-2 control-label">Ссылка</label>
        <div class="col-sm-10">
            <input type="text" id="inputLink" name="link">
        </div>
    </div>
    
    <div class="form-group">
        <label for="inputAnchor" class="col-sm-2 control-label">Якорь</label>
        <div class="col-sm-10">
            <input type="checkbox" @if(old('anchor')) checked="checked" @endif class="checkbox" id="inputAnchor" name="anchor" value="1">
        </div>
    </div>

    <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
            <button type="submit" class="btn btn-info">Добавить</button>
            <a class="btn btn-info" href="/admin/credit_banners">Отмена</a>
        </div>
    </div>
</form>
@endsection