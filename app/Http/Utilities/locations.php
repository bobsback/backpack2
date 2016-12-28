<?php

namespace App\Http\Utilities;


class locations {
	protected static $locations = [
"United States","United Kingdom","France","Australia","Ireland"



];

public static function all()
{

return static::$locations;
}





}