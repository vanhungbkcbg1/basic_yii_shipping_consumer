<?php
namespace app\Repositories;

use app\models\Post;
use app\models\Shipping;
use app\Repositories\Interfaces\IPostRepository;
use app\Repositories\Interfaces\IShippingRepository;

class ShippingRepository extends BaseRepository implements IShippingRepository
{
    public function getModel()
    {
        return Shipping::class;
    }
}