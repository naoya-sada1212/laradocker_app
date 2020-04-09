@extends('layouts.app')
@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card">
        <div class="card-header p-3 d-flex">
          <img src="{{ $user->image }}" class="rounded-circle" width="50" height="50">
          <div class="ml-2 d-flex flex-column">
            <p class="mb-0">{{ $user->name }}</p>
            <p class="mb-0">{{ $user->account_name }}</p>
          </div>
        </div>
      </div>
    </div>
    <div class="card-body">
      <form action="{{ route('items.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        
        <div class="form-group row align-items-center">
          <lavel for="item_image" class="col-md-4 col-form-label text-md-right">写真</lavel>
          <div class="col-md-6 align-items-center">
            <input type="file" name="item_image" class="@error('item_image') is-invalid @enderror" autocomplete="item_image">
            @error('item_image')
              <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
              </span>
            @enderror
          </div>
        </div>

        <div class="form-group row">
          <lavel for="item_name" class="col-md-4 col-form-label text-md-right">落とし物名</lavel>
          <div class="col-md-6 align-items-center"h>
            <input type="text" name="item_name" class="@error('item_name') is-invalid @enderror" autocomplete="item_name">
            @error('item_name')
              <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
              </span>
            @enderror
          </div>
        </div>

        <div class="form-group row">
          <lavel for="text" class="col-md-4 col-form-label text-md-right">詳細</lavel>
          <div class="col-md-6 align-items-center">
            <textarea name="text" class="@error('text') is-invalid @enderror" autocomplete="text">{{ old('text') }}</textarea>
            @error('text')
              <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
              </span>
            @enderror
          </div>
        </div>

        <div class="form-group row">
          <lavel for="pref" class="col-md-4 col-form-label text-md-right">場所</lavel>
          <div class="col-md-6 align-items-center d-flex">
            <input type="text" name="pref" class="@error('pref') is-invalid @enderror" autocomplete="pref">県
            @error('pref')
              <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
              </span>
            @enderror
            <div class="col-md-6 align-items-center">
              <input type="text" name="city" class="@error('city') is-invalid @enderror" autocomplete="city">市
              @error('city')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
              @enderror
            </div>
          </div>
        </div>

        
        <div class="row justify-content-center">
          <div class="col-md-6 text-right">
            <input type="submit" value="投稿する">
          </div>
        </div>

      </form>
    </div>
  </div>
</div>
@endsection