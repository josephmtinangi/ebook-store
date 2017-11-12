<?php

namespace App\Mail;

use App\Models\DownloadLink as DownloadLinkModel;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class DownloadLink extends Mailable
{
    use Queueable, SerializesModels;

    public $downloadLink;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(DownloadLinkModel $downloadLink)
    {
        $this->downloadLink = $downloadLink;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('emails.books.download-link');
    }
}
