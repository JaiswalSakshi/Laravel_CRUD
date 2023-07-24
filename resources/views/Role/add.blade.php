@extends('master')
@section('content')
<div class="container">   
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    ADD Role
                    <a href="/showRole" type="button" class="btn btn-primary col-2 ml-2">Show Role</a>
                </div>
                <!-- /.card-header -->
                
                <form class="my-5" method="POST" action="/addRole_insert">
                        @csrf
                        
                        <div class="row mb-3 text-center">
                            <label for="role" class="col-md-4 col-form-label text-md-end">Role</label>

                            <div class="col-md-6">
                                <input id="role" type="text" class="form-control @error('role') is-invalid @enderror" name="role" value="{{ old('role') }}" required autocomplete="role" autofocus>

                                @error('role')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4 ml-auto">
                                <input type="submit" value="submit" class="btn btn-success">
                            </div>
                        </div>
                    </form>
            </div>
        </div>
    </div>
</div>
@endsection