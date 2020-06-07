
@extends('layouts.app')

@section('content')
<div class="container" style="margin-top:50px;">
<h1>Todoリスト詳細</h1>
<div class="form-group">
<input type="text" name="body"class="form-control" value="{{$todo->body}}" style="max-width:1000px;"disabled>
</div>
<a href="/todos/edit/{{$todo->id}}" class="btn btn-secondary">編集する</a>
@endsection('content')