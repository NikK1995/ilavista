<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
{{ Form::open(array('url'=>'users/'.$id, 'method'=>'PUT')) }}
  <p>
    {{Form::label('name','new Username')}}
    {{Form::text('name')}}
</p>

<p>
  {{Form::label('bio','new bio')}}
  {{Form::text('bio')}}
</p>

<p>
  {{Form::label('password','new password')}}
  {{Form::text('password')}}
</p>


<div class="form-group" style="margin-top:18px;">
  <select class="form-control select2 select2-hidden-accessible" multiple="" data-placeholder="Select a State" style="width: 100%;" tabindex="-1" aria-hidden="true" name="skill[]">
  <label>Select skills for user: </label>
     @foreach ($skill as $s)
             <option value="{{ $s->id }}"
          @foreach ($users->skill as $skill_user)
           @if ($skill_user->id == $s->id)
             selected
           @endif
           @endforeach
>{{ $s->name }}</option>
    @endforeach
</select>

</div>

<p>
  {{Form::submit('Update')}}
</p>
{{Form::close() }}
  </body>
</html>
