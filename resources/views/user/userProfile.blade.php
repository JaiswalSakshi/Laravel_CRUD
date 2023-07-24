@extends('master')
@section('content')
<div class="container">
    
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                User Profile<a href="/updateProfile" type="button" class="btn btn-primary col-3 ml-2">Update Profile</a>
                </div>
                <!-- /.card-header -->
                
                <section class="container mt-1 bg-white">
            
             <div class="row">
                <div class="col-sm-5 my-auto">                  
                    <img src="{{('/uploads/'.$data->avatar)}}" height="200" width="200" class="rounded-circle">
                </div>
                <!-- name, email, password, avatar, birthdate, address, gender, hobbies -->
                <div class="col-sm-5 padding-right my-auto text-left">
                    <h5 class="">Name-  {{$data->name}}</h5>
                    <h5 class="">Email- {{$data->email}}</h5>
                    <h5 class="">User Name- {{$data->username}}</h5>
                    <h5 class="">Birthdate- {{$data->birthdate}}</h5>
                    <h5 class="">Address- {{$data->address}}</h5>
                    <h5 class="">Gender- {{$data->gender}}</h5>
                    <h5 class="">Hobbies- {{$data->hobbies}}</h5>
                </div>
             </div>
        </section>
            </div>
        </div>
    </div>
</div>
@endsection