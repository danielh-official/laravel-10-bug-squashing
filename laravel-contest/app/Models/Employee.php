<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * @property int $id
 * @property string $first_name
 * @property string $last_name
 * @property string|null $phone
 * @property string|null $email
 * @property string|null $social_security_number
 * @property string|null $drivers_license_number
 * @property string|null $street
 * @property string|null $street_two
 * @property string|null $city
 * @property string|null $state
 * @property string|null $zip
 * @property string|null $alias_first_name
 * @property string|null $alias_last_name
 * @property string|null $work_email
 * @property string|null $work_phone
 * @property int|null $user_id
 * @property int|null $department_id
 * @property int|null $role_id
 * @property Carbon|null $first_started_at
 * @property boolean|null $is_terminated
 * @property string|null $notes
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property-read Department|null $department
 * @property-read Role|null $role
 * @property-read User|null $user
 * @property-read string $department_display
 * @property-read string $role_display
 * @property-read string $user_display
 */
class Employee extends Model
{
    use HasFactory;

    protected $hidden = [
        'social_security_number',
        'drivers_license_number'
    ];

    protected $casts = [
        'social_security_number' => 'encrypted',
        'drivers_license_number' => 'encrypted'
    ];

    protected function department(): BelongsTo
    {
        return $this->belongsTo(Department::class);
    }

    protected function role(): BelongsTo
    {
        return $this->belongsTo(Role::class);
    }

    protected function user(): BelongsTo
    {
        return $this->belongsTo(Role::class);
    }

    protected function departmentDisplay(): Attribute
    {
        return Attribute::make(
            get: fn(string $value) => $this->department ? $this->department->name : "No Department Selected"
        );
    }

    protected function roleDisplay(): Attribute
    {
        return Attribute::make(
            get: fn(string $value) => $this->role ? $this->role->name : "No Role Selected"
        );
    }

    protected function userDisplay(): Attribute
    {
        return Attribute::make(
            get: fn(string $value) => $this->user ? $this->user->name : "No User Assigned"
        );
    }
}
