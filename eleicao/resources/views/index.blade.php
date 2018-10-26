<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Index Page</title>
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
  </head>
  <body>
    <div class="container">
    <br />
    @if (\Session::has('success'))
      <div class="alert alert-success">
        <p>{{ \Session::get('success') }}</p>
      </div><br />
     @endif
    <table class="table table-striped">
    <thead>
      <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Sigla</th>
        <th>Number</th>
        <th>Address</th>
<!--         <th>Passport Office</th> -->
        <th colspan="2">Action</th>
      </tr>
    </thead>
    <tbody>
      
      @foreach($eleicaos as $eleicaos)
      @php
        $date=date('Y-m-d', $eleicao['date']);
        @endphp
      <tr>
        <td>{{$eleicao['id']}}</td>
        <td>{{$eleicao['name']}}</td>
        <td>{{$date}}</td>
        <td>{{$eleicao['sigla']}}</td>
        <td>{{$eleicao['number']}}</td>
        <td>{{$eleicao['address']}}</td>
        
        <td><a href="{{action('EleicaoController@edit', $eleicao['id'])}}" class="btn btn-warning">Editar</a></td>
        <td>
          <form action="{{action('EleicaoController@destroy', $eleicao['id'])}}" method="post">
            @csrf
            <input name="_method" type="hidden" value="DELETE">
            <button class="btn btn-danger" type="submit">Deletar</button>
          </form>
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
  </div>
  </body>
</html>