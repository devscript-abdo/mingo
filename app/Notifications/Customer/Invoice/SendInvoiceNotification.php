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
            ->subject("MinGo.ma Facture numéro : {$this->invoicer->serial_numer}")
            ->line('Facture')
            ->action('Ouvrire la Facture', $this->invoiceUrl)
            ->line('Thank you for using our application!');
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
