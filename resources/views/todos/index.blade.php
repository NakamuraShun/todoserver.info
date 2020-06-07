@extends('layouts.app')

@section('content')
<div class="container" style="margin-top:50px;">


<h1>Todoリスト追加</h1>
<form action="/todos/create" method="post">
@csrf
<div class="form-group">
<label >やることを追加してください</label>
<input type="text" name="body" class="form-control" maxlength="100" placeholder="100文字以内" style="max-width:1000px;" required>
</div>
<button type="submit" class="btn btn-success">追加する</button>
</form>


<h1 style="margin-top:50px;">Todoリスト</h1>
<!-- 部分検索 -->
<form action="/todos/search" method="post">
@csrf
<div class="form-group">
<div class="input-group">
<input type="text" name="search_string" class="form-control" maxlength="100" placeholder="部分検索：(例) 会議" style="max-width:250px;" required>
<button type="submit" class="btn btn-secondary"><i class="fas fa-search"></i></button>
</div>
</div>
</form>
@if(isset($searchWord))
<p><strong>「{{$searchWord}}」の部分検索結果を表示中</strong>  (<a href="/">全件表示</a>)</p>
@else
<p><strong>全件表示中</strong></p>
@endif

<!-- todoリスト -->
<table class="table table-striped" style="max-width:1000px; margin-top:20px;">
<tbody>
@foreach($todos as $todo)
<tr>
<td>{{$todo->body}}</td>
<!-- ボタン -->
<td>
<a href="/todos/show/{{$todo->id}}" class="btn btn-primary">詳細</a>
</td>
<td>
<a href="/todos/delete/{{$todo->id}}" class="btn btn-danger">削除</a>
</td>

</tr>
@endforeach
</table>
</div>
@endsection('content')