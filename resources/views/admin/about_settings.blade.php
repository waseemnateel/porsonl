@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h2>About Me Settings</h2>

    <form method="POST" action="{{ route('admin.about.update') }}" enctype="multipart/form-data">
        @csrf

        <div class="form-group mb-3">
            <label for="about_title">Title</label>
            <input type="text" name="about_title" class="form-control" value="{{ $settings['about_title'] ?? '' }}">
        </div>

        <div class="form-group mb-3">
            <label for="about_subtitle">Subtitle</label>
            <input type="text" name="about_subtitle" class="form-control" value="{{ $settings['about_subtitle'] ?? '' }}">
        </div>

        <div class="form-group mb-3">
            <label for="about_description">Description</label>
            <textarea name="about_description" class="form-control" rows="5">{{ $settings['about_description'] ?? '' }}</textarea>
        </div>

        <div class="form-group mb-3">
            <label for="about_cv">Upload CV (PDF/DOC)</label>
            <input type="file" name="about_cv" class="form-control">
            @if(isset($settings['about_cv']))
                <p>Current CV: <a href="{{ asset('storage/' . $settings['about_cv']) }}" target="_blank">Download</a></p>
            @endif
        </div>

        <div class="form-group mb-3">
            <label for="about_image">Upload Profile Image</label>
            <input type="file" name="about_image" class="form-control">
            @if(isset($settings['about_image']))
                <p>Current Image:</p>
                <img src="{{ asset('storage/' . $settings['about_image']) }}" alt="Profile" width="150">
            @endif
        </div>

        <button type="submit" class="btn btn-primary">Save</button>
    </form>
</div>
@endsection
