<?php


namespace App\Http\ViewModels\Global\Users\Activities\ActivityLogTables;

use App\Domain\Global\Users\Activities\ActivityLogTables\Model\ActivityLogTable;
use Illuminate\Contracts\Support\Arrayable;

class ActivityLogTableIndexVM implements Arrayable
{

    public function get_log_tables(){
    	return ActivityLogTable::all();
	}
    public function toArray(): array
    {
        return $this->get_log_tables()->toArray();
    }
}
