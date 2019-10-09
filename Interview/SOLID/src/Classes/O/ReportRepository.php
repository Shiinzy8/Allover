<?php

namespace App\O;

/**
 * Class ReportRepository
 * @package App\O
 */
class ReportRepository
{
    private $report, $saver;

    /**
     * ReportRepository constructor.
     * @param Report $report
     * @param ISaver $saver
     */
    public function __construct(Report $report, ISaver $saver)
    {
        $this->report = $report;
        $this->saver = $saver;
    }

    /**
     *
     */
    public function save()
    {
        $this->saver->save($this->report->getAllData());
    }
}