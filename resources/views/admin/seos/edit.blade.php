@extends('layouts.admin')

@section('content')
<form method="POST" action="/admin/seos/update/{{ $seo->id }}" class="form-horizontal">
    {!! csrf_field() !!}

    <div class="form-group">
        <label for="inputUrl" class="col-sm-2 control-label">URL</label>
        <div class="col-sm-10">
            <input type="text" required="required" class="form-control" id="inputUrl" name="url" value="{{ $seo->url }}">
        </div>
    </div>

    <div class="form-group">
        <label for="inputTitle" class="col-sm-2 control-label">Title</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" id="inputTitle" name="title" value="{{ $seo->title }}">
        </div>
    </div>
    
    <div class="form-group">
        <label for="inputKeywords" class="col-sm-2 control-label">Keywords</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" id="inputKeywords" name="keywords" value="{{ $seo->keywords }}">
        </div>
    </div>
    
    <div class="form-group">
        <label for="inputDescription" class="col-sm-2 control-label">Description</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" id="inputDescription" name="description" value="{{ $seo->description }}">
        </div>
    </div>
    
    <div class="form-group">
        <label for="inputh1" class="col-sm-2 control-label">h1</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" id="inputh1" name="h1" value="{{ $seo->h1 }}">
        </div>
    </div>
    
    <div class="form-group">
        <label for="inputText" class="col-sm-2 control-label">Текст (HTML)</label>
        <div class="col-sm-10">
            <textarea class="form-control tinymce" id="inputText" name="text">{{ $seo->text }}</textarea>
        </div>
    </div>
    
    <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
            <button type="submit" class="btn btn-info">Изменить</button>
            <a class="btn btn-info" href="/admin/seos">Отмена</a>
        </div>
    </div>
</form>
@endsection