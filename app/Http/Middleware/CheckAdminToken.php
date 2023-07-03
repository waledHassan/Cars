<?php

namespace App\Http\Middleware;
use Illuminate\Support\Facades\Auth;
use Tymon\JWTAuth\Facades\JWTAuth;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Traits\GeneralTrait;

use Tymon\JWTAuth\Exceptions\JWTException;
use Tymon\JWTAuth\Exceptions\TokenExpiredException;
use Tymon\JWTAuth\Http\Middleware\BaseMiddleware;

class CheckAdminToken
{
    use GeneralTrait;
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $user = null;
        try {
            $user = JWTAuth::parseToken()->authenticate();
            }
        catch (\Exception $e)
            {
                if($e instanceof \Tymon\JWTAuth\Exceptions\TokenInvalidException)
                {
                    return  $this -> returnSuccessMessage(msg:'Invalid Token');
                }
                elseif($e instanceof \Tymon\JWTAuth\Exceptions\TokenExpiredException)
                {
                    return  $this -> returnSuccessMessage(msg:'Expired Token');
                }
                else{
                    return  $this -> returnSuccessMessage(msg:'Token Not Found');
                }

            } catch (JWTException $e) {

                if($e instanceof \Tymon\JWTAuth\Exceptions\TokenInvalidException)
                {
                    return  $this -> returnSuccessMessage(msg:'Invalid Token');
                }
                elseif($e instanceof \Tymon\JWTAuth\Exceptions\TokenExpiredException)
                {
                    return  $this -> returnSuccessMessage(msg:'Expired Token');
                }
                else{
                    return  $this -> returnSuccessMessage(msg:'Token Not Found');
                }
            }

            if(!$user)
            return  $this -> returnSuccessMessage(msg:'Token Found');
            return $next($request);
    }
}
