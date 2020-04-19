@extends('layouts.app')
<!-- <style>
  .pagetop {
    /* display: none; */
    padding: 40px 10px;
    background-color: #d8d8d8;
    color: #000;
    text-decoration: none;
    border-radius: 50%;
    position: fixed;
    bottom: 10px;
    right: 50px;
  }
</style>   -->
@section('content')
<div class="container">
  <p class="mb-0">場所で探す（県・市名を入力してください）</p>
  <form class="form-inline" action="keyword" method="POST">
    @csrf
    <input class="form-control mr-sm-2" type="search" placeholder="県または市名を入力" aria-label="Serch" name="keyword">
    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">検索</button>
  </form>
  <div class="flex-wrap d-flex flex-row">
    @foreach($items as $item)
    <div class="col-md-5 m-3">
      <div class="card">
        <div class="card-header p-3 w-100 d-flex">
          <img src="{{ asset('storage/image/'.$item->user->image) }}" class="rounded-circle" width="50" height="50">
          <div class="ml-2 d-flex flex-column">
            <p class="mb-0">{{ $item->user->name }}</p>
            <a href="{{ url('users/'.$item->user->id) }}" class="mb-0">{{ $item->user->account_name }}</a>
          </div>
        </div>

        <div class="card-body d-flex">
          <img src="{{ asset('storage/item_image/'.$item->item_image) }}" class="col-7" width="200" height="200">
          <div class="ml-2 d-flex flex-column">
            <h3 class="mb-0 mb-2">{{ $item->item_name }}</h3>
            <p class="mb-0 mb-3">{{ $item->text}}</p>
            <p>{{$item->pref}}県 {{ $item->city }}市</p>
          </div>
        </div>
        <div class="card-footer d-flex justify-content-end">
          <div class="col text-end text-secondary">{{ $item->created_at->format('Y-m-d') }}</div>
        @if($item->user->id === Auth::user()->id)
            <div class="dropdown mr-3 d-flex align-items-center">
              <a href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-ellipsis-v fa-fw"></i>
              </a>
              <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                <form method="POST" action="{{ url('items/'.$item->id) }}" class="mb-0">
                  @csrf
                  @method('DELETE')
                  
                  <a href="{{ url('items/'.$item->id .'/edit') }}" class="dropdown-item">編集</a>
                  <button type="submit" class="dropdown-item del-btn">削除</button>
                </form>
              </div>
            </div>
            @else
            <a href="{{ url('items/'.$item->id) }}" class="btn btn-primary">詳細</a>
        @endif
        </div>
      </div>
    </div>
    @endforeach
  </div>
  <div class="text-center" style="width: 200px;margin: 20px auto;">
      {{ $items->links() }}
      <!-- <a class="pagetop"  id="top" href="#" text-content-end>ページトップへ</a> -->
  </div>
</div>
<!-- <script>
  const top = document.getElementById('top');
  const scrollValue = document.scrollingElement.scrollTop;
  top.addEventListener('click', () => {
    const timer = setInterval( () => {
      if(scrollValue < 0) clearInterval(timer);

        document.scrollingElement.scrollTop = scrollValue;
        scrollValue = scrollValue - 10;  
    });
  });
  
</script> -->
@endsection