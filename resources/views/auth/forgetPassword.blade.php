@extends('layouts.app')
  
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col">
            <img class="img-responsive"src="{{ ('img/hello.svg') }}" style="width: auto; height: auto; margin-top: -100px">
        </div>
        <div class="col-md-4" style="margin-top: 40px;">
            <div style="margin-bottom: 50px;">
                <h2 style="font-weight: 900;"></h2>
                <h5 style="font-size: 11pt;"></h5>
            </div>
              <div class="card">
              <div class="card-header" style="text-align: center; background-color: #24FF00; font-weight: 700; font-size: 16pt; color: white;">Reset Password</div>
                  <div class="card-body">
  
                    @if (Session::has('message'))
                         <div class="alert alert-success" role="alert">
                            {{ Session::get('message') }}
                        </div>
                    @endif
  
                      <form action="{{ route('forget.password.post') }}" method="POST">
                          @csrf
                          <div class="form-group row">
                              <label for="email_address" class="col-md-4 col-form-label text-md-right">E-Mail Address</label>
                              <div class="col-md-6">
                                  <input type="text" id="email_address" class="form-control" name="email" required autofocus>
                                  @if ($errors->has('email'))
                                      <span class="text-danger">{{ $errors->first('email') }}</span>
                                  @endif
                              </div>
                          </div>
                          <div class="col-md-6 mt-2">
                              <button type="submit" class="btn mb-4" style="background-color: #24FF00; color: white;">
                                  Send
                              </button>
                          </div>
                      </form>                        
                  </div>
              </div>
          </div>
      </div>
  </div>
</main>
@endsection