<?php
namespace Common;

class SizeDecorator implements  DrawDecorator{

    protected  $size;
    public  function __construct($size)
    {
        $this->size = $size;

    }

    public  function beforeDraw()
    {

        echo "<div style = 'font-size:".$this->size."px;'>";
        // TODO: Implement beforeDraw() method.
    }

    public function afterDraw()
    {

        echo "</div>";
        // TODO: Implement afterDraw() method.
    }
}