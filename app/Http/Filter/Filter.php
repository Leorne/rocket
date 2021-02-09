<?php

namespace App\Http\Filter;

class Filter
{
    protected bool $ready = false;

    protected function isReady() : bool {
        return $this->ready;
    }
}
