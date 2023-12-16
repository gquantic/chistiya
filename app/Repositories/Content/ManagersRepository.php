<?php

namespace App\Repositories\Content;

use App\Models\Manager;

class ManagersRepository
{
    public function getActiveManagers(): \Illuminate\Database\Eloquent\Collection|array
    {
        return Manager::query()
            // Могут появиться дополнительные фильтры
            ->get();
    }
}
