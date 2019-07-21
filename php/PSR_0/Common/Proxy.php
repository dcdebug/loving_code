<?php
class Proxy implements \Common\IUserProxy{


    public function getUsername($id)
    {

        //slave操作
        // TODO: Implement getUsername() method.
    }
    public  function setUsername($id, $name) {
        // TODO: Implement setUsername() method.

        //master操作
    }
}