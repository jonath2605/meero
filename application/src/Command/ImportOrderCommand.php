<?php
/**
 * Created by PhpStorm.
 * User: jonathan_f
 * Date: 06/06/2019
 * Time: 17:09
 */

namespace App\Command;

use App\Domain\Order\Service\OrderService;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class ImportOrderCommand extends Command
{
    // the name of the command (the part after "bin/console")
    protected static $defaultName = 'app:import';

    /**
     * @var OrderService
     */
    private $orderService;


    public function __construct(bool $requirePassword = false, OrderService $orderService)
    {
        // best practices recommend to call the parent constructor first and
        // then set your own properties. That wouldn't work in this case
        // because configure() needs the properties set in this constructor
        $this->requirePassword = $requirePassword;

        $this->orderService = $orderService;
        parent::__construct();
    }

    protected function configure()
    {
        $this
            // the short description shown while running "php bin/console list"
            ->setDescription('Import a new orders.')
            // the full command description shown when running the command with
            // the "--help" option
            ->setHelp('This command allows you to import orders...');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $output->writeln([
            'Import Orders',
            '============',
            '',
        ]);

        $xml=simplexml_load_file("orders-test.xml", "SimpleXMLElement", LIBXML_NOCDATA);


        foreach ($xml->orders->order as $ord){

            $params = [
                "order_id" => $ord->order_id,
                "order_status" => $ord->order_status,
                "order_mrid" => $ord->order_mrid,
                "order_refid" => $ord->order_refid,
            ];

            if (!empty($ord->order_purchase_date)) {
                $params['order_purchase_date'] = $ord->order_purchase_date;
            }

            $this->orderService->post($params);
        }

        $output->writeln([
            'Import Orders OK',
            '============',
            '',
        ]);

    }
}