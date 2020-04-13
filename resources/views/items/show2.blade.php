@extends('layouts.app')
@section('content')
<div class="container">
  <div class="flex-wrap d-flex flex-row">
    <div class="col-md-5 m-3">
      <div class="card">
        <div class="card-header p-3 w-100 d-flex">
          <img src="{{ asset('storage/image/'.$item->user->image) }}" class="rounded-circle" width="50" height="50">
          <div class="ml-2 d-flex flex-column">
            <p class="mb-0">{{ $item->user->name }}</p>
            <p class="mb-0">{{ $item->user->account_name }}</p>
          </div>
        </div>

        <div class="card-body d-flex">
          <img src="{{ asset('storage/item_image/'.$item->item_image) }}" class="col align-self-center" width="200" height="200">
          <div class="ml-2 d-flex flex-column">
            <p class="mb-0">{{ $item->item_name }}</p>
            <p class="mb-0">{{ $item->text}}</p>
            <p>{{ $item->pref }} {{ $item->city }}</p>
          </div>
        </div>
        <div class="card-footer d-flex justify-content-end">
          <div class="col text-end text-secondary">{{ $item->created_at->format('Y-m-d') }}</div>
        </div>
      </div>
    </div>

      <div class="col-md-5 m-3">
        <ul class="list-group">
          <p>allcomment</p>
          @forelse($comments as $comment)
            <li class="-list-group-item card">
              <div class="py-3 w-100 d-flex mx-2">
                <img src="{{ asset('storage/image/'.$comment->user->image) }}" class="rounded-circle" width="50" height="50">
                <div class="ml-2 d-flex flex-column">
                  <p class="mb-0">{{ $comment->user->name }}</p>
                  <p class="mb-0">{{ $comment->user->account_name }}</p>
                </div>
              </div>
              <div class="py-3 mx-2">
                {!! nl2br(e($comment->text)) !!}
              </div>
              <div class="text-secondary m-2">{{ $comment->created_at->format('Y-m-d H:i') }}</div>
            </li>
          @empty
          <li class="list-group-item">
            <p class="mb-0 text-secondary">NOCOMMENT</p>
          </li>
          @endforelse
          <li class="list-group-item">
            <div class="py-3">
              <form method="POST" action="{{ route('comments.store') }}">
                @csrf
                <div class="form-group row mb-0">
                  <div class="col-md-12 mt-2">
                    <input type="hidden" name="item_id" value="{{ $item->id }}">
                    <textarea name="text" class="form-control @error('text') is-invalid @enderror" required autocomplete="text" rows="4">{{ old('text') }}</textarea>
                    @error('text')
                    <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                  </div>
                </div>
                <div class="form-group row mb-0">
                  <div class="col-md-12 text-right">
                    <p class="mb-4 text-danger">140??</p>
                    <button type="submit" class="btn btn-primary">??????</button>
                  </div>
                </div> 
              </form>
            </div>
          </li>
        </ul>
      </div>
  </div>
</div>
  @endsection
  