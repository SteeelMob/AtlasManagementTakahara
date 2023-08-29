@extends('layouts.sidebar')

@section('content')
<p>ユーザー検索</p>
<div class="search_content w-100 border d-flex">
  <div class="reserve_users_area">
    @foreach($users as $user)
    <div class="border one_person">
      <!-- <div class="one-person-list"> -->
        <div>
        <span class="text-muted">ID : </span><span>{{ $user->id }}</span>
      </div>
      <div><span class="text-muted">名前 : </span>
        <a href="{{ route('user.profile', ['id' => $user->id]) }}">
          <span>{{ $user->over_name }}</span>
          <span>{{ $user->under_name }}</span>
        </a>
      </div>
      <div>
        <span class="text-muted">カナ : </span>
        <span>({{ $user->over_name_kana }}</span>
        <span>{{ $user->under_name_kana }})</span>
      </div>
      <div>
        @if($user->sex == 1)
        <span class="text-muted">性別 : </span><span>男</span>
        @else
        <span class="text-muted">性別 : </span><span>女</span>
        @endif
      </div>
      <div>
        <span class="text-muted">生年月日 : </span><span>{{ $user->birth_day }}</span>
      </div>
      <div>
        @if($user->role == 1)
        <span class="text-muted">権限 : </span><span>教師(国語)</span>
        @elseif($user->role == 2)
        <span class="text-muted">権限 : </span><span>教師(数学)</span>
        @elseif($user->role == 3)
        <span class="text-muted">権限 : </span><span>講師(英語)</span>
        @else
        <span class="text-muted">権限 : </span><span>生徒</span>
        @endif
      </div>
      <div>
        @if($user->role == 4)
        <span class="text-muted">選択科目 :</span>
        @endif
        @foreach($user->subjects as $subject)
        @if($subject->id == 1)
        <span> 英語 </span>
        @elseif($subject->id == 2)
        <span> 国語 </span>
        @elseif($subject->id == 3)
        <span> 数学 </span>
        @endif
        @endforeach
      </div>
     <!-- </div> -->
    </div>
    @endforeach
  </div>
  <div class="search_area w-25">
    <div class="search_inner">
      <div class="search-form">
        <label>検索</label>
        <input type="text" class="user-search" style="height: 45px;" name="keyword" placeholder="キーワードを検索" form="userSearchRequest">
      </div>
      <div class="pt-3">
        <label>カテゴリ</label>
        <select form="userSearchRequest" name="category">
          <option value="name">名前</option>
          <option value="id">社員ID</option>
        </select>
      </div>
      <div class="pt-3">
        <label>並び替え</label>
        <select name="updown" form="userSearchRequest">
          <option value="ASC">昇順</option>
          <option value="DESC">降順</option>
        </select>
      </div>
      <div class="pt-3 mb-5">
        <p class="search_conditions"><span class="">検索条件の追加</span></p>
        <div class="search_conditions_inner">
          <div class ="search-sex">
            <label>性別</label>
            <span>男</span><input type="radio" name="sex" value="1" form="userSearchRequest">
            <span>女</span><input type="radio" name="sex" value="2" form="userSearchRequest">
          </div>
          <div>
            <label>権限</label>
            <select name="role" form="userSearchRequest" class="engineer">
              <option selected disabled>----</option>
              <option value="1">教師(国語)</option>
              <option value="2">教師(数学)</option>
              <option value="3">教師(英語)</option>
              <option value="4" class="">生徒</option>
            </select>
          </div>
          <div class="selected_engineer">
            <label>選択科目</label>
            <ul>
            <li>英語 <input type="checkbox" name="subject[]" value="1" form="userSearchRequest"></li>
            <li>国語 <input type="checkbox" name="subject[]" value="2" form="userSearchRequest"></li>
            <li>数学 <input type="checkbox" name="subject[]" value="3" form="userSearchRequest"></li>
            <!-- チェックボックス複数選択の時はnameに[] -->
            </ul>
          </div>
        </div>
      </div>
      <div>
        <input class="btn btn-search" style="color:white;" type="submit" name="search_btn" value="検索" form="userSearchRequest">
      </div>
      <div class="mt-3">
        <input class="search-reset" type="reset" value="リセット" form="userSearchRequest">
      </div>
    </div>
    <form action="{{ route('user.show') }}" method="get" id="userSearchRequest"></form>
  </div>
</div>
@endsection