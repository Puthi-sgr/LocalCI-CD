<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vendor extends Model
{
    //The class generally assume that you are referring to a "vendor's'" table

    protected $fillable = ['name', 'email', 'password']; //override fillable for vendor
    protected $hidden = ['password'];

    public static function createVendor(array $data): Vendor
    {
        $data['password'] = bcrypt($data['password']);

        return self::create($data);
    }

    public static function getAllVendor(): Vendor
    {
        return self::all();
    }
    /**
     * Deletes a vendor from the database.
     *
     * @param Vendor $vendor
     * @return bool
     */

    public static function getVendorById(int $id): Vendor
    {
        return self::find($id);
    }

    /**
     * Updates a vendor in the database.
     * 
     * @param int $id
     * @param array $data
     * @return Vendor
     */
    public static function updateVendor(int $id, array $data): Vendor
    {
        $vendor = self::find($id);
        if ($vendor) {
            $vendor()->update($data);
            return $vendor;
        }
        return false;
    }

    /**
     * Deletes the specified vendor from the database.
     *
     * @param Vendor $vendor
     * @return bool
     */

    public static function deleteVendor(int $id): bool
    {
        $vendor = self::find($id);

        if ($vendor) {
            $vendor->delete();
        }

        return false;
    }



    use HasFactory;
}
