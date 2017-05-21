<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class HantarEmel extends Notification
{
    use Queueable;

    protected $timestamp;
    protected $nama_waris;
    protected $nama_penumpang;
    protected $drop_off;
    protected $destination;
    protected $pickup_loc;
    protected $nama_driver;
    protected $tel_driver;
    protected $eta;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($timestamp, $nama_waris, $nama_penumpang, $drop_off, $destination, $pickup_loc, $nama_driver, $tel_driver, $eta)
    {
        $this->timestamp = $timestamp;
        $this->nama_waris = $nama_waris;
        $this->nama_penumpang = $nama_penumpang;
        $this->drop_off = $drop_off;
        $this->destination = $destination;
        $this->pickup_loc = $pickup_loc;
        $this->nama_driver = $nama_driver;
        $this->tel_driver = $tel_driver;
        $this->eta = $eta;
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
                    ->greeting("Hello {$this->nama_waris}")
                    ->line("{$this->nama_penumpang} has started ride at {$this->timestamp}")
                    ->line("Below are the details of the ride:")
                    ->line("To: {$this->drop_off}, {$this->destination}")
                    ->line("From: {$this->pickup_loc}")
                    ->line("ETA: {$this->eta}")
                    ->line("Driver Name: {$this->nama_driver}")
                    ->line("Driver Tel No: {$this->tel_driver}")
                    ->action('Notification Action', url('/'))
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
