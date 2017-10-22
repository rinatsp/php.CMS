<?php

namespace Engine;

class Load
{
    const MASK_MODEL_ENTITY     = '\%s\Model\%s\%s';
    const MASK_MODEL_REPOSITORY = '\%s\Model\%s\%sRepository';

    /**
     * @param $modelName
     * @param bool $modelDir
     * @return \stdClass
     */
    public function model($modelName, $modelDir = false)
    {
        global $di;

        $modelName  = ucfirst($modelName);
        $model      = new \stdClass();
        $modelDir   = $modelDir ? $modelDir : $modelName;

        $namespaceEntity = sprintf(
            self::MASK_MODEL_ENTITY,
            ENV, $modelDir, $modelName
        );

        $namespaceRepository = sprintf(
            self::MASK_MODEL_REPOSITORY,
            ENV, $modelDir, $modelName
        );

        $model->entity     = $namespaceEntity;
        $model->repository = new $namespaceRepository($di);

        return $model;
    }
}
