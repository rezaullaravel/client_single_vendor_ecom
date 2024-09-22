@extends('frontend.frontend_master')

@section('title')
Faq Page
@endsection


@section('content')
<div class="content">
    <div class="container ">
        <div class="panel-group" id="faqAccordion">
            <div class="panel panel-default">
                <div class="panel-header">
                    <h1 class="text-center" style="margin:10px 0">FAQ</h1>
                </div>
             {{-- faq loop start --}}
               @foreach ($faqs as $row)
                <div class="panel-heading accordion-toggle question-toggle collapsed" data-toggle="collapse" data-parent="#faqAccordion" data-target="#question0-{{ $row->id }}">
                     <h4 class="panel-title">
                        <a href="#" class="ing">Q: {{ $row->question }}</a>
                  </h4>

                </div>
                <div id="question0-{{ $row->id }}" class="panel-collapse collapse" style="height: 0px;">
                    <div class="panel-body">
                         <h5><span class="label label-primary">Answer</span></h5>

                        <p style="margin-top: 5px;">{{ $row->answer }}</p>
                    </div>
                </div>
               @endforeach
             {{-- faq loop end --}}
            </div>
        </div>
        <!--/panel-group-->
    </div>
</div>
@endsection
