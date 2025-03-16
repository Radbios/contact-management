<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactRequest;
use App\Models\Contact;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ContactController extends Controller
{
    /**
     * Listar Contatos do usuário logado
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Contracts\View\View
     */
    public function index(Request $request)
    {
        $contacts = Auth::user()->contacts()->withTrashed()->paginate(9);
        return view("auth.home", compact("contacts"));
    }

    /**
     * Registrar contato
     * @param \App\Http\Requests\ContactRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(ContactRequest $request)
    {
        $data = $request->validated();
        $data["user_id"] = Auth::user()->id;

        $contact = Contact::create($data);

        return redirect()->back()->with("success", "Contato registrado com sucesso");
    }

    /**
     * Deletar contato (Logicamente)
     * @param Contact|Model|string $contact
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Request $request, Contact $contact): RedirectResponse
    {
        $contact->delete();

        return redirect()->back()->with("success", "Contato deletado com sucesso!");
    }

    /**
     * Restaurar contato (Deletado logicamente) 
     * @param Contact|Model|string $contact
     * @return \Illuminate\Http\RedirectResponse
     */
    public function restore(Request $request, $contact)
    {
        $contact = Contact::withTrashed()->findOrFail($contact);
        $contact->restore();

        return redirect()->back()->with("success", "Contato restaurado com sucesso!");
    }
}
