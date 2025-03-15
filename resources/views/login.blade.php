@extends("layouts.main")

@section("title", "Login")

@section("css")
  <link rel="stylesheet" href="{{asset("assets/css/login.css")}}">
@endsection

@section("container")
@include("includes.flash-message")
<div class="presentation"></div>
<div class="content">
  <div class="login-content">
    <div class="title">Gerenciamento de Contatos</div>
    <div class="form-content">
      <form action="{{route("authenticate")}}" method="POST">
        @csrf
        @method("POST")
        <div data-mdb-input-init class="form-outline mb-4">
          <input type="email" name="email" id="email" class="form-control" />
          <label class="form-label" for="email">Email</label>
        </div>
      
        <div data-mdb-input-init class="form-outline mb-4">
          <input type="password" name="password" id="password" class="form-control" />
          <label class="form-label"  for="password">Password</label>
        </div>
      
        <div class="row mb-4">
          <div class="col d-flex">
            <div class="form-check">
              <input class="form-check-input" type="checkbox" value="" id="form2Example34" checked />
              <label class="form-check-label" for="form2Example34">Lembrar-me</label>
            </div>
          </div>
      
          <div class="col">
            <a href="#!">Esqueci a senha</a>
          </div>
        </div>
      
        <button data-mdb-ripple-init type="submit" class="btn btn-primary btn-block mb-4">Entrar</button>
      
        <div class="text-center">
          <p>Não está cadastrado? <a href="#!">Registre-se</a></p>
        </div>
      </form>
    </div>
  </div>
</div>
@endsection

@section("js")
  
@endsection
</html>