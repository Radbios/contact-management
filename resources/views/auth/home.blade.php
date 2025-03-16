@extends("layouts.main")

@section("title", "Início")

@section("css")
    <link rel="stylesheet" href="{{asset("assets/css/home.css")}}">
@endsection

@section("container")
<div class="content">
    <div class="container mt-4">
        <div class="header-content row align-items-center">
            <div class="col-12 col-md-6">
                <h4 class="mb-3">Lista de Contatos</h4>
            </div>
            <div class="col-12 col-md-6 d-flex justify-content-start justify-content-md-end gap-2">
                <a href="{{ route('contacts.export') . '?search=' . $search . '&status_filter=' . $status_filter }}" class="btn btn-primary">
                    Exportar CSV
                </a>
                <button type="button" class="btn btn-primary" data-mdb-ripple-init data-mdb-modal-init data-mdb-target="#newContactModal">
                    Novo contato
                </button>
            </div>
        </div>
        <div class="container mb-3">
            <form action="{{route("home")}}" method="GET">
                <div class="input-group flex-nowrap mt-3">
                    <input type="search" id="search" class="form-control rounded" name="search" placeholder="Buscar pelo nome" value="{{$search}}" aria-label="Search" aria-describedby="search-addon">
                    <button type="submit" class="btn btn-outline-primary" data-mdb-ripple-init>Buscar</button>
                </div>
                <div class="input-group mt-3 d-flex flex-column flex-md-row align-items-md-center justify-content-md-end gap-2">
                    <div class="d-flex flex-wrap justify-content-center gap-2">
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="status_filter" id="status-filter1" value="-1" @if ($status_filter == "-1") checked @endif>
                            <label class="form-check-label" for="status-filter1">Todos</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="status_filter" id="status-filter2" value="1" @if ($status_filter == "1") checked @endif>
                            <label class="form-check-label" for="status-filter2">Ativos</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="status_filter" id="status-filter3" value="0" @if ($status_filter == "0") checked @endif>
                            <label class="form-check-label" for="status-filter3">Deletados</label>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-outline-primary" data-mdb-ripple-init>Filtrar</button>
                </div>
            </form>
        </div>
        <div class="row">
            @forelse ($contacts as $contact)
                @if (!$contact->trashed())
                    @include('auth.contacts.edit', ["contact" => $contact])
                    @include('auth.contacts.details', ["contact" => $contact])
                    @include('auth.contacts.delete', ["contact" => $contact])
                @endif
                <div class="col-lg-4 col-md-6 col-sm-12 mb-4">
                    <div class="card contact-card {{!$contact->trashed() ? 'success' : 'danger'}}">
                        <div class="card-header d-flex justify-content-between align-items-center">
                            <h5 class="card-title mb-0" style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis;">{{ $contact->name }}</h5>
                            <div class="status-circle {{!$contact->trashed() ? 'success' : 'danger'}}"></div>
                        </div>
                        <div class="card-body">
                            <p class="card-text" style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis;">
                                <strong>Telefone:</strong> {{ $contact->phone }} <br>
                                <strong>Email:</strong> {{ $contact->email ?? 'Não Registrado' }} <br>
                            </p>
                            <p class="card-text info-card text-end">
                                @if ($contact->trashed())
                                    <span><strong>Deletado em:</strong> {{$contact->deleted_at->format('d/m/Y')}}</span>
                                @else
                                    <span><strong>Criado em:</strong> {{ $contact->created_at->format('d/m/Y') }}</span>
                                @endif
                            </p>
                        </div>
                        <div class="card-footer d-flex flex-column flex-md-row gap-2">
                            @if ($contact->trashed())
                                <form action="{{ route('contacts.restore', [$contact->id]) }}" method="POST" class="w-100">
                                    @csrf
                                    <button type="submit" class="btn btn-secondary w-100" data-mdb-ripple-init>Restaurar</button>
                                </form>
                            @else
                                <button type="button" class="btn btn-primary w-100 w-md-auto" data-mdb-ripple-init data-mdb-modal-init data-mdb-target="#viewContact{{$contact->id}}Modal">
                                    Detalhes
                                </button>
                                <button type="button" class="btn btn-warning w-100 w-md-auto" data-mdb-ripple-init data-mdb-modal-init data-mdb-target="#editContact{{$contact->id}}Modal">
                                    Editar
                                </button>
                                <button type="button" class="btn btn-danger w-100 w-md-auto" data-mdb-ripple-init data-mdb-modal-init data-mdb-target="#deleteContact{{$contact->id}}Modal">
                                    Deletar
                                </button>
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