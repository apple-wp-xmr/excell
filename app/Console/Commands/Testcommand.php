<?php

namespace App\Console\Commands;

use App\Imports\ProjectDynamicImport;
use App\Imports\ProjectImport;
use App\Models\Project;
use App\Models\Task;
use App\Models\Type;
use Illuminate\Console\Command;
use Maatwebsite\Excel\Facades\Excel;

class Testcommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'test';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'command to make excell import work';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $task = Task::find(1);
        Excel::import(new ProjectImport($task), 'files/table.xlsx', 'public');
        return Command::SUCCESS;
    }
}
