<?php

namespace App\D;

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
     * @param Saver $saver
     */
    public function __construct(IReport $report, Saver $saver)
    {
        $this->report = $report;
        $this->saver = $saver;
    }

    public function save()
    {
        $this->saver->save($this->report->getAllData());
    }
}