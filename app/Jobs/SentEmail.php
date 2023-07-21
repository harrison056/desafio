<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class SentEmail implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    private $data;
    private $emails;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($data, $emails)
    {
        $this->data = $data;
        $this->emails = $emails;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        //\Illuminate\Support\Facades\Mail::send($data)->to();
        foreach ($this->emails as $e) {
            \Illuminate\Support\Facades\Mail::to($e)->send($this->data);
        }
    }
}
