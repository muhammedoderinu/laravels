<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class patient extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'firstname','lastname','phonenumber','lga','fever','musclepain',
        'chestpain','diarrohea','nausea','cough','vomitting','headache','sorethroat','loc'
     ];
}
