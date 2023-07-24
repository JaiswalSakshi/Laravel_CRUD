@extends('master')
@section('content')
<div class="container">
    
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    Edit Product page<a href="/showProduct" type="button" class="btn btn-primary col-3 ml-2">Show Product</a>
                </div>
                <!-- /.card-header -->
                
                <form class="my-5" method="POST" action="/editProduct_update" enctype="multipart/form-data">
                        @csrf
                        
                        @if(Session::has('error'))
                        <div class="alert alert-danger">{{Session::get('errMsg')}}</div>
                        @endif
                        @if(Session::has('success'))
                        <div class="alert alert-success">{{Session::get('success')}}</div>
                        @endif

                        <div class="row mb-3 text-center">
                            <label for="name" class="col-md-4 col-form-label text-md-end">Product Name</label>

                            <div class="col-md-6">
                                <input id="name" type="name" class="form-control @error('name') is-invalid @enderror" name="name" value="{{$data->name}}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3 text-center">
                            <label for="price" class="col-md-4 col-form-label text-md-end">Product price</label>

                            <div class="col-md-6">
                                <input id="price" type="number" class="form-control @error('price') is-invalid @enderror" name="price" value="{{ $data->price }}" required autocomplete="price" autofocus>

                                @error('price')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3 text-center">
                            <label for="category_id" class="col-md-4 col-form-label text-md-end">Product Type (categorie)</label>

                            <div class="col-md-6">
                                <select name="category_id" value="category_id" class="form-control">
                                    @foreach($sel as $s)
                                    <option value="{{$s->id}}">{{$s->title}}</option>
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
                            <label for="description" class="col-md-4 col-form-label text-md-end">Product description</label>

                            <div class="col-md-6">
                                <input id="description" type="text" class="form-control @error('price') is-invalid @enderror" name="description" value="{{ $data->description }}" required autocomplete="description" autofocus>

                                @error('description')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3 text-center">
                            <label for="sku" class="col-md-4 col-form-label text-md-end">Product sku</label>

                            <div class="col-md-6">
                                <input id="sku" type="text" class="form-control @error('sku') is-invalid @enderror" name="sku" value="{{ $data->sku }}" required autocomplete="sku" autofocus>

                                @error('sku')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3 text-center">
                            <label for="manufactured_date" class="col-md-4 col-form-label text-md-end">manufactured_date</label>

                            <div class="col-md-6">
                                <input id="manufactured_date" type="date" class="form-control @error('manufactured_date') is-invalid @enderror" name="manufactured_date" value="{{ $data->manufactured_date }}" required autocomplete="manufactured_date" autofocus>

                                @error('manufactured_date')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3 text-center">
                            <label for="expiry_date" class="col-md-4 col-form-label text-md-end">expiry_date</label>

                            <div class="col-md-6">
                                <input id="expiry_date" type="date" class="form-control @error('expiry_date') is-invalid @enderror" name="expiry_date" value="{{ $data->expiry_date }}" required autocomplete="expiry_date" autofocus>

                                @error('expiry_date')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3 text-center">
                            <label for="image" class="col-md-4 col-form-label text-md-end">Product image</label>

                            <div class="col-md-6">
                                <input id="image" type="file" class=" @error('image') is-invalid @enderror" name="image" title="{{$data->image}}" required autocomplete="image" autofocus>
                                <img src="{{'/uploads/'.$data->image}}" height="40" width="40">
                                @error('image')
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