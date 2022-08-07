<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use DB;

class Event extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded = [
        'id',
        'created_at',
        'updated_at',
    ];

    public function get_list($status='') {
        $where = '';
        if($status != '') {
            $where = ' and status = \''.$status.'\'';
        }

        $sql =
<<<EOT
        select distinct
                    events.id, events.method,
                    (case when event_details.month = '1' then
                                event_details.id || '-' || name|| '-' || to_char(from_date, 'DD/MM/YYYY') || '-' || to_char(to_date, 'DD/MM/YYYY') || '-' || status
                        end) month_1,
                    (case when event_details.month = '2' then
                                event_details.id || '-' || name|| '-' || to_char(from_date, 'DD/MM/YYYY') || '-' || to_char(to_date, 'DD/MM/YYYY') || '-' || status
                        end) month_2,
                    (case when event_details.month = '3' then
                                event_details.id || '-' || name|| '-' || to_char(from_date, 'DD/MM/YYYY') || '-' || to_char(to_date, 'DD/MM/YYYY') || '-' || status
                        end) month_3,
                    (case when event_details.month = '4' then
                                event_details.id || '-' || name|| '-' || to_char(from_date, 'DD/MM/YYYY') || '-' || to_char(to_date, 'DD/MM/YYYY') || '-' || status
                        end) month_4,
                    (case when event_details.month = '5' then
                                event_details.id || '-' || name|| '-' || to_char(from_date, 'DD/MM/YYYY') || '-' || to_char(to_date, 'DD/MM/YYYY') || '-' || status
                        end) month_5,
                    (case when event_details.month = '6' then
                                event_details.id || '-' || name|| '-' || to_char(from_date, 'DD/MM/YYYY') || '-' || to_char(to_date, 'DD/MM/YYYY') || '-' || status
                        end) month_6
                FROM
                    "event_details"
                RIGHT JOIN events on events.id = event_details.event_id
                where event_details.deleted_at is null and events.deleted_at is null
                $where
                ORDER BY events.id
EOT;
            $query = DB::select($sql);

            return $query;
    }
}
