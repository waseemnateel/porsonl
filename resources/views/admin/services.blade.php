@extends('layouts.app')

@section('content')
<div class="container">
  <h2 class="mb-4">Services</h2>

  {{-- Form لإضافة خدمة جديدة --}}
  <form method="POST" action="{{ route('admin.services.store') }}" class="mb-5" enctype="multipart/form-data">
    @csrf

    <div class="form-group mb-3">
      <label for="title">Title:</label>
      <input type="text" name="title" id="title" class="form-control" required>
    </div>

    <div class="form-group mb-3">
      <label for="description">Description:</label>
      <textarea name="description" id="description" class="form-control" required></textarea>
    </div>

    <div class="form-group mb-3">
      <label for="icon_image">Upload Icon Image:</label>
      <input type="file" name="icon_image" id="icon_image" class="form-control" required>
    </div>

    <button type="submit" class="btn btn-success">Add Service</button>
  </form>

  {{-- جدول عرض الخدمات --}}
  <table class="table table-bordered table-hover table-striped table-dark">
    <thead class="thead-light">
      <tr>
        <th>Icon Image</th>
        <th>Title</th>
        <th>Description</th>
        <th>Actions</th>
      </tr>
    </thead>

    <tbody>
      @foreach ($services as $service)
        <tr>
          <td>
            @if ($service->icon_image)
              <img src="{{ asset('storage/' . $service->icon_image) }}" alt="icon" style="width:40px;">
            @else
              —
            @endif
          </td>
          <td>{{ $service->title }}</td>
          <td>{{ $service->description }}</td>
          <td>
            <a href="{{ route('admin.services.edit', $service->id) }}" class="btn btn-warning btn-sm">Edit</a>
            <form action="{{ route('admin.services.delete', $service->id) }}" method="POST" style="display:inline-block;">
              @csrf
              @method('DELETE')
              <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">Delete</button>
            </form>
          </td>
        </tr>
      @endforeach
    </tbody>
  </table>
</div>
@endsection
