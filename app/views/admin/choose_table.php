<h2>Choose table</h2>
@$tables = SQL::table('tables')->select()->execute();
@foreach ($tables as $table):
    <button  class="btn btn-primary">{{$table['name']}}</button><br><br>
@ endforeach;
