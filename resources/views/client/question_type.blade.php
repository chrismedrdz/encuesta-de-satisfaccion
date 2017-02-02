@if ( strpos($question_id, 'group') !== false  ) 
{{-- Es un grupo de preguntas --}}
  @php $input_id = $question_id.'-'.$question['id']; @endphp
@else
{{-- Es una pregunta normal --}}
  @php $input_id = $question_id; @endphp
@endif



@if( $question['question_type'] === 1)
{{--3 estrellas --}}
 @php
  $key=$question->id;
  $key= (string)$key;
@endphp
{!! Form::text('question['.$key. ']]', '0' ,['id' => 'input-'.$input_id, 'class' => 'rating' ]) !!}

@if( $question->type['na_active'] === 1)
  <label style="display: inline; font-weight:bold; color: #C02942;">
    <input type="checkbox" onclick="setNA(this,'{{$input_id}}');" id="na_q{{$input_id}}" name="question[{{$key}}]]" value="1111"> No Aplica 
  </label>
@endif

@if( $question['required'] === 1)
<span id="labelRequired_q{{$input_id}}" class="label label-danger hidden">Requerido</span>
@endif

<script>
  $("#input-{{$input_id}}").rating({
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
    $('#input-{{$input_id}}').val(value);
  });
  globalSection{{$s}}.push({
      type : 'rating',
      question : '{{$input_id}}'
  });
</script>

@elseif( $question['question_type'] === 2)
{{--5 estrellas --}}
 @php
  $key=$question['id'];
  $key= (string)$key;
@endphp

{!! Form::text('question['.$key.']', '0' ,['id' => 'input-'.$input_id, 'class' => 'rating' ]) !!}

@if( $question->type['na_active'] === 1)
  <label style="display: inline; font-weight:bold; color: #C02942;">
    <input type="checkbox" onclick="setNA(this,'{{$input_id}}');" id="na_q{{$input_id}}" name="question[{{$key}}]]" value="1111"> No Aplica 
  </label>
@endif

@if( $question['required'] === 1)
  <span id="labelRequired_q{{$input_id}}" class="label label-danger hidden">Requerido</span>
@endif

<script>
  $("#input-{{$input_id}}").rating({
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
    $('#input-{{$input_id}}').val(value);
  });
  @if( $question['required'] === 1)
  globalSection{{$s}}.push({
      type : 'rating',
      question : '{{$input_id}}'
  });
  @endif
</script>

@elseif( $question['question_type'] === 3)
{{--10 estrellas --}}
@php
  $key=$question['id'];
  $key= (string)$key;
 
@endphp

{!! Form::text('question['.$key.']', '0' ,['id' => 'input-'.$input_id, 'class' => 'rating' ]) !!}

@if( $question->type['na_active'] === 1)
  <label style="display: inline; font-weight:bold; color: #C02942;">
    <input type="checkbox" onclick="setNA(this,'{{$input_id}}');" id="na_q{{$input_id}}" name="question[{{$key}}]]" value="1111"> No Aplica 
  </label>
@endif

@if( $question['required'] === 1)
  <span id="labelRequired_q{{$input_id}}" class="label label-danger hidden">Requerido</span>
@endif

<script>
  $("#input-{{$input_id}}").rating({
    min:0, max:10, stars:10, step:1, size:'xs', showClear:false, clearCaption:'', showCaption:false
  }).on("rating.change", function(event, value, caption) {
    //alert(value);
    $('#input-{{$input_id}}').val(value);
  });

  @if( $question['required'] === 1)
  globalSection{{$s}}.push({
      type : 'rating',
      question : '{{$input_id}}'
  });
  @endif

</script>

@elseif( $question['question_type'] === 4)
{{--select unique --}}
@php
  $questions_str = ','.$question->options;
  $options_question = explode(',', $questions_str);
  $key=$question->id;
  $keys= array($key);                  

@endphp

