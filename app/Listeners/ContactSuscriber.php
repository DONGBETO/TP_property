<?php

declare(strict_types=1);

namespace App\Listeners;

use App\Events\ContactRequestEvent;
use App\Mail\PropertyContactMail;
use Illuminate\Events\Dispatcher;
use Illuminate\Mail\Mailer;

class ContactSuscriber 
{
    public function __construct(private Mailer $mailer)
    {
        
    }

    public function sendMailSuscriber(ContactRequestEvent $event){
        $this->mailer->send(new PropertyContactMail($event->property, $event->data));
    }

    protected function Suscriber(Dispatcher $dispatcher):array
         {
       
            return [
                ContactSuscriber::class => 'sendMailSuscriber'
            ];
        // $dispatcher->listen(
        //     ContactRequestEvent::class,
        //     [ContactSuscriber::class,'sendMailSuscriber']
        // );
        }
        
}
