<?php

namespace App\Reporting\Format;

use App\Reporting\Report;

interface DeserializeInterface
{
    public function deserialize(string $str): Report;
}
