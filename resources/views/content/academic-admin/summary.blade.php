@extends('content.academic-admin.layouts.contentNavbarLayout')

@section('title', 'Tables - Basic Tables')

@section('content')

<link rel="stylesheet" type="text/css" href="{{ asset('storage/css/print-button.css') }}">

<style>
  /* Apply styles only when printing */
  @media print {
    @page {
      margin: 0;
    }

    /* Adjust margins for specific elements, if necessary */
    .container {
      padding: 15px; /* Set your desired padding value */
    }
    #head-text{
      font-size: 10px;
    }
    table, th, td, p, h6 {
      color: black !important;
    }
    hr.my-1 {
      border: 1px solid black; /* Adjust the border thickness as needed */
      color: black;
    }
    #document {
      box-shadow: none;
    }
    table {
    border: 0.5px solid black !important; /* Add a black border to the table */
    }
    thead th {
    border-bottom: 1px solid black !important; /* Set the bottom border of <th> in the <thead> to black */
    }
    tbody {
    border-top: 1px solid black !important; /* Set the top border of <tbody> to black */
  }

  }

  
</style>

<h4 class="fw-bold py-3 mb-4">
  <span class="text-muted fw-light">Tables /</span> Basic Tables
</h4>

<!-- Bordered Table -->
<div class="card parent-div d-flex justify-content-center align-items-center" id = "document">
  <div class="justify-content-center child-div" style="width: 90%;">
    <div class="app-brand demo justify-content-center card-header">
      <div class="container d-flex justify-content-center align-items-center">
        <div class="row">
          <div class="col-md-6">
            <a href="{{url('/')}}" class="app-brand-link">
              <span class="app-brand-logo demo">
                @include('_partials.slsu_header')
              </span>
              <span class="app-brand-text p-1"></span>
            </a>
          </div>
          <div class="col-md-6">
            <p>MAIN CAMPUS
              <br>Roque, Sogod, Southern Leyte
              <br>Email: president@southernleytestateu.edu.ph
              <br>Website: www.southernleytestateu.edu.ph</p>
          </div>
        </div>
      </div>

    
      
    </div>
    <div class="card-body">
      <div class="align-center text-center" style=" margin: 0 auto;">
        <p id = "head-text"class="my-0">Excellence | Service | Leadership and Good Governance | Innovation | Social Responsibility | Integrity | Professionalism | Spirituality</p>
        <hr class="my-1">
      </div>
      <br>
      <div class="align-center text-center" style="margin: 0 auto;">
        <h6>COLLEGE OF COMPUTER STUDIES AND INFORMATION TECHNOLOGY</h6>
        <h6>Summary of Faculty Performance Student Evaluation</h6>
      </div>
      <div>
        <p class="my-0">Rating Period: {{ $result->rating_period }}</p>
        <p class="my-0">Name of Faculty: {{ $result->name}}</p>
        <p class="my-0">Contract of Service: {{ $result->userType }}</p>
        <p class="my-0">College/Department: {{ $result->department_name }}</p>
      </div>
      <br>
      <div class="table-responsive text-nowrap">
        <table class="table table-bordered">
          <thead>
            <tr>
              <th>EVALUATION CRITERIA</th>
              <th class="text-center">AVERAGE RATING SCORE</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>COMMITMENT (25)</td>
              <td class="text-center">{{ $result->A }}</td>
            </tr>
            <tr>
              <td>KNOWLEDGE OF THE SUBJECT (25)</td>
              <td class="text-center">{{ $result->B }}</td>
            </tr>
            <tr>
              <td>TEACHING FOR INDEPENDENT LEARNING (25)</td>
              <td class="text-center">{{ $result->C }}</td>
            </tr>
            <tr>
              <td>MANAGEMENT OF LEARNING (25)</td>
              <td class="text-center">{{ $result->D }}</td>
            </tr>
            <tr>
              <td class="text-end">Total Overall Rating</td>
              <td class="text-center">{{ $result->total }}</td>
            </tr>
          </tbody>
        </table>
        <br>
        <br>
        <br>
        <br>
        <h6>Certified true and correct:</h6>
        <h6>JAMES BRIAN FLORES, PhD
        <br>Department Head, CCSIT</h6>
        

      </div>
      <!-- Add this button at the bottom of your content -->


    </div>
  </div>
</div>
<div class="container p-3 d-flex justify-content-end">
  <button id="printButton">Print Document<span></span></button>
</div>


<!--/ Bordered Table -->

<script src="{{ asset(mix('assets/vendor/libs/jquery/jquery.js')) }}"></script>
<script src="https://printjs-4de6.kxcdn.com/print.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>

    <!-- Another Jquery version, which will be compatible with PrintThis.js -->
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <!-- CDN/Reference To the pluggin PrintThis.js -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/printThis/1.15.0/printThis.js"
        integrity="sha512-Fd3EQng6gZYBGzHbKd52pV76dXZZravPY7lxfg01nPx5mdekqS8kX4o1NfTtWiHqQyKhEGaReSf4BrtfKc+D5w=="
        crossorigin="anonymous"></script>

<script>
  var j = jQuery.noConflict(true);

document.getElementById("printButton").addEventListener("click", function () {
  j('#document').printThis({
    importCSS: true,
    importStyle: true,
    loadCSS: true,
    canvas: true
  });
});


</script>






<script src="{{ asset('storage/js/summary.js') }}"></script>

@endsection
