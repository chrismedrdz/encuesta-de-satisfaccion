@extends('client.layout')

@section('content')

@php

  $sections = explode(',', session('sections'));
  $usuario_id = session('usuario_id');
  $survey_id = session('survey_id');

  $total_sections=count($sections);

  if ( session('current_section') != null) {

    if (session('current_section') != 'finish') {
      session(['current_section' => session('current_section')] );

      $sec2 = array_search(session('current_section'), $sections); 
      $section_active = $sec2;
    } else {
      $section_active = $total_sections;
    }

  } else {
    $section_active = 0;
  }

  $percent_completed=( $section_active/$total_sections )*100;
@endphp

@foreach ($sections as $section)

@endforeach

<section id="content" >

  <link rel="stylesheet" href="{{ url('/template/libs/bootstrap-star-rating/css/star-rating.css') }}"/>
  <script src="{{ url('/template/libs/bootstrap-star-rating/js/star-rating.js') }} "></script>
  <link href="http://netdna.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.css" rel="stylesheet">

  <style>
  p{margin-bottom: 0px;}
  textarea{resize:none;}
  .tab-nav {display: none;}
  .skills li .progress-percent {z-index: 1000;}
  select{margin-bottom: 10px;}
  </style>

  @php 

      function obtenerCadena($contenido,$inicio,$fin) {
          $r = explode($inicio, $contenido);
          if (isset($r[1])){
              $r = explode($fin, $r[1]);
              return $r[0];
          }
          return '';
      }

    @endphp


  <div class="content-wrap" style="padding:0px;">

    <div class="container clearfix" >

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
                $aux=0;
              @endphp
              @foreach ($sections as $section)
                  @if ($section_active == $aux)
                       <li class="ui-state-default ui-corner-top ui-tabs-active ui-state-active" role="tab" tabindex="0" aria-controls="tab-s{{$cont}}"> <a href="#tab-s{{$cont}}" class="ui-tabs-anchor">Sección {{$cont}}</a></li>
                  @else
                      <li class="ui-state-default ui-corner-top" role="tab" tabindex="-1" aria-controls="tab-s{{$cont}}"><a href="#tab-s{{$cont}}" class="ui-tabs-anchor">Sección {{$cont}}</a></li>
                  @endif
              @php
              $cont++;
              $aux++;
              @endphp
              @endforeach

            </ul>

            @if($section_active == $total_sections )
                @include('client.finish')
            @else
                @include('client.sections')
            @endif

        </div> <!-- #tabs end -->

        <!-- </template> -->

    </div> <!-- #container end -->



  </div> <!-- #content-wrap end -->

</section><!-- #content end -->

<script type="text/javascript">

/*
  var appSurvey = new Vue({
    el: '#content',
    data: {
      message: 'Hello Vue!'
    }
  })
*/

  $('#tabs').ready(function(){
    // Se agrego este timeout para que no crashee con el tiempo de carga de todo los tabs antes de mandar llamar al metodo
    setTimeout(function() {
      $( "#tabs" ).tabs( "option", "active", '{{$section_active}}' );
    }, 500 );    
  });
  
  function regresar (section) {
    var ant = section-2;
    $( "#tabs" ).tabs( "option", "active", ant );
  }

  function siguiente (section) {
    var sig = section;
    $( "#tabs" ).tabs( "option", "active", sig );
  }

  function setNA(obj,question_id) {
    //$(obj).val(obj.checked ? 1 : 0);

    if (obj.checked) {
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