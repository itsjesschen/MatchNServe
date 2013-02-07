/**
 * validate.js
 *
 * @author 	Maxime Haineault <max@centdessin.com>
 * @version	0.8
 * @desc 	Library to handle forms and data validation
 * @todo
 *  - isValidEmail: fix 2 character domains validation
 */

Object.extend(Form.Methods,{	
  validate: function(element) {
  	hasErrors = false;
  	textareas = $A(element.getElementsByTagName('textarea'));
  	selects   = $A(element.getElementsByTagName('select'));
  	inputs    = $A(element.getElementsByTagName('input')).concat(textareas, selects);
  	inputs.each(function(input){
  		// TODO: check if required and empty here.
  		validations = input.className.match(/isValid\w+/g);
  		if (validations) validations.each(function(validation){
  			if(!input[validation]()) {
  				hasErrors = true;
  				input.addClassName('validationErrors');
  			}
  		});
  	});
  	if (hasErrors) {
  		element.addClassName('formValidationErrors');
  		Form.Methods.validationErrorCallback(element);
  		return false;
  	}
  	else return true;
  },
	validationErrorCallback: function(element) {
		element.getElementsByClassName('validationErrors')[0].focus();
	}
});

Object.extend(Form.Element.Methods,{
  setModified: function(element) {
  	$(element).addClassName('modified');
  },
  setUnModified: function(element) {
  	$(element).removeClassName('modified');
  },
  isModified: function(element) {
    return $(element).hasClassName('modified');
  },
  isRequired: function(element) {
    return $(element).hasClassName('isValidRequired');
  },
  isEmpty: function(element) {
  	return $F(element) == '';
  },
  isNotEmpty: function(element) {
  	return !$F(element) == '';
  },
  isValid: function(element) {
  	idValid = true;
  	element.className.match(/isValid\w{1,}/g).each(function(className) {
  		if(!$(element)[className]()) idValid = false;
  	});
  	return idValid;
  },
  isValidEmpty: function(element) {
  	return Form.Element.Methods.isEmpty(element);
  },
  isValidNotEmpty: function(element) {
  	return Form.Element.Methods.isNotEmpty(element);
  },
  isValidRequired: function(element) {
  	return Form.Element.Methods.isNotEmpty(element);
  },
  isValidBoolean: function(element) {
  	return !!$F(element).match(/^(0|1|true|false)$/);
  },
  isValidEmail: function(element) { // TODO: two letters domains like .ca or .us doesn't validate..
  	return !!$F(element).match(/(^[a-z]([a-z_\.]*)@([a-z_\.]*)([.][a-z]{3})$)|(^[a-z]([a-z_\.]*)@([a-z_\-\.]*)(\.[a-z]{3})(\.[a-z]{2})*$)/i); 
  },
  isValidInteger: function(element) {
  	return !!$F(element).match(/(^-?\d+$)/);
  },
  isValidNumeric: function(element) {
  	return !!$F(element).match(/(^-?\d\d*[\.|,]\d*$)|(^-?\d\d*$)|(^-?[\.|,]\d\d*$)/);
  },
  isValidAplhaNumeric: function(element) {
  	return !!$F(element).match(/^[_\-a-z0-9]+$/gi);
  },
  // 0000-00-00 00:00:00 to 9999:12:31 59:59:59 (no it is not a "valid DATE" function)
  isValidDatetime: function(element) {
  	dt = $F(element).match(/^(\d{4})-(\d{2})-(\d{2})\s(\d{2}):(\d{2}):(\d{2})$/);
  	return dt && !!(dt[1]<=9999 && dt[2]<=12 && dt[3]<=31 && dt[4]<=59 && dt[5]<=59 && dt[6]<=59) || false;
  },
  // 0000-00-00 to 9999-12-31
  isValidDate: function(element) {
  	d = $F(element).match(/^(\d{4})-(\d{2})-(\d{2})$/);
  	return d && !!(d[1]<=9999 && d[2]<=12 && d[3]<=31) || false;
  },
  // 00:00:00 to 59:59:59
  isValidTime: function(element) {
  	t = $F(element).match(/^(\d{1,2}):(\d{1,2}):(\d{1,2})$/);
  	return t && !!(t[1]<=24 && t[2]<=59 && t[3]<=59) || false;
  },
  // 0.0.0.0 to 255.255.255.255
  isValidIPv4: function(element) { 
  	ip = $F(element).match(/^(\d{1,3})\.(\d{1,3})\.(\d{1,3})\.(\d{1,3})$/);
  	return ip && !!(ip[1]<=255 && ip[2]<=255 && ip[3]<=255 && ip[4]<=255) || false;
  },
  isValidCurrency: function(element) { // Q: Should I consider those signs valid too ? : ¢|€|₤|₦|¥
  	return $F(element).match(/^\$?\s?\d+?[\.,\,]?\d+?\s?\$?$/) && true || false;
  },
  // Social Security Number (999-99-9999 or 999999999)
  isValidSSN: function(element) {
  	return $F(element).match(/^\d{3}\-?\d{2}\-?\d{4}$/) && true || false;
  },
  // Social Insurance Number (999999999)
  isValidSIN: function(element) {
  	return $F(element).match(/^\d{9}$/) && true || false;
  }
});
Element.addMethods();
$V = function(el) { return $(el).isValid(); }