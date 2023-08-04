<?php

namespace Modules\Auth\Enums;

enum RoleEnum
{
    case Administrator;
    case ProjectOwner;
    case ProjectManager;
    case Employee;

}
