@extends('layouts.app')
@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card">
        <div class="card-header p-3 d-flex">
          <img src="{{ asset('storage/image/'.$user->image) }}" class="rounded-circle" width="50" height="50">
          <div class="ml-2 d-flex flex-column">
            <p class="mb-0">{{ $user->name }}</p>
            <p class="mb-0">{{ $user->account_name }}</p>
          </div>
        </div>
      </div>
    </div>
    <div class="card-body">
      <form action="{{ url('users/'.$user->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        
        <div class="form-group row align-items-center">
          <lavel for="image" class="col-md-4 col-form-label text-md-right">写真</lavel>
          <div class="col-md-6 align-items-center">
            <input type="file" name="image" autocomplete="image">
          </div>
        </div>

        <div class="form-group row">
          <lavel for="name" class="col-md-4 col-form-label text-md-right">ユーザー名</lavel>
          <div class="col-md-6 align-items-center"h>
            <input type="text" name="name" class="@error('name') is-invalid @enderror" autocomplete="name" value="{{ old('name') }}">
            @error('name')
              <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
              </span>
            @enderror
          </div>
        </div>

        <div class="form-group row">
          <lavel for="account_name" class="col-md-4 col-form-label text-md-right">アカウント名</lavel>
          <div class="col-md-6 align-items-center d-flex">
            <input type="text" name="account_name" class="@error('account_name') is-invalid @enderror" autocomplete="account_name" value="{{ old('account_name') }}">
            @error('account_name')
              <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
              </span>
            @enderror
          </div>
        </div>

        
        <div class="row justify-content-center">
          <div class="col-md-6 text-right">
            <input type="submit" value="変更する">
          </div>
        </div>

      </form>
    </div>
  </div>
</div>
@endsection