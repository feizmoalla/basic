@extends('admin.admin_master')

@section('admin')
    <div class="py-12">

        <div class="container">
            <div class="row">



                <div class="col-md-8">
                    <div class="card">


                        @if(session('success'))

                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <strong>{{ session('success') }}</strong>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>

                        @endif
                        <div class="card-header">Edit Brand</div>
                        <div class="card-body">
                        <form action="{{ url('brand/update/'.$brands->id) }}" method="POST" enctype="multipart/form-data">
                                @csrf


                                <input type="hidden" value="{{ $brands->brand_image }}" name="old_image">

                                <div class="form-group">
                                    <lable for="brand_name">Update Brand Name</label>
                                    <input type="text" class="form-control" name="brand_name" id="brand_name" aria-describedby="emailHelp" value="{{ $brands->brand_name }}">
                                        @error('brand_name')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                </div>

                                <div class="form-group">
                                    <lable for="brand_image">Update Brand Image</label>
                                    <input type="file" class="form-control" name="brand_image" id="brand_image" aria-describedby="emailHelp" >
                                        @error('brand_image')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                </div>

                                <div class="form-group">
                                    <img src="{{ asset($brands->brand_image) }}" alt="{{ $brands->brand_name }}" style="width:350px; height:400px"/>
                                </div>

                                <button type="submit" class="btn btn-success">Update Brand</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
