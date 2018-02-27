<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>


    <form action="/admin/delete/{$skill ->id}" method="get">
      {{ csrf_field() }}

    <input type="checkbox" value="$s->id">
    <button class="btn btn-danger" type="submit"> Delete</button>
    </form>
  </body>
</html>
