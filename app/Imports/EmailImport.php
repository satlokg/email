<?php

namespace App\Imports;

use App\Models\Emaillist;
use Maatwebsite\Excel\Concerns\ToModel;

class EmailImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    private $id;
    private $name;
    private $email;
     public function __construct($id)
    {
       $this->id=$id;
    }
    public function model(array $row)
    {
       // dd($row);
        $this->name=$row[0];
        $this->email=$row[0]; 
        return Emaillist::create([
            'name'     => $this->name,
            'email'    => $this->email, 
            'listing_id' => $this->id,
        ]);

    }
}
