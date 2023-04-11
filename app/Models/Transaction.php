<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\DB;

class Transaction extends Model
{
    use HasFactory;

    protected $fillable = ['webservice_id', 'amount', 'type'];

    const TYPES = [self::WEB_REQUEST , self::MOBILE_REQUEST , self::POS_REQUEST];

    const WEB_REQUEST = 0;
    const MOBILE_REQUEST = 1;
    const POS_REQUEST = 2;

    public function webservice()
    {
        return $this->belongsTo(Webservice::class);
    }
}
