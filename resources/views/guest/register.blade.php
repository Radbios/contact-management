@extends("layouts.main")

@section("title", "Cadastro")

@section("css")
  <link rel="stylesheet" href="{{asset("assets/css/login.css")}}">
@endsection

@section("container")
<div class="content">
  <div class="login-content">
    <div class="title">Gerenciamento de Contatos</div>
    <div class="form-content">
      <form action="{{route("user.register")}}" method="POST">
        @csrf
        @method("POST")
        <div data-mdb-input-init class="form-outline mb-4">
          <input type="text" name="name" id="name" class="form-control" />
          <label class="form-label" for="name">Nome</label>
        </div>

        <div data-mdb-input-init class="form-outline mb-4">
          <input type="email" name="email" id="email" class="form-control" />
          <label class="form-label" for="email">Email</label>
        </div>
      
        <div data-mdb-input-init class="form-outline mb-4">
          <input type="password" name="password" id="password" class="form-control" />
          <label class="form-label"  for="password">Senha</label>
        </div>

        <div data-mdb-input-init class="form-outline mb-4">
          <input type="password" name="password_confirmation" id="password_confirmation" class="form-control" />
          <label class="form-label" for="password_confirmation">Confirmar Senha</label>
        </div>
      
        <button data-mdb-ripple-init type="submit" class="btn btn-primary btn-block mb-4">Cadastrar</button>
      
        <div class="text-center">
          <p>Já tem conta? <a href="{{route("login")}}">Entrar</a></p>
        </div>
      </form>
    </div>
  </div>
</div>
@endsection

@section("js")
  
@endsection
</html>