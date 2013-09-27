function validZipcode(zipcode)
{
  //alert("inside validate");

  /*var postalCodeRegex = /^([0-9]{5})(?:[-\s]*([0-9]{4}))?$/;

  if(postalCodeRegex.test(value))
  {
    return true;
    }
    return false;*/
    var postalCodeRegex = /^([0-9]{5})(?:[-\s]*([0-9]{4}))?$/;

    if(postalCodeRegex.test(zipcode))
    {
        return true;
    }
    return false;
    
}

function validPhoneNumber(phoneNumber)
{
  /*var phoneNumberRegex = /^[0-9]{3}-[0-9]{3}-[0-9]{4}$/;

  if(phoneNumberRegex.test(phoneNumber))
  {
    return true;
  }
  return false;*/

  var phoneNumberRegex = /^[0-9]{3}-[0-9]{3}-[0-9]{4}$/;

    if(phoneNumberRegex.test(phoneNumber))
    {
        return true;
    }
    return false;
}

function isValidEmailID(emailAddress)
    {
        /*var pattern = new RegExp(/^((([a-z]|\d|[!#\$%&'\*\+\-\/=\?\^_`{\|}~]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])+(\.([a-z]|\d|[!#\$%&'\*\+\-\/=\?\^_`{\|}~]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])+)*)|((\x22)((((\x20|\x09)*(\x0d\x0a))?(\x20|\x09)+)?(([\x01-\x08\x0b\x0c\x0e-\x1f\x7f]|\x21|[\x23-\x5b]|[\x5d-\x7e]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(\\([\x01-\x09\x0b\x0c\x0d-\x7f]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]))))*(((\x20|\x09)*(\x0d\x0a))?(\x20|\x09)+)?(\x22)))@((([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])*([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])))\.)+(([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])*([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])))\.?$/i);
        return pattern.test(emailAddress) ;*/
        //alert(emailAddress);
        
        var pattern = new RegExp(/^[+a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/i);
        if( pattern.test(emailAddress))
        {
            return true;
        }
        return false;
        //return emailAddress.indexOf("@") != -1;
    }

function containsBlank()
    {
        var blanks = new Array();
        required.each(function(){
            blanks.push($(this).val() == "");
        });
        return blanks.sort().pop();
    }
    
function requiredFilledIn()
    {
        if(containsBlank() || !isValidEmailID($("#emailID").val())) $submit.attr("disabled", "disabled");
        else $submit.removeAttr("disabled");
    }