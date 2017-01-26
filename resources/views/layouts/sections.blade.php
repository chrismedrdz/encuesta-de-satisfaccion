<style type="text/css">
.title-block { border-left: 7px solid #C02942;}
.rating-container{display: inline-block;}
.control-label {display: block;}
.rating-disabled .rating { opacity: 0.5; }
.typeahead { width:50%; }
</style>
<div class="tab-container">
@php
  $s=1;
  $aux=0;
@endphp

@foreach ($sections as $sec)
    @php
    $section=\App\Section::find($sec);

    @endphp

    <script type="text/javascript">
        /* Global Variable for section validate*/
        var globalSection{{$s}} = [];

    </script>

    @if ($section_active == $aux)
      <div class="tab-content clearfix ui-tabs-panel ui-widget-content ui-corner-bottom active" id="tab-s{{$s}}" >
    @else
      <div class="tab-content clearfix ui-tabs-panel ui-widget-content ui-corner-bottom" id="tab-s{{$s}}" >
    @endif
          <div id="errormsg_s{{$s}}" class="style-msg errormsg hidden">
            <div class="sb-msg"><i class="icon-remove"></i><strong>Ups!</strong> Debes completar todos los reactivos para continuar.</div>
          </div>

          @if($section->description)
            <div class="title-block">
              <p class="text-blue">{{$section->description}}</p>
            </div>
          @endif

          

          {!! Form::open(['id' => 'form_section'.$s, 'name' => 'form_section'.$s, 'onsubmit' => 'return false', 'method' => 'POST',  'url' => url()->current().'/postanswers'
          ] ) !!}

          {!! Form::hidden('section_id', $sec ) !!}
          {!! Form::hidden('survey_id', $survey_id ) !!}
          {!! Form::hidden('user_id', $usuario->id ) !!}
    
          @php
            $questions = explode(',', $section->questions_ids);
          @endphp
          
          @php$i=1;@endphp
          @foreach ($questions as $question_id)

            @php
            $question=\App\Question::find($question_id);
            @endphp

            {!! Form::label('', $i.' - '. $question['description'], ['class' => 'control-label']) !!}
              
              @if( $question['question_type'] === 1)
                {{--3 estrellas --}}
                 @php
                  $key=$question->id;{{--Le asigno a la variable $key el id de la pregunta--}}
                  $key= (string)$key;
                 
                @endphp
                {{--Hago un array y fuerzo a que el indice del array sea el id de la pregunta y que el valor sea lo que el usuario desee según las estrellas de rating js--}}
                {!! Form::text('question['.$key. ']]', '0' ,['id' => 'input-'.$question['id'], 'class' => 'rating' ]) !!}

                @if( $question->type['na_active'] === 1)
                  <label style="display: inline; font-weight:bold; color: #C02942;">
                    <input type="checkbox" onclick="setNA(this,{{$question['id']}});" id="na_q{{$question['id']}}" name="na_q{{$question['id']}}" value="0"> No Aplica 
                  </label>
                @endif

                @if( $question['required'] === 1)
                <span id="labelRequired_q{{$question['id']}}" class="label label-danger hidden">Requerido</span>
                @endif

                <script>
                  $("#input-{{$question['id']}}").rating({
                    min:0, max:{{$question->type->high_rank}}, stars:{{$question->type->high_rank}}, step:1, size:'xs', showClear:false, clearCaption:'', showCaption:true,
                      starCaptions: {
                          '1': 'Insatisfecho',
                          '2': 'Ni Insatisfecho ni Satisfecho',
                          '3': 'Satisfecho',
                          '1111':   'No Aplica'
                      },
                      starCaptionClasses: {
                          '1': 'label label-danger',
                          '2': 'label label-info',
                          '3': 'label label-success'
                      }
                  }).on("rating.change", function(event, value, caption) {
                    $('#input-{{$question['id']}}').val(value);
                  });
                  globalSection{{$s}}.push({
                      type : 'rating',
                      question : {{$question['id']}}
                  });
                </script>

              @elseif( $question['question_type'] === 2)
                {{--5 estrellas --}}
                 @php
                  $key=$question['id'];
                  $key= (string)$key;
                 
                @endphp

                {!! Form::text('question['.$key. ']]', '0' ,['id' => 'input-'.$question['id'], 'class' => 'rating' ]) !!}

                @if( $question->type['na_active'] === 1)
                  <label style="display: inline; font-weight:bold; color: #C02942;">
                    <input type="checkbox" onclick="setNA(this,{{$question['id']}});" id="na_q{{$question['id']}}" name="na_q{{$question['id']}}" value="0"> No Aplica 
                  </label>
                @endif

                @if( $question['required'] === 1)
                  <span id="labelRequired_q{{$question['id']}}" class="label label-danger hidden">Requerido</span>
                @endif

                <script>
                  $("#input-{{$question['id']}}").rating({
                    min:0, max:{{$question->type->high_rank}}, stars:{{$question->type->high_rank}}, step:1, size:'xs', showClear:false, clearCaption:'', showCaption:true,
                      starCaptions: {
                          '1': 'Muy Insatisfecho',
                          '2': 'Insatisfecho',
                          '3': 'Ni insatisfecho ni satisfecho',
                          '4': 'Satisfecho',
                          '5':   'Muy Satisfecho',
                          '1111':   'No Aplica'
                      },
                      starCaptionClasses: {
                          '1': 'label label-danger',
                          '2': 'label label-warning',
                          '3': 'label label-info',
                          '4': 'label label-primary',
                          '5': 'label label-success'
                      }
                  }).on("rating.change", function(event, value, caption) {
                    $('#input-{{$question['id']}}').val(value);
                  });
                  globalSection{{$s}}.push({
                      type : 'rating',
                      question : {{$question['id']}}
                  });
                </script>

              @elseif( $question['question_type'] === 3)
                {{--10 estrellas --}}
                @php
                  $key=$question['id'];
                  $key= (string)$key;
                 
                @endphp

                {!! Form::text('question['.$key. ']]', '0' ,['id' => 'input-'.$question['id'], 'class' => 'rating' ]) !!}

                @if( $question->type['na_active'] === 1)
                  <label style="display: inline; font-weight:bold; color: #C02942;">
                    <input type="checkbox" onclick="setNA(this,{{$question['id']}});" id="na_q{{$question['id']}}" name="na_q{{$question['id']}}" value="0"> No Aplica 
                  </label>
                @endif

                @if( $question['required'] === 1)
                  <span id="labelRequired_q{{$question['id']}}" class="label label-danger hidden">Requerido</span>
                @endif

                <script>
                  $("#input-{{$question['id']}}").rating({
                    min:0, max:10, stars:10, step:1, size:'xs', showClear:false, clearCaption:'', showCaption:false
                  }).on("rating.change", function(event, value, caption) {
                    //alert(value);
                    $('#input-{{$question['id']}}').val(value);
                  });

                  globalSection{{$s}}.push({
                      type : 'rating',
                      question : {{$question['id']}}
                  });

                </script>

              @elseif( $question['question_type'] === 4)
                {{--select (multiple) --}}
                @php
                  $questions_str = ','.$question->options;
                  $options_question = explode(',', $questions_str);
                  $key=$question->id;
                  $keys= array($key);                  

                @endphp
                  
                {!! Form::select('question['.$key. ']]', $options_question, null, ['id' => 'input-'.$question['id'], 'class' => 'form-control chosen-select', 'style' => 'width:auto; display: inline;'] ) !!}

                @if( $question['required'] === 1)
                  <span id="labelRequired_q{{$question['id']}}" class="label label-danger hidden">Requerido</span>
                @endif

                <script>
                  globalSection{{$s}}.push({
                      type : 'select',
                      question : {{$question['id']}}
                  });
                </script>

              @elseif( $question['question_type'] === 5)
                {{--text --}}
                @php
                  $key=$question['id'];
                  $key= (string)$key;
                 
                @endphp

                {!! Form::text('question['.$key. ']]', '' ,['id' => 'input-'.$question['id'], 'class' => 'form-control', 'style' => 'width:50%;' ]) !!}

                @if( $question['required'] === 1)
                  <span id="labelRequired_q{{$question['id']}}" class="label label-danger hidden">Requerido</span>
                @endif

                <script>
                  globalSection{{$s}}.push({
                      type : 'text',
                      question : {{$question['id']}}
                  });
                </script>

              @elseif( $question['question_type'] === 6)
                {{--textarea --}}
                @php
                  $key=$question['id'];
                  $key= (string)$key;
                 
                @endphp

                {!! Form::textarea('question['.$key. ']]', '' ,['id' => 'input-'.$question['id'], 'class' => 'form-control', 'rows' => '4' , 'style' => 'resize:none;' ]) !!}

                @if( $question['required'] === 1)
                  <span id="labelRequired_q{{$question['id']}}" class="label label-danger hidden">Requerido</span>
                @endif

                <script>
                  globalSection{{$s}}.push({
                      type : 'textarea',
                      question : {{$question['id']}}
                  });
                </script>


              @elseif( $question['question_type'] === 7)
                {{--input typehead 1 (basic)  --}}
                 @php
                  $key=$question['id'];
                  $key= (string)$key;
                 
                @endphp

                {!! Form::text('question['.$key. ']]', '' ,['id' => 'input-'.$question['id'], 'class' => 'typeahead sm-form-control', 'style' => 'width:50%;display: inline;' ]) !!}

                @if( $question['required'] === 1)
                  <span id="labelRequired_q{{$question['id']}}" class="label label-danger hidden">Requerido</span>
                @endif

                <script>

                  var path = "{{ route('autocomplete-basic') }}";
                  $('#input-'{{$question['id']}}).typeahead({
                      source:  function (query, process) {
                      return $.get(path, { query: query }, function (data) {
                          return process(data);
                        });
                      }
                  });

                  globalSection{{$s}}.push({
                      type : 'text',
                      question : {{$question['id']}}
                  });
                </script>



                @elseif( $question['question_type'] === 8)
                {{--input typehead 2 (maestros)  --}}
                @php
                  $key=$question['id'];
                  $key= (string)$key;
                 
                @endphp

                {!! Form::text('question['.$key. ']]', '' ,['id' => 'input-'.$question['id'], 'class' => 'typeahead sm-form-control', 'style' => 'width:50%;display: inline;' ]) !!}

                <label style="display: inline;" class="hidden" id="labelClear_q{{$question['id']}}">
                  <i class="icon-minus-sign" style="cursor: pointer;" onclick="habilitarTypehead({{$question['id']}});"></i>
                </label>

                @if( $question['required'] === 1)
                  <span id="labelRequired_q{{$question['id']}}" class="label label-danger hidden">Requerido</span>
                @endif

                </BR>

                <script>

                    var path = "{{ route('autocomplete-maestros') }}";
                    $('#input-{{$question['id']}}').typeahead({
                        source:  function (query, process) {
                        return $.get(path, { query: query }, function (data) {
                            return process(data);
                          });
                        },
                        displayText: function (item) {
                            return item.value + " &ndash; " + item.description;
                        },
                        highlighter: function(item) {
                            var query = this.query;
                            if(!query) {
                                return '<div> ' + item + '</div>';
                            }

                            var reEscQuery = query.replace(/[\-\[\]\/\{\}\(\)\*\+\?\.\\\^\$\|]/g, "\\$&");
                            var reQuery = new RegExp('(' + reEscQuery + ')', "gi");

                            var jElem = $('<div></div>').html(item);
                            var textNodes = $(jElem.find('*')).add(jElem).contents().filter(function () { return this.nodeType === 3; });
                            textNodes.replaceWith(function() {
                                return $(this).text().replace(reQuery, '<strong>$1</strong>')
                            });

                            return jElem.html();
                        },
                        afterSelect: function( item ){
                            $('#inputs-{{$question['id']}}').val( item.value );
                            $('#inputs-{{$question['id']}}').attr( 'readonly' , 'readonly');

                            $('#labelClear_q{{$question['id']}}').removeClass('hidden');
                        }
                    });

                    globalSection{{$s}}.push({
                        type : 'text',
                        question : {{$question['id']}}
                    });

                </script>

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

              <button type="submit" onclick="validateForm({{$s}});" class="button button-rounded button-reveal button-large button-green tright"><i class="icon-line-arrow-right"></i><span>Siguiente</span></button>
              
          </ul>

      {!! Form::close() !!}
  
    </div>
    
    @php
    $s=$s+1; //aux var for section count
    $aux++; //aux var for section count 2
    @endphp

@endforeach
</div>

<script type="text/javascript">

      function habilitarTypehead(question_id) {
        $('#inputs-'+question_id).val('');
        $('#inputs-'+question_id).removeAttr('readonly');

        $('#labelClear_q'+question_id).addClass('hidden');
      }


      function validateForm(section) {
        
        var questions = window['globalSection'+section ];
        var validate=0;

        for (var i = 0; i < questions.length; i++) {

          if (questions[i]['type'] == 'rating') {
            //Validation for question type rating

            var ratingValue = $('#input-'+questions[i]['question']).rating('refresh').val();

            if (ratingValue > 0) {
              //Validate is true
              validate++;
              $('#labelRequired_q'+questions[i]['question']).addClass('hidden');
            } else {
              //Check if na is active
              if ($('#na_q'+questions[i]['question']).length > 0) {
                // exists na checkbox for this question
                if ($('#na_q'+questions[i]['question']).val() == '1') {
                  // no aplica
                  validate++;
                  $('#labelRequired_q'+questions[i]['question']).addClass('hidden');
                } else {
                  $('#labelRequired_q'+questions[i]['question']).removeClass('hidden');
                }

              } else {
                $('#labelRequired_q'+questions[i]['question']).removeClass('hidden');
              }
            }

          } else if (questions[i]['type'] == 'select') {
            //Validation for question type select

            var selectValue = $('#input-'+questions[i]['question']).val();

            if (selectValue == 0) {
              $('#labelRequired_q'+questions[i]['question']).removeClass('hidden');
            } else {
              //validate is true
              validate++;
              $('#labelRequired_q'+questions[i]['question']).addClass('hidden');
            }

          } else if (questions[i]['type'] == 'text') {
            //Validation for question type text

            var textValue = $('#input-'+questions[i]['question']).val();

            if (textValue.length === 0) {
              $('#labelRequired_q'+questions[i]['question']).removeClass('hidden');
            } else {
              //validate is true
              validate++;
              $('#labelRequired_q'+questions[i]['question']).addClass('hidden');
            }

          } else if (questions[i]['type'] == 'textarea') {
            //Validation for question type textarea

            var textareaValue = $('#input-'+questions[i]['question']).val();

            if (textareaValue.length === 0) {
              $('#labelRequired_q'+questions[i]['question']).removeClass('hidden');
            } else {
              //validate is true
              validate++;
              $('#labelRequired_q'+questions[i]['question']).addClass('hidden');
            }
          
          } else {
            // nothing (may be radio, checkbox)
            return false;
          } 

                
        }

        if (validate != questions.length ) {
          $("html, body").animate({ scrollTop: 0 }, "slow");
          $('#errormsg_s'+section).removeClass('hidden');
        } else {
          //submit succesfully
          $('#errormsg_s'+section).addClass('hidden');


          $('#form_section'+section).removeAttr('onsubmit');
          $('#form_section'+section).submit();
        }
        
      }

    </script>