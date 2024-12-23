<?php

namespace App\Http\Middleware;
 
use Closure;
 
class Cors
{
	public function handle($request, Closure $next)
	{
		return $next($request)
			->header('Access-Control-Allow-Origin', '*')
			->header('Access-Control-Allow-Methods', 'GET,POST,PUT,DELETE,OPTIONS')
			->header('Access-Control-Allow-Headers', 'X-Requested-With,Content-Type,Authorization')
			->header('Access-Control-Allow-Credentials', true)
			->header('Access-Control-Allow-Headers', '*');
	}
}
?>