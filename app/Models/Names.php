<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

class Names extends Model
{
    use HasFactory;

    use Searchable;

    protected $table = 'search_data';

    protected $primaryKey = 'data_id';

    protected $connection = 'mysql_search';
    

    public function searchableAs(): string
    {
        return 'search_data';
    }


    public function toSearchableArray(): array
    {
        $array = $this->toArray();

        // Customize the data array...

        return $array;
    }
}
