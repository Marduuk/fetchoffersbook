<?php

namespace App\Services;

use App\Offer;
use App\Repositories\OfferRepository;
use \GuzzleHttp\Client;

class AppManagerService implements OfferServiceInterface
{
    /** @var OfferRepository  */
    protected $offerRepository;

    protected $providerUrl;

    public function __construct(OfferRepository $_offerRepository)
    {
        $this->offerRepository = $_offerRepository;
        $this->providerUrl = 'https://demo.appmanager.pl/api/v1/ads?_format=json';
    }

    /**
     * gets offers and saves them into our db
     * @return mixed|string
     */
    public function fetchOffersExternallySaveInDb()
    {
        $offers = $this->getOffersExternal();
        foreach ($offers['data'] as $single) {
            $offer = Offer::where('code', $single['code'])->first();

            if ($offer != null)
                continue;

            $offer = $this->fillOfferModel($single);
            $this->offerRepository->create($offer);
        }
        return 'Successfully fetched and saved offers from external provider';
    }

    /**
     * gets all offers from given url
     * @return mixed
     */
    public function getOffersExternal()
    {
        $client = new Client();
        $response = $client->get($this->providerUrl);
        // if not success = true, throw
        $offers = $response->getBody()->getContents();
        return json_decode($offers, true);
    }

    /**
     * fills the model and then returns it
     * @param $singleOffer
     * @return Offer|mixed
     */
    public function fillOfferModel($singleOffer)
    {
        $offer = new Offer();
        $offer->fill([
            'admin_name' => $singleOffer['admin_name'],
            'categories' => $singleOffer['categories'][0], //yes... it should be parsed somehow better... sorry :)
            'positions' => $singleOffer['positions'][0],
            'cities' => $singleOffer['cities'][0],
            'url' => $singleOffer['content']['url'],
            'apply_url' => $singleOffer['content']['apply_url'],
            'code' => $singleOffer['code'],
            'provider' => 'AppManager'
        ]);
        return $offer;
    }

    /**
     * gets all offers by provider
     * @param $provider
     * @return mixed|void
     */
    public function getAllOffersByProvider($provider)
    {
        $this->offerRepository->getOffersByProvider($provider);
    }
}
