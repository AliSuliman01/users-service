<?php


namespace App\Http\Controllers\Pages;


use App\Helpers\Response;
use App\Http\Controllers\Controller;
use App\Domain\Pages\Model\Page;
use App\Domain\Pages\Actions\StorePageAction;
use App\Domain\Pages\Actions\DestroyPageAction;
use App\Domain\Pages\Actions\UpdatePageAction;
use App\Domain\Pages\DTO\PageDTO;
use App\Http\Requests\Pages\StorePageRequest;
use App\Http\Requests\Pages\UpdatePageRequest;
use App\Http\ViewModels\Pages\GetPageVM;
use App\Http\ViewModels\Pages\GetAllPagesVM;

class PageController extends Controller
{
    public function __construct(){
        $this->middleware('datatable_adapters')->only(['index']);
//        $this->middleware('auth.rest')->only(['store','update','destroy']);
    }
    public function index(){

        return response()->json(Response::success((new GetAllPagesVM())->toArray()));
    }

    public function show(Page $page){

        return response()->json(Response::success((new GetPageVM($page))->toArray()));
    }

    public function store(StorePageRequest $request){

        $data = $request->validated() ;

        $pageDTO = PageDTO::fromRequest($data);

        $page = StorePageAction::execute($pageDTO);

        return response()->json(Response::success((new GetPageVM($page))->toArray()));
    }

    public function update(Page $page, UpdatePageRequest $request){

        $data = $request->validated() ;

        $pageDTO = PageDTO::fromRequest($data);

        $page = UpdatePageAction::execute($page, $pageDTO);

        return response()->json(Response::success((new GetPageVM($page))->toArray()));
    }

    public function destroy(Page $page){

        return response()->json(Response::success(DestroyPageAction::execute($page)));
    }

}
