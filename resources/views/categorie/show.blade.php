@extends('master')
@section('content')
@if(Session::has('error'))
<div class="container-fluid">
    <div class="alert alert-danger my-2 mx-2">{{Session::get('error')}}</div>
    @endif
    @if(Session::has('success'))
    <div class="alert alert-success">{{Session::get('success')}}</div>
    @endif                   
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    DataTable of categorie table
                    <a href="/addCategorie" type="button" class="btn btn-primary col-2 ml-2">ADD Categorie</a>
                </div>
                <div >
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr class="text-center">
                                <th scope="col">#</th>
                                <th scope="col">Title</th>
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
                                <td>{{$item->title}}</td>
                                <td>
                                    <a href="editCategorie/{{$item->id}}" type="button" class="btn btn-warning"><i class="fas fa-edit"></i></a>
                                    <a href="deleteCategorie/{{$item->id}}" type="button" class="btn btn-danger"><i class="fa fa-trash" aria-hidden="true"></i></a>
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