<?php

namespace App\Http\Middleware;

use Closure;

class StripHostWebPrefix
{
    public function handle($request, Closure $next, $key)
    {
        $bags = [ $request->query, $request->request, $request->json() ];

        foreach ($bags as $bag) {
            if ($bag->has($key)) {
                $bag->set($key, $this->stripHost($bag->get($key)));
            }
        }

        return $next($request);
    }

    protected function stripHost($value)
    {
        if (strncmp($value, 'www.', 4) == 0) {
            return substr($value, 4);
        }

        return $value;
    }
}
