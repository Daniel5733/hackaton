<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    /**
        * The table associated with the model.
        *
        * @var string
        */
       protected $table = 'cliente';
    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = 'id';
    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id',
        'Surname',
        'CreditScore',
        'Geography',
        'Gender',
        'DateOfBirth',
        'OpenAccountDate',
        'CurrentAccountNumber',
        'CreditCardAccountNumber',
        'Balance',
        'BalanceDate',
        'EstimatedSalary',
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [

    ];
}
