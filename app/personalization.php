<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class personalization extends Model
{
    public $table = "personalization";
    protected $fillable = [
        'user', 'county','district','location','headline','international','business','science','entertainment','sport','health','local'
    ];
}
