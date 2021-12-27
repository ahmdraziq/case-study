<?php

namespace App\Models;

use App\Enums\EmployeeStatus;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;

    protected $fillable = [
        'icno',
        'fullname',
        'dateofbirth',
        'role_id',
        'address_id',
        'status',
    ];

    public $casts = [
        'dateofbirth' => 'timestamp',
        'status' => EmployeeStatus::class,
    ];

    public function role() {
        return $this->belongsTo(UserRole::class, 'role_id');
    }

    public function address() {
        return $this->belongsTo(Address::class);
    }
}
