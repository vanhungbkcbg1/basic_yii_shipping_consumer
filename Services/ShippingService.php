<?php

namespace app\Services;

use app\Repositories\Interfaces\IPostRepository;
use app\Repositories\Interfaces\IShippingRepository;

class ShippingService
{
    protected $shippingRepository;

    public function __construct(IShippingRepository $shippingRepository)
    {
        $this->shippingRepository = $shippingRepository;
    }

    public function findById($id)
    {
        return $this->shippingRepository->find($id);
    }

    public function insert($data)
    {
        return $this->shippingRepository->insert($data);
    }

}