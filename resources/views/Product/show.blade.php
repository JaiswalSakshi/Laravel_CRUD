@extends('master')
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    DataTable of Product table
                    <a href="/addProduct" type="button" class="btn btn-primary col-2 ml-2">ADD Product</a>
                </div>
                <div >
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr class="text-center">
                                <th scope="col">#</th>
                                <th scope="col">category_id</th>
                                <th scope="col">name</th>
                                <th scope="col">price</th>
                                <th scope="col">image</th>
                                <th scope="col">description</th>
                                <th scope="col">sku</th>
                                <th scope="col">manufactured_date</th>
                                <th scope="col">expiry_date</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                            $id=1;
                            @endphp
                            @foreach($data as $item)
                            <tr class="text-center">

                                <td >{{$id++}}</td>
                                <td>{{$item->category_id}}</td>
                                <td>{{$item->name}}</td>
                                <td>{{$item->price}}</td>
                                <td><img src="{{'/uploads/'.$item->image}}" height="40" width="40"></td>
                                <td>{{$item->description}}</td>
                                <td>{{$item->sku}}</td>
                                <td>{{$item->manufactured_date}}</td>
                                <td>{{$item->expiry_date}}</td>
                                <td>
                                    <a href="editProduct/{{$item->id}}" type="button" class="btn btn-warning"><i class="fas fa-edit"></i></a>
                                    <a href="deleteProduct/{{$item->id}}" type="button" class="btn btn-danger"><i class="fa fa-trash" aria-hidden="true"></i></a>
                                </td>
                            </tr>
                            @endforeach
                            <!-- modal -->
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection