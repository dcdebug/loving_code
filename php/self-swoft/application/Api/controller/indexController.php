<?php
/**
 * Created by PhpStorm.
 * User: darry
 * Date: 2020-04-03
 * Time: 01:44
 */

namespace App\Api\Controller;

/**
 * Class indexController
 * @Controller(prefix='index')
 * @package App\Api\Controller
 */
class indexController
{
    /**
     * @RequestMapping(route="index")
     */
    public function index()
    {
        //$this->test();
        echo "indexing";
    }

    /**
     * @RequestMapping(route="test")
     */
    protected function test()
    {

        $start = memory_get_usage();
        echo $start.PHP_EOL;
        $j = 1;
        for ($i = 0; $i <= 100000000; $i++) {
            $j++;
        }
        $end = memory_get_usage();
        echo $end.PHP_EOL;

        echo $use = $end - $start;
        echo PHP_EOL;

    }
}