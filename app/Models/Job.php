<?php
declare(strict_types=1);

namespace App\Models;

use Illuminate\Support\Arr;

class Job {

    /**
     * Return all the job listings
     * @return array[]
     */
    public static function all(): array
    {
        return [
            [
                'id'    => 1,
                'title' => 'Director',
                'salary'=> '$50,000'
            ],
            [
                'id'    => 2,
                'title' => 'Programmer',
                'salary'=> '$10,000'
            ],
            [
                'id'    => 3,
                'title' => 'Teacher',
                'salary'=> '$40,000'
            ]
        ];
    }

    /**
     * Find a job with the given id
     * @param int $id
     * @return array
     */
    public static function find(int $id): array
    {
        $job = Arr::first(static::all(), fn(array $job) => $job['id'] === $id);

        if (! $job) {
            abort(404);
        }

        return $job;
    }
}
