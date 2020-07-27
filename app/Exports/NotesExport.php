<?php

namespace App\Exports;

use App\Note;
use Maatwebsite\Excel\Concerns\FromCollection;

class NotesExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Note::select(['text', 'updated_at'])->get();
    }
}
