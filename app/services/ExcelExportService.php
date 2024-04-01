<?php

namespace App\Services;

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class ExcelExportService
{
    public function exportTasks($tasks)
    {
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        $sheet->setCellValue('A1', 'Project');
        $sheet->setCellValue('B1', 'Description');
        $sheet->setCellValue('C1', 'Start Time');
        $sheet->setCellValue('D1', 'End Time');
        $sheet->setCellValue('E1', 'Priority');
        $sheet->setCellValue('F1', 'Status');
        $sheet->setCellValue('G1', 'Person');

        $row = 2;
        foreach ($tasks as $task) {
            $sheet->setCellValue('A' . $row, $task->project->name);
            $sheet->setCellValue('B' . $row, $task->description);
            $sheet->setCellValue('C' . $row, $task->start_time);
            $sheet->setCellValue('D' . $row, $task->end_time);
            $sheet->setCellValue('E' . $row, $task->getPriorityName());
            $sheet->setCellValue('F' . $row, $task->getStatusName());
            $sheet->setCellValue('G' . $row, $task->person->full_name);
            $row++;
        }

        $writer = new Xlsx($spreadsheet);
        $filePath = storage_path('app/tasks.xlsx');
        $writer->save($filePath);

        return $filePath;
    }
}