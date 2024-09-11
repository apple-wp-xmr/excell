<?php

namespace App\Console\Commands;

use App\Models\FailedRow;
use App\Models\Project;
use App\Models\Type;
use Illuminate\Console\Command;

class clearTables extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'clearTables';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'command to clear table ...';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $projects = Project::all();

        foreach($projects as $project){
            $project->delete();
        }

        $failedRows = FailedRow::all();
        foreach($failedRows as $row){
            $row->delete();
        }

        return Command::SUCCESS;
    }
}