@if( $question['init_hidden'] === 1)
  {!! Form::select('question['.$key.']]', $options_question, null, ['id' => 'input-'.$input_id, 'class' => 'form-control chosen-select hidden', 'style' => 'width:auto; display: inline;'] ) !!}
@else 
  {!! Form::select('question['.$key.']]', $options_question, null, ['id' => 'input-'.$input_id, 'class' => 'form-control chosen-select', 'style' => 'width:auto; display: inline;'] ) !!}
@endif

@if( $question['required'] === 1)
  <span id="labelRequired_q{{$input_id}}" class="label label-danger hidden">Requerido</span>
@endif

<script>
  @if( $question['required'] === 1)
      globalSection{{$s}}.push({
          type : 'select',
          question : '{{$input_id}}'
      });
  @endif
</script>

@elseif( $question['question_type'] === 9)
{{--select multiple --}}
@php
  $questions_str = ','.$question->options;
  $options_question = explode(',', $questions_str);
  $key=$question->id;
  $keys= array($key);                  

@endphp

@if( $question['init_hidden'] === 1)
  {!! Form::select('question['.$key. ']]', $options_question, null, ['id' => 'input-'.$input_id, 'class' => 'form-control chosen-select select2 hidden', 'multiple' => 'multiple', 'style' => 'width:auto; display: inline;'] ) !!}
@else 
  {!! Form::select('question['.$key. ']]', $options_question, null, ['id' => 'input-'.$input_id, 'class' => 'form-control chosen-select select2', 'multiple' => 'multiple', 'style' => 'width:auto; display: inline;'] ) !!}
@endif


@if( $question['required'] === 1)
  <span id="labelRequired_q{{$input_id}}" class="label label-danger hidden">Requerido</span>
@endif

<script>
  @if( $question['required'] === 1)
      globalSection{{$s}}.push({
          type : 'select',
          question : '{{$input_id}}'
      });
  @endif
</script>

@elseif( $question['question_type'] === 5)
{{--text --}}
@php
  $key=$question['id'];
  $key= (string)$key;
 
@endphp

@if( $question['init_hidden'] === 1)
  {!! Form::text('question['.$key.']]', '' ,['id' => 'input-'.$input_id, 'class' => 'form-control hidden', 'style' => 'width:50%;' ]) !!}
@else 
  {!! Form::text('question['.$key.']]', '' ,['id' => 'input-'.$input_id, 'class' => 'form-control', 'style' => 'width:50%;' ]) !!}
@endif

@if( $question['required'] === 1)
  <span id="labelRequired_q{{$input_id}}" class="label label-danger hidden">Requerido</span>
@endif

<script>
  @if( $question['required'] === 1)
      globalSection{{$s}}.push({
          type : 'text',
          question : '{{$input_id}}'
      });
  @endif
</script>

@elseif( $question['question_type'] === 6)
{{--textarea --}}
@php
  $key=$question['id'];
  $key= (string)$key;
@endphp

@if( $question['init_hidden'] === 1)
  {!! Form::textarea('question['.$key. ']]', '' ,['id' => 'input-'.$input_id, 'class' => 'form-control hidden', 'rows' => '4' , 'style' => 'resize:none;' ]) !!}
@else 
  {!! Form::textarea('question['.$key. ']]', '' ,['id' => 'input-'.$input_id, 'class' => 'form-control', 'rows' => '4' , 'style' => 'resize:none;' ]) !!}
@endif

@if( $question['required'] === 1)
  <span id="labelRequired_q{{$input_id}}" class="label label-danger hidden">Requerido</span>
@endif

<script>
  @if( $question['required'] === 1)
      globalSection{{$s}}.push({
          type : 'textarea',
          question : '{{$input_id}}'
      });
  @endif
</script>

@elseif( $question['question_type'] === 7)
{{--input typehead 1 (basic)  --}}
 @php
  $key=$question['id'];
  $key= (string)$key;
 
