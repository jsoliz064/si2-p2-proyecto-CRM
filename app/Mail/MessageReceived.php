<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Models\DetallePedido;
use App\Models\Cliente;
use App\Models\Pedido;


class MessageReceived extends Mailable
{
    use Queueable, SerializesModels;
    public $subject = 'Factura de pedido - CRM';
    public $msg;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($msg)
    {
        $this->msg = $msg;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $pedido=Pedido::find($this->msg->id);
        $detalle_pedidos=DetallePedido::where('id_pedido',$pedido->id)->get();
        $cliente=Cliente::find($pedido->id_cliente);
        //return view('pagos.show',compact ('pedido','detalle_pedidos','cliente'));
        return $this->view('email.cliente',compact ('pedido','detalle_pedidos','cliente'));
    }
}
