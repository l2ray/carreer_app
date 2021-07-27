<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class ApplicationRecieved extends Notification implements ShouldQueue
{
    use Queueable;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
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
        return (new MailMessage)->markdown(
            'mail.application.received',
            [
                'applicant' => $notifiable->first_name,
                'company' => $notifiable->company->name,
                'department' => $notifiable->department->name,
            ]
        );
        return (new MailMessage)
                    ->greeting('Hello ' . $notifiable->first_name . ' ' . $notifiable->middle_name . ' ' . $notifiable->last_name . ',')
                    ->line('Thank You for submitting your application to '. $notifiable->company->name )
                    ->line('Please be advised that you will be contacted only in the event of you being shortlisted for a vacancy.');
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
