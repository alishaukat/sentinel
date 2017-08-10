<?php

/*
 * Returns the fullname of logged in user
 */
function getUserName()
{
    if(\Cartalyst\Sentinel\Laravel\Facades\Sentinel::guest()){
        return "";
    }else{
        $user = \Cartalyst\Sentinel\Laravel\Facades\Sentinel::getUser();
        $name = !empty($user->first_name)?$user->first_name:"";
        $name.= " ";
        $name.= !empty($user->last_name)?$user->last_name:"";
        return $name;
    }
}
/*
 * @param: User object
 * Returns the fullname of the user
 * 
 */
function getFullName($user)
{
    if(!empty($user))
    {
        $name = !empty($user->first_name)?$user->first_name:"";
        $name.= " ";
        $name.= !empty($user->last_name)?$user->last_name:"";
        return $name;
    }
    return "";
}

/*
 * 
 * This function calculates the base index for paginator
 * @param: Laravel paginate object
 * @return: base index
 * 
 */

function calculateStartIndex($paginateObject)
{
    $start  = $paginateObject->currentPage() - 1;
    $start *= $paginateObject->perPage();
    $start += 1;
    return $start;
}

/*
 * Validates the timezone value
 * @param $timeZone: Timezone string
 * @return: bool
 * 
 */
function isValidTimeZone($timeZone)
{
    $timeZones = DateTimeZone::listIdentifiers(DateTimeZone::ALL);
    return in_array($timeZone, $timeZones);
}

/*
 * 
 * Returns the formatted date
 * @param Carbon $dateTime object
 * @return: date string
 * 
 */

function formatted_date($date)
{
    if(!empty($date))
    {
        return $date->format('jS M, Y');
    }else{
        return "";
    }
}