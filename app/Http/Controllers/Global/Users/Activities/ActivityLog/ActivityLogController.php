<?php


namespace App\Http\Controllers\Global\Users\Activities\ActivityLog;


use App\Builder\OurBuilder;
use App\Domain\Global\Users\Activities\ActivityLogTables\Model\ActivityLogTable;
use App\Helpers\Helpers;
use App\Http\Controllers\Controller;
use App\Domain\Global\Users\Activities\ActivityLog\Actions\ActivityLogDestroyAction;
use App\Domain\Global\Users\Activities\ActivityLog\Actions\ActivityLogUpdateAction;
use App\Http\Requests\Global\Users\Activities\ActivityLog\ActivityLogStoreRequest;
use App\Http\Requests\Global\Users\Activities\ActivityLog\ActivityLogUpdateRequest;
use App\Http\Requests\Global\Users\Activities\ActivityLog\ActivityLogDestroyRequest;
use App\Http\Requests\Global\Users\Activities\ActivityLog\ActivityLogShowRequest;
use App\Http\Requests\Global\Users\Activities\ActivityLog\GetItemsHadSeenLastTimeRequest;
use App\Http\Requests\Global\Users\Activities\ActivityLog\GetMostUsersInteractRequest;
use App\Http\Requests\Global\Users\Activities\ActivityLog\GetMostUsersInteractWithTableRequest;
use App\Http\ViewModels\Global\Users\Activities\ActivityLog\MyActivityLogVM;
use App\Http\ViewModels\Global\Users\Activities\ActivityLog\ActivityLogShowVM;
use App\Http\ViewModels\Global\Users\Activities\ActivityLog\ActivityLogIndexVM;
use App\Models\User;
use Carbon\Carbon;

class ActivityLogController extends Controller
{
    private $builder ;

    public function __construct()
    {
        $activity_log_tables = ActivityLogTable::select('table_name')->pluck('table_name');
        $this->builder = new OurBuilder($activity_log_tables);
    }

    public function index(){

        return response()->json(Helpers::createSuccessResponse((new ActivityLogIndexVM())->toArray()));
    }

    public function my_activities(){

        return response()->json(Helpers::createSuccessResponse((new MyActivityLogVM())->toArray()));
    }

}
