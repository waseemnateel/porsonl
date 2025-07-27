@extends('layouts.app')

@section('content')
<div class="container">
  <h2>Projects</h2>

  <form method="POST" action="{{ route('admin.projects.store') }}" enctype="multipart/form-data" class="mb-4">
    @csrf
    <div class="form-group mb-2">
      <label>Name:</label>
      <input type="text" name="name" class="form-control" required>
    </div>
    <div class="form-group mb-2">
      <label>Category:</label>
      <input type="text" name="category" class="form-control" required>
    </div>
    <div class="form-group mb-2">
      <label>Image:</label>
      <input type="file" name="image" class="form-control" required>
    </div>
    <button type="submit" class="btn btn-success">Add Project</button>
  </form>

 <table class="table table-dark">
    <thead>
        <tr>
            <th>Name</th>
            <th>Category</th>
            <th>Image</th>
            <th>Actions</th> {{-- هنا أضفنا العمود الجديد --}}
        </tr>
    </thead>
    <tbody>
        @foreach ($projects as $project)
            <tr>
                <td>{{ $project->name }}</td>
                <td>{{ $project->category }}</td>
                <td>
                    <img src="{{ asset('storage/' . $project->image) }}" alt="Project Image" width="100">
                </td>
                <td>
                    <a href="{{ route('admin.projects.edit', $project->id) }}" class="btn btn-warning btn-sm">Edit</a>

                    <form action="{{ route('admin.projects.delete', $project->id) }}" method="POST" style="display:inline-block">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('هل أنت متأكد من الحذف؟')">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>

</div>
@endsection
