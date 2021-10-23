<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            All Category
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

                        <div class="card-header">All Category</div>
                        <div class="card-body">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col">SL No</th>
                                        <th scope="col">User ID</th>
                                        <th scope="col">Category Name</th>
                                        <th scope="col">Created At</th>
                                        <th scope="col">Updated At</th>
                                        <th scope="col">Deleted At</th>
                                        <th scope="col">Action</th>

                                    </tr>
                                </thead>
                                <tbody>

                                    <!-- @php($i = 1) -->
                                    @foreach($categories as $category)
                                    <tr>
                                    <td>{{ $categories->firstItem()+$loop->index }}</td>
                                    <!-- <td>{{ $category->user_id }}</td> -->
                                    <td>{{ $category->user->name }}</td>

                                    <td>{{ $category->category_name }}</td>
                                    <td>

                                    @if($category->created_at == NULL)
                                        <span class="text-danger">No Date Set</span>                                        @else
                                        {{ Carbon\Carbon::parse($category->created_at)->diffForHumans() }}
                                        @endif
                                    </td>
                                    <td>

                                        @if($category->updated_at == NULL)
                                        <span class="text-danger">No Date Set</span>                                        @else
                                        {{ Carbon\Carbon::parse($category->updated_at)->diffForHumans() }}
                                        @endif

                                    </td>
                                    <td>
                                        @if($category->deleted_at == NULL)
                                        <span class="text-danger">No Date Set</span>
                                        @else
                                        {{ Carbon\Carbon::parse($category->deleted_at)->diffForHumans() }}
                                        @endif
                                    </td>
                                    <td>
                                        <a href="{{ url('category/edit/'.$category->id) }}" class="btn btn-info">Edit</a>
                                        <a href="{{ url('softdelete/category/'.$category->id) }}" class="btn btn-danger">Remove </a>

                                    </td>

                                    </tr>
                                    @endforeach

                                </tbody>
                            </table>
                            {{ $categories->links() }}
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-header">Add Category</div>
                        <div class="card-body">
                            <form action="{{ route('store.category') }}" method="POST">
                                @csrf
                                <div class="form-group">
                                    <lable for="">Category Name</label>
                                    <input type="text" class="form-control" name="category_name" id="exampleInputEmail" aria-describedby="emailHelp">
                                        @error('category_name')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                </div>
                                <button type="submit" class="btn btn-primary">Add Category</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>








        <div class="container">
            <div class="row">


                <div class="col-md-8">
                    <div class="card">



                        <div class="card-header">Trash List</div>
                        <div class="card-body">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col">SL No</th>
                                        <th scope="col">User ID</th>
                                        <th scope="col">Category Name</th>
                                        <th scope="col">Created At</th>
                                        <th scope="col">Updated At</th>
                                        <th scope="col">Deleted At</th>
                                        <th scope="col">Action</th>

                                    </tr>
                                </thead>
                                <tbody>

                                    <!-- @php($i = 1) -->
                                    @foreach($trashCat as $category)
                                    <tr>
                                    <td>{{ $categories->firstItem()+$loop->index }}</td>
                                    <!-- <td>{{ $category->user_id }}</td> -->
                                    <td>{{ $category->user->name }}</td>

                                    <td>{{ $category->category_name }}</td>
                                    <td>

                                    @if($category->created_at == NULL)
                                        <span class="text-danger">No Date Set</span>                                        @else
                                        {{ Carbon\Carbon::parse($category->created_at)->diffForHumans() }}
                                        @endif
                                    </td>
                                    <td>

                                        @if($category->updated_at == NULL)
                                        <span class="text-danger">No Date Set</span>                                        @else
                                        {{ Carbon\Carbon::parse($category->updated_at)->diffForHumans() }}
                                        @endif

                                    </td>
                                    <td>
                                        @if($category->deleted_at == NULL)
                                        <span class="text-danger">No Date Set</span>
                                        @else
                                        {{ Carbon\Carbon::parse($category->deleted_at)->diffForHumans() }}
                                        @endif
                                    </td>
                                    <td>
                                        <a href="{{ url('category/restore/'.$category->id) }}" class="btn btn-success">Restore</a>
                                        <a href="{{ url('pdelete/category/'.$category->id) }}" class="btn btn-danger">P Delete </a>

                                    </td>

                                    </tr>
                                    @endforeach

                                </tbody>
                            </table>
                            {{ $trashCat->links() }}
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card">

                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
