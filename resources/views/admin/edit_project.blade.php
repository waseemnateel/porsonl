@extends('layouts.app')

@section('content')
<div class="container">
  <h2>Edit Project</h2>

  <form method="POST" action="{{ route('admin.projects.update', $project->id) }}" enctype="multipart/form-data">
    @csrf

    <div class="form-group mb-2">
      <label>Name</label>
      <input type="text" name="name" value="{{ $project->name }}" class="form-control" required>
    </div>

    <div class="form-group mb-2">
      <label>Category</label>
      <input type="text" name="category" value="{{ $project->category }}" class="form-control" required>
    </div>

    <div class="form-group mb-2">
      <label>Image (optional)</label><br>
      <img src="{{ asset('storage/' . $project->image) }}" width="120"><br>
      <input type="file" name="image" class="form-control mt-2">
    </div>

    <button type="submit" class="btn btn-success">Update</button>
  </form>
</div>
@endsection
