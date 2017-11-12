<?php

namespace App\Jobs;

use Mail;
use App\Mail\DownloadLink as DownloadLinkEmail;
use App\Models\DownloadLink;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

class SendDownloadLinkEmail implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $downloadLink;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(DownloadLink $downloadLink)
    {
        $this->downloadLink = $downloadLink;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        Mail::to($this->downloadLink->email)->send(new DownloadLinkEmail($this->downloadLink));
    }
}
