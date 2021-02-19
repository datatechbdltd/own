<?php

namespace App\Imports;


use App\Models\Lead;
use Illuminate\Support\Facades\Crypt;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class LeadImport implements ToModel, WithHeadingRow
{
    /**
     * @param array $row
     * @return Lead
     */
    public function model(array $row)
    {
        return new Lead([
            'name'     => $row['name'],
            'email'     => $row['email'],
            'phone'     => $row['phone'],
            'date_of_birth'     => $row['date_of_birth'],
            'gender'     => $row['gender'],
            'is_married'     => $row['is_married'],
            'company_name'     => $row['company_name'],
            'profession'     => $row['profession'],
            'address'     => $row['address'],
            'company_website'     => $row['company_website'],
            'company_facebook_page'     => $row['company_facebook_page'],
            'description'     => $row['description'],
            'add_by_id'     => auth()->user()->id,
        ]);
    }
}
