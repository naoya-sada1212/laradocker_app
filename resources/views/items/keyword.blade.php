@extends('layouts.app')
@section('content')
@if($items->count())
<div class="container">
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
      @else
      <div class="text-center" style="width: 200px;margin: 20px auto;"> 
      見つかりませんでした
      @endif
    </div>
</div>
@endsection


