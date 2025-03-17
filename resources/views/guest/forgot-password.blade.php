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
      <form action="{{route("password.request")}}" method="POST">
        @csrf
        @method("POST")
        <div data-mdb-input-init class="form-outline mb-4">
          <input type="email" name="email" id="email" class="form-control" />
          <label class="form-label" for="email">Email</label>
        </div>
        <button data-mdb-ripple-init type="submit" class="btn btn-primary btn-block mb-4">Enviar link de recuperação</button>
        <div class="text-center">
          <p>Lembrou da senha? <a href="{{route("login")}}">Entrar</a></p>
        </div>
      </form>
    </div>
  </div>
</div>
@endsection

@section("js")
  
@endsection
</html>