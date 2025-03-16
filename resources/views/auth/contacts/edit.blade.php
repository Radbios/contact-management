<div class="modal fade" id="editContact{{$contact->id}}Modal" tabindex="-1" aria-labelledby="editContact{{$contact->id}}ModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <form action="{{route("contacts.update", [$contact->id])}}" method="POST">
                @csrf
                @method('PUT')
                <div class="modal-header">
                    <h5 class="modal-title" id="editContact{{$contact->id}}Modal">Editar Contato - {{$contact->name}}</h5>
                    <button type="button" class="btn-close" data-mdb-ripple-init data-mdb-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                    <div data-mdb-input-init class="form-outline mb-4">
                        <input type="text" id="edit_name{{$contact->id}}" name="name" class="form-control" value="{{$contact->name}}" required/>
                        <label class="form-label" for="edit_name{{$contact->id}}">Nome</label>
                    </div>

                    <div data-mdb-input-init class="form-outline mb-4">
                        <input type="text" id="edit_phone{{$contact->id}}" name="phone" class="form-control" value="{{$contact->phone}}" required/>
                        <label class="form-label" for="edit_phone{{$contact->id}}">Telefone</label>
                    </div>

                    <div data-mdb-input-init class="form-outline mb-4">
                        <input type="email" id="edit_email{{$contact->id}}" name="email" class="form-control" value="{{$contact->email}}"/>
                        <label class="form-label" for="edit_email{{$contact->id}}">Email</label>
                    </div>

                    <div data-mdb-input-init class="form-outline mb-4">
                        <textarea class="form-control" name="notes" id="edit_notes{{$contact->id}}" rows="4">{{$contact->notes}}</textarea>
                        <label class="form-label" for="edit_notes{{$contact->id}}">Descrição</label>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-mdb-ripple-init data-mdb-dismiss="modal">Voltar</button>
                    <button type="submit" class="btn btn-primary" data-mdb-ripple-init>Salvar</button>
                </div>
            </form>
        </div>
    </div>
</div>


<script>
    var phoneMask = IMask(document.getElementById("edit_phone{{$contact->id}}"), {
        mask: "(00) 00000-0000"
    });

    var emailMask = IMask(document.getElementById("edit_email{{$contact->id}}"), {
        mask: /^\S*@?\S*$/,
        maxLength: 55
    });
</script>