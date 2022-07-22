<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class InvoicePaid extends Notification
{
    use Queueable;

    protected $recibo;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($recibo)
    {
        $this->recibo = $recibo;
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
        $path = storage_path('app/pdf_recibos/' . $this->recibo->recibo_pdf_url);
        $bilhetes = $this->recibo->bilhetes;

        $mail = (new MailMessage)
            ->greeting(__('Purchase successful!'))
            ->line(__('Ticket purchase was completed. You can now see your tickets in your profile.'))
            ->line(__('Show the tickets QRCode in the movie theater to get access to the session.'))
            ->action(__('View Invoice and Tickets'), url('/'))
            ->line(__('Thank you for choosing us!'))
            ->attach($path);

        foreach ($bilhetes as $bilhete) {
            $ticketFileName =  $this->recibo->id . '-' . $bilhete->lugar->fila . '-' . $bilhete->lugar->posicao . '.pdf';
            $mail->attachData($bilhete->criarPdf()->output(), $ticketFileName);
        }

        return $mail;
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
