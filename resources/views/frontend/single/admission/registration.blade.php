 @extends('frontend.layouts.index')

 @section('content')

<div id="contents" class="sixteen columns">

	<div class="twelve columns" id="left-content">
	<br>
	
	<h4 style="font-weight: bold;">রেজিস্ট্রেশন সিস্টেম :</h4>
	<hr>
  <div style="text-align: justify;">
            <p>{!!$admission->registration!!}</p>
        </div>


</div>

 @endsection