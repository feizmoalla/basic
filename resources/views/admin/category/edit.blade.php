<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Edit Category
        </h2>
    </x-slot>

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

                        <div class="card-header">Edit Category</div>
                        <div class="card-body">
                        <form action="{{ url('category/update/'.$categories->id) }}" method="POST">
                                @csrf
                                <div class="form-group">
                                    <lable for="">Update Category Name</label>
                                    <input type="text" class="form-control" name="category_name" id="exampleInputEmail" aria-describedby="emailHelp" value="{{ $categories->category_name }}">
                                        @error('category_name')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                </div>
                                <button type="submit" class="btn btn-success">Update Category</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
