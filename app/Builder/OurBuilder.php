<?php


namespace App\Builder;


use App\Domain\Global\Configs\Model\Config;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;

class OurBuilder
{

    public static $page = 1;
    public static $perPage;
    private $tables;
    private $count = 0;
    private $orderBy = ['id','asc'];
    private $orderByRaw = '';
    private $wheres = [];
    private $columns = ['*'];
    private $groupBy = [];

    public function __construct($tables)
    {
        $this->tables = $tables;
    }

    public function select($columns = ['*'])
    {
        $this->columns = $columns;
        return $this;
    }

    public function count()
    {
        $results = 0;

        foreach ($this->tables as $table) {
            $results += $this->pre_processing($table)->count();
        }

        return $results;
    }
    public function get()
    {
        $results = new Collection();

        foreach ($this->tables as $table) {
             $results = $results->merge($this->pre_processing($table)->get());
        }

        return $results;
    }

    public function where($column, $opt, $value)
    {
        array_push($this->wheres, [$column, $opt, $value]);
        return $this;
    }

    public function groupBy($columns)
    {
        $this->groupBy = $columns;
        return $this;
    }

    public function orderByRaw($raw)
    {
        $this->orderByRaw = $raw;
        return $this;
    }

    public function orderBy($column, $orderType = " ASC ")
    {
        $this->orderBy = [$column, $orderType];
        return $this;
    }

    /**
     * @param mixed $page
     */
    public static function setPage($page): void
    {
        self::$page = $page ?? 1;
    }

    /**
     * @param mixed $perPage
     */
    public static function setPerPage($perPage): void
    {
        self::$perPage = $perPage ?? Config::$items_per_page;
    }

    private function pre_processing($table)
    {
        $query = DB::table($table)
            ->select($this->columns)
            ->where($this->wheres)
            ->where('deleted_at', null)
            ->orderBy($this->orderBy[0], $this->orderBy[1]);

        $query =  count($this->groupBy)  ? $query->groupBy($this->groupBy) : $query;
        return $query;

    }

    public function multiTablePaginate()
    {
        $results = [];

        if (strtolower($this->orderBy[1]) == 'desc') $this->tables = array_reverse($this->tables);


        $offset = (self::$page - 1) * self::$perPage;

        $target_table = 0;

        foreach ($this->tables as $table) {

            $table_count = $this->pre_processing($table)->count();

            if ($offset < $table_count) {
                $results = $this->pre_processing($table)->offset($offset)->limit(OurBuilder::$perPage)->get();
                break;
            }

            $offset -= $table_count;
            $target_table += 1;
        }

        if (count($results) < OurBuilder::$perPage && $target_table != count($this->tables) - 1) {
            $limit = OurBuilder::$perPage - count($results);
            $results = array_merge(
                $results->toArray(),
                $this->pre_processing($this->tables[$target_table + 1])
                    ->limit($limit)
                    ->get()->toArray()
            );
        }
        return $results;
    }
}
