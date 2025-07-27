@extends('layouts.app')

@section('content')
<div class="container">
  <h2 class="mb-4">Edit Service</h2>

  <form method="POST" action="{{ route('admin.services.update', $service->id) }}" enctype="multipart/form-data">
    @csrf

    <div class="form-group mb-3">
      <label for="title">Title:</label>
      <input type="text" name="title" id="title" value="{{ $service->title }}" class="form-control" required>
    </div>

    <div class="form-group mb-3">
      <label for="description">Description:</label>
      <textarea name="description" id="description" class="form-control" required>{{ $service->description }}</textarea>
    </div>

    <div class="form-group mb-3">
      <label for="icon_image">Current Icon:</label><br>
      @if ($service->icon_image)
        <img src="{{ asset('storage/' . $service->icon_image) }}" alt="Icon" style="width:50px; margin-bottom:10px;">
      @else
        <p>No icon image uploaded.</p>
      @endif
    </div>

    <div class="form-group mb-3">
      <label for="icon_image">Upload New Icon (optional):</label>
      <input type="file" name="icon_image" id="icon_image" class="form-control">
    </div>

    <button type="submit" class="btn btn-primary">Update Service</button>
    <a href="{{ route('admin.services.index') }}" class="btn btn-secondary">Cancel</a>
  </form>
</div>
@endsection
