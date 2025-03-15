@extends("layouts.main")

@section("title", "Login")

@section("css")
  <link rel="stylesheet" href="{{asset("assets/css/login.css")}}">
@endsection

@section("container")
<div class="presentation"></div>
<div class="content">
  <div class="login-content">
    <div class="title">Gerenciamento de Contatos</div>
    <div class="form-content">
      <form>
        <div data-mdb-input-init class="form-outline mb-4">
          <input type="email" id="form2Example1" class="form-control" />
          <label class="form-label" for="form2Example1">Email address</label>
        </div>
      
        <div data-mdb-input-init class="form-outline mb-4">
          <input type="password" id="form2Example2" class="form-control" />
          <label class="form-label" for="form2Example2">Password</label>
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
      
        <button data-mdb-ripple-init type="button" class="btn btn-primary btn-block mb-4">Entrar</button>
      
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