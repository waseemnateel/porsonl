@extends('layouts.app')

@section('content')
<div class="container">
  <h2 class="mb-4">General Site Settings</h2>

  @if (session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
  @endif

  <form method="POST" action="{{ route('admin.settings.update') }}">
    @csrf

    <div class="form-group mb-3">
      <label>Email</label>
      <input type="email" name="site_email" value="{{ $settings['site_email'] ?? '' }}" class="form-control" />
    </div>

    <div class="form-group mb-3">
      <label>Phone</label>
      <input type="text" name="site_phone" value="{{ $settings['site_phone'] ?? '' }}" class="form-control" />
    </div>

    <div class="form-group mb-3">
      <label>Instagram</label>
      <input type="text" name="instagram" value="{{ $settings['instagram'] ?? '' }}" class="form-control" />
    </div>

    <div class="form-group mb-3">
      <label>LinkedIn</label>
      <input type="text" name="linkedin" value="{{ $settings['linkedin'] ?? '' }}" class="form-control" />
    </div>

    <div class="form-group mb-3">
      <label>Footer Text</label>
      <input type="text" name="footer_text" value="{{ $settings['footer_text'] ?? '' }}" class="form-control" />
    </div>

    <button type="submit" class="btn btn-primary">Save Settings</button>
  </form>
</div>
@endsection
