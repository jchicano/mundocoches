// ====== JS para el botón Google en REGISTRO ====== //
var startApp = function() {
  gapi.load('auth2', function(){
    // Retrieve the singleton for the GoogleAuth library and set up the client.
    auth2 = gapi.auth2.init({
      client_id: '690558520272-t1c545sr5r3pjpna85f53irgis2no95t.apps.googleusercontent.com',
      cookiepolicy: 'single_host_origin',
      // Request scopes in addition to 'profile' and 'email'
      //scope: 'additional_scope'
    });
    attachSignin(document.getElementById('googleSignInBtn'));        
  });
}

function attachSignin(element) {
  console.log(element.id);
  auth2.attachClickHandler(element, {},
      function(googleUser) {
         
      }, function(error) {
        //alert(JSON.stringify(error, undefined, 2));
      });
  auth2.isSignedIn.listen(signinChanged);      
}

var signinChanged = function (val) {
console.log('Signin state changed to ', val);
document.getElementById('googleSignInBtn').removeAttribute('disabled');
if (auth2.isSignedIn.get()){
  var profile = auth2.currentUser.get().getBasicProfile();
  console.log('ID: ' + profile.getId());
  console.log('Full Name: ' + profile.getName());
  console.log('Given Name: ' + profile.getGivenName()); // Nombre
  document.getElementById('inputName').value = profile.getGivenName();
  console.log('Family Name: ' + profile.getFamilyName()); // Apellido/s
  document.getElementById('inputSurname1').value = profile.getFamilyName();
  console.log('Image URL: ' + profile.getImageUrl());
  console.log('Email: ' + profile.getEmail());
  document.getElementById('inputEmail').value = profile.getEmail();
  document.getElementById('googleSignInBtn').setAttribute("disabled", "");
  //document.getElementById('dropdownLogoutMenu1').innerHTML= auth2.currentUser.get().getBasicProfile().getName();
  //document.getElementById('dropdownLoginLI').style.display = 'none';
  //document.getElementById('dropdownLogoutLI').style.display = 'block';

}else{
  console.log('Not signed in.');
  document.getElementById('googleSignInBtn').removeAttribute('disabled');
  //document.getElementById('dropdownLogoutLI').style.display = 'none';
  //document.getElementById('dropdownLoginLI').style.display = 'block';
}
}

function signOut() {
  console.log("Logout");
  if (auth2.isSignedIn.get())
    auth2.disconnect();

}