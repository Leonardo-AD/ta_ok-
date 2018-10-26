<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Laravel 5.6 CRUD Tutorial With Example </title>
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
  </head>
  <body>
    <div class="container">
      <h2>Edit A Form</h2><br  />
        <form method="post" action="{{action('EleicaoController@update', $id)}}">
        @csrf
        <input name="_method" type="hidden" value="PATCH">
        <div class="row">
          <div class="col-md-4"></div>
          <div class="form-group col-md-4">
            <label for="name">Nome:</label>
            <input type="text" class="form-control" name="name" value="{{$eleicao->name}}">
          </div>
        </div>

        <div class="row">
          <div class="col-md-4"></div>
            <div class="form-group col-md-4">
              <label for="sigla">Sigla</label>
              <input type="text" class="form-control" name="sigla" value="{{$eleicao->email}}">
            </div>
          </div>
        <div class="row">
          <div class="col-md-4"></div>
            <div class="form-group col-md-4">
              <label for="number">Número:</label>
              <input type="text" class="form-control" name="number" value="{{$eleicao->number}}">
            </div>
          </div>

          <div class="row">
          <div class="col-md-4"></div>
          <div class="form-group col-md-4">
            <label for="address">Endereço:</label>
            <input type="text" class="form-control" name="address" value="{{$eleicao->address}}">
          </div>

        <div class="row">
          <div class="col-md-4"></div>
            <!-- <div class="form-group col-md-4" style="margin-left:38px">
                <lable>Passport Office</lable>
                <select name="office">
                  <option value="Mumbai"  @if($passport->office=="Mumbai") selected @endif>Mumbai</option>
                  <option value="Chennai"  @if($passport->office=="Chennai") selected @endif>Chennai</option>
                  <option value="Delhi" @if($passport->office=="Delhi") selected @endif>Delhi</option>  
                  <option value="Bangalore" @if($passport->office=="Bangalore") selected @endif>Bangalore</option>
                </select>
            </div> -->
        </div>
        <div class="row">
          <div class="col-md-4"></div>
          <div class="form-group col-md-4" style="margin-top:60px">
            <button type="submit" class="btn btn-success" style="margin-left:38px">Atualizar</button>
          </div>
        </div>
      </form>
    </div>
  </body>
</html>