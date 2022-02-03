<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class ConvertCelsius implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $farenheit;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($farenheit)
    {
        $this->farenheit = $farenheit;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $celsius = ($this->farenheit - 32) * 5 / 9;
        if($celsius)
        {
            logger()->info('Celsius = ' . $celsius);
        }
    }
}
