@extends('layouts.app')
@section('content')
<div class="container">
 <div class="justify-content-between">
  <div class="flex-wrap d-flex flex-row">
    @foreach($items as $item)
    <div class="col-md-3 m-4">
      <div class="card">
        <div class="card-header p-3 w-100 d-flex">
          <img src="{{ $item->user->image }}" class="rounded-circle" width="50" height="50">
          <div class="ml-2 d-flex flex-column">
            <p class="mb-0">{{ $item->user->name }}</p>
            <p class="mb-0">{{ $item->user->account_name }}</p>
          </div>
        </div>

        <div class="card-body">
          <img src="{{ asset('storage/item_image/'.$item->item_image) }}" class="col-md-12" width="200" height="200">
          <div class="ml-2 d-flex flex-column">
            <p class="mb-0">{{ $item->item_name }}</p>
            <p class="mb-0">{{ $item->text}}</p>
            <p>{{$item->pref}} {{ $item->city }}</p>
          </div>
        </div>
        @if($item->user->id === Auth::user()->id)
          <div class="card-footer d-flex justify-content-end">
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
          </div>
          @else
          <div class="card-footer d-flex justify-content-end">
            <a href="{{ url('items/'.$item->id) }}" class="btn btn-primary">詳細</a>
          </div>
        @endif
      </div>
    </div>
    @endforeach
  </div>
  <div class="text-center" style="width: 200px;margin: 20px auto;">
      {{ $items->links() }}
  </div>
  </div>
</div>
@endsection