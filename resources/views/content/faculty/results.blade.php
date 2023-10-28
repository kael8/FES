@extends('content.faculty.layouts.contentNavbarLayout')

@section('title', 'Tables - Basic Tables')

@section('content')

<link rel="stylesheet" type="text/css" href="{{ asset('storage/css/print-button.css') }}">

<style>
  #sentiment {
    height: 400px;
}

.highcharts-figure,
.highcharts-data-table table {
    min-width: 310px;
    max-width: 800px;
    margin: 1em auto;
}

.highcharts-data-table table {
    font-family: Verdana, sans-serif;
    border-collapse: collapse;
    border: 1px solid #ebebeb;
    margin: 10px auto;
    text-align: center;
    width: 100%;
    max-width: 500px;
}

.highcharts-data-table caption {
    padding: 1em 0;
    font-size: 1.2em;
    color: #555;
}

.highcharts-data-table th {
    font-weight: 600;
    padding: 0.5em;
}

.highcharts-data-table td,
.highcharts-data-table th,
.highcharts-data-table caption {
    padding: 0.5em;
}

.highcharts-data-table thead tr,
.highcharts-data-table tr:nth-child(even) {
    background: #f8f8f8;
}

.highcharts-data-table tr:hover {
    background: #f1f7ff;
}

</style>

<style>
  /* Apply styles only when printing */
  @media print {
    @page {
      margin: 0;
    }
    #email{
        font-size: 13px;
    }
    /* Adjust margins for specific elements, if necessary */
    .container {
      padding: 15px; /* Set your desired padding value */
      margin: 0;
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
    #tb {
    border: 0.5px solid black !important; /* Add a black border to the table */
    }
    thead th {
    border-bottom: 1px solid black !important; /* Set the bottom border of <th> in the <thead> to black */
    }
    #tbody {
    border-top: 1px solid black !important; /* Set the top border of <tbody> to black */
  }

  }

  
</style>

<h4 class="fw-bold py-3 mb-4">
  <span class="text-muted fw-light">Tables /</span> Basic Tables
</h4>

<!-- Responsive Table -->
<div class="card">
  <h5 class="card-header">Responsive Table</h5>

    <div class="card-body">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div id="container"></div>  
                </div>
                <div class="col-md-6">
                    <div id="most"></div>
                </div>
            </div>
        </div>
    
    </div>
    


  
</div>
<hr class="my-3">
<div id = "res" style="display: none;">
  <div class="card parent-div d-flex justify-content-center align-items-center" id = "document">
    <div class="justify-content-center child-div" style="width: 90%;">

        <div class="card-header">
            <table class="justify-content-center" style="width: 100%;">
                <tr>
                <td class="d-flex flex-column align-items-end">
                    <a href="{{url('/')}}" class="app-brand-link">
                    <span class="app-brand-logo demo mx-auto"> <!-- Center the logo horizontally -->
                        @include('_partials.slsu_header')
                    </span>
                    <span class="app-brand-text" style="padding: 0px;"></span>
                    </a>
                </td>

                <td style="padding-left: 70px;">
                    <p>MAIN CAMPUS
                    <br>Roque, Sogod, Southern Leyte
                    <br><font id="email">Email: president@southernleytestateu.edu.ph</font>
                    <br>Website: www.southernleytestateu.edu.ph
                    </p>
                </td>
                </tr>
            </table>
        </div>

        <div class="card-body">
            <br>
            <div class="align-center text-center" style="margin: 0 auto;">
                <h6 id = "college"></h6>
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
                <table class="table table-bordered" id="tb">
                    <thead>
                    <tr>
                        <th>EVALUATION CRITERIA</th>
                        <th class="text-center">AVERAGE RATING SCORE</th>
                    </tr>
                    </thead>
                    <tbody id="tbody">
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
                <h6><font id="dep_head"></font>
                <br>Department Head, <font id="coll"></font></h6>
            

            </div>
            <!-- Add this button at the bottom of your content -->


        </div>
    </div>
  </div>
  <div class="container p-3 d-flex justify-content-end">
  <button id="printButton">Print Document<span></span></button>
