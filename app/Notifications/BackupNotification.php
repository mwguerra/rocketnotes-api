<?php

namespace App\Notifications;

use App\Exports\NotesExport;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use Maatwebsite\Excel\Facades\Excel;

class BackupNotification extends Notification
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
        $filename = date('Y_m_d_His') . "_rocketnotes_backup.xlsx";

        return (new MailMessage)
            ->markdown('mail.backup', [
                'user' => $notifiable
            ])
            ->subject('Backup RocketNotes')
            ->attach(
                Excel::download(
                    new NotesExport($notifiable->notes), $filename
                )->getFile(),
                ['as' => $filename]
            );
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
