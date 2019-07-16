<?php
namespace  Common;

class FemaleUserStrategy implements UserStrategy{

    function showAd(){
        echo "2019 女装的广告".PHP_EOL;
    }

    function showCategory()
    {
        // TODO: Implement showCategory() method.
        echo "女装".PHP_EOL;
    }
}