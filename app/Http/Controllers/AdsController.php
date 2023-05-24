<?php

namespace App\Http\Controllers;

use App\DataTables\AdsDataTable;
use App\Http\Interfaces\AdsInterface;
use App\Http\Requests\Ads\CreateAdsRequest;
use Illuminate\Http\Request;

class AdsController extends Controller
{
    public $adsInterface;

    public function __construct(AdsInterface $adsInterface)
    {
        $this->adsInterface = $adsInterface;
    }


    public function index(AdsDataTable $AdsDataTable)
    {
        return $this->adsInterface->index($AdsDataTable);
    }
    public function create()
    {
        return $this->adsInterface->create();
    }

    public function store(CreateAdsRequest $request)
    {
        return $this->adsInterface->store($request);
    }

}
