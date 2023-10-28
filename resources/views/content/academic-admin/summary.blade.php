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

<!-- Bordered Table -->
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
      <div class="align-center text-center" style=" margin: 0 auto;">
        <p id = "head-text"class="my-0">Excellence | Service | Leadership and Good Governance | Innovation | Social Responsibility | Integrity | Professionalism | Spirituality</p>
        <hr class="my-1">
      </div>
      <br>
      <div class="align-center text-center" style="margin: 0 auto;">
        <h5>{{ $result->full_coll_name }}</h5>
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
              <td class="text-center">{{ $result->TotalA }}</td>
            </tr>
            <tr>
              <td>KNOWLEDGE OF THE SUBJECT (25)</td>
              <td class="text-center">{{ $result->TotalB }}</td>
            </tr>
            <tr>
              <td>TEACHING FOR INDEPENDENT LEARNING (25)</td>
              <td class="text-center">{{ $result->TotalC }}</td>
            </tr>
            <tr>
              <td>MANAGEMENT OF LEARNING (25)</td>
              <td class="text-center">{{ $result->TotalD }}</td>
            </tr>
            <tr>
              <td class="text-end">Total Overall Rating</td>
              <td class="text-center">{{ $result->TotalSum }}</td>
            </tr>
          </tbody id="tbody">
        </table>
        <br>
        <br>
        <br>
        <br>
        <h6>Certified true and correct:</h6>
        <h6 style="margin-bottom: 0;">{{ $result->department_head }}</h6>
        <h6 style="margin-bottom: 0;">Department Head, <font>{{ $result->college_name }}</font></h6>

        

      </div>
      <!-- Add this button at the bottom of your content -->


    </div>
  </div>
</div>
<div class="container p-3 d-flex justify-content-end">
  <button id="printButton">Print Document<span></span></button>
</div>


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
                        <td id="A1" class="text-center">{{ $result->A1 }}</td>
                    </tr>
                    <tr>
                        <td class="text-wrap">2. Integrates sensitivity his/her learning objectives with those of the students in a collaborative process.</td>
                        <td id="A2" class="text-center">{{ $result->A2 }}</td>
                    </tr>
                    <tr>
                        <td class="text-wrap">3. Make oneself self-available to students beyond official time.</td>
                        <td id="A3" class="text-center">{{ $result->A3 }}</td>
                    </tr>
                    <tr>
                        <td class="text-wrap">4. Regularly comes to class on time, well-groomed and well-prepared to complete assigned responsibilities.</td>
                        <td id="A4" class="text-center">{{ $result->A4 }}</td>
                    </tr>
                    <tr>
                        <td class="text-wrap">5. Keeps accurate records of students' performance and prompt submission of the same.</td>
                        <td id="A5" class="text-center">{{ $result->A5 }}</td>
                    </tr>
                    <tr>
                        <td class="text-end">Total Score</td>
                        <td id="TotalA" class="text-center">{{ $result->TotalA }}</td>
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
                        <td id="B1" class="text-center">{{ $result->B1 }}</td>
                    </tr>
                    <tr>
                        <td class="text-wrap">2. Draws and shares information on the state of the art theory and practice in his/her discipline.</td>
                        <td id="B2" class="text-center">{{ $result->B2 }}</td>
                    </tr>
                    <tr>
                        <td class="text-wrap">3. Integrates the subject to practical circumstances and learning intents/purposes of students.</td>
                        <td id="B3" class="text-center">{{ $result->B3 }}</td>
                    </tr>
                    <tr>
                        <td class="text-wrap">4. Explains the relevance of present topics to the previous lessons, and relates the subject matter to relevant current issues and/or daily life activities.</td>
                        <td id="B4" class="text-center">{{ $result->B4 }}</td>
                    </tr>
                    <tr>
                        <td class="text-wrap">5. Demonstrates up-to-date knowledge and/or awareness on current trends and issues of the subject.</td>
                        <td id="B5" class="text-center">{{ $result->B5 }}</td>
                    </tr>
                    <tr>
                        <td class="text-end">Total Score</td>
                        <td id="TotalB" class="text-center">{{ $result->TotalB }}</td>
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
                        <td id="C1" class="text-center">{{ $result->C1 }}</td>
                    </tr>
                    <tr>
                        <td class="text-wrap">2. Enhances student self-esteem and/or gives dues recognition to students' performance/potentials.</td>
                        <td id="C2" class="text-center">{{ $result->C2 }}</td>
                    </tr>
                    <tr>
                        <td class="text-wrap">3. Integrates the subject to practical circumstances and learning intents/purposes of students.</td>
                        <td id="C3" class="text-center">{{ $result->C3 }}</td>
                    </tr>
                    <tr>
                        <td class="text-wrap">4. Allows students to think independently and make their own decisions and holding them accountable for their performance based largely on their success in executing decisions.</td>
                        <td id="C4" class="text-center">{{ $result->C4 }}</td>
                    </tr>
                    <tr>
                        <td class="text-wrap">5. Encourages students to learn beyond what is required and helps/guides the students how to apply the concepts learned.</td>
                        <td id="C5" class="text-center">{{ $result->C5 }}</td>
                    </tr>
                    <tr>
                        <td class="text-end">Total Score</td>
                        <td id="TotalC" class="text-center">{{ $result->TotalC }}</td>
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
                        <td id="D1" class="text-center">{{ $result->D1 }}</td>
                    </tr>
                    <tr>
                        <td class="text-wrap">2. Assume roles as facilitator, resource person, coach, inquisitor, integrator, referee in drawing students to contribute to knowledge and understanding of the concepts at hands.</td>
                        <td id="D2" class="text-center">{{ $result->D2 }}</td>
                    </tr>
                    <tr>
                        <td class="text-wrap">3. Designs and implements learning conditions and experience that promote healthy exchange and/or confrontations.</td>
                        <td id="D3" class="text-center">{{ $result->D3 }}</td>
                    </tr>
                    <tr>
                        <td class="text-wrap">4. Structures/re-structures learning and teaching-learning context to enhance attainment of collective learning objectives.</td>
                        <td id="D4" class="text-center">{{ $result->D4 }}</td>
                    </tr>
                    <tr>
                        <td class="text-wrap">5. Use of Instructional Materials (audio/video materials: fieldtrips, film showing, computer-aided instruction and etc.) to reinforce learning processes.</td>
                        <td id="D5" class="text-center">{{ $result->D5 }}</td>
                    </tr>
                    <tr>
                        <td class="text-end">Total Score</td>
                        <td id="TotalD" class="text-center">{{ $result->TotalD }}</td>
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


        <script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/highcharts-3d.js"></script>
<script src="https://code.highcharts.com/modules/wordcloud.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<script src="https://code.highcharts.com/modules/export-data.js"></script>
<script src="https://code.highcharts.com/modules/accessibility.js"></script>


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
@php

$positive = $result->positive;
$negative = $result->negative;
$comment = $concatenatedComments;


@endphp

<script type="module">

const positive = @json($positive);
const negative = @json($negative);
const comment = @json($concatenatedComments);

                console.log(positive);
                console.log(negative);
                console.log(comment);


                
                Highcharts.chart('sentiment', {
                    chart: {
                        type: 'pie',
                        options3d: {
                            enabled: true,
                            alpha: 45,
                            beta: 0
                        }
                    },
                    title: {
                        text: 'SentimentAnalysis',
                        align: 'center'
                    },
                    accessibility: {
                        point: {
                            valueSuffix: '%'
                        }
                    },
                    tooltip: {
                        pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
                    },
                    plotOptions: {
                        pie: {
                            size: '100%',
                            innerSize: 100,
                            allowPointSelect: true,
                            cursor: 'pointer',
                            depth: 35,
                            dataLabels: {
                                enabled: true,
                                alignTo: 'plotEdges',
                                connectorShape: function(labelPosition, connectorPosition, options) {
                                    var connectorPadding = options.connectorPadding,
                                      touchingSliceAt = connectorPosition.touchingSliceAt,
                                      series = this.series,
                                      plotWidth = series.chart.plotWidth,
                                      plotLeft = series.chart.plotLeft,
                                      alignment = labelPosition.alignment,
                                      stepDistance = 150, // in px - distance between the step and vertical border of the plot area
                                      stepX = alignment === 'left' ? plotLeft + plotWidth - stepDistance : plotLeft + stepDistance;
                                    return ['M',
                                      labelPosition.x + (alignment === 'left' ? 1 : -1) *
                                      connectorPadding,
                                      labelPosition.y,
                                      'L',
                                      stepX,
                                      labelPosition.y,
                                      'L',
                                      stepX,
                                      touchingSliceAt.y,
                                      'L',
                                      touchingSliceAt.x,
                                      touchingSliceAt.y
                                    ];
                                  },
                                pointFormat: '{point.name}: <b>{point.percentage:.1f}%</b>'
                            }
                        }
                    },
                    series: [{
                        type: 'pie',
                        name: 'Sentiment',
                        data: [
                            ['Positive', positive],
                            ['Negative', negative],
                        ]
                    }]
                });





                // URL for the stopwords JSON file
const stopwordsUrl = "https://raw.githubusercontent.com/stopwords-iso/stopwords-en/master/stopwords-en.json";

// Fetch the stopwords from the URL
fetch(stopwordsUrl)
    .then(response => response.json())
    .then(stopwords => {
        // Process the 'comment' and filter out stopwords
        const lines = comment.replace(/[():'?0-9]+/g, '').split(/[,\. ]+/g);
        const data = lines.reduce((arr, word) => {
            if (!stopwords.includes(word.toLowerCase())) {
                let obj = Highcharts.find(arr, obj => obj.name === word);
                if (obj) {
                    obj.weight += 1;
                } else {
                    obj = {
                        name: word,
                        weight: 1
                    };
                    arr.push(obj);
                }
            }
            return arr;
        }, []);

        Highcharts.chart('wordcloud', {
            accessibility: {
                screenReaderSection: {
                    beforeChartFormat: '<h5>{chartTitle}</h5>' +
                        '<div>{chartSubtitle}</div>' +
                        '<div>{chartLongdesc}</div>' +
                        '<div>{viewTableButton}</div>'
                }
            },
            series: [{
                type: 'wordcloud',
                data,
                name: 'Occurrences',
                rotation: {
                    from: 0,
                    to: 0,
                    orientations: 6 // You can experiment with the number of orientations
                },
                style: {
                    fontFamily: 'Arial', // You can change the font style
                    textOutline: 'none'
                }
            }],
            title: {
                text: 'Wordcloud of Student Comments',
                align: 'center'
            },
            tooltip: {
                headerFormat: '<span style="font-size: 16px"><b>{point.key}</b></span><br>'
            }
        });
    })
    .catch(error => {
        console.error("Error fetching stopwords:", error);
    });

</script>

@endsection
