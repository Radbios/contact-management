<div class="modal fade" id="viewContact{{$contact->id}}Modal" tabindex="-1" aria-labelledby="viewContact{{$contact->id}}ModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="viewContact{{$contact->id}}Modal">Detalhes do Contato - {{$contact->name}}</h5>
                <button type="button" class="btn-close" data-mdb-ripple-init data-mdb-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="form-outline mb-4">
                    <label class="form-label" for="name">Nome</label>
                    <input type="text" id="view_name{{$contact->id}}" class="form-control" value="{{$contact->name}}" readonly />
                </div>

                <div class="form-outline mb-4">
                    <label class="form-label" for="view_phone{{$contact->id}}">Telefone</label>
                    <input type="text" id="view_phone{{$contact->id}}" class="form-control" value="{{$contact->phone}}" readonly />
                </div>

                <div class="form-outline mb-4">
                    <label class="form-label" for="view_email{{$contact->id}}">Email</label>
                    <input type="email" id="view_email{{$contact->id}}" class="form-control" value="{{$contact->email}}" readonly />
                </div>

                <div class="form-outline mb-4">
                    <label class="form-label" for="view_notes{{$contact->id}}">Descrição</label>
                    <textarea class="form-control" id="view_notes{{$contact->id}}" rows="4" readonly>{{$contact->notes}}</textarea>
                </div>

                <div class="form-outline mb-4">
                    <label class="form-label" for="view_created_at{{$contact->id}}">Criado em</label>
                    <input type="text" id="view_created_at{{$contact->id}}" class="form-control" value="{{$contact->created_at->format('d/m/Y H:i:s')}}" readonly />
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-mdb-ripple-init data-mdb-dismiss="modal">Fechar</button>
            </div>
        </div>
    </div>
</div>
