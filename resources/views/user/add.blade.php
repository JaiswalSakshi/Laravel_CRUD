@extends('master')
@section('content')
<div class="container">
    
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    ADD User page<a href="/showuser" type="button" class="btn btn-primary col-3 ml-2">Show User</a>
                </div>
                <!-- /.card-header -->
                
                <form class="my-5" method="POST" action="/addUser_insert" enctype="multipart/form-data">
                        @csrf
                        @if(Session::has('error'))
                        <div class="alert alert-danger">{{Session::get('errMsg')}}</div>
                        @endif
                        @if(Session::has('success'))
                        <div class="alert alert-success">{{Session::get('success')}}</div>
                        @endif

                        <div class="row mb-3 text-center">
                            <label for="name" class="col-md-4 col-form-label text-md-end">Name</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        
                        <!-- name, email, password, avatar, birthdate, address, gender, hobbies -->
                        <div class="row mb-3 text-center">
                            <label for="email" class="col-md-4 col-form-label text-md-end">Email</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3 text-center">
                            <label for="username" class="col-md-4 col-form-label text-md-end">Username</label>

                            <div class="col-md-6">
                                <input id="username" type="text" class="form-control @error('username') is-invalid @enderror" name="username" value="" required autocomplete="username" autofocus>

                                @error('username')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3 text-center">
                            <label for="password" class="col-md-4 col-form-label text-md-end">Password</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" value="" required autocomplete="password" autofocus>

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3 text-center">
                            <label for="cpassword" class="col-md-4 col-form-label text-md-end">Confirm Password</label>

                            <div class="col-md-6">
                                <input id="cpassword" type="password" class="form-control @error('cpassword') is-invalid @enderror" name="cpassword" value="" required autocomplete="cpassword" autofocus>

                                @error('cpassword')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3 text-center">
                            <label for="role_id" class="col-md-4 col-form-label text-md-end">User Role (Role)</label>

                            <div class="col-md-6">
                                <select name="role_id" value="role_id" class="form-control">
                                    @foreach($data as $s)
                                    <option value="{{$s->id}}">{{$s->role}}</option>
                                    @endforeach
                                </select>
                                @error('category_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3 text-center">
                            <label for="address" class="col-md-4 col-form-label text-md-end">Address</label>

                            <div class="col-md-6">
                                <input id="address" type="text" class="form-control @error('address') is-invalid @enderror" name="address" value="" required autocomplete="address" autofocus>

                                @error('address')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3 text-center">
                            <label for="hobbies" class="col-md-4 col-form-label text-md-end">Hobbies</label>

                            <div class="col-md-6">
                                <input id="hobbies" type="text" class="form-control @error('hobbies') is-invalid @enderror" name="hobbies" value="" required autocomplete="hobbies" autofocus>

                                @error('hobbies')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3 text-center">
                            <label for="gender" class="col-md-4 col-form-label text-md-end">Gender</label>

                            <div class="form-check">
                            <input class="form-check-input" type="radio" name="gender" id="male" value="male" required>
                            <label class="form-check-label" for="male">
                                Male
                            </label>
                            </div>
                            <div class="form-check">
                            <input class="form-check-input" type="radio" name="gender" id="female" value="female" required checked>
                            <label class="form-check-label" for="female">
                                Female    
                            </label>
                            </div>
                        </div>
                        <div class="row mb-3 text-center">
                            <label for="birthdate" class="col-md-4 col-form-label text-md-end">birthdate</label>

                            <div class="col-md-6">
                                <input id="birthdate" type="date" class="form-control @error('birthdate') is-invalid @enderror" name="birthdate" value="" required autocomplete="birthdate" autofocus>

                                @error('birthdate')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3 text-center">
                            <label for="avatar" class="col-md-4 col-form-label text-md-end">Avatar</label>

                            <div class="col-md-6">
                                <input id="avatar" type="file" class=" @error('avatar') is-invalid @enderror" name="avatar" required autocomplete="avatar" autofocus>

                                @error('avatar')
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