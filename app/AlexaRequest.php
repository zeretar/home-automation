<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\AlexaRequest
 *
 * @method static \Illuminate\Database\Eloquent\Builder|\App\AlexaRequest newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\AlexaRequest newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\AlexaRequest query()
 * @mixin \Eloquent
 * @property int $id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string $data
 * @method static \Illuminate\Database\Eloquent\Builder|\App\AlexaRequest whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\AlexaRequest whereData($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\AlexaRequest whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\AlexaRequest whereUpdatedAt($value)
 * @property string $response
 * @method static \Illuminate\Database\Eloquent\Builder|\App\AlexaRequest whereResponse($value)
 */
class AlexaRequest extends Model
{
    //
}
