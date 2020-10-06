<?php

namespace App;

/**
 * Class FileReader
 * @package App\Helpers
 */
class FileReader
{
    private string $fileContent = '';
    private array $rows = [];
    private string $pattern = '/{"bin":"(\d+)","amount":"(\d+\.\d+)","currency":"([A-Z]{3})"}/';

    public function __construct(string $content)
    {
        $this->fileContent = $content;
    }

    public function getRows(): array
    {
        foreach (explode("\n", $this->fileContent) as $row) {
            if (empty($row)) {
                break;
            }

            $result = [];
            $rowIsCorrect = preg_match($this->pattern, $row, $result);

            if (!$rowIsCorrect) {
                break;
            }

            array_push($this->rows, [
                'bin' => intval($result[1]),
                'amount' => floatval($result[2]),
                'currency' => $result[3],
            ]);
        }

        return $this->rows;
    }
}