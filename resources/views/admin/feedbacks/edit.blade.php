@extends('layouts.admin')

@section('content')
<form method="POST" action="/admin/feedbacks/update/{{ $feedback->id }}" class="form-horizontal"  enctype="multipart/form-data">
    {!! csrf_field() !!}

    <div class="form-group">
        <label for="inputActive" class="col-sm-2 control-label">Активен</label>
        <div class="col-sm-10">
            <input type="hidden" name="active" value="0">
            <input type="checkbox" @if($feedback->active) checked="checked" @endif class="checkbox" id="inputActive" name="active" value="1">
        </div>
    </div>

    <div class="form-group">
        <label for="inputAuthor" class="col-sm-2 control-label">Автор</label>
        <div class="col-sm-10">
            <input type="text" required="required" class="form-control" id="inputName" name="author" value="{{ $feedback->author }}">
        </div>
    </div>

    <div class="form-group">
        <label for="inputDate" class="col-sm-2 control-label">Дата</label>
        <div class="col-sm-10">
            <input type="text" required="required" class="datepicker form-control" id="inputDate" name="date" value="@if($feedback->date){{ $feedback->date->format('d.m.Y') }}@endif">
        </div>
    </div>

    <div class="form-group">
        <label for="inputText" class="col-sm-2 control-label">Текст</label>
        <div class="col-sm-10">
            <textarea required="required" class="form-control" id="inputText" name="text">{{ $feedback->text }}</textarea>
        </div>
    </div>

    <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
            <button type="submit" class="btn btn-info">Изменить</button>
            <a class="btn btn-info" href="/admin/feedbacks">Отмена</a>
        </div>
    </div>
</form>
@endsection
