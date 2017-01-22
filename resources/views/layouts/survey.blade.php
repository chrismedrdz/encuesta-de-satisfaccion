@extends('client.layout')

@section('content')

@php
  $total_sections=count($sections);
  $percent_completed=( 1/$total_sections )*100;
@endphp

@foreach ($sections as $section)

@endforeach

<section id="content">

  <link rel="stylesheet" href="{{ url('/template/libs/bootstrap-star-rating/css/star-rating.css') }}"/>
  <script src="{{ url('/template/libs/bootstrap-star-rating/js/star-rating.js') }} "></script>
  <link href="http://netdna.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.css" rel="stylesheet">

  <style type="text/css">
  p{margin-bottom: 0px;}
  textarea{resize:none;}
  .tab-nav {display: none;}
  .skills li .progress-percent {z-index: 1000;}
  </style>


  <div class="content-wrap" style="padding:0px;">


    <div class="container clearfix" id="app-survey">

    <!-- <template> -->

        <ul class="skills">
            <li data-percent="{{$percent_completed}}">
              <span>Progreso </span>
              <div class="progress">
                <div class="progress-percent"><div class="counter counter-inherit counter-instant"><span data-from="0" data-to="{{$percent_completed}}" data-refresh-interval="30" data-speed="1100"></span>%</div></div>
              </div>
            </li>
          </ul>

        <div class="tabs tabs-bb clearfix ui-tabs ui-widget ui-widget-content ui-corner-all" id="tabs">

          <ul class="tab-nav clearfix ui-tabs-nav ui-helper-reset ui-helper-clearfix ui-widget-header ui-corner-all" role="tablist">

            @php
              $cont=1;
            @endphp
            @foreach ($sections as $section)
                @if ($cont == 1)
                     <li class="ui-state-default ui-corner-top ui-tabs-active ui-state-active" role="tab" tabindex="0" aria-controls="tab-s{{$cont}}" aria-labelledby="ui-id-29" aria-selected="true"><a href="#tab-s{{$cont}}" class="ui-tabs-anchor" role="presentation" tabindex="-1" id="ui-id-29"><i class="icon-home2"></i> Sección {{$cont}}</a></li>
                @else
                    <li class="ui-state-default ui-corner-top" role="tab" tabindex="-1" aria-controls="tab-s{{$cont}}" aria-labelledby="ui-id-30" aria-selected="false"><a href="#tab-s{{$cont}}" class="ui-tabs-anchor" role="presentation" tabindex="-1" id="ui-id-30">Sección {{$cont}}</a></li>
                @endif
            @php
            $cont++;
            @endphp
            @endforeach

          </ul>

          <!--
          <h1 v-bind:title="message"> @{{ message }} </h1> 
          <input type="text" v-model="message">
          -->

          @include('layouts.sections')


        </div> <!-- #tabs end -->

        <!-- </template> -->

    </div> <!-- #container end -->



  </div> <!-- #content-wrap end -->

</section><!-- #content end -->

<script type="text/javascript">
/*
  var appSurvey = new Vue({
    el: '#app-survey',
    data: {
      message: 'Hello Vue!'
    }
  })
*/
  
  function regresar (section) {
    var ant = section-2;
    $( "#tabs" ).tabs( "option", "active", ant );
  }

  function siguiente (section) {
    var sig = section;
    $( "#tabs" ).tabs( "option", "active", sig );
  }

  function setNA(obj,question_id) {
    $(obj).val(obj.checked ? 1 : 0);

    if ($(obj).val() == '1') {
      $('#input-'+question_id).rating('clear');
      $('#input-'+question_id).rating('refresh', {disabled: true});
      $('#input-'+question_id).val('1111');
    } else {
      $('#input-'+question_id).rating('refresh', {disabled: false});
      $('#input-'+question_id).val('0');
    }
  }

</script>

@stop