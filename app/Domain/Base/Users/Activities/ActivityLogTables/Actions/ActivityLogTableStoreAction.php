<?php


namespace App\Domain\Base\Users\Activities\ActivityLogTables\Actions;


use App\Domain\Base\Users\Activities\ActivityLogTables\DTO\ActivityLogTableDTO;
use App\Domain\Base\Users\Activities\ActivityLogTables\Model\ActivityLogTable;

class ActivityLogTableStoreAction
{
    public static function execute(
        ActivityLogTableDTO $logTableDTO
    ){

        $logTable = new ActivityLogTable($logTableDTO->toArray());
        $logTable->save();
        return $logTable;
    }
}
