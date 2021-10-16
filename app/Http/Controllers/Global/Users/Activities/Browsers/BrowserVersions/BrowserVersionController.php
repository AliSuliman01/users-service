<?php


namespace App\Http\Controllers\Global\Users\Activities\Browsers\BrowserVersions;


use App\Helpers\Helpers;
use App\Http\Controllers\Controller;
use App\Domain\Global\Users\Activities\Browsers\BrowserVersions\Actions\BrowserVersionStoreAction;
use App\Domain\Global\Users\Activities\Browsers\BrowserVersions\Actions\BrowserVersionDestroyAction;
use App\Domain\Global\Users\Activities\Browsers\BrowserVersions\Actions\BrowserVersionUpdateAction;
use App\Domain\Global\Users\Activities\Browsers\BrowserVersions\DTO\BrowserVersionDTO;
use App\Http\Requests\Global\Users\Activities\Browsers\BrowserVersions\BrowserVersionStoreRequest;
use App\Http\Requests\Global\Users\Activities\Browsers\BrowserVersions\BrowserVersionUpdateRequest;
use App\Http\Requests\Global\Users\Activities\Browsers\BrowserVersions\BrowserVersionDestroyRequest;
use App\Http\Requests\Global\Users\Activities\Browsers\BrowserVersions\BrowserVersionShowRequest;
use App\Http\ViewModels\Global\Users\Activities\Browsers\BrowserVersions\BrowserVersionShowVM;
use App\Http\ViewModels\Global\Users\Activities\Browsers\BrowserVersions\BrowserVersionIndexVM;

class BrowserVersionController extends Controller
{

    public function index(){

        return response()->json(Helpers::createSuccessResponse((new BrowserVersionIndexVM())->toArray()));
    }

    public function show(BrowserVersionShowRequest $request){

        return response()->json(Helpers::createSuccessResponse((new BrowserVersionShowVM(['id' => $request->route('id')]))->toArray()));
    }

    public function store(BrowserVersionStoreRequest $request){
        $data = $request->validated() ;

        $browserVersionDTO = BrowserVersionDTO::fromRequest($data);

        $browserVersion = BrowserVersionStoreAction::execute($browserVersionDTO);

        return response()->json(Helpers::createSuccessResponse((new BrowserVersionShowVM($browserVersion->toArray()))->toArray()));
    }

    public function update(BrowserVersionUpdateRequest $request){
        $data = $request->validated() ;

        $browserVersionDTO = BrowserVersionDTO::fromRequest($data);

        $browserVersion = BrowserVersionUpdateAction::execute($browserVersionDTO);

        return response()->json(Helpers::createSuccessResponse((new BrowserVersionShowVM($browserVersion->toArray()))->toArray()));
    }

    public function destroy(BrowserVersionDestroyRequest $request){

        return response()->json(Helpers::createSuccessResponse(BrowserVersionDestroyAction::execute(BrowserVersionDTO::fromRequest($request->validated()))));
    }

}
