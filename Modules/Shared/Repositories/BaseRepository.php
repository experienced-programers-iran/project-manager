<?php

namespace Modules\Shared\Repositories;

use App\Services\ResponseService;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Exceptions\HttpResponseException;
use Modules\Shared\Contracts\BaseRepositoryInterface;

abstract class BaseRepository extends ResponseService implements BaseRepositoryInterface
{
    protected Builder|Model $query;

    public function __construct()
    {
        if (!empty($this->model)) {
            $this->query = (new $this->model);
        }
    }

    private function notFound()
    {
        throw new HttpResponseException($this->generateResponse(status: false, message: __('global.not_found_error'), statusCode: 404));
    }

    public function findById(int $id)
    {
        if (!$item = $this->query->find($id)) {
            return $this->notFound();
        }
        return $item;
    }

    public function findByIdOnlyTrashed(int $id)
    {
        if (!$item = $this->query->onlyTrashed()->find($id)) {
            return $this->notFound();
        }
        return $item;
    }

    public function findByIdWithTrashed(int $id)
    {
        if (!$item = $this->query->withTrashed()->find($id)) {
            return $this->notFound();
        }
        return $item;
    }

    public function getAll()
    {
        return $this->query->latest()->get();
    }
    public function destroy(int $id): bool
    {
        return $this->query->find($id)->delete();
    }
    public function create(array $data)
    {
        return $this->query->create($data);
    }

    public function update(int $id, array $data)
    {
        $model = $this->query->find($id);
        return tap($model)->update($data);
    }

    public function trash(int $id): bool
    {
        return $this->query->find($id)->delete();
    }

    public function forceDestroy(int $id)
    {
        $item = $this->findByIdWithTrashed($id);
        return $item->forceDelete();
    }

    public function restore(int $id): bool
    {
        $item = $this->getTrashed($id);
        return $item->restore();
    }
}
