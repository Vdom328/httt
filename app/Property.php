<?php
namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Property
 *
 * @package App
 * @property string $name
 * @property string $address
 * @property string $photo
*/
class Property extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'name', 'address', 'photo', 'user_id', 'rent_cost', 'construction_date', 'maintenance_history','rented_date','payment_date','payment_status','contract_expiry_date'
    ];
    
    
    
}
