$(function() 
{
	
	$.validator.addMethod
	(
	  "allow", 
	  function(value, element){return this.optional(element) || /^[a-zA-Z0-9-!@#$%^&*()_+={}:;,.\'\[\]\"\s\u00E1\u00E9\u00ED\u00F3\u00FA\u00C1\u00C9\u00CD\u00D3\u00DA\u00F1\u00D1\u00FC\u00DC\u000A\u00BF]+$/i.test(value);}, 
	  "Caracteres inv&aacute;lidos"
	  );
	$.validator.addMethod(
	  "strict", 
	  function(value, element){return this.optional(element) || /^[a-zA-Z0-9-.,#&\'\s\u00E1\u00E9\u00ED\u00F3\u00FA\u00C1\u00C9\u00CD\u00D3\u00DA\u00F1\u00D1\u00FC\u00DC]+$/i.test(value);}, 
	  "Caracteres inv&aacute;lidos"
	  );
	$.validator.addMethod(
	  "very_strict", 
	  function(value, element){return this.optional(element) || /^[a-zA-Z0-9_.-]+$/i.test(value);}, 
	  "Caracteres inv&aacute;lidos"
	  );
	$.validator.addMethod(
	  "alphanumeric", 
	  function(value, element){return this.optional(element) || /^[a-zA-Z0-9]+$/i.test(value);}, 
	  "Caracteres inv&aacute;lidos"
	  );
	$.validator.addMethod(
	  "alpha", 
	  function(value, element){return this.optional(element) || /^[a-zA-Z]+$/i.test(value);}, 
	  "Caracteres inv&aacute;lidos"
	  );
	$.validator.addMethod(
	  "alpha_s", 
	  function(value, element){return this.optional(element) || /^[a-zA-Z\s]+$/i.test(value);}, 
	  "Caracteres inv&aacute;lidos"
	  );
	$.validator.addMethod(
	  "phone", 
	  function(value, element){return this.optional(element) || /^[0-9-()]+$/i.test(value);}, 
	  "Caracteres inv&aacute;lidos"
	  );
	$.validator.addMethod(
	  "money", 
	  function(value, element){return this.optional(element) || /^[0-9.,$]+$/i.test(value);}, 
	  "Caracteres inv&aacute;lidos"
	  );
	$.validator.addMethod(
	  "RFC", 
	  function(value, element){return this.optional(element) || /^[A-Z,\u00D1\,&]{3,4}[0-9]{2}[0-1][0-9][0-3][0-9][A-Z,0-9][A-Z,0-9][0-9,A-Z]+$/i.test(value);}, 
	  "RFC inv&aacute;lido"
	  );

	$("#new_form").validate(  );

});