<?php

namespace Modules\User\App\Notifications;

use Carbon\Carbon;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\URL;

class CustomEmailVerificationNotification extends Notification implements ShouldQueue
{
    use Queueable;

    public $prefix;

    /**
     * Create a new notification instance.
     */
    public function __construct($prefix)
    {
        $this->prefix = $prefix;
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
        $verificationUrl = $this->verificationUrl($notifiable);
        $url = $this->prefix . urlencode($verificationUrl);
        return (new MailMessage)
            ->subject(trans('lang.verify-email'))
            ->line(trans('lang.mail-verify-email-text'))
            ->action(trans('lang.mail-verify-email-button'), $url)
            ->line(trans('lang.mail-verify-email-note'));
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

    protected function verificationUrl($notifiable)
    {
        return "/auth/verify-email/{$notifiable->getKey()}/" . sha1($notifiable->getEmailForVerification());
        // return URL::temporarySignedRoute(
        //     '',
        //     Carbon::now()->addMinutes(Config::get('auth.verification.expire', 60)),
        //     [
        //         'id' => $notifiable->getKey(),
        //         'hash' => sha1($notifiable->getEmailForVerification()),
        //     ]
        // );
    }
}
