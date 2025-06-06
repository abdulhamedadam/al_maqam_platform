<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClientsCompanies extends Model
{
    use HasFactory;
    protected $table  ='tbl_clients_companies';
    protected $guarded=[];

    /********************************************/
    public function company()
    {
        return $this->belongsTo(ClientsCompanies::class,'company_id','id');
    }

    /********************************************/
    public function client()
    {
        return $this->belongsTo(Clients::class,'client_id','id');
    }
}
