<?php

namespace Modules\Notification\App\Imports;

use Modules\Notification\App\Models\NotificationType;
use Maatwebsite\Excel\Concerns\ToModel;

class NotificationTypeImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new NotificationType([
            //
        ]);
    }
}
