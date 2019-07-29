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

    /**
     * gets all offers by provider
     * @return mixed
     */
    public function getAllOffersByProvider();

    /**
     * calls repository to delete all overdated job offers
     * @return mixed
     */
    public function delteOverdated();
}
