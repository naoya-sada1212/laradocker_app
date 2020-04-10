@extends('layouts.app')
@section('content')
<div class="container">
  <div class="row justify-content-start">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header d-flex">
          <h3 class="row align-items-center">プロフィール</h3>
          <a href="{{ url('users/'.$user->id.'/edit') }}" class="btn btn-primary ml-5">編集</a>
        </div>
        <div class="card-body d-flex">
          <img src="{{ $user->image }}" class="rounded-circle" width="80" height="80">
          <div class="ml-2 mt-2 d-flex flex-column">
            <div class="row justify-content-end">
              <p class="mb-3 ml-5">名前：</p>
            </div>
            <div class="row justify-content-end">
              <p class="mb-3 ml-5">アカウント名：</p>
            </div>
          </div>
          <div class="ml-2 mt-2 d-flex flex-column">
            <p class="mb-3 ml-5">{{ $user->name }}</p>
            <p class="mb-3 ml-5">{{ $user->account_name }}</p>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="card-footer">

    <div class="row">
      @if(isset($items))
      @foreach($items as $item)
        <div class="col-md-5 m-3">
          <div class="card">
            <div class="card-header p-3 w-100 d-flex">
              <img src="{{ $item->user->image }}" class="rounded-circle" width="50" height="50">
              <div class="ml-2 d-flex flex-column">
                <p class="mb-0">{{ $item->user->name }}</p>
                <p class="mb-0">{{ $item->user->account_name }}</p>
              </div>
            </div>
    
            <div class="card-body d-flex">
              <img src="{{ asset('storage/item_image/'.$item->item_image) }}" class="col-align-self-center" width="200" height="200">
              <div class="ml-2 d-flex flex-column">
                <p class="mb-0">{{ $item->item_name }}</p>
                <p class="mb-0">{{ $item->text}}</p>
                <p>{{$item->pref}}県 {{ $item->city }}市</p>
              </div>
            </div>
            <div class="card-footer d-flex justify-content-end">
              <a href="{{ url('items/') }}">一覧へ</a>
            </div>
          </div>
        </div>
      @endforeach
      @endif
        <div class="text-center" style="width:200; margin:20px auto">
          {{ $items->links() }}
        </div>
    </div>
  </div>
</div>
@endsection