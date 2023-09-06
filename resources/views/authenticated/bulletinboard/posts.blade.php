@extends('layouts.sidebar')

@section('content')
<div class="board_area w-100 border m-auto d-flex">
  <div class="post_view w-75 mt-5">
    <p class="w-75 m-auto">投稿一覧</p>
    @foreach($posts as $post)
    <div class="post_area border w-75 m-auto p-3">
      <p><span>{{ $post->user->over_name }}</span><span class="ml-3">{{ $post->user->under_name }}</span>さん</p>
      <p><a href="{{ route('post.detail', ['id' => $post->id]) }}">{{ $post->post_title }}</a></p>
      <div class="post_bottom_area">
        <div class="d-flex post_status">
        @foreach($post->subCategories as $sub_category)
          <p class="category_pt" style="white-space: nowrap;">{{ $sub_category->sub_category }}</p>
          @endforeach
          <div class="post-cl-btn d-flex">
          <div class="mr-5">
            <i class="fa fa-comment" style="color: #ccc;"></i><span class="">{{ DB::table('post_comments')->where('post_id', $post->id)->count() }}</span>
          </div>
          <div >
            @if(Auth::user()->is_Like($post->id))
            <p class="m-0"><i class="fas fa-heart un_like_btn" post_id="{{ $post->id }}"></i><span class="like_counts{{ $post->id }}">{{ $like->likeCounts($post->id) }}</span></p>
            @else
            <p class="m-0"><i class="fas fa-heart like_btn" post_id="{{ $post->id }}"></i><span class="like_counts{{ $post->id }}">{{ $like->likeCounts($post->id) }}</span></p>
            @endif
          </div>
          </div>
        </div>
      </div>
    </div>
    @endforeach
  </div>
  <div class="other_area pt-30 w-25">
    <div class="m-4">
      <div class="post-create"><a href="{{ route('post.input') }}" class="post_link text-white">投稿</a></div>
      <div class="word-search">
        <input type="text" class="form-control keyword-search" style="border-radius: 5px 0px 0px 5px;" placeholder="キーワードを検索" name="keyword" form="postSearchRequest">
        <input type="submit" class="btn btn-search text-white" style="border-radius: 0px 5px 5px 0px;" value="検索" form="postSearchRequest">
      </div>
      <div class="category_lm">
      <input type="submit" name="like_posts" class="category_btn category_like" value="いいねした投稿" form="postSearchRequest">
      <input type="submit" name="my_posts" class="category_btn category_mine" value="自分の投稿" form="postSearchRequest">
      </div>
      <div id="accordion" class="accordion-container">
      <h6>カテゴリー検索</h6>
        @foreach($categories as $category)
        <p class="main_categories accordion-title js-accordion-title">{{ $category->main_category }}</p>
        <div class="accordion-content">
          @foreach($category->subCategories as $sub_category)
          <input type="submit" class="btn btn-sc" style="color:inherit" name="category_word" value="{{ $sub_category->sub_category }}" form="postSearchRequest">
          <input type="hidden" name="category_id" value="{{ $sub_category->id }}" form="postSearchRequest">
          @endforeach
        </div>
        @endforeach
      </div>



    </div>
  </div>
  <form action="{{ route('post.show') }}" method="get" id="postSearchRequest"></form>
</div>
@endsection