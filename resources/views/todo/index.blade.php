@extends ('layouts.app')
@section ('content')

<h1 class="page-header">{{ $user->name }}のTodo一覧</h1>
<p class="text-right">
  <a class="btn btn-success" href="/todo/create">新規作成</a>  <!-- 相対URIによる指定 -->
</p>
<table class="table">
  <thead class="thead-light">
    <tr>
      <th>ID</th>
      <th>やること</th>
      <th>作成日時</th>
      <th>更新日時</th>
      <th></th>
      <th></th>
    </tr>
  </thead>
  <tbody>
    @foreach ($todos as $todo)
      <tr>
        <td class="align-middle">{{ $todo->id }}</td>
        <td class="align-middle">{{ $todo->title }}</td>
        <td class="align-middle">{{ $todo->created_at }}</td>
        <td class="align-middle">{{ $todo->updated_at }}</td>
        <td><a class="btn btn-primary" href="{{ route('todo.edit', $todo->id) }}">編集</a></td>  <!-- routeヘルパ。ルートname,パラメータ -->
        <td>
          {!! Form::open(['route' => ['todo.destroy', $todo->id], 'method' => 'DELETE']) !!}  <!-- ルートname名,パラメータ(int) -->
            {!! Form::submit('削除', ['class' => 'btn btn-danger']) !!}
          {!! Form::close() !!}
        </td>
      </tr>
    @endforeach
  </tbody>
</table>

@endsection
