<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ArticleTags extends Model
{

    /**
     * @return string[]
     */
    public static function validationRules()
    {
        return [
            'name' => 'required|max:50',
        ];
    }
}
