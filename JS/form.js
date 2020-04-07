
  // Your web app's Firebase configuration
  var firebaseConfig = {
    apiKey: "AIzaSyA7g1TlONI8r6zvkYWi0eGdbg6o0a7Mrxc",
    authDomain: "finance-5bbb0.firebaseapp.com",
    databaseURL: "https://finance-5bbb0.firebaseio.com",
    projectId: "finance-5bbb0",
    storageBucket: "",
    messagingSenderId: "820996380618",
    appId: "1:820996380618:web:e53fbfe32af08b6b"
  };
  // Initialize Firebase
  firebase.initializeApp(firebaseConfig);
  var messagesRef = firebase.database().ref('messages');



//listen for form submit
document.getElementById('contactForm').addEventListener('submit',submitForm);

function submitForm(e){
	e.preventDefault();
	
	//Get Values
  
	var name = getInputVal('name');
	var lname = getInputVal('lname');
	var startup = getInputVal('startup');
	var city = getInputVal('city');
	var mobile = getInputVal('mobile');
	var email = getInputVal('email');
	var description = getInputVal('description');

	
    saveMessage(name,lname,startup,city,mobile,email,description);
	
	document.querySelector('.alert').style.display='block';
	
	setTimeout(function(){
	document.querySelector('.alert').style.display='none';	
	},3000);
	
}



//Function to get form values
function getInputVal(id){
	return document.getElementById(id).value;

}

function saveMessage(name,lname,startup,city,mobile,email,description){
	var newMessageRef = messagesRef.push();
    newMessageRef.set({
		name:name,
		lname:lname,
		startup:startup,
		city:city,
		mobile:mobile,
		email:email,
		description:description
	});
	}

	// Example starter JavaScript for disabling form submissions if there are invalid fields
(function() {
  'use strict';
  window.addEventListener('load', function() {
    // Fetch all the forms we want to apply custom Bootstrap validation styles to
    var forms = document.getElementsByClassName('needs-validation');
    // Loop over them and prevent submission
    var validation = Array.prototype.filter.call(forms, function(form) {
      form.addEventListener('submit', function(event) {
        if (form.checkValidity() === false) {
          event.preventDefault();
          event.stopPropagation();
        }
        form.classList.add('was-validated');
      }, false);
    });
  }, false);
})();