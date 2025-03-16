<div class="modal fade" id="newContactModal" tabindex="-1" aria-labelledby="newContactModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <form action="{{route("contacts.store")}}" method="POST">
                <div class="modal-header">
                    <h5 class="modal-title" id="newContactModalLabel">Novo Contato</h5>
                    <button type="button" class="btn-close" data-mdb-ripple-init data-mdb-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    @csrf
                    @method('POST')

                    <div data-mdb-input-init class="form-outline mb-4">
                        <input type="text" id="name" name="name" class="form-control" value="{{old("name")}}" required/>
                        <label class="form-label" for="name">Nome</label>
                    </div>

                    <div data-mdb-input-init class="form-outline mb-4">
                        <input type="text" id="phone" name="phone" class="form-control" value="{{old("phone")}}" required/>
                        <label class="form-label" for="phone">Telefone</label>
                    </div>

                    <div data-mdb-input-init class="form-outline mb-4">
                        <input type="email" id="email" name="email" class="form-control" value="{{old("email")}}"/>
                        <label class="form-label" for="email">Email</label>
                    </div>

                    <div data-mdb-input-init class="form-outline mb-4">
                        <textarea class="form-control" name="notes" id="notes" rows="4">{{old("notes")}}</textarea>
                        <label class="form-label" for="notes">Descrição</label>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-mdb-ripple-init data-mdb-dismiss="modal">Voltar</button>
                    <button type="submit" class="btn btn-primary" data-mdb-ripple-init>Criar</button>
                </div>
            </form>
        </div>
    </div>
</div>


<script>
    var phoneMask = IMask(document.getElementById("phone"), {
        mask: "(00) 00000-0000"
    });

    var emailMask = IMask(document.getElementById("email"), {
        mask: /^\S*@?\S*$/,
        maxLength: 55
    });
</script>