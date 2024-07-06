function toggleForm() {
    const mot=document.getElementById('compte');
    const formTitle = document.getElementById('form-title');
    const retypePasswordGroup = document.getElementById('retype-password-group');
    const submitButton = document.getElementById('submit-button');
    const toggleButton = document.getElementById('toggle-button');
    const form = document.getElementById('form_prince');

    if (formTitle.innerText === "S'inscrire") {
      formTitle.innerText = "Se connecter";
      retypePasswordGroup.style.display = 'none';
      submitButton.value = 'Se connecter';
      mot.innerText='Vous n\'avez pas de compte? ';
      toggleButton.innerText = "S'inscrire";
      form.action = 'signin_action';
    } else {
      formTitle.innerText = "S'inscrire";
      retypePasswordGroup.style.display = 'block';
      submitButton.value = "S'inscrire";
      mot.innerText='Vous avez deja un Compte? ';
      toggleButton.innerText = "Se connecter";
      form.action = 'signin_action';
    }
  }