@endphp

@if( $question['init_hidden'] === 1)
  {!! Form::text('question['.$key. ']]', '' ,['id' => 'input-'.$input_id, 'class' => 'typeahead sm-form-control hidden', 'style' => 'width:50%;display: inline;' ]) !!}
@else 
  {!! Form::text('question['.$key. ']]', '' ,['id' => 'input-'.$input_id, 'class' => 'typeahead sm-form-control', 'style' => 'width:50%;display: inline;' ]) !!}
@endif


@if( $question['required'] === 1)
  <span id="labelRequired_q{{$input_id}}" class="label label-danger hidden">Requerido</span>
@endif

<script>

  var path = "{{ url('autocomplete-basic') }}";
  $('#input-{{$input_id}}').typeahead({
      source:  function (query, process) {
      return $.get(path, { query: query }, function (data) {
          return process(data);
        });
      }
  });

  @if( $question['required'] === 1)
      globalSection{{$s}}.push({
          type : 'text',
          question : '{{$input_id}}'
      });
  @endif
</script>

@elseif( $question['question_type'] === 8)
{{--input typehead 2 (maestros)  --}}
@php
  $key=$question['id'];
  $key= (string)$key;
@endphp

@if( $question['init_hidden'] === 1)
  {!! Form::text('question['.$key. ']]', '' ,['id' => 'input-'.$input_id, 'class' => 'typeahead sm-form-control hidden', 'style' => 'width:50%;display: inline;' ]) !!}
@else 
  {!! Form::text('question['.$key. ']]', '' ,['id' => 'input-'.$input_id, 'class' => 'typeahead sm-form-control', 'style' => 'width:50%;display: inline;' ]) !!}
@endif

<label style="display: inline;" class="hidden" id="labelClear_q{{$input_id}}">
  <i class="icon-minus-sign" style="cursor: pointer;" onclick="habilitarTypehead({{$input_id}});"></i>
</label>

@if( $question['required'] === 1)
  <span id="labelRequired_q{{$input_id}}" class="label label-danger hidden">Requerido</span>
@endif

</BR>

<script>

    var path = "{{ url('autocomplete-maestros') }}";
    $('#input-{{$input_id}}').typeahead({
        source:  function (query, process) {
        return $.get(path, { query: query }, function (data) {
            return process(data);
          });
        }
    });
    /*
    $('#input-{{--$input_id--}}').typeahead({
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
            $('#inputs-{{--$input_id--}}').val( item.value );
            $('#inputs-{{--$input_id--}}').attr( 'readonly' , 'readonly');

            $('#labelClear_q{{--$input_id--}}').removeClass('hidden');
        }
    });
    */

    @if( $question['required'] === 1)
        globalSection{{$s}}.push({
            type : 'text',
            question : '{{$input_id}}'
        });
    @endif

</script>

@elseif( $question['question_type'] === 10)
{{--Texto plano (nada que hacer) --}}


@elseif( $question['question_type'] === 11)
{{--checkbox multiple --}}
@php
  $questions_str = $question->options;
  $options_question = explode(',', $questions_str);
  $key=$question->id;
  $keys= array($key);
@endphp
  
  @php $k=0; @endphp
  @foreach($options_question as $key2 => $value2)

    <div>
      <input id="checkbox-q{{$k}}" class="checkbox-style" name="question[{{$question['id']}}]" type="checkbox" >
      <label for="checkbox-q{{$k}}" class="checkbox-style-3-label">{{$value2}}</label>
    </div>

  @php $k++; @endphp
  @endforeach



@if( $question['required'] === 1)
  <span id="labelRequired_q{{$input_id}}" class="label label-danger hidden">Requerido</span>
@endif

<script>
  globalSection{{$s}}.push({
      type : 'select',
      question : '{{$input_id}}'
  });
</script>

@else
  <p>Error</p>
@endif