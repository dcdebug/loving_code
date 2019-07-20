<?php
namespace Common;

interface Observer{
    //观察者用来接受信息

    function update($server_info = null);
}