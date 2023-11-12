<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class FooterLink extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable =[
        'title' ,
        'url',
        'type',
        'iconUrl',
    ];

    protected $casts = [
        'type' => 'string',
    ];

    public static function getFooterLinks()
    {
        $footerLinks = [
            'internal' => 4,
            'external' => 3,
            'connect_us' => 2,
        ];

        $result = [];

        foreach ($footerLinks as $type => $count) {
            $links = FooterLink::where('type', $type)->take($count)->get(['type', 'title', 'url', 'iconUrl']);
            $result = array_merge($result, $links->toArray());
        }

        return $result;
    }
}
