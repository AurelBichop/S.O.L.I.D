<?php

namespace App\Reporting\Format;

use App\Reporting\Report;

class JsonFormatter implements FormatterInterface, DeserializeInterface
{
    public function format(Report $report): string
    {
        return json_encode($report->getContents());
    }

    public function deserialize(string $str): Report
    {
        $contents = json_decode($str);

        return new Report($contents['date'], $contents['title'], $contents['data']);
    }
}
