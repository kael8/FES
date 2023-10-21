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
<!--/ Responsive Table -->

<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>

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
      onClick: (event, activePoints) => handleClick(event, activePoints, dataIds) // Pass dataIds as an argument
    }
  });

  function handleClick(event, activePoints, dataIds) {
    if (activePoints && activePoints.length > 0) {
      const firstPoint = activePoints[0];
      const datasetIndex = firstPoint.datasetIndex;
      const index = firstPoint.index;
      if (index >= 0 && datasetIndex >= 0) {
        const dataId = dataIds[datasetIndex][index]; // Get the dataId

        // Display the id in the console
        console.log('Data point clicked - X:', xValues[index], 'Y:', chartData[datasetIndex][index], 'ID:', dataId);

        // You can also call a function here to do something with the id
        // handleDataPointClick(xValues[index], chartData[datasetIndex][index], dataId);
      }
    }
  }
</script>


@endsection
