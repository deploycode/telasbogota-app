<?php

namespace deploycodeApp\Http\Controllers;

use Illuminate\Http\Request;
use Mail;
use deploycodeApp\Http\Requests;
use deploycodeApp\Http\Controllers\Controller;

class MailController extends Controller
{
    public function store(Request $request)
    {
      $data = array (
        'email'		=>	$request->email,
        'msg'		=>	$request->message,
      );

      Mail::send('mail.contact' , $data, function($msj){
        $msj->subject('Correo de contacto');
        $msj->to('ventas@telasbogota.com');
      });

      flash('Mensaje enviado satisfactorimente' , 'success');
      return redirect('contact');
    }

}
