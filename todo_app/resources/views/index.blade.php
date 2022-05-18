<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  {{-- <link rel="stylesheet" href="../css/style.css"> --}}
  <style>
    
body {
  width: 100%;
  height: 100%;
  background-color: blue;
    display: flex;
    align-items: center;
    justify-content: center;
  /* display: block;
  align-content: center;
  text-align: center; */
}

.container {
  border-radius:  30px;
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

tr:nth-child(even){
  background-color: gray;
}

button {
  /* width:200px; */
  border-radius: 5%;
  background-color: white;
  padding: 10px
  transition: all 0.5s 0s ease
}

.button-add {
  border: 1px solid purple;
}

.button-add:hover {
  background-color: purple;
  color: white;
}

.button-update {
  border: 1px solid orange;
}

.button-update:hover {
  background-color: orange;
  color: white;
}

.button-delete {
  border: 1px solid cyan;
}

.button-delete:hover {
  background-color: cyan;
  color: white;
}
  </style>
</head>

<body>
  <div class="container">
    <h2>Todo List</h2>
@if (count($errors) > 0)
    <div>The content must not be greater than 20 characters.</div>
@endif
    <form class="todo_form" action="/add" method="post">
      @csrf
      <input class="input__add__content" type="text" name="content" required>
      <button class="button-add" type="submit">追加</button>
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
            <button class="button-update" formmethod="post" formaction="./update?id={{$task->id}}">更新</button>
          </td>
          <td>
            <button class="button-delete" formmethod="post" formaction="./delete?id={{$task->id}}">削除</button>
          </td>
        </tr>
      </form>
@endforeach
    </table>
  </div>
</body>

</html>