<?php

namespace App\Http\Middleware;

use Illuminate\Http\Middleware\TrustHosts as Middleware;

class TrustHosts extends Middleware
{
    /**
     * Get the host patterns that should be trusted.
     *
     * @return array<int, string|null>
     */
<<<<<<< HEAD
    public function hosts()
=======
    public function hosts(): array
>>>>>>> 5cdb635b1decd8a5efa001eed74e474bc2cd564b
    {
        return [
            $this->allSubdomainsOfApplicationUrl(),
        ];
    }
}
