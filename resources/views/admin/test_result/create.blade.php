@extends('layouts.admin')

@section('content')
<form method="POST" action="/admin/test_result/store" class="form-horizontal" enctype="multipart/form-data">
    {!! csrf_field() !!}

    <div class="form-group">
        <label for="inputAuthor" class="col-sm-2 control-label">№ теста</label>
        <div class="col-sm-10">
            <input type="text" required="required" class="form-control" id="inputName" name="test_id">
        </div>
    </div>
    <div class="form-group">
        <label for="inputAuthor" class="col-sm-2 control-label">Ответ</label>
        <div class="col-sm-10">
            <input type="text" required="required" class="form-control" id="inputName" name="person">
        </div>
    </div>

    <div class="form-group">
        <label for="inputImage" class="col-sm-2 control-label">Изображение</label>
        <div class="col-sm-10">
            <input type="file" id="inputImage" name="img" accept="image/png,image/jpeg">
        </div>
    </div>

    <div class="form-group">
        <label for="inputText" class="col-sm-2 control-label">Описание</label>
        <div class="col-sm-10">
            <textarea required="required" class="form-control"  rows="8" id="inputText" name="description"></textarea>
        </div>
    </div>

    <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
            <button type="submit" class="btn btn-info">Добавить</button>
            <a class="btn btn-info" href="/admin/test_result">Отмена</a>
        </div>
    </div>
</form>
@endsection
