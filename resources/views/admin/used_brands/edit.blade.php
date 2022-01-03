@extends('layouts.admin')

@section('content')
<form method="POST" action="/admin/used_brands/update/{{ $brand->id }}" class="form-horizontal" enctype="multipart/form-data">
    {!! csrf_field() !!}

    <div class="form-group">
        <label class="col-sm-2 control-label">Название</label>
        <div class="col-sm-10">
            <div class="form-control-static">{{ $brand->name }}</div>
        </div>
    </div>

    <div class="form-group">
        <label for="inputAlias" class="col-sm-2 control-label">Алиас</label>
        <div class="col-sm-10">
            <input type="text" required="required" class="form-control" id="inputAlias" name="alias" value="{{ $brand->alias }}">
        </div>
    </div>
    
    <div class="form-group">
        <label for="inputImage" class="col-sm-2 control-label">Изображение</label>
        <div class="col-sm-10">
            @if($brand->image)
            <img src="{!! \App\Models\UsedBrand::images_path.$brand->image !!}" alt=""><br><br>
            @endif
            
            <input type="file" id="inputImage" name="image" accept="image/png,image/jpeg">
        </div>
    </div>
    
    <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
            <button type="submit" class="btn btn-info">Изменить</button>
            <a class="btn btn-info" href="/admin/used_brands">Отмена</a>
        </div>
    </div>
</form>
@endsection