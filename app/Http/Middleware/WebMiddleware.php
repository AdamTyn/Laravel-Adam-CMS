<?php

namespace App\Http\Middleware;

use App\Models\Data;
use Closure;

class WebMiddleware
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
        $start   = 0;
        $mobiles = Data::where('item', '=', 'mobile')->get();
        $pcs     = Data::where('item', '=', 'pc')->get();
        if (IsMobile()) {
            $last1 = $mobiles[6];
            $last1 = $pcs[6];
        } else {
            $last1 = $pcs[6];
            $last2 = $mobiles[6];
        }
        if ($last1->time != date('Y-m-d', $_SERVER['REQUEST_TIME'])) {
            $days = GetAWeek();
            while ($start != 6) {
                $temp1        = $pcs[$start];
                $temp2        = $pcs[$start++];
                $temp1->value = $temp2->value;
                $temp1->time  = $days[$start];
                $temp1->save();
                ++$start;
            }
            $start = 0;
            while ($start != 6) {
                $temp1        = $mobiles[$start];
                $temp2        = $mobiles[$start++];
                $temp1->value = $temp2->value;
                $temp1->time  = $days[$start];
                $temp1->save();
                ++$start;
            }
            $last1->time  = $days[$start];
            $last1->value = 1;
            $last2->time  = $days[$start];
            $last2->value = 0;
        } else {
            $last1->value += 1;
        }
        $last1->save();
        $last2->save();
        unset($start);
        $last1 = $last2 = $temp1 = $temp2 = null;
        return $next($request);
    }
}
