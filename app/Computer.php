<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Computer
 *
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Computer newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Computer newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Computer query()
 * @mixin \Eloquent
 * @property int $id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string $name
 * @property string $mac_address
 * @property string $broadcast_address
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Computer whereBroadcastAddress($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Computer whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Computer whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Computer whereMacAddress($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Computer whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Computer whereUpdatedAt($value)
 */
class Computer extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name','mac_address'];

    public function wake() {
        $mac_array = explode(':', $this->mac_address);

        $hwaddr = '';

        foreach($mac_array AS $octet) {
            $hwaddr .= chr(hexdec($octet));
        }

        // Create Magic Packet

        $packet = '';
        for ($i = 1; $i <= 6; $i++) {
            $packet .= chr(255);
        }

        for ($i = 1; $i <= 16; $i++) {
            $packet .= $hwaddr;
        }

        $sock = socket_create(AF_INET, SOCK_DGRAM, SOL_UDP);
        if($sock) {
            $options = socket_set_option($sock, 1, 6, true);

            if ($options >=0) {
                $e = socket_sendto($sock, $packet, strlen($packet), 0, $this->broadcast_address, 7);
                socket_close($sock);
            }
        }
    }
}
