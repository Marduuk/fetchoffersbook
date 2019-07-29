<?php

namespace App\Http\Controllers;

use App\Repositories\OfferRepository;
use App\Services\AppManagerService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class OfferController extends Controller
{
    /**
     * @var AppManagerService
     */
    var $AppManagerService;

    /**
     * @var OfferRepository
     */
    var $OfferRepository;

    /**
     * creates an instance
     * OfferController constructor.
     * @param AppManagerService $AppManagerService
     * @param OfferRepository $offerRepository
     */
    public function __construct(AppManagerService $AppManagerService, OfferRepository $offerRepository)
    {
        $this->AppManagerService = $AppManagerService;
        $this->OfferRepository = $offerRepository;
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('main');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'id' => ['required', 'int'],
            'job_name' => ['required', 'string', 'max:255'],
            'something' => ['required', 'string', 'max:255', 'unique:offers'],
        ]);
    }

    /**
     * gets all offers
     * @return mixed
     */
    public function getAllOffers()
    {
        return $this->OfferRepository->all();
    }

    public function fetchOffersFromExternal()
    {
        //normally should be called from a job not a controller
        return $this->AppManagerService->fetchOffersExternallySaveInDb();
    }
}
