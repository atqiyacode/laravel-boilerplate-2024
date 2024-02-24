<?php

namespace Modules\Notification\App\Imports;

use Modules\Notification\App\Models\TemplateNotification;
use Maatwebsite\Excel\Concerns\ToModel;

class TemplateNotificationImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new TemplateNotification([
            //
        ]);
    }
}
