<?php

namespace  Common;

class MaleUserStrategy implements UserStrategy{

    public  function showAd()
    {
        // TODO: Implement showAd() method.
        echo "2019 电子产品".PHP_EOL;
    }
    public  function showCategory()
    {

        // TODO: Implement showCategory() method.
        echo "男士 电子产品".PHP_EOL;


    }

    //请在index.php查看策略模式的实用

}