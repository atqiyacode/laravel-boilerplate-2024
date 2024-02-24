<?php

namespace Modules\User\App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class CustomResetPasswordNotification extends Notification implements ShouldQueue
{
    use Queueable;

    public $token, $host;

    /**
     * Create a new notification instance.
     */
    public function __construct($host, $token)
    {
        $this->host = $host;
        $this->token = $token;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail(object $notifiable): MailMessage
    {
        $url = $this->host . "/password-reset/{$this->token}?email={$notifiable->getEmailForPasswordReset()}";
        return (new MailMessage)
            ->subject(trans('lang.forgot-password?'))
            ->line(trans('lang.mail-forgot-password-text'))
            ->action(trans('lang.reset-password'), $url)
            ->line(trans('lang.mail-forgot-password-time'))
            ->line(trans('lang.mail-forgot-password-note'));
    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return [
            //
        ];
    }
}
