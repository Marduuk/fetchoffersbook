<?php


namespace App\Services;

use App\Offer;
use App\Repositories\OfferRepository;
use \GuzzleHttp\Client;
class OfferService
{
    /** @var OfferRepository  */
    var $offer;

    protected $offerRepository;

    public function __construct(OfferRepository $_offerRepository, Offer $offer)
    {
        $this->offerRepository = $_offerRepository;
        $this->offer = $offer;
    }

    public function fetchOffersExternallySaveInDbAndShowToClient()
    {
        $client = new Client();
        $request = $client->get('https://demo.appmanager.pl/api/v1/ads?_format=json');
        $response = $request->getBody()->getContents();
        $offers = json_decode($response, true);

        // if not success = true, throw

        //i dont feel repos, orm seems like its enough...
        foreach ($offers['data'] as $key => $single) {
            $offer = Offer::where('code', $single['code'])->first();

            if ($offer != null)
                continue;

            $offer = $this->offer->fill([
                'admin_name' => $single['admin_name'],
                'categories' => $single['categories'][0],
                'positions' => $single['positions'][0],
                'cities' => $single['cities'][0],
                'url' => $single['content']['url'],
                'apply_url' => $single['content']['apply_url'],
                'code' => $single['code']
            ]);
            //why am i saving one offer at the time?
            // Where is the problem with instancing a new model? shouldn't fill overwrite previous model and save it?
            $this->offerRepository->create($offer);
        }
        return $this->offerRepository->all();
    }
}
