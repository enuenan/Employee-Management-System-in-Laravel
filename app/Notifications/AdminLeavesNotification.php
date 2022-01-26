<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class AdminLeavesNotification extends Notification
{
    use Queueable;

    public $leaves;
    public $fullname;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($leaves)
    {
        // dd($leaves->employee);
        $this->fullname = $leaves->employee->first_name . " " . $leaves->employee->last_name;
        $this->leaves = $leaves;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail', 'database'];
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
            ->line('You have a new leave notification')
            ->line($this->fullname . " wants leave because of " . $this->leaves->reason)
            ->action('Notification Action', url('/'));
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
            "employee_id" => $this->leaves->employee_id,
            "reason" => $this->leaves->reason,
            "description" => $this->leaves->description,
            "half_day" => $this->leaves->half_day,
            "start_date" => $this->leaves->start_date,
            "end_date" => $this->leaves->end_date,
            "status" => $this->leaves->status,
        ];
    }
}
