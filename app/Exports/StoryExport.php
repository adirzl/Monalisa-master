<?php

namespace App\Exports;

use App\Models\Story;
use Maatwebsite\Excel\Concerns\FromCollection;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use PhpOffice\PhpSpreadsheet\Cell\Cell;
use PhpOffice\PhpSpreadsheet\Cell\DataType;
use Maatwebsite\Excel\Concerns\WithCustomValueBinder;
use PhpOffice\PhpSpreadsheet\Cell\DefaultValueBinder;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Events\AfterSheet;

class StoryExport extends DefaultValueBinder implements FromView, ShouldAutoSize, WithCustomValueBinder, WithEvents
{
    /**
    * @return \Illuminate\Support\Collection
    */
    // public function collection()
    // {
        // return Story::all();
        // return new Collection([
        //     [1, 2, 3],
        //     [4, 5, 6]
        // ]);
    // }
    // private $user_id;

    public function __construct(Request $request)
    {
        $this->report_type = $request->report_type;
        $this->user_id = $request->user_id;
        $this->story_date = $request->story_date;
        // dd($reportType);
    }

    public function view(): View
    {
        if($this->report_type == 1){
            $data = Story::where('user_id', $this->user_id)->get();
        }else{
            $data = Story::where('date_story', $this->story_date)->get();
        }

        return view('report.excel', [
            'story' => $data
        ]);
    }

        /**
     * @param Cell $cell
     * @param string $value
     * @return boolean
     */
    public function bindValue(Cell $cell, $value)
    {
        if (in_array($cell->getColumn(), ['I','J','K','L']) && $cell->getRow() >= 5) {//dd($cell->setValue());
            // $cell->setValueExplicit($value, DataType::TYPE_STRING);
            return parent::bindValue($cell, trim($value));
            return true;
        }

        return parent::bindValue($cell, $value);
    }


    /**
     * @return array
     */
    public function registerEvents(): array
    {
        return [
            AfterSheet::class => function (AfterSheet $event) {
                $arrStyle = [
                    'borders' => [
                        'allBorders' => [
                            'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                            'color' => ['argb' => '00000000']
                        ]
                    ],
                ];

                $sheet = $event->getSheet()->getDelegate();
                $highestRow = $sheet->getHighestRow();
                $highestCol = $sheet->getHighestColumn();

                $sheet->getStyle('A1:' . $highestCol . $highestRow)->getAlignment()
                    ->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
                $sheet->getStyle('A1:' . $highestCol . $highestRow)->getAlignment()
                    ->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER);

                $sheet->getStyle('I5:I' . $highestRow)->getAlignment()
                    ->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_LEFT);
                $sheet->getStyle('J5:J' . $highestRow)->getAlignment()
                    ->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_LEFT);
                $sheet->getStyle('L5:L' . $highestRow)->getAlignment()
                    ->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_LEFT);
                $sheet->getStyle('K5:K' . $highestRow)->getAlignment()
                    ->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_LEFT);

                $sheet->getStyle('A3:' . $highestCol . $highestRow)
                    ->applyFromArray($arrStyle);

                $sheet->getStyle('A3:' . $highestCol . '3')->getFont()->setBold(true);
                $sheet->getStyle('A4:' . $highestCol . '4')->getFont()->setBold(true);

                $sheet->mergeCells('A1:' . $highestCol . '1');
                $sheet->mergeCells('A2:' . $highestCol . '2');

                $sheet->getStyle('I5:I'.$highestRow)->getAlignment()->setWrapText(true);
                $sheet->getStyle('J5:J'.$highestRow)->getAlignment()->setWrapText(true);
                $sheet->getStyle('K5:K'.$highestRow)->getAlignment()->setWrapText(true);
                $sheet->getStyle('L5:L'.$highestRow)->getAlignment()->setWrapText(true);

                // $sheet->cell('I5:I'.$highestRow, function($cell){dd($cell);
                //     $cell->setValue(trim($cell));
                // });

                $sheet->getPageSetup()->setPaperSize(\PhpOffice\PhpSpreadsheet\Worksheet\PageSetup::PAPERSIZE_A4);
                $sheet->getPageSetup()->setOrientation(\PhpOffice\PhpSpreadsheet\Worksheet\PageSetup::ORIENTATION_LANDSCAPE);
            }
        ];
    }

    // public function map($invoice): array
    // {
    //     // This example will return 3 rows.
    //     // First row will have 2 column, the next 2 will have 1 column
    //     return [
    //         [
    //             $invoice->invoice_number,
    //             Date::dateTimeToExcel($invoice->created_at),
    //         ],
    //         [
    //             $invoice->lines->first()->description,
    //         ],
    //         [
    //             $invoice->lines->last()->description,
    //         ]
    //     ];
    // }
}
