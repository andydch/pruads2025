<?php

namespace App\Exports;

// use Maatwebsite\Excel\Concerns\FromCollection;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\WithStyles;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithColumnFormatting;
use PhpOffice\PhpSpreadsheet\Style\NumberFormat;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class HalbilUnairExport implements FromView, ShouldAutoSize, WithStyles, WithColumnFormatting
{
    public function view(): View
    {
        return view('export.halbil-unair-2026-export');
    }

    public function styles(Worksheet $sheet)
    {
        // get highest row info
        $lastHighestRow = $sheet->getHighestRow();
        // $sheet->setCellValue('D'.$lastHighestRow, "TOTAL");
        // $sheet->setCellValue('M'.$lastHighestRow,'=SUM(M7:M'.($lastHighestRow-1).')');

        // // set background color
        // $sheet->getStyle('G6:L6')->getFill()->applyFromArray([
        //     'fillType' => 'solid',
        //     'rotation' => 0,
        //     'color' => ['rgb' => 'eaf1dd'],
        // ]);

        // // set background color
        // $sheet->getStyle('G5:L5')->getFill()->applyFromArray([
        //     'fillType' => 'solid',
        //     'rotation' => 0,
        //     'color' => ['rgb' => '92d050'],
        // ]);

        // set header background color
        // $sheet->getStyle('A6:K7')->getFill()->applyFromArray([
        //     'fillType' => 'solid',
        //     'rotation' => 0,
        //     'color' => ['rgb' => 'eaf1dd'],
        // ]);

        // set header background color
        // $sheet->getStyle('F6:I6')->getFill()->applyFromArray([
        //     'fillType' => 'solid',
        //     'rotation' => 0,
        //     'color' => ['rgb' => '92d050'],
        // ]);

        $styleArray = [
            'alignment' => [
                'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
            ],
        ];

        // set center
        // $sheet->getStyle('A3')->applyFromArray($styleArray);
        // $sheet->getStyle('A4')->applyFromArray($styleArray);

        // $sheet->getStyle('A6:K'.$lastHighestRow)->applyFromArray([
        //     'borders' => [
        //         'allBorders' => [
        //             'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
        //             'color' => ['argb' => '000000'],
        //         ],
        //     ]
        // ]);

        // set text style
        return [
            // Style the first row as bold text.
            // 1 => ['font' => ['bold' => true]],
            // 2 => ['font' => ['bold' => true]],
            // 3 => ['font' => ['bold' => true]],

            // Styling a specific cell by coordinate.
            // '3' => ['font' => ['bold' => true]],
            'A1:C1' => [
                'font' => [
                    'bold' => true,
                    'size' => 16,
                ]
            ],
            // 'A1' => ['font' => ['bold' => true]],
            // 'N4' => ['font' => ['bold' => true]],
            // 'H4' => ['font' => ['bold' => true]],
            // 'A6:K7' => ['font' => ['bold' => true]],
            // 'D'.$lastHighestRow => ['font' => ['bold' => true]],
            // 'M'.$lastHighestRow => ['font' => ['bold' => true]],

            // 'B2' => ['font' => ['italic' => true]],

            // Styling an entire column.
            // 'C'  => ['font' => ['size' => 16]],
        ];
    }

    public function columnFormats(): array
    {
        return [
            'A' => NumberFormat::FORMAT_TEXT,
            'B' => NumberFormat::FORMAT_TEXT,
            'C' => NumberFormat::FORMAT_TEXT,
            // 'H' => NumberFormat::FORMAT_NUMBER,
            // 'C' => NumberFormat::FORMAT_CURRENCY_EUR_SIMPLE,
        ];
    }
}
