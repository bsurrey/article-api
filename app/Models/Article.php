<?php

namespace App\Models;

use GuzzleHttp\Client;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Http;

class Article extends Model
{
    protected $fillable = [
        'name',
        'text',
        'author',
        'publication_date',
        'expiration_date',
    ];

    public static function validationRules()
    {
        return [
            'name'              => 'string|max:100|required',
            'author'            => 'string|max:100|required',
            'text'              => 'string|required',
            'publication_date'  => 'date|required',
            'expiration_date'   => 'date|nullable',
        ];
    }
}
