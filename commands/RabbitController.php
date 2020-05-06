<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace app\commands;

use app\Services\ShippingService;
use PhpAmqpLib\Connection\AMQPStreamConnection;
use yii\console\Controller;
use yii\console\ExitCode;
use yii\helpers\Console;

/**
 * This command echoes the first argument that you have entered.
 *
 * This command is provided as an example for you to learn how to create console commands.
 *
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class RabbitController extends Controller
{

    /**
     * @var ShippingService $shippingService
     */
    private $shippingService;

    public function __construct($id, $module, $config = [], ShippingService $shippingService)
    {
        parent::__construct($id, $module, $config);
        $this->shippingService = $shippingService;
    }

    /**
     * This command echoes what you have entered as the message.
     * @param string $message the message to be echoed.
     * @return int Exit code
     */
    public function actionIndex($message = 'hello world')
    {
        $connection = new AMQPStreamConnection('rabbitmq', 5672, 'admin', 'admin');
        $channel = $connection->channel();

        $channel->queue_declare('demo', false, true, false, false);

        echo " [*] Waiting for messages. To exit press CTRL+C\n";

        $callback = function ($msg) {

            $data = [
                "order_id" => $msg->body,
                "name" => "hungnv",
                "phone" => "123456789",
                "address" => "Nam Tu Liem- Ha Noi"
            ];

            $this->shippingService->insert($data);
            echo ' [x] Received OrderId= ', $msg->body, "\n";
        };

        $channel->basic_consume('demo', '', false, true, false, false, $callback);

        while ($channel->is_consuming()) {
            $channel->wait();
        }

        $channel->close();
        $connection->close();
    }

}
