<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Resources\Api\CategoryResource;
use App\Http\Resources\Api\ServiceResource;
use App\Http\Resources\Api\SettingResource;
use App\Http\Resources\Api\StatusResource;
use App\Models\Category;
use App\Models\Service;
use App\Models\Setting;
use App\Models\Status;

class ConfigApiController extends Controller
{
    public function index()
    {
        return response([
            'categories' => CategoryResource::collection(Category::all()),
            'services' => ServiceResource::collection(Service::all()),
            'statuses' => StatusResource::collection(Status::all()),
            'settings' => SettingResource::collection(Setting::all())
        ]);
    }
}
