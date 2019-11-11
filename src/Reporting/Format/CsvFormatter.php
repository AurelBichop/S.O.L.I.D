<?php

namespace App\Reporting\Format;

use App\Reporting\Report;

class CsvFormatter implements FormatterInterface, DeserializeInterface
{
    public function format(Report $report): string
    {
        $contents = $report->getContents();

        $data = implode(";", $contents['data']);

        unset($contents['data']);

        return implode(";", $contents) . ";" . $data;
    }

    public function deserialize(string $str): Report
    {
        $contents = explode(";", $str);

        $data = [
            $contents[2],
            $contents[3]
        ];

        return new Report($contents[1], $contents[0], $data);
    }
}
