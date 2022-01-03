@extends('layouts.admin')

@section('content')
<form method="POST" action="/admin/actions/update/{{ $action->id }}" class="form-horizontal"  enctype="multipart/form-data">
    {!! csrf_field() !!}
    
    <div class="form-group">
        <label for="inputTitle" class="col-sm-2 control-label">Заголовок</label>
        <div class="col-sm-10">
            <input type="text" required="required" class="form-control" id="inputTitle" name="title" value="{{ $action->title }}">
        </div>
    </div>

    <div class="form-group">
        <label for="inputDate" class="col-sm-2 control-label">Дата окончания</label>
        <div class="col-sm-10">
            <input type="text" required="required" class="datepicker form-control" id="inputDate" name="date" value="@if($action->date){{ $action->date->format('d.m.Y') }}@endif">
        </div>
    </div>
    
    <div class="form-group">
        <label for="inputText" class="col-sm-2 control-label">Текст анонса</label>
        <div class="col-sm-10">
            <textarea required="required" class="form-control" id="inputText" name="text">{{ $action->text }}</textarea>
        </div>
    </div>
    
    <div class="form-group">
        <label for="inputFullText" class="col-sm-2 control-label">Полный текст</label>
        <div class="col-sm-10">
            <textarea required="required" class="form-control tinymce" id="inputFullText" name="fulltext">{{ $action->fulltext }}</textarea>
        </div>
    </div>
    
    <div class="form-group">
        <label for="inputImage" class="col-sm-2 control-label">Изображение (572px ширина)</label>
        <div class="col-sm-10">
            @if($action->image)
            <img src="{!! \App\Models\Action::images_path.$action->image !!}" alt=""><br><br>
            @endif
            
            <input type="file" id="inputImage" name="image" accept="image/png,image/jpeg">
        </div>
    </div>
    
    <div class="form-group">
        <label for="inputBigImage" class="col-sm-2 control-label">Большое избражение (1920px ширина)</label>
        <div class="col-sm-10">
            @if($action->big_image)
            <img src="{!! \App\Models\Action::images_path.$action->big_image !!}" width="1024" alt=""><br><br>
            @endif
            
            <input type="file" id="inputBigImage" name="big_image" accept="image/png,image/jpeg">
        </div>
    </div>
        
    <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
            <button type="submit" class="btn btn-info">Изменить</button>
            <a class="btn btn-info" href="/admin/actions">Отмена</a>
        </div>
    </div>
</form>
@endsection