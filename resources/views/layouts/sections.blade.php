<style type="text/css">
.title-block { border-left: 7px solid #C02942;}
</style>
<div class="tab-container">
@php
  $s=1;
@endphp

@foreach ($sections as $sec)
    @php
    $section=\App\Section::find($sec);
    @endphp

    <div class="tab-content clearfix ui-tabs-panel ui-widget-content ui-corner-bottom" id="tab-s{{$s}}" aria-labelledby="ui-id-29" role="tabpanel" aria-expanded="true" aria-hidden="false" style="display: block;">

          @if($section->description)
            <div class="title-block">
              <p class="text-blue">{{$section->description}}</p>
            </div>
          @endif

          {!! Form::open(['method' => 'POST',  'url' => url('answers' )] ) !!}

          @php
            $questions = explode(',', $section->questions_ids);
          @endphp
          
          @php$i=1;@endphp
          @foreach ($questions as $question_id)
            @php
            $question=\App\Question::find($question_id);
            @endphp

            {!! Form::label('', $i.' - '. $question['description'], ['class' => 'control-label']) !!}
              
              @php
              @endphp

              @if( $question['question_type'] === 1)
                {{--3 estrellas --}}
              @elseif( $question['question_type'] === 2)
                {{--5 estrellas --}}
                {!! Form::number('input-'.$question['id'], '0') !!}

                <script>
                  $("#input-{{$question['id']}}").rating({
                    min:1, max:{{$question->type->high_rank}}, step:0.8, size:'xs',showClear:false, clearCaption:'',
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
              @elseif( $question['question_type'] === 3)
                {{--10 estrellas --}}
                {!! Form::number('input-'.$question['id'], '0',['id' => 'input-'.$question['id']]) !!}

                <script>
                  $("#input-{{$question['id']}}").rating({
                    min:1, max:10, step:1, size:'xs',showClear:false, clearCaption:'',
                    starCaptions: {
                        '1': 'Muy Insatisfecho',
                        '2': 'Insatisfecho',
                        '3': 'Ni insatisfecho ni satisfecho',
                        '4': 'Satisfecho',
                        '5':   'Muy Satisfecho',
                        '6': 'Muy Insatisfecho',
                        '7': 'Insatisfecho',
                        '8': 'Ni insatisfecho ni satisfecho',
                        '9': 'Satisfecho',
                        '10':   'Muy Satisfecho'
                    },
                    starCaptionClasses: {
                        '1': 'label label-danger',
                        '2': 'label label-warning',
                        '3': 'label label-info',
                        '4': 'label label-primary',
                        '5': 'label label-success',
                        '6': 'label label-danger',
                        '7': 'label label-warning',
                        '8': 'label label-info',
                        '9': 'label label-primary',
                        '10': 'label label-success'
                    }
                  });
                </script>


              @elseif( $question['question_type'] === 4)
                {{--select (multiple) --}}
                @php
                  $options_question=array();
                @endphp
                {!! Form::select('cot_cliente_id', $options_question, null, ['class' => 'form-control chosen-select col-xs-12'] ) !!}

              @elseif( $question['question_type'] === 5)
                {{--text --}}
              @elseif( $question['question_type'] === 6)
                {{--textarea --}}
              @elseif( $question['question_type'] === 7)
                {{--input typehead () --}}
                <input class="typeahead sm-form-control tt-input" type="text" placeholder="" autocomplete="off" spellcheck="false" dir="auto" >
              @else
                  <p>Error</p>
              @endif

                

                

            @php$i++;@endphp
          @endforeach
          
          <div class="line line-sm"></div>

          @if ($section->comments_required == 1)
            <label class="text-red">¿Algún comentario?</label>
            <textarea id="comments_s{{$s}}" placeholder="Escribe algún conmentario..." class="form-control" rows="5"></textarea>
            <br>
          @endif

          <ul class="pager center">

              <a onclick="siguiente({{$s}});" class="button button-rounded button-reveal button-large button-green tright"><i class="icon-line-arrow-right"></i><span>Siguiente</span></a>
              
          </ul>

      {!! Form::close() !!}

    </div>

    @php
    $s=$s+1;
    @endphp
   

@endforeach

  
</div>