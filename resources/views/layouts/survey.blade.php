@extends('client.layout')

@section('content')

<section id="content">

  <link rel="stylesheet" href="{{ url('/template/libs/bootstrap-star-rating/css/star-rating.css') }}"/>
  <script src="{{ url('/template/libs/bootstrap-star-rating/js/star-rating.js') }} "></script>
  <link href="http://netdna.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.css" rel="stylesheet">

  <style type="text/css">
  p{margin-bottom: 0px;}
  textarea{resize:none;}
  </style>

  <div class="content-wrap" style="padding:0px;">

    <div class="container clearfix" >
        <div class="tabs tabs-bb clearfix ui-tabs ui-widget ui-widget-content ui-corner-all" id="tabs">

          <ul class="tab-nav clearfix ui-tabs-nav ui-helper-reset ui-helper-clearfix ui-widget-header ui-corner-all" role="tablist">
              @php
                  $sections = explode(',', $sections_str);
                  $cont=1;
              @endphp

              @foreach ($sections as $section)

                  @if ($cont == 1)
                       <li class="ui-state-default ui-corner-top ui-tabs-active ui-state-active" role="tab" tabindex="0" aria-controls="tab-s{{$cont}}" aria-labelledby="ui-id-29" aria-selected="true"><a href="#tab-s{{$cont}}" class="ui-tabs-anchor" role="presentation" tabindex="-1" id="ui-id-29"><i class="icon-home2"></i> Sección {{$cont}}</a></li>
                  @else
                      <li class="ui-state-default ui-corner-top" role="tab" tabindex="-1" aria-controls="tab-s{{$cont}}" aria-labelledby="ui-id-30" aria-selected="false"><a href="#tab-s{{$cont}}" class="ui-tabs-anchor" role="presentation" tabindex="-1" id="ui-id-30">Sección {{$cont}}</a></li>
                  @endif
                 

                  @php
                  $cont=$cont+1;
                  @endphp
                @endforeach
          </ul>

          <div class="tab-container">
          @php
                $s=1;
          @endphp

          @foreach ($sections as $sec)
              @php
              $section=\App\Section::find($sec);
              @endphp

              <div class="tab-content clearfix ui-tabs-panel ui-widget-content ui-corner-bottom" id="tab-s{{$s}}" aria-labelledby="ui-id-29" role="tabpanel" aria-expanded="true" aria-hidden="false" style="display: block;">

                    <div class="title-block">
                      <p class="text-blue">{{$section->description}}</p>
                    </div>

                    @php
                      $questions = explode(',', $section->questions_ids);
                    @endphp
                    
                    @php$i=1;@endphp
                    @foreach ($questions as $question_id)
                      @php
                      $question=\App\Question::find($question_id);
                      @endphp
                      <label>{{ $i . ' - ' . $question['question']}}</label>
                      <input id="input-{{$question['id']}}" type="number"/>

                      <script>
                        $("#input-{{$question['id']}}").rating({
                          min:1, max:5, step:0.8, size:'xs',showClear:false, clearCaption:'',
                          starCaptions: {
                                '1.8': 'Muy Insatisfecho',
                                '2.6': 'Insatisfecho',
                                '3.4': 'Ni insatisfecho ni satisfecho',
                                '4.2': 'Satisfecho',
                                '5':   'Muy Satisfecho'
                          },
                          starCaptionClasses: {
                              '1.8': 'label label-danger',
                              '2.6': 'label label-warning',
                              '3.4': 'label label-info',
                              '4.2': 'label label-primary',
                              '5': 'label label-success'
                          }
                        });
                      </script>

                      @php$i++;@endphp
                    @endforeach
                    
                    <div class="line line-sm"></div>

                    @if ($section->comments_required == 1)
                      <label class="text-red">¿Algún comentario?</label>
                      <textarea id="comments_s{{$s}}" placeholder="Escribe algún conmentario..." class="form-control" rows="5"></textarea>
                      <br>
                    @endif

                    <ul class="pager">

                        @if($s == 1)
                          <li class="previous disabled"><a>← Regresar</a></li>
                        @else
                          <li class="previous"><a style="cursor:pointer;" onclick="regresar({{$s}});" >← Regresar</a></li>
                        @endif

                        <li class="next"><a style="cursor:pointer;" onclick="siguiente({{$s}});">Siguiente →</a></li>
                    </ul>

              </div>

              @php
              $s=$s+1;
              @endphp
             

          @endforeach

            <ul class="skills">
            <li data-percent="10">
              <span>Progreso</span>
              <div class="progress skills-animated" style="width: 10%;">
                <div class="progress-percent"><div class="counter counter-inherit counter-instant"><span data-from="0" data-to="10" data-refresh-interval="30" data-speed="1100">10</span>%</div></div>
              </div>
            </li>
          </ul>
          </div>

        </div>


    </div>

  </div>

</section><!-- #content end -->

<script type="text/javascript">
  
  function regresar (section) {
    var ant = section-2;
    $( "#tabs" ).tabs( "option", "active", ant );
  }

  function siguiente (section) {
    var sig = section;
    $( "#tabs" ).tabs( "option", "active", sig );
  }

</script>

@stop