@extends('layouts.app')

@section('content')
<div class="container">
  <h2>Messages</h2>

  <table class="table table-bordered table-striped">
    <thead class="table-dark">
      <tr>
        <th>Name</th>
        <th>Email</th>
        <th>Phone</th>
        <th>Service</th>
        <th>Timeline</th>
        <th>Details</th>
        <th>Date</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($messages as $message)
        <tr>
          <td>{{ $message->name }}</td>
          <td>{{ $message->email }}</td>
          <td>{{ $message->phone }}</td>
          <td>{{ $message->service }}</td>
          <td>{{ $message->timeline }}</td>
          <td>{{ $message->details }}</td>
          <td>{{ $message->created_at->format('Y-m-d') }}</td>
        </tr>
      @endforeach
    </tbody>
  </table>
</div>
@endsection
