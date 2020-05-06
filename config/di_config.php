<?php
return [
    \app\DI\ITest::class => \app\DI\Test::class,
    \app\Repositories\Interfaces\IPostRepository::class=>\app\Repositories\PostRepository::class,
    \app\Repositories\Interfaces\IShippingRepository::class=>\app\Repositories\ShippingRepository::class
];