<?php

namespace App\Services\Seeder;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Seeder;

abstract class BaseSeeder extends Seeder
{
    abstract protected function getData(): array;

    /** @return class-string<Model> */
    abstract protected function getModel(): string;

    protected function getPrimaryKey(): string
    {
        return 'id';
    }

    protected function seed(): void
    {
        /** @var class-string<Model> $classModel */
        $classModel = $this->getModel();

        $primaryKey = $this->getPrimaryKey();

        foreach ($this->getData() as $data) {
            /** @var Model $entity */
            $entity = $classModel::factory()->make($data);

            /** @var Model|null $entityFromDb */
            $entityFromDb = $classModel::query()->find($entity->$primaryKey);

            if($entityFromDb === null) {
                $entity->saveQuietly();

                continue;
            }

            $entityFromDb->setRawAttributes($entity->toArray());
            $entityFromDb->saveQuietly();
        }
    }

    final public function run(): void
    {
        $this->seed();
    }
}
