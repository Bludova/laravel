@extends('faq.include.header')
@section('content')

	<div>
		<ul class="cd-faq-group">
			<li class="cd-faq-title"><h2><a href="faq/ask_question">Задать вопрос</a></h2></li>
			<li class="cd-faq-title"><h2><a href="admin">Ответить на вопрос</a></h2></li>
		</ul>


	</div>


<section class="cd-faq">
    <ul class="cd-faq-categories">
        @foreach($categories as $category)
          <li><a href="#{{ $category->id}}">{{ $category->category }}</a></li>
        @endforeach
</ul>





    <div class="cd-faq-items">
@foreach($categoriesFaq as $category)
<ul id="{{ $category->id }}" class="cd-faq-group">
<li class="cd-faq-title"><h2>{{ $category->category }}</h2></li>


  @foreach($faq as $question)
@if($category->id === $question->category_id)

<li>

<a class="cd-faq-trigger" href="#0">{{ $question->question }}</a>
<div class="cd-faq-content">
<p>{{ $question->answers->answer}}</p>
</div> <!-- cd-faq-content -->
</li>
@endif

@endforeach

</ul>
@endforeach

    </div>
    <a href="#0" class="cd-close-panel">Close</a>
</section>


<script src="{{ asset('faq_style/js/jquery-2.1.1.js') }}"></script>
<script src="{{ asset('faq_style/js/jquery.mobile.custom.min.js') }}"></script>
<script src="{{ asset('faq_style/js/main.js') }}"></script> <!-- Resource jQuery -->
</body>
</html>
@endsection