</div>
  <hr class="my-3">

  <div class="card mb-4">
    <h5 class="card-header text-center"><strong>Itemized Ratings</strong></h5>
      <div class="card-body">
        <div class="mb-3">
          <div class="card">
            <div class="table-responsive text-nowrap">
              <table class="table table-bordered">
                <thead align="center">
                    <tr>
                        <th colspan="1">A. Commitment</th>
                        <th class="text-center">Rating</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="text-wrap">1. Demonstrates sensitivity to student's ability to attend and absorb content information.</td>
                        <td id="A1" class="text-center"></td>
                    </tr>
                    <tr>
                        <td class="text-wrap">2. Integrates sensitivity his/her learning objectives with those of the students in a collaborative process.</td>
                        <td id="A2" class="text-center"></td>
                    </tr>
                    <tr>
                        <td class="text-wrap">3. Make oneself self-available to students beyond official time.</td>
                        <td id="A3" class="text-center"></td>
                    </tr>
                    <tr>
                        <td class="text-wrap">4. Regularly comes to class on time, well-groomed and well-prepared to complete assigned responsibilities.</td>
                        <td id="A4" class="text-center"></td>
                    </tr>
                    <tr>
                        <td class="text-wrap">5. Keeps accurate records of students' performance and prompt submission of the same.</td>
                        <td id="A5" class="text-center"></td>
                    </tr>
                    <tr>
                        <td class="text-end">Total Score</td>
                        <td id="TotalA" class="text-center"></td>
                    </tr>
                </tbody>

                <thead align="center">
                    <tr>
                        <th colspan="1">B. KNOWLEDGE OF SUBJECT</th>
                        <th class="text-center">Rating</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="text-wrap">1. Demonstrates mastery of the subject matter (explains the subject matter without relying solely on the prescribed textbook.)</td>
                        <td id="B1" class="text-center"></td>
                    </tr>
                    <tr>
                        <td class="text-wrap">2. Draws and shares information on the state of the art theory and practice in his/her discipline.</td>
                        <td id="B2" class="text-center"></td>
                    </tr>
                    <tr>
                        <td class="text-wrap">3. Integrates the subject to practical circumstances and learning intents/purposes of students.</td>
                        <td id="B3" class="text-center"></td>
                    </tr>
                    <tr>
                        <td class="text-wrap">4. Explains the relevance of present topics to the previous lessons, and relates the subject matter to relevant current issues and/or daily life activities.</td>
                        <td id="B4" class="text-center"></td>
                    </tr>
                    <tr>
                        <td class="text-wrap">5. Demonstrates up-to-date knowledge and/or awareness on current trends and issues of the subject.</td>
                        <td id="B5" class="text-center"></td>
                    </tr>
                    <tr>
                        <td class="text-end">Total Score</td>
                        <td id="TotalB" class="text-center"></td>
                    </tr>
                </tbody>

                <thead align="center">
                    <tr>
                        <th colspan="1">C. TEACHING FOR INDEPENDENT LEARNING</th>
                        <th class="text-center">Rating</th>
                    </tr>
                </thead>
                    <tr>
                        <td class="text-wrap">1. Creates teaching strategies that allow students to practice using concepts they need to understand (interactive discussion).</td>
                        <td id="C1" class="text-center"></td>
                    </tr>
                    <tr>
                        <td class="text-wrap">2. Enhances student self-esteem and/or gives dues recognition to students' performance/potentials.</td>
                        <td id="C2" class="text-center"></td>
                    </tr>
                    <tr>
                        <td class="text-wrap">3. Integrates the subject to practical circumstances and learning intents/purposes of students.</td>
                        <td id="C3" class="text-center"></td>
                    </tr>
                    <tr>
                        <td class="text-wrap">4. Allows students to think independently and make their own decisions and holding them accountable for their performance based largely on their success in executing decisions.</td>
                        <td id="C4" class="text-center"></td>
                    </tr>
                    <tr>
                        <td class="text-wrap">5. Encourages students to learn beyond what is required and helps/guides the students how to apply the concepts learned.</td>
                        <td id="C5" class="text-center"></td>
                    </tr>
                    <tr>
                        <td class="text-end">Total Score</td>
                        <td id="TotalC" class="text-center"></td>
                    </tr>
                </tbody>

                <thead align="center">
                    <tr>
                        <th colspan="1">D. MANAGEMENT OF LEARNING</th>
                        <th class="text-center">Rating</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="text-wrap">1. Creates opportunities for intensive and/or extensive contribution of students in the class activities (e.g breaks class into dyads, triads, or buss/tasks groups.)</td>
                        <td id="D1" class="text-center"></td>
                    </tr>
                    <tr>
                        <td class="text-wrap">2. Assume roles as facilitator, resource person, coach, inquisitor, integrator, referee in drawing students to contribute to knowledge and understanding of the concepts at hands.</td>
                        <td id="D2" class="text-center"></td>
                    </tr>
                    <tr>
                        <td class="text-wrap">3. Designs and implements learning conditions and experience that promote healthy exchange and/or confrontations.</td>
                        <td id="D3" class="text-center"></td>
                    </tr>
                    <tr>
                        <td class="text-wrap">4. Structures/re-structures learning and teaching-learning context to enhance attainment of collective learning objectives.</td>
                        <td id="D4" class="text-center"></td>
                    </tr>
                    <tr>
                        <td class="text-wrap">5. Use of Instructional Materials (audio/video materials: fieldtrips, film showing, computer-aided instruction and etc.) to reinforce learning processes.</td>
                        <td id="D5" class="text-center"></td>
                    </tr>
                    <tr>
                        <td class="text-end">Total Score</td>
                        <td id="TotalD" class="text-center"></td>
                    </tr>
                </tbody>
            </table>

          </div>
        </div>
      </div>
  </div>

  
</div>




