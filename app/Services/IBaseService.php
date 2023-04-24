<?php

namespace App\Services;

use Illuminate\Http\Request;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Model;

interface IBaseService{
   
    public function paginate(): LengthAwarePaginator;
    public function save(Request $request): Model;

   public function update(Request $request): Model;

   public function delete(string|int $id): bool;
}