<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>List of All users</title>
  </head>
  <body>
    <h1>List of all users:</h1>
    @foreach($users as $user)
       <p>{{ $user->name }} ({{ Html::link('users/'.$user->id,'profile')}})</p>
    @endforeach
  </body>
</html>
