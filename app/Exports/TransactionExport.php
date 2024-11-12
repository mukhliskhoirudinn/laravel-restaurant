<?php

namespace App\Exports;

use App\Models\Transaction;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use PhpOffice\PhpSpreadsheet\Style\Fill;
use PhpOffice\PhpSpreadsheet\Style\Style;
use PhpOffice\PhpSpreadsheet\Style\Color;
use Maatwebsite\Excel\Concerns\WithDefaultStyles;

class TransactionExport implements FromCollection, WithHeadings, ShouldAutoSize, WithDefaultStyles
{
    protected $start_date, $end_date;

    public function __construct($start_date, $end_date)
    {
        $this->start_date = $start_date;
        $this->end_date = $end_date;
    }

    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Transaction::whereBetween('created_at', [$this->start_date, $this->end_date])
        ->get()
        ->map(function ($transaction, $index) {
            return [
                $index + 1,
                date('d-m-Y', strtotime($transaction->created_at)),
                $transaction->code,
                $transaction->type,
                $transaction->name,
                $transaction->email,
                $transaction->phone,
                date('d-m-Y', strtotime($transaction->date)),
                $transaction->time,
                $transaction->people,
                'Rp. ' . number_format($transaction->amount, 0, ',', '.'),
                $transaction->status,
                url(asset('storage/' . $transaction->file))
            ];
        });
    }

    public function headings(): array
    {
        return [
            'No',
            'Created At',
            'Code',
            'Type',
            'Name',
            'Email',
            'Phone',
            'Date',
            'Time',
            'People',
            'Amount',
            'Status',
            'File'
        ];
    }

    public function defaultStyles(Style $defaultStyle)
    {
        // Configure the default styles
        return $defaultStyle->getFill()->setFillType(Fill::FILL_SOLID);

        // Or return the styles array
        return [
            'fill' => [
                'fillType'   => Fill::FILL_SOLID,
                'startColor' => ['argb' => Color::RED],
            ],
        ];
    }
}
