"use strict";

// Checks for a valid date string (YYYY-MM-DD HH:MM:SS)
function validDate(date)
{
    // Define the regex pattern to validate the format
    var pattern = /^(\d{4}(-\d{2}){2} (\d{2})(:\d{2}){2})$/;

    // Returns true if the date matches, false if it doesn't
    return date.match(pattern)!=null;
}