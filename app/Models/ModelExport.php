<?php


namespace App\Models;


use App\Models\BaseModel;
use Illuminate\Database\Eloquent\Collection;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class ModelExport implements FromCollection, WithHeadings
{
    /** @var BaseModel|string $modelClass */
    public $collection = '';

    public $heading = [];


    public function __construct(array $collection,$heading)
    {
        $this->collection = new Collection($collection);
        $this->heading = $heading;
    }

    public function collection()
    {
      return $this->collection;
    }

    public function headings(): array
    {
        return $this->heading;
    }

}

