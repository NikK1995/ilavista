<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
    {{ Form::open(array('url'=>'admin/create_skills', 'method'=>'POST')) }}
  </head>
  <body>
      <p>
        {{Form::label('name','new Skill')}}
        {{Form::text('name')}}
    </p>
    <p>
      {{Form::submit('Update')}}
    </p>
    {{Form::close() }}
  </body>
</html>
