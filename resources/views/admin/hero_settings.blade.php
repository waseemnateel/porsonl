@extends('layouts.app')

@section('content')
<div class="container">
  <h2 class="mb-4">Hero Section Settings</h2>

  @if (session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
  @endif

  <form method="POST" action="{{ route('admin.hero.update') }}" enctype="multipart/form-data">
    @csrf

    <div class="form-group mb-3">
      <label for="hero_name">Name</label>
      <input type="text" name="hero_name" class="form-control" value="{{ $settings['hero_name'] ?? '' }}">
    </div>

    <div class="form-group mb-3">
      <label for="hero_title">Title</label>
      <input type="text" name="hero_title" class="form-control" value="{{ $settings['hero_title'] ?? '' }}">
    </div>

    <div class="form-group mb-3">
      <label for="profile_image">Profile Image</label>
      <input type="file" name="profile_image" class="form-control">
 @if(isset($settings['profile_image'])) <img src="{{ asset('storage/' . $settings['profile_image']) }}" alt="Profile" style="max-height: 150px; border: 1px solid #ccc; margin-top: 5px;">
 @endif
    </div>

    <div class="form-group mb-3">
      <label for="cv_file">CV File</label>
      <input type="file" name="cv_file" class="form-control">
      @if (!empty($settings['cv_file']))
        <a href="{{ asset('storage/' . $settings['cv_file']) }}" target="_blank" class="btn btn-sm btn-outline-info mt-2">View Current CV</a>
      @endif
    </div>

    <div class="form-group mb-3">
      <label for="linkedin">LinkedIn URL</label>
      <input type="url" name="linkedin" class="form-control" value="{{ $settings['linkedin'] ?? '' }}">
    </div>

    <div class="form-group mb-3">
      <label for="dribbble">Dribbble URL</label>
      <input type="url" name="dribbble" class="form-control" value="{{ $settings['dribbble'] ?? '' }}">
    </div>

    <div class="form-group mb-3">
      <label for="behance">Behance URL</label>
      <input type="url" name="behance" class="form-control" value="{{ $settings['behance'] ?? '' }}">
    </div>
     <div class="form-group mb-3">
      <label for="behance">Instagram URL</label>
      <input type="url" name="instagram" class="form-control" value="{{ $settings['instagram'] ?? '' }}">
    </div>


    <button type="submit" class="btn btn-primary">Save Changes</button>
  </form>
</div>
@endsection
