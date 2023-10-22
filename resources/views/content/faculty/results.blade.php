@extends('content.faculty.layouts.contentNavbarLayout')

@section('title', 'Tables - Basic Tables')

@section('content')

<h4 class="fw-bold py-3 mb-4">
  <span class="text-muted fw-light">Tables /</span> Basic Tables
</h4>

<!-- Responsive Table -->
<div class="card">
  <h5 class="card-header">Responsive Table</h5>
  <canvas class="card-body" id="myChart" style="width:100%;max-width:100%"></canvas>
  
</div>
<hr class="my-3">
<div class="card" id = "res" style="display: none;">
  <div class="card-body">
      <br>
      <div class="align-center text-center" style="margin: 0 auto;">
        <h6>COLLEGE OF COMPUTER STUDIES AND INFORMATION TECHNOLOGY</h6>
        <h6>Summary of Faculty Performance Student Evaluation</h6>
      </div>
      <div>
        <p id = "rt" class="my-0">Rating Period:</p>
        <p id = "nf" class="my-0">Name of Faculty:</p>
        <p id = "cs" class="my-0">Contract of Service:</p>
        <p id = "cd" class="my-0">College/Department:</p>
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
              <td id = "A" class="text-center"></td>
            </tr>
            <tr>
              <td>KNOWLEDGE OF THE SUBJECT (25)</td>
              <td id = "B" class="text-center"></td>
            </tr>
            <tr>
              <td>TEACHING FOR INDEPENDENT LEARNING (25)</td>
              <td id = "C" class="text-center"></td>
            </tr>
            <tr>
              <td>MANAGEMENT OF LEARNING (25)</td>
              <td id = "D" class="text-center"></td>
            </tr>
            <tr>
              <td class="text-end">Total Overall Rating</td>
              <td id = "total" class="text-center"></td>
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
<!--/ Responsive Table -->

<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.Zoom.js"></script>

<script src="{{ asset('storage/js/result.js') }}"></script>

@php
    $xValues = [];
    $chartData = [];
    $dataIds = [];

    foreach($result as $item) {
        $xValues[] = $item->rating_period;
        $chartData[] = $item->total;
        $dataIds[] = $item->id;
        // You need to populate $chartData with the appropriate data here
    }
@endphp

<script>
  const xValues = @json($xValues);
  const chartData = @json($chartData);
  const dataIds = @json($dataIds); // Assuming you have an array of data ids

  const myChart = new Chart("myChart", {
  type: "line",
  data: {
    labels: xValues,
    datasets: [{
      data: chartData,
      borderColor: "blue",
      fill: false,
      metadata: dataIds, // Bind dataIds to the metadata property
    }]
  },
  options: {
    scales: {
      y: {
        min: 10,
        max: 100,
        stepSize: 10,
      },
    },
    legend: { display: false },
    plugins: {
      zoom: {
        pan: {
          enabled: true,
          mode: 'xy',
        },
        zoom: {
          enabled: true,
          mode: 'xy',
        }
      }
    },
    onClick: (event, activePoints) => handleClick(event, activePoints) // No need to pass dataIds
  }
});


  function handleClick(event, activePoints) {
    if (activePoints && activePoints.length > 0) {
      const firstPoint = activePoints[0];
      const datasetIndex = firstPoint._datasetIndex;
      const index = firstPoint._index;
      if (index >= 0 && datasetIndex >= 0) {
        const dataId = myChart.data.datasets[datasetIndex].metadata[index]; // Get the dataId from metadata

        // Display the id in the console
        result(dataId);

        // You can also call a function here to do something with the id
        // handleDataPointClick(xValues[index], chartData[datasetIndex][index], dataId);
      }
    }
  }
</script>



@endsection
