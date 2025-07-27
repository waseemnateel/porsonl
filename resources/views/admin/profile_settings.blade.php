@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="mb-4">About Me Settings</h2>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <form action="{{ route('admin.profile_settings.update') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <!-- About Title -->
        <div class="mb-3">
            <label for="about_title" class="form-label">About Title</label>
            <input type="text" name="about_title" class="form-control" value="{{ $settings['about_title'] ?? '' }}">
        </div>

        <!-- Subtitle -->
        <div class="mb-3">
            <label for="about_subtitle" class="form-label">About Subtitle</label>
            <input type="text" name="about_subtitle" class="form-control" value="{{ $settings['about_subtitle'] ?? '' }}">
        </div>

        <!-- Description -->
        <div class="mb-3">
            <label for="about_description" class="form-label">About Description</label>
            <textarea name="about_description" rows="5" class="form-control">{{ $settings['about_description'] ?? '' }}</textarea>
        </div>

        <!-- About Image -->
        <div class="mb-3">
            <label for="about_image" class="form-label">Profile Image</label>
            <input type="file" name="about_image" class="form-control">
            @if (!empty($settings['about_image']))
                <img src="{{ asset('storage/' . $settings['about_image']) }}" alt="Profile Image" width="120" class="mt-2">
            @endif
        </div>

        <!-- CV Upload -->
        <div class="mb-3">
            <label for="cv_file" class="form-label">Upload CV</label>
            <input type="file" name="cv_file" class="form-control">
            @if (!empty($settings['cv_file']))
                <a href="{{ asset('storage/' . $settings['cv_file']) }}" target="_blank" class="btn btn-sm btn-outline-primary mt-2">Download Current CV</a>
            @endif
        </div>

        <!-- Submit -->
        <button type="submit" class="btn btn-primary">Save Settings</button>
    </form>
</div>
@endsection
