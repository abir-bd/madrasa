 @extends('frontend.layouts.index')

 @section('content')

<div id="contents" class="sixteen columns">

	<div class="twelve columns" id="left-content">
	<br>
	
	<h4 style="font-weight: bold;">শিক্ষার্থীদের ইউনিফর্ম :</h4>
	<hr>
  <div style="text-align: justify;">
            <p>{!!$student->uniform!!}</p>
        </div>


</div>

 @endsection
