@extends('content.faculty.layouts.contentNavbarLayout')

@section('title', 'Tables - Basic Tables')

@section('content')

<h4 class="fw-bold py-3 mb-4">
  <span class="text-muted fw-light">Tables /</span> Basic Tables
</h4>

<!-- Responsive Table -->
<div class="card" id = "chart" style="overflow-x: auto;">
  <h5 class="card-header">Responsive Table</h5>

  <div id="container" style="height: 600px; overflow: auto;"></div>
  
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

<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/accessibility.js"></script>


<script src="{{ asset('storage/js/result.js') }}"></script>

@php
    $xValues = [];
    $chartData = [];
    $dataIds = [];
    $A = [];
    $B = [];
    $C = [];
    $D = [];

    foreach($result as $item) {
        $xValues[] = $item->rating_period;
        $chartData[] = $item->total;
        $dataIds[] = $item->id;
        $A[] = $item->A;
        $B[] = $item->B;
        $C[] = $item->C;
        $D[] = $item->D;
        // You need to populate $chartData with the appropriate data here
    }
@endphp

<script>
    const xValues = @json($xValues);
    const chartData = @json($chartData);
    const dataIds = @json($dataIds);
    const A = @json($A);
    const B = @json($B);
    const C = @json($C);
    const D = @json($D);
    console.log(A);
    // Calculate the tickInterval dynamically
const maxCategories = 5;
const dataLength = chartData.length;
const tickInterval = Math.ceil(dataLength / maxCategories);

const data = [
        {
            name: "A Score",
            data: A,
        },
        {
            name: "B Score",
            data: B,
        },
        {
            name: "C Score",
            data: C,
        },
        {
            name: "D Score",
            data: D,
        },
        {
            name: "Total Rating",
            data: chartData,
        },
    ];

    // Create the chart
    const myChart = Highcharts.chart('container', {
        chart: {
            type: 'spline',
            zoomType: 'xy', // Enable zooming
            panKey: 'shift', // Enable panning by holding the Shift key
        },
        title: {
            text: 'Evaluation Chart',
        },
        xAxis: {
            categories: xValues,
            tickInterval: tickInterval,
        },
        yAxis: {
            title: {
                text: 'Rating',
            },
        },
        series: data,
    });

// Create a mapping of data points to dataIds
const dataPointMap = {};

chartData.forEach((value, index) => {
    const dataId = dataIds[index];
    if (dataId !== undefined) {
        dataPointMap[index] = dataId;
    }
});

// Add an event listener for chart click events
myChart.container.addEventListener("click", (event) => {
    const pointIndex = myChart.hoverPoint.index;
    const dataId = dataPointMap[pointIndex];
    if (dataId !== undefined) {
        handleClick(event, dataId);
    }
});

function handleClick(event, dataId) {
    console.log(dataId);
    result(dataId);
    // You can now use dataId in your function
    // handleDataPointClick(xValues[index], chartData[index], dataId);
}


</script>

@endsection
