<?php

namespace Support\Traits\Models;

use Illuminate\Support\Facades\DB;

trait SetPosition
{
    public function setPosition($nextOrPrevRow) : bool
    {
        if(!$nextOrPrevRow){
            return false;
        }
        $prewOrNextData = self::where('id', '=',  $nextOrPrevRow->id)->first();

        try {
            DB::beginTransaction();

            // dd($data);
            DB::table($this->getTable())
                ->where('id', $this->id)
                ->update(['position' => $prewOrNextData->position]);

            DB::table($this->getTable())
                ->where('id', $nextOrPrevRow->id)
                ->update(['position' => $this->position]);

            DB::commit();

        } catch (\Exception $exception) {
            DB::rollBack();
            abort(500);
        }
        return true;
    }

    public function getRowsCount() : int
    {
        return self::get()->count();
    }

    public function getRowsMaxPosition() : int
    {
        return self::max('position');
    }

    public function getRowsMinPosition() : int
    {
        return self::min('position');
    }

    public function getNextOrPrevRow($nextOrPrevRowPosition)
    {
        return self::where('position', '=', $nextOrPrevRowPosition)->first();
    }
}
