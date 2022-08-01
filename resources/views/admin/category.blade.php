@extends('admin.layout')
@section('container')
<div class="container-fluid pt-4 px-4">
    <div class="row g-4">
        <div class="col-12">
            <div class="bg-light rounded h-100 p-4">
                <h3 class="mb-4">Categories</h3>
                <a href="{{'category/add-new'}}">
                    <h6 class="mb-4">Add New</h6>
                </a>
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Category Name1</th>
                                <th scope="col">Description</th>
                                <th scope="col">Status</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php $i=1; @endphp
                            @foreach($categories as $category)

                            <tr>
                                <th scope="row">{{$i++}}</th>
                                <td>{{$category->category_name}}</td>
                                <td>{{$category->description}}</td>
                                <td>{{$category->status==1?'Active':'Inactive'}}</td>
                                <td><a href="{{'/admin/category/edit/'.$category->id}}">Edit</a> / <a
                                        href="{{'/admin/category/delete/'.$category->id}}">Delete</a></td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection