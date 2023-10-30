@extends('content.student.layouts.contentNavbarLayout')

@section('title', 'Tables - Basic Tables')

@section('content')
<h4 class="fw-bold py-3 mb-4">
  <span class="text-muted fw-light">Pending Evaluation
</h4>

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
                <thead>
                <tr>
                  <th colspan="6">
                    <label for="exampleFormControlTextarea1" class="form-label">Comment</label>
                    <textarea name = "comment"class="form-control" id="exampleFormControlTextarea1" rows="3" disabled>{{ $result->comment }}</textarea>
                  </th>
                </tr>
              </thead>
            </table>

          </div>
        </div>
      </div>
  </div>

  
</div>

<!--/ Basic Bootstrap Table -->


<script src="{{ asset(mix('assets/vendor/libs/jquery/jquery.js')) }}"></script>

@endsection
