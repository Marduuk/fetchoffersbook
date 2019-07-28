<?php

namespace App\Repositories;

interface OfferRepositoryInterface
{
    /**
     * get offer by id
     *
     * @param int
     */
    public function get($offer_id);

    /**
     * get all offers
     *
     * @return mixed
     */
    public function all();

    /**
     * delete an offer
     *
     * @param int
     */
    public function delete($offer_id);

    /**
     * update an offer
     *
     * @param int
     * @param array
     */
    public function update($offer_id, array $offer_data);
}
