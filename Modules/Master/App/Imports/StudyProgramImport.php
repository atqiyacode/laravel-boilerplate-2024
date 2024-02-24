<?php

namespace App\Imports;

use App\Models\StudyProgram;
use Maatwebsite\Excel\Concerns\ToModel;

class StudyProgramImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new StudyProgram([
            //
        ]);
    }
}
