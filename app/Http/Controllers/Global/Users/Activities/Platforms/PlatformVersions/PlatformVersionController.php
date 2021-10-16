<?php


namespace App\Http\Controllers\Global\Users\Activities\Platforms\PlatformVersions;


use App\Helpers\Helpers;
use App\Http\Controllers\Controller;
use App\Domain\Global\Users\Activities\Platforms\PlatformVersions\Actions\PlatformVersionStoreAction;
use App\Domain\Global\Users\Activities\Platforms\PlatformVersions\Actions\PlatformVersionDestroyAction;
use App\Domain\Global\Users\Activities\Platforms\PlatformVersions\Actions\PlatformVersionUpdateAction;
use App\Domain\Global\Users\Activities\Platforms\PlatformVersions\DTO\PlatformVersionDTO;
use App\Http\Requests\Global\Users\Activities\Platforms\PlatformVersions\PlatformVersionStoreRequest;
use App\Http\Requests\Global\Users\Activities\Platforms\PlatformVersions\PlatformVersionUpdateRequest;
use App\Http\Requests\Global\Users\Activities\Platforms\PlatformVersions\PlatformVersionDestroyRequest;
use App\Http\Requests\Global\Users\Activities\Platforms\PlatformVersions\PlatformVersionShowRequest;
use App\Http\ViewModels\Global\Users\Activities\Platforms\PlatformVersions\PlatformVersionShowVM;
use App\Http\ViewModels\Global\Users\Activities\Platforms\PlatformVersions\PlatformVersionIndexVM;

class PlatformVersionController extends Controller
{

    public function index(){

        return response()->json(Helpers::createSuccessResponse((new PlatformVersionIndexVM())->toArray()));
    }

    public function show(PlatformVersionShowRequest $request){

        return response()->json(Helpers::createSuccessResponse((new PlatformVersionShowVM(['id' => $request->route('id')]))->toArray()));
    }

    public function store(PlatformVersionStoreRequest $request){
        $data = $request->validated() ;

        $platformVersionDTO = PlatformVersionDTO::fromRequest($data);

        $platformVersion = PlatformVersionStoreAction::execute($platformVersionDTO);

        return response()->json(Helpers::createSuccessResponse((new PlatformVersionShowVM($platformVersion->toArray()))->toArray()));
    }

    public function update(PlatformVersionUpdateRequest $request){
        $data = $request->validated() ;

        $platformVersionDTO = PlatformVersionDTO::fromRequest($data);

        $platformVersion = PlatformVersionUpdateAction::execute($platformVersionDTO);

        return response()->json(Helpers::createSuccessResponse((new PlatformVersionShowVM($platformVersion->toArray()))->toArray()));
    }

    public function destroy(PlatformVersionDestroyRequest $request){

        return response()->json(Helpers::createSuccessResponse(PlatformVersionDestroyAction::execute(PlatformVersionDTO::fromRequest($request->validated()))));
    }

}
