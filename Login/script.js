const signUpButton=document.getElementById('SignUpBtn');
const signInButton=document.getElementById('SignInBtn');
const signInForm=document.getElementById('SignIn');
const signUpForm=document.getElementById('SignUp');

signUpButton.addEventListener('click',function(){
    signInForm.style.display="none";
    signUpForm.style.display="block";
})
signInButton.addEventListener('click', function(){
    signInForm.style.display="block";
    signUpForm.style.display="none";
})

