<?php

namespace App\Http\Middleware;

use App\Models\Tutor;
use Carbon\Carbon;
use Closure;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Auth;

class LastUserActivity
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (Auth::check()) {
            $expiresAt = Carbon::now()->addMinutes(1);
            Cache::put('user-is-online-' . Auth::user()->id, true, $expiresAt);
            if(\auth()->user()->type==2) {
                $totur = Tutor::where('user_id', \auth()->id())->first();
                $totur->update(['online' => 1]);
            }else{
                $totur = Tutor::all();
                foreach ($totur as $item){
                    if (Cache::has('user-is-online-' . $item->user_id)){
                        $item->update(['online'=>1]);
                    }else{
                        $item->update(['online'=>0]);
                    }
                }
            }
        }
        $totur = Tutor::all();
        foreach ($totur as $item){
            if (Cache::has('user-is-online-' . $item->user_id)){
                $item->update(['online'=>1]);
            }else{
                $item->update(['online'=>0]);
            }
        }
        return $next($request);
    }
}
