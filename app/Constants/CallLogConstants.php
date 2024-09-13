<?php

namespace App\Constants;

class CallLogConstants{

    public const CALL_PURPOSES = [0=>'None',1=>'L1',2=>'L2'];
    public const CALL_RESULTS = [0=>'None',1=>'Connected',2=>'Not Answered',3=>'Call back',4=>'Wrong Number'];
    public const CALL_TYPES = [0=>'None',1=>'Inbound',2=>'Outbound',3=>'Missed'];
}

?>