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
  background-color: #2d197c;
    display: flex;
    align-items: center;
    justify-content: center;
  /* display: block;
  align-content: center;
  text-align: center; */
}

.container {
  border-radius:  10px;
  background-color: white;
  width: 50vw;
  /* height:1000px; */
  /* margin: 0,auto; */
  /* display: flex; */
  /* margin-left: 20%; */
  padding: 30px;
  position: absolute;
  top:50%;
  left:50%;
  transform: translate(-50%,-50%);
}

.todo_form {
  margin-bottom: 30px;
  justify-content: space-between
}

.todo_table {
  clear: both;
  width:100%;
  text-align: center;
}

/* td {
  width: 10%;
  height: 50px;
  text-align: center;
} */

/* tr:nth-child(even){
  background-color: gray;
} */

button {
  /* width:200px; */
  border-radius: 5px;
  background-color: white;
  padding: 10px
  transition: 0.4s;
  cuesol: pointer;
  outline:none;
  padding: 8px 16px;
  font-weight: bold;
  font-size 12px;
}

.button-add {
  border: 1px solid #dc70fa;
  color:#dc70fa
}

.button-add:hover {
  background-color: purple;
  color: white;
}

.button-update {
  border: 1px solid #fa9770;
  color: #fa9770;
}

.button-update:hover {
  background-color: #fa9770;
  color: white;
}

.button-delete {
  border: 1px solid #71fadc;
  font-weight: bold;
  color:#71fadc;
}

.button-delete:hover {
  background-color: #71fadc;
  color: white;
}

.input__add__content{
  vertical-align: middle;
  width: 80%;
  padding: 5px;
  border-radius: 5px;
  border: 1px solid #ccc;
  appearance: none;
  font-size:14px;
  outline:none;
}

.input__update__content{
  width: 90%;
  padding: 5px;
  border-radius: 5px;
  border: 1px solid #ccc;
  appearance: 
  font-size:14px;
  outline:none;
}

.table__head {
  font-weight: bold
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
      <button class="button-add" type="submit">??????</button>
    </form>
    <table class="todo_table">
      <tr>
        <th class="table__head">?????????</th>
        <th class="table__head">????????????</th>
        <th class="table__head">??????</th>
        <th class="table__head">??????</th>
      </tr>
 @foreach($tasks as $task)
      <form action="/delete" method="post">
        @csrf
        <tr>
          <td>{{$task->created_at}}</td>
          <td>
            <input class="input__update__content" type="text" name="content" value={{$task->content}}></td>
          <td>
            <!-- <input type="button" value="??????"> -->
            <button class="button button-update" formmethod="post" formaction="./update?id={{$task->id}}">??????</button>
          </td>
          <td>
            <button class="button button-delete" formmethod="post" formaction="./delete?id={{$task->id}}">??????</button>
          </td>
        </tr>
      </form>
@endforeach
    </table>
  </div>
</body>

</html>