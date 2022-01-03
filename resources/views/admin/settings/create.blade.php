@extends('layouts.admin')

@section('content')
<form method="POST" action="/admin/settings/store" class="form-horizontal">
    {!! csrf_field() !!}

    <div class="form-group">
        <label for="inputName" class="col-sm-2 control-label">Название</label>
        <div class="col-sm-10">
            <input type="text" required="required" class="form-control" id="inputName" name="name" value="{{ old('name') }}">
        </div>
    </div>

    <div class="form-group">
        <label for="inputValue" class="col-sm-2 control-label">Значение</label>
        <div class="col-sm-10">
            <textarea name="value" class="form-control" id="inputValue" cols="30" rows="10">{{ old('value') }} </textarea>
        </div>
    </div>
    
    <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
            <button type="submit" class="btn btn-info">Добавить</button>
            <a class="btn btn-info" href="/admin/settings">Отмена</a>
        </div>
    </div>
</form>
@endsection