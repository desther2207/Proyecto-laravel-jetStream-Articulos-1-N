<?php

namespace App\Http\Controllers;

use App\Mail\ContactoMailable;
use Exception;
use Illuminate\Container\Attributes\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth as FacadesAuth;
use Illuminate\Support\Facades\Mail;

class ContactoController extends Controller
{
    public function pintarFormulario(){
        return view('formCorreos.fContacto');
    }

    public function procesarFormulario(Request $request){
        $request->validate([
            'name'=>['required', 'string', 'min:5', 'max:60'],
            'email'=>['nullable', 'email'],
            'body'=>['required', 'string', 'min:10', 'max:150'],
        ]);

        try{
            Mail::to("hello@example.com")
            ->send(new ContactoMailable($request->name, $request->email ?? FacadesAuth::user()->email, $request->body));
        }catch(Exception $ex){
            dd("Error al enviar el mail: ".$ex->getMessage());
        }

        return redirect(route('inicio'))->with('message', 'Mensaje enviado correctamente');
    }
}
