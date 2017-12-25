<!doctype html>
<html lang="ru">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Задать вопрос</title>
    <!-- Bootstrap core CSS -->
   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
  </head>
  <body>
 <!-- <p>Задать вопрос</p> -->
    <section class="container">
      <div class="question">

        <h1>{{ $header }}</h1>

        <form  class="form-signin" action="" method="POST" >
 {!! csrf_field()!!}
          <select name="category_id" class="form-control">
             @foreach($categories as $category)
            <option value='{{ $category->id}}'>{{ $category->category }}</option>
             @endforeach
          </select>
          <input type="text" name="nickname" class="form-control" placeholder="Nickname" required>
          <input type="text" name="email" class="form-control" placeholder="email" required>
          <input type="text" name="question" class="form-control"  placeholder="Вопрос" required>
          <button class="btn btn-lg btn-primary btn-block" type="submit" name="send" value="Опублитковать вопрос">Опублитковать вопрос</button>
        </form>
<br>
<a href="../">Вернуться в список вопросов</a>
      </div>
    </section>
  </body>
</html>


