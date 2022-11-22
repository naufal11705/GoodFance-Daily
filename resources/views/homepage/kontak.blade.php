@extends('layouts.template')
@section('content')
<div class="container">
  <div class="row">
    <div class="col">
      <h1>Kontak Kami</h1>
        <a href="{{ URL::to('chat') }}" class="btn btn-sm btn-outline-secondary" style="padding-top: 7px; width: 37px;">
          <i class="far fa-comment"></i> 
        </a>
    </div>
  </div>
</div>
@endsection