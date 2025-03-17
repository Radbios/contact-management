@extends("layouts.main")

@section("title", "Login")

@section("css")
  <link rel="stylesheet" href="{{asset("assets/css/login.css")}}">
@endsection

@section("container")
<div class="content">
  <div class="login-content">
    <div class="title">Gerenciamento de Contatos</div>
    <div class="form-content">
      <form action="{{route("password.update")}}" method="POST">
        @csrf
        @method("PUT")
        <input type="hidden" name="token" value="{{$token}}">
        <div data-mdb-input-init class="form-outline mb-4">
          <input type="password" name="password" id="password" class="form-control" />
          <label class="form-label"  for="password">Senha</label>
        </div>

        <div data-mdb-input-init class="form-outline mb-4">
            <input type="password" name="password_confirmation" id="password_confirmation" class="form-control" />
            <label class="form-label" for="password_confirmation">Confirmar senha</label>
        </div>
      
        <button data-mdb-ripple-init type="submit" class="btn btn-primary btn-block mb-4">Atualizar senha</button>
      </form>
    </div>
  </div>
</div>
@endsection

@section("js")
  
@endsection
</html>