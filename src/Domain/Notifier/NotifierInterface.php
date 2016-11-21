<?php

namespace ChessDomain\Notifier;

interface NotifierInterface
{
    public function fire();
    public function addListener();
}
