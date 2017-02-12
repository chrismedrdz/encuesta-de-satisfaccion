<style type="text/css">
.title-block { border-left: 7px solid #C02942;}
.rating-container{display: inline-block;}
.control-label {display: block;}
.rating-disabled .rating { opacity: 0.5; }
.typeahead { width:50%; }
.mtlbl {margin-top: 10px;}
h1{ margin-top: 0px;}
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

          <div class="title-block">
            <h1>{{$section->category->name}}</h1>
            @if($section->description)
            <span class="text-blue">{{$section->description}}</span>
            @endif
          </div>

          {!! Form::open(['id' => 'form_section'.$s, 'name' => 'form_section'.$s, 'onsubmit' => 'return false', 'method' => 'POST',  'url' => url()->current().'/postanswers'
          ] ) !!}

          {!! Form::hidden('section_id', $sec ) !!}
          {!! Form::hidden('survey_id', $survey_id ) !!}
          {!! Form::hidden('user_id', $usuario_id) !!}
    
          @php
            $questions = explode(',', $section->questions_ids);
          @endphp
          
          @php$i=1;/* Contador para el # Pregunta */@endphp
          @foreach ($questions as $question_id)


            @if ( strpos($question_id, 'group') !== false  ) 
            {{-- Es un grupo de preguntas --}}
              @php
              $grupo=\App\GroupQuestions::find(str_replace('group_','', $question_id));
              @endphp

              <div class="panel panel-primary hidden" id="grupo_{{$grupo->id}}">
                  @if($grupo->panel_title != null)
                    <div class="panel-heading">
                      <h3 class="panel-title">{{$grupo->panel_title}}
                      <label style="display: inline;float: right;" id="labelClear_g{{$grupo->id}}">
                        <i class="icon-minus-sign" style="cursor: pointer; color:white;" onclick="borrarGrupo({{$grupo->id}});"></i>
                      </label>
                      </h3>
                    </div>
                  @endif

                  <div class="panel-body">
                  @php$j=1;/* Contador para el # Pregunta */@endphp
                  @foreach ($grupo->questions as $question_group)

                      @php
                      $question=\App\Question::find($question_group->id);
                      @endphp

                      {!! Form::label('', $question['description'], ['class' => 'control-label mtlbl']) !!}
                      
                      @include('client.question_type')

                  @php $j++; @endphp
                  @endforeach

                  </div>
              </div>

            @else
            {{-- Es una pregunta normal --}}
              @php
              $question=\App\Question::find($question_id);
              @endphp

              @if( $question['question_type'] === 10)
                {!! Form::label('', $question['description'], ['class' => 'control-label mtlbl text-primary']) !!}
              @else
                  @if( $question['init_hidden'] === 1)
                    {!! Form::label('', $question['description'], ['class' => 'control-label hidden mtlbl']) !!}  
                  @else 
                    {!! Form::label('', $question['description'], ['class' => 'control-label mtlbl']) !!}
                  @endif
              @endif
              
              @include('client.question_type')

              {{-- Rules --}}
              @if($question['rule_id'] != null)
                  @php 
                      $rule = explode(';', $question->rule->action);
                      $arrayRules = [];
                      for ($i=0; $i < count($rule); $i++) { 
                        $option = explode(':', $rule[$i]);

                        $arrayRules[] = array(
                          'option' => $option[0], 
                          'show' => trim(obtenerCadena($option[1],'show',',')),
                          'hide' => trim(obtenerCadena($option[1],'hide',',')),
                        );
                      }
                  @endphp

                  @if ( strpos($question_id, 'group') !== false  ) 
                  {{-- Es un grupo de preguntas --}}
                    @php $input_id = $question_id.'-'.$question['id']; @endphp
                  @else
                  {{-- Es una pregunta normal --}}
                    @php $input_id = $question_id; @endphp
                  @endif

                  <script type="text/javascript">
                      $(function(){
                        $("#input-{{$input_id}}").change(function(){
                        @foreach($arrayRules as $rules)
                              if( $(this).val() == '{{$rules['option']}}' ) {

                                @if( $rules['show'] != '' && strpos($rules['show'], 'question_id') !== false ) 
                                  @php $input_id_show = explode('=', $rules['show']); @endphp
                                  $('#input-{{$input_id_show[1]}}').removeClass('hidden');
                                  $('#input-{{$input_id_show[1]}}').prev().removeClass('hidden');
                                @elseif( $rules['show'] != '' && strpos($rules['show'], 'group_question') !== false ) 
                                  @php $input_id_show = explode('=', $rules['show']); @endphp
                                  $('#grupo_{{$input_id_show[1]}}').removeClass('hidden');
                                @endif

                                @if( $rules['hide'] != '' && strpos($rules['hide'], 'question_id') !== false )
                                  @php $input_id_hide = explode('=', $rules['hide']); @endphp
                                  $('#input-{{$input_id_hide[1]}}').addClass('hidden');
                                  $('#input-{{$input_id_hide[1]}}').prev().addClass('hidden');
                                @elseif( $rules['hide'] != '' && strpos($rules['hide'], 'group_question') !== false )
                                  @php $input_id_hide = explode('=', $rules['hide']); @endphp
                                  $('#grupo_{{$input_id_show[1]}}').addClass('hidden');
                                @endif

                              }
                            
                        @endforeach

                          });
                      });

                  </script>


              @endif


            @endif              
              

            @php$i++;@endphp
          @endforeach
          
          <div class="line line-sm"></div>

          @if ($section->comments_required == 1)
            <label class="text-red">¿Algún comentario?</label>
            <textarea id="comments_s{{$s}}" placeholder="Escribe algún conmentario..." class="form-control" rows="5" name="comment"></textarea>
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

var id_select;

      function habilitarTypehead(question_id) {
        $('#input-'+question_id).val('');
        $('#input-'+question_id).removeAttr('readonly');

        $('#labelClear_q'+question_id).addClass('hidden');
      }

      function borrarGrupo(group_id) {
        $('#grupo_'+group_id).addClass('hidden');
        $('#'+id_select).val('');
        $('#'+id_select).removeAttr('disabled');
      }

      function deshabilitarSelect(obj) {
        var id = obj.id;
        id_select = id;
        $('#'+id).attr('disabled','disabled');
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