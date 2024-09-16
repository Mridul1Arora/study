<?php

namespace App\Constant;

class PermissionConstant {
    const MODULE_PRIVATE_VIEW = 'private';
    const MODULE_PUBLIC_READ_ONLY = 'public read only';
    const MODULE_PRIVATE_READ_WRITE = 'public read/write only';
    const MODULE_PRIVATE_READ_WRITE_DELETE = 'public read/write/delete only';

    const MODULE_SPECIFIC = 1;
}
