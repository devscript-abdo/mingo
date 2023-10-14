<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class StaticStorageLink extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'static:link';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Link static disk';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $this->storageLink();
    }

    public function storageLink()
    {
        return symlink(env('FILESYSTEM_STORAGE_ROOT'), env('FILESYSTEM_STORAGE_LINK_PATH'));
    }
}
