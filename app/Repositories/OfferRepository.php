<?php


namespace App\Repositories;

use App\Offer;


class OfferRepository implements BasicRepositoryInterface
{
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
        return Offer::query()->where('provider', $provider)->get();
    }

    public function deleteOverdated()
    {
        //deleting offers should be executed from the repository level, not the provider specific service
        //because once we do fetch the offers they do go into our single database table.
        // Deleting itself should be fired from job
        //normally offers should be deleted by some expiration date but i made assumption to simplify stuff :)
        Offer::where('created_at','>', '30 days')->delete();
    }
}
