<?php


namespace App\Repositories;

use App\Offer;


class OfferRepository implements BasicRepositoryInterface
{


    public function __construct()
    {
        //$this->offer = $offer;
    }

    /**
     * Get's a Offer by it's ID
     *
     * @param int
     * @return collection
     */
    public function get($offer_id)
    {
        return Offer::find($offer_id);
    }

    /**
     * Get's all offers.
     *
     * @return mixed
     */
    public function all()
    {
        return Offer::all();
    }

    /**
     * Deletes a Offer.
     *
     * @param int
     */
    public function delete($offer_id)
    {
        Offer::destroy($offer_id);
    }

    /**
     * Updates a Offer.
     *
     * @param int
     * @param array
     */
    public function update($offer_id, array $offer_data)
    {
        Offer::find($offer_id)->update($offer_data);
    }

    /**
     * creates an offer
     * @param Offer $offer
     */
    public function create($offer)
    {

        $offer->save();
    }

    /**
     * gets all offers by provider
     * @param $provider
     * @return mixed
     */
    public function getOffersByProvider($provider)
    {
        return Offer::query()->where('provder',$$provider)->get();
    }
}
