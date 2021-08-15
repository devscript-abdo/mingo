<?php

namespace App\Notifications\Customer\Invoice;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class SendInvoiceNotification extends Notification
{
    use Queueable;


    public $invoiceUrl;

    public $invoicer;
    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($invoiceUrl, $invoicer)
    {
        $this->invoiceUrl = $invoiceUrl;
        $this->invoicer = $invoicer;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        return (new MailMessage)
            ->subject("Facture Mingo n°{$this->invoicer->serial_numer}")
            ->line('Cher client,')
            ->line("Veuillez trouver en pièce jointe la facture {$this->invoicer->serial_numer}")
           // ->action('Ouvrire la Facture', $this->invoiceUrl)
            ->line('Notre service de facturation reste à votre disposition pour toute demande')
            ->attach($this->invoiceUrl);
            /*->attach($this->invoiceUrl, [
                'as' => 'Facture.pdf',
                'mime' => 'application/pdf',
            ]);*/
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}
