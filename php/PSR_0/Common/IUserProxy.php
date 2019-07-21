<?php
namespace  Common;

interface IUserProxy{

    public function getUsername($id);
    public function setUsername($id,$name);
}