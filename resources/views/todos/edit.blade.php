
@extends('layouts.app')

@section('content')
<div class="container" style="margin-top:50px;">
<h1>Todoリスト更新</h1>

<form action='/todos/update' method="post">
@csrf
<input type="hidden" name="id" value="{{$todo->id}}">
<div class="form-group">
<input type="text" name="body"class="form-control" value="{{$todo->body}}" style="max-width:1000px;">
</div>
<button type="submit" class="btn btn-warning">更新する</button>
</form>
@endsection('content')