<?php

namespace Support\Services;


class PositionService{

    public function positionUp($currentRow): bool
    {
        return $this->changePosition($currentRow, 'Up');
    }

    public function positionDown($currentRow): bool
    {
        return $this->changePosition($currentRow, 'Down');
    }

    protected function changePosition($currentRow, $direction): bool
    {
        $currentRowsData = $this->initMenuItemsData($currentRow, $direction);

        if ($this->isValidChange($currentRowsData, $direction)) {
            return $this->setPosition($currentRow, $currentRowsData['nextOrPrevRow']);
        }
        return false;
    }

    protected function isValidChange($currentRowsData, $direction): bool
    {
        if ($direction == 'Up') {
            return $currentRowsData['count'] && $currentRowsData['nextOrPrevRow'] !== null;
        } elseif ($direction == 'Down') {
            return $currentRowsData['count'] > 1 && $currentRowsData['nextOrPrevRow'] !== null;
        }
        return false;
    }

    protected function initMenuItemsData($currentRow, $direction) : array{

        $nextOrPrevRowPosition = null;
        $nextOrPrevRow = null;
        $count = $currentRow->getRowsCount();
        $getMaxPosition = $currentRow->getRowsMaxPosition();
        $getMinPosition = $currentRow->getRowsMinPosition();

        if($direction == 'Down'){
            if($currentRow->position < $getMaxPosition){
                $nextOrPrevRowPosition = $currentRow->position + 1;
            }
        }
        if($direction == 'Up'){
         //   dd($currentRow);
            if($currentRow->position > $getMinPosition) {
                $nextOrPrevRowPosition = $currentRow->position - 1;
            }
        }

        if($nextOrPrevRowPosition !== null){
            $nextOrPrevRow = $currentRow->getNextOrPrevRow($nextOrPrevRowPosition);
        }

        return ['count' => $count, 'nextOrPrevRow' => $nextOrPrevRow];
    }
    protected function setPosition($currentRow, $nextOrPrevRow) : bool
    {
        return $currentRow->setPosition($nextOrPrevRow);
    }

}
