@extends('layouts.common')

@section('css')
<link rel="stylesheet" href="{{ asset('css/userlist.css') }}">
@endsection

@section('content')
<div class="user__page">
  @if($users->total() > 0)
    <?php
      $alphabets = range('あ', 'さ');
      $chunkedAlphabets = array_chunk($alphabets, 5);
    ?>
    @foreach($chunkedAlphabets as $chunk)
      <div>
        @foreach($chunk as $alphabet)
        @if($users->where('name', 'like', $alphabet . '%')->count() > 0)
          <a href="{{ route('userlist', ['alphabet' => $alphabet]) }}">{{ $alphabet }}</a>
          @else
          <span>{{ $alphabet }}</span>
        @endif
        @endforeach
      </div>
    @endforeach
    <!-- ここにか行以降のページネーションリンクを表示する -->
    {{ $users->links('vendor.pagination.costom') }}
    @endif
</div>

<div class="userlist__table">
  <table class="userlist__table--content">
    <tr>
      <th>名前</th>
      <th>メールアドレス</th>
      <th>一覧</th>
    </tr>
    <!-- ユーザーリストを表示 -->
    @foreach($users as $user)
    <tr>
      <td>{{ $user->name }}</td>
      <td>{{ $user->email }}</td>
      <td><a href="{{ route('user.list', $user->id) }}">一覧▶︎</a></td>
    </tr>
    @endforeach
  </table>
</div>

<div class="pagination-container">
    {{ $users->links('vendor.pagination.costom') }}
</div>

@endsection
