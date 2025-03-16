<div class="modal fade" id="deleteContact{{$contact->id}}Modal" tabindex="-1" aria-labelledby="deleteContact{{$contact->id}}ModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <form action="{{route("contacts.destroy", [$contact->id])}}" method="POST">
                @csrf
                @method('DELETE')
                <div class="modal-header">
                    <h5 class="modal-title" id="deleteContact{{$contact->id}}Modal">Confirmação de Exclusão - {{$contact->name}}</h5>
                    <button type="button" class="btn-close" data-mdb-ripple-init data-mdb-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>Tem certeza de que deseja excluir o contato <strong>{{$contact->name}}</strong>?</p>
                    <p>Esta ação não pode ser desfeita.</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-mdb-ripple-init data-mdb-dismiss="modal">Voltar</button>
                    <button type="submit" class="btn btn-danger" data-mdb-ripple-init>Deletar</button>
                </div>
            </form>
        </div>
    </div>
</div>