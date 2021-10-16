<?php


namespace App\Http\ViewModels\Global\Users\Activities\Platforms\PlatformVersions;

use App\Domain\Global\Users\Activities\Platforms\PlatformVersions\Model\PlatformVersion;
use Illuminate\Contracts\Support\Arrayable;

class PlatformVersionIndexVM implements Arrayable
{

    public function get_platform_versions(){
    	return PlatformVersion::all();
	}
    public function toArray(): array
    {
        return $this->get_platform_versions()->toArray();
    }
}
