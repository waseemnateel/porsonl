
@section('content')
<div class="container">
  <h1>Welcome to Admin Dashboard</h1>
  @foreach($contacts as $contact)
  <tr>
    <td>{{ $contact->name }}</td>
    <td>{{ $contact->email }}</td>
    <td>{{ $contact->service }}</td>
    <td>{{ $contact->timeline }}</td>
    <td>{{ $contact->details }}</td>
  </tr>
@endforeach

</div>
@endsection
