<?php

namespace Modules\Project\Enums;

enum ProjectStatusEnums: int
{
    case JUST_STARTED = 1;
    case QUEUED_UP = 2;
    case IN_PLANNING = 3;
    case DOING = 4;
    case SUSPENDED = 5;
    case FINISHED = 6;
    case CANCELED = 7;
}
