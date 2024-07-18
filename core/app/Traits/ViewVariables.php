<?php

namespace App\Traits;

trait ViewVariables
{
    private array $viewVariablesArray = [];
    public function addViewVariables($name, $value)
    {
        $this->viewVariablesArray[$name] = $value;
        return $this;
    }

    public function mergeViewVariables(array $addViewVariables): array
    {
        return array_merge($this->getViewVariables(), $addViewVariables);
    }

    public function getViewVariables(): array
    {
        return $this->viewVariablesArray;
    }
}
