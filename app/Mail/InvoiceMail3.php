<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class InvoiceMail3 extends Mailable
{
    use Queueable, SerializesModels;

    public $data;

    
    
    public function __construct($data)
    {
        $this->data = $data;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $info = $this->data;
        return $this->from('brooklyndrill@googleworkspace.com')->view('mail.invoice3',compact('info'))->subject('サイトネーム:ご購入ありがとうございます');
    }
}
