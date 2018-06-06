<?php

namespace sjm;

use sjm\base\Behavior;

class DbBehavior extends Behavior {
    
    public function getFirstRecord() {
        $fp = $this->owner->getFilePointer();
        $pos = ftell($fp);
        rewind($fp);
        $firstLine = fgets($fp);
        fseek($fp, $pos);
        return $firstLine;
    }

    public function onAfterInsert($row) {
        echo "Inserted (From ".__CLASS__.")\n";
    }


}



