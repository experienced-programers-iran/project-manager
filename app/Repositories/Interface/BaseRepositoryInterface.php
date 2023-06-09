<?php

namespace App\Repositories\Interface;

interface BaseRepositoryInterface
{
    public function getAll();

    public function get(int $id);
    public function getTrashed(int $id);
    public function getWithTrashed(int $id);

    public function trash(int $id);

    public function restore(int $id);
    public function delete(int $id);

    public function create(array $data);

    public function update(int $id, array $data);
}
