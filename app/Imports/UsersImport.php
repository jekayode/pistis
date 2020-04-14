<?php

namespace App\Imports;


use App\Phone;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class UsersImport implements ToModel, WithHeadingRow
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        return new Phone([
            'name'     => $row['name'],
            'phone'    => $row['phone'],
            'code'     => $row['code'],
            'status'     => ' ',
        ]);
    }
}