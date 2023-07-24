@extends('master')
@section('content')
<div class="container">
    
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    Edit categorie here<a href="/showCategorie" type="button" class="btn btn-primary col-3 ml-2">Show Categorie</a>
                </div>
                <!-- /.card-header -->
                
                <form class="my-5" method="POST" action="/editCategorie_update">
                        @csrf
                        
                        <div class="row mb-3 text-center">
                            <label for="title" class="col-md-4 col-form-label text-md-end">TITLE</label>

                            <div class="col-md-6">
                                <input id="title" type="text" class="form-control @error('title') is-invalid @enderror" name="title" value="{{$data->title}}" required autocomplete="title" autofocus>

                                @error('title')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4 ml-auto">
                                <input type="hidden" name="pid" value="{{$data->id}}">
                                <input type="submit" value="submit" class="btn btn-success">
                            </div>
                        </div>
                    </form>
            </div>
        </div>
    </div>
</div>
@endsection