<?php

namespace App\Services;

interface OfferServiceInterface
{
    /**
     * main logic method
     * @return mixed
     */
    public function fetchOffersExternallySaveInDb();
    /**
     * gets offers from external api
     */
    public function getOffersExternal();

    /**
     * gets all offers by provider
     * @param $provider
     * @return mixed
     */
    public function getAllOffersByProvider($provider);

    /**
     * fills the offer model
     * @param $singleOffer
     * @return mixed
     */
    public function fillOfferModel($singleOffer);
}
