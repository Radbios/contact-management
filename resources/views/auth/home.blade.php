@extends("layouts.main")

@section("title", "Início")

@section("css")
    <style>
        .content{
            padding: 50px 100px
        }
        .info-card{
            font-size: 12px
        }
        .card-title{
            display: flex;
            justify-content: space-between;
            align-items: center
        }
        .status-circle{
            width: 20px;
            height: 20px;
            border-radius: 20px;
        }

        .status-circle.success{
            background-color: green !important
        }

        .status-circle.danger{
            background-color: red !important
        }

        .contact-card.success{
            border-left: 10px solid green
        }

        .contact-card.danger{
            border-left: 10px solid red
        }

        .card-footer{
            display: flex;
            justify-content: space-between;
            flex-wrap: wrap;
            gap: 10px
        }

        .card-footer .btn, .card-footer form, .card-footer form.btn{
            display: flex;
            text-align: center;
            justify-content: center;
            flex: 1
        }

        .header-content{
            display: flex;
            justify-content: space-between;
            padding-bottom: 30px
        }
    </style>
@endsection

@section("container")
<div class="content">
    <div class="container mt-4">
        <div class="header-content">
            <h4 class="mb-3">Lista de Contatos</h4>
            <button type="button" class="btn btn-primary" data-mdb-ripple-init data-mdb-modal-init data-mdb-target="#newContactModal">
                Novo contato
            </button>
        </div>
        <div class="row">
            @forelse ($contacts as $contact)
                <div class="col-md-4 mb-4">
                    <div class="card contact-card {{!$contact->trashed() ? "success" : "danger"}}">
                        <div class="card-header">
                            <div class="card-title">
                                <h5 class="card-title">{{ $contact->name }}</h5>
                                <div class="status-circle {{!$contact->trashed() ? "success" : "danger"}}"></div>
                            </div>
                        </div>
                        <div class="card-body">
                            <p class="card-text">
                                <strong>Telefone:</strong> {{ $contact->phone }} <br>
                                <strong>Email:</strong> {{ $contact->email ?? "Não Registrado" }} <br>
                            </p>
                            <p class="card-text info-card text-end">
                                <strong>Criado em:</strong> {{ $contact->created_at->format('d/m/Y') }} <br>
                                @if ($contact->trashed())
                                    <strong>Deletado em:</strong> {{$contact->deleted_at->format('d/m/Y')}} <br>
                                @endif
                            </p>
                        </div>
                        <div class="card-footer">
                            <button type="button" class="btn btn-primary" data-mdb-ripple-init>Detalhes</button>
                            <button type="button" class="btn btn-warning" data-mdb-ripple-init>Editar</button>
                            @if ($contact->trashed())
                                <form action="{{route("contacts.restore", [$contact->id])}}" method="POST">
                                    @csrf
                                    @method("POST")
                                    <button type="submit" class="btn btn-secondary" data-mdb-ripple-init>Restaurar</button>
                                </form>
                            @else
                                <form action="{{route("contacts.destroy", [$contact->id])}}" method="POST">
                                    @csrf
                                    @method("DELETE")
                                    <button type="submit" class="btn btn-danger" data-mdb-ripple-init>Deletar</button>
                                </form>
                            @endif
                        </div>
                    </div>
                </div>
            @empty
                Não há registros
            @endforelse
        </div>
        @include('includes.paginate', ["page" => $contacts])
    </div>
</div>

@include('auth.contacts.create')
@endsection

@section("js")
    
@endsection