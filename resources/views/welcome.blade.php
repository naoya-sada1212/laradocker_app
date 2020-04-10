@extends('layouts.app')
<style>
    .jumbotron {
        background: rgba(255, 0, 0, 0.3);
    }
</style>

@section('content')
<div class="container">
    <div class="jumbotron" style="background:rgba(255, 255, 255, 0.5); height:600px;">
          <h1 class="display-4">落とし物BOX</h1>
          <p class="lead">落とし物を見つけたらアップしよう！！</p>
          <p class="lead">落とし物を探そう！！</p> 
          <hr class="my-4">
          <a class="btn btn-primary btn-lg" href="{{ url('login') }}" role="button">Login</a>
      </div>
    </div>
</div>
@endsection