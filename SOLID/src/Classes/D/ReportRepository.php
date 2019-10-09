<?php


namespace App\D;


/**
 * Class ReportRepository
 * @package App\D
 */
class ReportRepository
{
    private $report, $saver;

    /**
     * ReportRepository constructor.
     * @param IReport $report
     * @param ISaver $saver
     */
    public function __construct(IReport $report, ISaver $saver)
    {
        $this->report = $report;
        $this->saver = $saver;
    }

    public function save()
    {
        $this->saver->save($this->report->getAllData());
    }
}