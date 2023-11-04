<?php
namespace App\Traits;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Str;
use Exception;

trait Searchable {

    public function scopeSearch(Builder $builder, string $term = '', array $sortParams = [], $startDate = null, $endDate = null, $status = null)
    {

        if(!$this->searchable){
            throw new Exception("Please define the searchable property. ");
        }
        foreach ($this->searchable as $searchable) {

            if (str_contains($searchable, '.')) {

                $relation = Str::beforeLast($searchable, '.');

                $column = Str::afterLast($searchable, '.');

                $builder->orWhereRelation($relation, $column, 'like', "%$term%");

                continue;
            }
            $builder->orWhere($searchable, 'like', "%$term%");
        }
        foreach ($sortParams as $column => $direction) {
            $builder->orderBy($column, $direction);
        }

        if ($startDate && $endDate) {
            $builder->whereBetween('created_at', [$startDate, $endDate]);
        }

        if ($status !== null) {
            $builder->where('status', $status);
        }
        return $builder;
    }

}
