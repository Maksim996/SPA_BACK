<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class Password extends Mailable
{
    use Queueable, SerializesModels;

      /**
     * The user instance.
     *
     * @var User
     */
    public $user;
    public $randomString;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($user, $randomString)
    {
        $this->data = $user;
        $this->randomString = $randomString;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.password')->with([
            'first_name' => $this->data->info->first_name,
            'second_name' => $this->data->info->second_name,
            'password' => $this->randomString,
        ]);
    }
}
