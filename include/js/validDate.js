// Validates the date string to ensure proper format
// Original Javascript code acknowledged here:
// http://stackoverflow.com/questions/6177975
function validDate(dateString)
{
  // check pattern
  if(!/^\d{1,2}\/\d{1,2}\/\d{4}$/.test(dateString))
    return false;

  // parse string into integers
  var parse = dateString.split("/");
  var month = parseInt(parse[0], 10);
  var day = parseInt(parse[1], 10);
  var year = parseInt(parse[2], 10);

  // Check ranges of month and year
  if(year < 1000 || year > 3000 || month == 0 || month > 12)
    return false;

  var monthLength = [ 31, 28, 31, 30, 31, 30, 31, 31, 30, 31, 30, 31 ];

  // Adjust for leap years
  if(year % 400 == 0 || (year % 100 != 0 && year % 4 == 0))
    monthLength[1] = 29;

  return day > 0 && day <= monthLength[month -1]; 
}