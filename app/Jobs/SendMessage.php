<?php

namespace App\Jobs;

use Exception;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

class SendMessage implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Count of tries.
     *
     * @var int
     */
    public $tries = 3;

    /**
     * Message for log.
     *
     * @var string
     */
    protected $message;

    /**
     * Create a new job instance.
     *
     * @param $message
     */
    public function __construct($message)
    {
        $this->message = $message;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
//        throw new Exception('My error', 101);

        info($this->message);
    }

    /**
     * The job failed in process.
     *
     * @param Exception $exception
     */
    public function failed(Exception $exception)
    {
        info(__CLASS__ . ': Error job execute!');
    }
}
