<?php
/**
 * Check to see if a string is composed entirely of the digits 0-9.
 * Note that this is different to checking if a string is numeric since
 * +/- signs and decimal points are not permitted.
 *
 * @param string $str The string to check.
 * @return True if $str is composed entirely of digits, false otherwise.
 */
function isDigits($str){
    $pattern = '/^[0-9]+$/';
    return preg_match($pattern, $str);
}

/**
 * Check to see if a string contains any content or not.
 * Leading and trailing whitespace are not considered to be 'content'.
 *
 * @param string $str The string to check.
 * @return True if $str is empty, false otherwise.
 */
function isEmpty($str){
    return strlen(trim($str)) == 0;
}

/**
 * Check to see if the length of a string is a given value, ignoring leading
 * and trailing whitespace.
 *
 * @param string $str The string to check.
 * @param integer $len The expected length of $str.
 * @result True if $str has length $len, false otherwise.
 */
function checkLength($str, $len){
    return strlen(trim($str)) === $len;
}

/**
 * Check to see if the dogId entered is valid.
 *
 * @param string $str the string to check.
 * @param array $messages the array to add error message to.
 */
function checkDogId($str, &$messages){
    if (isEmpty($str)) {
        array_push($messages, "Dog Id must not be empty.");
    } elseif (isDigits($str)) {
        array_push($messages, "You must enter a valid id 'DW-xxx'.");
    } elseif (!checkLength($str, 6)) {
        array_push($messages, "Dog Id must be entered as 'DW-xxx'.");
    }
}

/**
 * Check to see if dog name is valid.
 *
 * @param string $str the string to check.
 * @param array $messages the array to add error message to
 */
function checkDogName($str, &$messages){
    if (isEmpty($str)) {
        array_push($messages, "Dog name must not be empty.");
    } elseif (isDigits($str)) {
        array_push($messages, "You must enter a valid name.");
    }
}

/**
 *  Check to see if dog type entered is valid.
 *
 * @param string $str the string to check.
 * @param array $messages the array to add error message to
 */
function checkDogType($str, &$messages){
    if (isEmpty($str)) {
        array_push($messages, "Dog type must not be empty.");
    } elseif (isDigits($str)) {
        array_push($messages, "You must enter a valid dog type.");
    }
}

/**
 * Check to see if dog description entered is valid.
 *
 * @param string $str the string to check.
 * @param array $messages the array to add error message to
 */
function checkDogDescription($str, &$messages){
    if (isEmpty($str)) {
        array_push($messages, "Dog description must not be empty.");
    } elseif (isDigits($str)) {
        array_push($messages, "You must enter a valid description.");
    }
}

/**
 *  Check to see if price entered is a valid price
 *
 * @param string $str the string to check.
 * @param array $messages the array to add error message to
 */
function checkPricePerHour($str, &$messages){
    if (isEmpty($str)) {
        array_push($messages, "Dog price must not be empty.");
    } elseif (!isDigits($str)) {
        array_push($messages, "You must enter a valid price.");
    }
}
