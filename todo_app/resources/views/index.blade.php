<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <!-- <link rel="stylesheet" href="./style.css"> -->
  <style>
    body {
      width: 100%;
      background-color: blue;
      /* display: block;
  align-content: center;
  text-align: center; */
    }

    .container {
      border-radius: 30px;
      background-color: white;
      width: 60%;
      /* height:1000px; */
      /* margin: 0,auto; */
      /* display: flex; */
      /* margin-left: 20%; */
      padding: 50px;
      position: absolute;
      top:50%;
      left:50%;
      transform: translate(-50%,-50%);
    }

    .todo_form {
      margin-bottom: 50px;
    }

    .todo_table {
      clear: bothS;
    }

    td {
      width: 10%;
      height: 50px;
      text-align: center;
    }

    .table__head {
      font-weight: bold
    }

    /* input {
      width: 80%;
      margin-left: 5px;
    } */

    .input__add__content {
      width: 50%;
      font-size: 24px;
    }
    .input__update__content {
      width: 80%;
      margin-left:10%;
    }
  </style>
</head>

<body>
  <div class="container">
    <h2>Todo List</h2>
    <form class="todo_form" action="/add" method="post">
      @csrf
      <input class="input__add__content" type="text" name="content" required>
      <button type="submit">追加</button>
    </form>
    <table class="todo_table" border="1">
      <tr>
        <td class="table__head">作成日</td>
        <td class="table__head">タスク名</td>
        <td class="table__head">更新</td>
        <td class="table__head">削除</td>
      </tr>
 @foreach($tasks as $task)
      <form action="/delete" method="post">
        @csrf
        <tr>
          <td>{{$task->created_at}}</td>
          <td>
            <input class="input__update__content" type="text" name="content" value={{$task->content}}></td>
          <td>
            <!-- <input type="button" value="更新"> -->
            <button formmethod="post" formaction="./update?id={{$task->id}}">更新</button>
          </td>
          <td>
            <button formmethod="post" formaction="./delete?id={{$task->id}}">削除</button>
          </td>
        </tr>
      </form>
@endforeach
    </table>
  </div>
</body>

</html>