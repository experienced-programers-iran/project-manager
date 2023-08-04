<?php

namespace Modules\Shared\Contracts;

interface BaseRepositoryInterface
{
    public function getAll();

    public function findById(int $id);

    public function findByIdOnlyTrashed(int $id);

    public function findByIdWithTrashed(int $id);

    public function trash(int $id);

    public function restore(int $id);

    public function destroy(int $id);

    public function forceDestroy(int $id);

    public function forceDelete(int $id);

    public function create(array $data);

    public function update(int $id, array $data);
}
