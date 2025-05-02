<?php

namespace App;

enum ActionType:string
{
    case ENTRY = 'entry';
    case EXIT = 'exit';
}