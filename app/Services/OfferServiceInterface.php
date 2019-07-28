<?php

namespace App\Services;

interface OfferServiceInterface
{
    /**
     * gets offers from external api
     */
    public function getOffersExternal();

    /**
     * saves fetched offers in database
     */
    public function saveFetchedOffers();
}
