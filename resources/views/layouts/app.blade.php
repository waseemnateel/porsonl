<!DOCTYPE html>
<html>
<head>
    <title>Admin Panel</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
</head>
<body>
    @if(session('success'))
  <div class="alert alert-success text-center">
    {{ session('success') }}
  </div>
@endif
   <nav class="navbar navbar-expand-lg navbar-dark bg-dark px-4 justify-content-between">
    <a class="navbar-brand" href="">Dashboard</a>

    <ul class="navbar-nav">
        <li class="nav-item">
  <a class="nav-link" href="{{ route('admin.settings') }}">Site Settings</a>
</li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('admin.projects') }}">Projects</a>
        </li>
        <li class="nav-item">
    <a class="nav-link" href="{{ route('admin.profile_settings') }}">
        <i class="fas fa-user-cog"></i> الإعدادات الشخصية
    </a>
</li>
<li class="nav-item">
  <a class="nav-link" href="{{ route('admin.about.settings') }}">
    <i class="fas fa-user"></i> About Me Settings
  </a>
</li>
<li class="nav-item">
  <a class="nav-link" href="{{ route('admin.hero.settings') }}">
    <i class="fas fa-user"></i>Hero Settings
  </a>
</li>


        <li class="nav-item">
            <a class="nav-link" href="{{ route('admin.services') }}">Services</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('admin.messages') }}">Messages</a>
        </li>
    </ul>

    <div class="d-flex align-items-center text-white gap-3">
        <span>{{ Auth::user()->name }}</span>
        <form method="POST" action="{{ route('admin.logout') }}">
            @csrf
            <button class="btn btn-sm btn-outline-light">Logout</button>
        </form>
    </div>
</nav>
    <div class="py-4">
        @yield('content')
    </div>
</body>
</html>
