/**
 * 
 */

// Define a class like this
function Person(orderForm){

   // Add object properties like this
	var person = new Person(orderForm);
   this.name = document.orderForm.firstName.value;
   if(this.name == "")
   {
	   person.speak();
   }
	   
   return false;
}

// Add methods like this.  All Person objects will be able to invoke this
Person.prototype.speak = function(){
    alert("nothing");
};

// Instantiate new objects with 'new'
var person = new Person(orderForm);

// Invoke methods like this
person.speak(); // alerts "Howdy, my name is Bob"