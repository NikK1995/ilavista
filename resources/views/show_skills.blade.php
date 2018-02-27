<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    @foreach($skill as $s)
       <p>{{ $s->name }} ({{ Html::link('admin/delete/'.$s->id,'delete')}})</p>
    @endforeach

  </body>
</html>
