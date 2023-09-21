<?php

namespace App\Models;

class   Listing
{
    public static function all()
    {
        return [
            [
                'id' => 1,
                'title' => 'Listings one',
                'description' => 'Whew!'
            ],
            [
                'id' => 2,
                'title' => 'Listings two',
                'description' => 'Whew 22!'
            ]
        ];
    }

    public static function find($id)
    {
        $listings = self::all();
        foreach ($listings as $listing) {
            if ($listing['id'] == $id) {
                return $listing;
            }
        }
    }
}
