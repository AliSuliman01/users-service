<?php


namespace App\Http\Controllers\Global\Users\Activities\Platforms\Platforms;


use App\Helpers\Helpers;
use App\Http\Controllers\Controller;
use App\Domain\Global\Users\Activities\Platforms\Platforms\Actions\PlatformStoreAction;
use App\Domain\Global\Users\Activities\Platforms\Platforms\Actions\PlatformDestroyAction;
use App\Domain\Global\Users\Activities\Platforms\Platforms\Actions\PlatformUpdateAction;
use App\Domain\Global\Users\Activities\Platforms\Platforms\DTO\PlatformDTO;
use App\Http\Requests\Global\Users\Activities\Platforms\Platforms\PlatformStoreRequest;
use App\Http\Requests\Global\Users\Activities\Platforms\Platforms\PlatformUpdateRequest;
use App\Http\Requests\Global\Users\Activities\Platforms\Platforms\PlatformDestroyRequest;
use App\Http\Requests\Global\Users\Activities\Platforms\Platforms\PlatformShowRequest;
use App\Http\ViewModels\Global\Users\Activities\Platforms\Platforms\PlatformShowVM;
use App\Http\ViewModels\Global\Users\Activities\Platforms\Platforms\PlatformIndexVM;

class PlatformController extends Controller
{

    public function index(){

        return response()->json(Helpers::createSuccessResponse((new PlatformIndexVM())->toArray()));
    }

    public function show(PlatformShowRequest $request){

        return response()->json(Helpers::createSuccessResponse((new PlatformShowVM(['id' => $request->route('id')]))->toArray()));
    }

    public function store(PlatformStoreRequest $request){
        $data = $request->validated() ;

        $platformDTO = PlatformDTO::fromRequest($data);

        $platform = PlatformStoreAction::execute($platformDTO);

        return response()->json(Helpers::createSuccessResponse((new PlatformShowVM($platform->toArray()))->toArray()));
    }

    public function update(PlatformUpdateRequest $request){
        $data = $request->validated() ;

        $platformDTO = PlatformDTO::fromRequest($data);

        $platform = PlatformUpdateAction::execute($platformDTO);

        return response()->json(Helpers::createSuccessResponse((new PlatformShowVM($platform->toArray()))->toArray()));
    }

    public function destroy(PlatformDestroyRequest $request){

        return response()->json(Helpers::createSuccessResponse(PlatformDestroyAction::execute(PlatformDTO::fromRequest($request->validated()))));
    }

}
