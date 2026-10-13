<?php

namespace App\Traits;

use Illuminate\Database\Eloquent\Builder;

trait HasSearch
{
    public function scopeSearch(Builder $query, ?string $term, array $fields): Builder
    {
        if (blank($term)) {
            return $query;
        }

        return $query->where(function (Builder $builder) use ($term, $fields) {
            foreach ($fields as $field) {
                $builder->orWhere($field, 'like', '%' . $term . '%');
            }
        });
    }
}