<?php

namespace App\Http\Controllers;

use App\Offer;
use App\Providers\AppServiceProvider as container;
use App\Services\OfferService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;

class OfferController extends Controller
{
    /**
     * @var OfferService
     */
    var $offerService;

    /**
     * creates an instance
     * OfferController constructor.
     * @param OfferService $offerService
     */
    public function __construct(OfferService $offerService)
    {
        $this->offerService = $offerService;
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

//    /**
//     * Create a new user instance after a valid registration.
//     *
//     * @param  array  $data
//     * @return \App\User
//     */
//    protected function create(array $data)
//    {
//        return Offer::create([
//            'id' => $data['name'],
//            'job_name' => $data['email'],
//            'something' => $data['something'],
//        ]);
//    }


    public function getOffers(Request $request)
    {
        return $this->offerService->fetchOffersExternallySaveInDbAndShowToClient();
    }
}
