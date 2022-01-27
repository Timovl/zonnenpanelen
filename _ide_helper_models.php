<?php

// @formatter:off
/**
 * A helper file for your Eloquent Models
 * Copy the phpDocs from this file to the correct Model,
 * And remove them from this file, to prevent double declarations.
 *
 * @author Barry vd. Heuvel <barryvdh@gmail.com>
 */


namespace App{
/**
 * App\Fire
 *
 * @property int $id
 * @property int $on
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Fire newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Fire newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Fire query()
 * @method static \Illuminate\Database\Eloquent\Builder|Fire whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Fire whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Fire whereOn($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Fire whereUpdatedAt($value)
 */
	class Fire extends \Eloquent {}
}

namespace App{
/**
 * App\Genre
 *
 * @method static \Illuminate\Database\Eloquent\Builder|Genre newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Genre newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Genre query()
 */
	class Genre extends \Eloquent {}
}

namespace App{
/**
 * App\Location
 *
 * @method static \Illuminate\Database\Eloquent\Builder|Location newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Location newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Location query()
 */
	class Location extends \Eloquent {}
}

namespace App{
/**
 * App\User
 *
 * @property int $id
 * @property string $name
 * @property string $email
 * @property \Illuminate\Support\Carbon|null $email_verified_at
 * @property string $password
 * @property string|null $remember_token
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection|\Illuminate\Notifications\DatabaseNotification[] $notifications
 * @property-read int|null $notifications_count
 * @method static \Illuminate\Database\Eloquent\Builder|User newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User query()
 * @method static \Illuminate\Database\Eloquent\Builder|User whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmailVerifiedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereUpdatedAt($value)
 */
	class User extends \Eloquent {}
}

namespace App{
/**
 * App\Verbruik
 *
 * @property int $id
 * @property float $verbruik
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Verbruik newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Verbruik newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Verbruik query()
 * @method static \Illuminate\Database\Eloquent\Builder|Verbruik whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Verbruik whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Verbruik whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Verbruik whereVerbruik($value)
 */
	class Verbruik extends \Eloquent {}
}

namespace App{
/**
 * App\Winst
 *
 * @property int $id
 * @property float $winst
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Winst newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Winst newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Winst query()
 * @method static \Illuminate\Database\Eloquent\Builder|Winst whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Winst whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Winst whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Winst whereWinst($value)
 */
	class Winst extends \Eloquent {}
}

