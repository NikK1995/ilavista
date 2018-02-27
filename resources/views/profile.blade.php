<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <h1>Profile Page </h1>
       <p>{{ $users->name }}</p>

       @if (Auth::id() == $users->id  or Auth::user()->status == 1)
       {{Html::link('users/'.$users->id.'/edit','Edit profile')}}
       @endif
       <div class="form-group" style="margin-top:18px;">
         <label>Skills of that user: </label>
            @foreach ($skill as $s)

                 @foreach ($users->skill as $skill_user)
                  @if ($skill_user->id == $s->id)
                    {{$s->name}}
                  @endif
                  @endforeach

           @endforeach
    </select>
      </div>
  </body>
</html>
