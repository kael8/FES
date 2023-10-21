@extends('content.academic-admin.layouts.contentNavbarLayout')

@section('title', 'Tables - Basic Tables')

@section('content')

<h4 class="fw-bold py-3 mb-4">
  <span class="text-muted fw-light">Tables /</span> Basic Tables
</h4>



<!-- Responsive Table -->
<div class="card">
  <h5 class="card-header">Responsive Table</h5>
  <div class="table-responsive text-nowrap">
    <table class="table">
      <thead>
        <tr class="text-nowrap">
          <th>Faculty ID</th>
          <th>Name</th>
          <th>Department</th>
          <th>Academic Term</th>
          <th>Action</th>
          
        </tr>
      </thead>
      <tbody>
      @foreach ($result as $item)
      <tr>
          <th scope="row">{{ $item->studentID }}</th>
          <td>{{ $item->name }}</td>
          <td>{{ $item->department_name }}</td>
          <td>{{ $item->rating_period }}</td>
          <td>
            <a href="{{ url('/academic-admin/summary-eval') }}?evalid={{ $item->id }}" class="btn btn-primary btn-sm">View</a>
      </tr>
      @endforeach

      </tbody>
    </table>
  </div>
</div>
<!--/ Responsive Table -->
@endsection