<div class="card">
  <div class="container">
    <div class="row">
      <div class="col-md-6">
        
          <div class="card-body">
            <figure class="highcharts-figure">
              <div id="sentiment"></div>
              <p class="highcharts-description"></p>
            </figure>
          </div>
        
      </div>
      <div class="col-md-6">
        
          <div class="card-body">
            <figure class="highcharts-figure">
              <div id="wordcloud"></div>
              <p class="highcharts-description"></p>
            </figure>
          </div>
        
      </div>
    </div>
  </div>
</div>
<!--/ Responsive Table -->

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script src="https://printjs-4de6.kxcdn.com/print.min.js"></script>
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



<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/highcharts-3d.js"></script>
<script src="https://code.highcharts.com/modules/wordcloud.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<script src="https://code.highcharts.com/modules/export-data.js"></script>
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
    $positiveList = [];
    $negativeList = [];

    foreach($result as $item) {
        $xValues[] = $item->rating_period;
        $chartData[] = $item->TotalSum;
        $dataIds[] = $item->id;
        $A[] = $item->TotalA;
        $B[] = $item->TotalB;
        $C[] = $item->TotalC;
        $D[] = $item->TotalD;
        $positiveList[] = $item->positive;
        $negativeList[] = $item->negative;
        $college_names[] = $item->full_coll_name;
    }
@endphp


<script type="module">
    const xValues = @json($xValues);
    const chartData = @json($chartData).map(Number);
    const dataIds = @json($dataIds);
    const A = @json($A).map(Number);
    const B = @json($B).map(Number);
    const C = @json($C).map(Number);
    const D = @json($D).map(Number);
    const positiveList = @json($positiveList);
    const negativeList = @json($negativeList);
    const collegeName = @json($college_names[0]);

    const highestPositive = Math.max(...positiveList);
    const highestNegative = Math.max(...negativeList);

    const indexOfHighestPositive = positiveList.indexOf(highestPositive);
    const indexOfHighestNegative = negativeList.indexOf(highestNegative);

    const valueOfIndexOfHighestPositive = xValues[indexOfHighestPositive];
    const valueOfIndexOfHighestNegative = xValues[indexOfHighestNegative];

    const dataIDIndexPositive = dataIds[indexOfHighestPositive];
    const dataIDIndexNegative = dataIds[indexOfHighestNegative];

    console.log(valueOfIndexOfHighestPositive);
    console.log(valueOfIndexOfHighestNegative);

    // Calculate the tickInterval dynamically
const maxCategories = 5;
const dataLength = chartData.length;
const tickInterval = Math.ceil(dataLength / maxCategories);


    // Create the chart
    const myChart = Highcharts.chart('container', {
    chart: {
        type: 'spline',
        scrollablePlotArea: {
            minWidth: 700,
            scrollPositionX: 1
        }
    },
    title: {
        text: 'Summary of Faculty Performance Student Evaluation'
    },
    subtitle: {
        text: collegeName
    },
    xAxis: {
        categories: xValues,
        labels: {
            overflow: 'justify'
        }
    },
    yAxis: {
        tickWidth: 1,
        title: {
            text: 'Total Ratings'
        },
        lineWidth: 1,
        opposite: true
    },


    plotOptions: {
        spline: {
            lineWidth: 4,
            states: {
                hover: {
                    lineWidth: 5
                }
            },
            marker: {
                enabled: true
            },
        }
    },
    series: [{
        name: 'Score A',
        data: A

    }, {
        name: 'Score B',
        data: B
    }, {
        name: 'Score C',
        data: C
    }, {
        name: 'Score D',
        data: D
    }, {
        name: 'Total Score',
        data: chartData
    }]
});

Highcharts.chart('most', {
    chart: {
        type: 'column'
    },
    title: {
        text: 'Highest Positive and Negative Values'
    },
    xAxis: {
        categories: ['Highest Positive ' + valueOfIndexOfHighestPositive, 'Highest Negative ' + valueOfIndexOfHighestNegative],
        crosshair: true
    },
    yAxis: {
        min: 0,
        title: {
            text: 'Semantic Ratings'
        }
    },
    plotOptions: {
        column: {
            pointPadding: 1.3, // Adjust the pointPadding as a percentage (e.g., 10%)
            groupPadding: 0.8, // Adjust the groupPadding as a percentage (e.g., 20%)
        }
    },
    series: [{
        name: 'Positive',
        data: [highestPositive, null], // Two data points, one for each category
        color: 'green', // Color for highest positive value
        events: {
            click: function () {
                console.log('Positive clicked');
                handleClick(highestPositive, dataIDIndexPositive);
            }
        }
    },
    {
        name: 'Negative',
        data: [null, highestNegative], // Two data points, one for each category
        color: 'red', // Color for highest negative value
        events: {
            click: function () {
                console.log('Negative clicked');
                handleClick(highestNegative, dataIDIndexNegative);
            }
        }
    }]
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

<script>
 
 


</script>

@endsection
