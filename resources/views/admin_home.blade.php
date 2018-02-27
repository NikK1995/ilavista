<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Admin page</title>
  </head>
  <body>
<h1>This is admin page!</h1>

<h1>List of all users:</h1>
@foreach($users as $user)
   <p>{{ $user->name }} ({{ Html::link('users/'.$user->id,'profile')}})</p>
@endforeach

  </body>
</html>
