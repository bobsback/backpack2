<?php

namespace App\Http\Utilities;


class peopletype {
	protected static $peopletype = [
"Sporty","Wierd","Gamer","Redditor","Technology"



];

public static function all()
{

return static::$peopletype;
}





}