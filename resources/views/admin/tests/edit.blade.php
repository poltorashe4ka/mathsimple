@extends('layouts.admin')

@section('content')
<form method="POST" action="/admin/tests/update/{{ $test->id }}" class="form-horizontal"  enctype="multipart/form-data">
    {!! csrf_field() !!}

    <div class="form-group">
        <label for="inputAuthor" class="col-sm-2 control-label">№ теста</label>
        <div class="col-sm-10">
            <input type="text" required="required" class="form-control" id="inputName" name="test_id" value="{{ $test->test_id }}">
        </div>
    </div>
    <div class="form-group">
        <label for="inputAuthor" class="col-sm-2 control-label">Вопрос</label>
        <div class="col-sm-10">
            <input type="text" required="required" class="form-control" id="inputName" name="questions" value="{{ $test->questions }}">
        </div>
    </div>
    <div class="form-group">
        <label for="inputText" class="col-sm-2 control-label">Ответы</label>
        <div class="col-sm-10">
            <textarea required="required" class="form-control" rows="8" id="inputText" name="value">{{ $test->value }}</textarea>
        </div>
    </div>

    <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
            <button type="submit" class="btn btn-info">Изменить</button>
            <a class="btn btn-info" href="/admin/tests">Отмена</a>
        </div>
    </div>
</form>
@endsection
