@extends('admin.layout')
@section('container')
<div class="container-fluid pt-4 px-4">
    <div class="row g-4">
        <div class="col-sm-12">
            <div class="bg-light rounded h-100 p-4">
                <h4 class="mb-4">Add New Category</h4>
                <a href="{{'/admin/category'}}">
                    <h6 class="mb-4">
                        << Back</h6>
                </a>
                <form action="{{'/admin/category/add-new'}}" method="post">
                    @CSRF
                    <div class="mb-3">
                        <label for="catName" class="form-label">Category Name</label>
                        <input type="text" name="category_name" value="" class="form-control" id="catName"
                            aria-describedby="catName">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Description</label>
                        <textarea name="description" class="form-control" id=""></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Status</label>
                        <select class="form-select form-select-sm mb-3" name="status">
                            <option value="1">Active</option>
                            <option value="0">Inactive</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Save</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection