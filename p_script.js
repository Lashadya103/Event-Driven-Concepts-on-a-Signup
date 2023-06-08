const prevBtns = document.querySelectorAll(".btn-prev");
const nextBtns = document.querySelectorAll(".btn-next");
const progress = document.querySelector(".progress");
const formSteps = document.querySelectorAll(".form-step");
const progressSteps = document.querySelectorAll(".progress-step");

let formStepsNum = 0;

/* Event Listener for Next Button. */
nextBtns.forEach((btn) => {
  btn.addEventListener("click", () => {
    if (validateCurrentStep()) {
      formStepsNum++;
      updateFormSteps();
      updateProgressbar();
    }
  });
});

/* Event Listener for Back Button. */
prevBtns.forEach((btn) => {
  btn.addEventListener("click", () => {
    formStepsNum--;
    updateFormSteps();
    updateProgressbar();
  });
});

/* Updates Form Items */
function updateFormSteps() {
  formSteps.forEach((formStep) => {
    formStep.classList.remove("form-step-active");
  });
  formSteps[formStepsNum].classList.add("form-step-active");
}

/* Updates Progress Bar */
function updateProgressbar() {
  progressSteps.forEach((progressStep, index) => {
    if (index < formStepsNum + 1) {
      progressStep.classList.add("progress-step-active");
    } else {
      progressStep.classList.remove("progress-step-active");
    }
  });
  progress.style.width = ((formStepsNum) / (progressSteps.length - 1)) * 100 + "%";
}

/* Validates the current step */
function validateCurrentStep() {
  const inputs = formSteps[formStepsNum].querySelectorAll("input, select");
  let isValid = true;
  
  inputs.forEach((input) => {
    if (!input.checkValidity()) {
      isValid = false;
      input.reportValidity();
    }
  });

  return isValid;
}



const ageInput = document.getElementById('age');
const signupButton = document.querySelector('.btn-next');

ageInput.addEventListener('input', () => {
  const enteredAge = parseInt(ageInput.value);
  
  if (enteredAge >= 15 && enteredAge <= 99) {
    signupButton.disabled = false;
    ageInput.setCustomValidity('');
  } else {
    signupButton.disabled = true;
    ageInput.setCustomValidity('User must be 15+');
  }
});

ageInput.addEventListener('keydown', (event) => {
  const key = event.key;
  const keyCode = event.keyCode || event.which;
  
  const isNegativeSign = key === '-' || keyCode === 189 || keyCode === 109;
  const isDeleteOrBackspace = key === 'Delete' || key === 'Backspace' || keyCode === 46 || keyCode === 8;
  const isExceedingLengthLimit = ageInput.value.length >= 2;
  
  // Prevent the input of negative values and values above 99,
  if ((isNegativeSign || isExceedingLengthLimit) && !isDeleteOrBackspace) {
    event.preventDefault();
  }
});




function validateEmail(email) {
  const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
  return emailRegex.test(email);
}

// Example usage
const emailInput = document.getElementById('emailInfo');

emailInput.addEventListener('input', (event) => {
  const enteredEmail = event.target.value;

  if (validateEmail(enteredEmail)) {
    // Email is valid
    emailInput.setCustomValidity('');
  } else {
    // Email is invalid
    emailInput.setCustomValidity('Please enter a valid email address.');
  }
});


const phoneNumberInput = document.getElementById('phoneNumber');

phoneNumberInput.addEventListener('input', () => {
  let phoneNumber = phoneNumberInput.value.replace(/\D/g, ''); // Remove non-digit characters
  phoneNumber = phoneNumber.slice(0, 10); // Limit the input to 10 characters
  const formattedPhoneNumber = formatPhoneNumber(phoneNumber);
  phoneNumberInput.value = formattedPhoneNumber;
});

phoneNumberInput.addEventListener('keydown', (event) => {
  const key = event.key;
  const keyCode = event.keyCode || event.which;

  // Allow only numbers and specific control keys
  if (!/^\d$|^Backspace$|^Delete$|^Arrow(Left|Right|Up|Down)$/.test(key) && keyCode !== 229) {
    event.preventDefault();
  }
});

function formatPhoneNumber(phoneNumber) {
  const cleaned = phoneNumber.replace(/\D/g, ''); // Remove non-digit characters
  const match = cleaned.match(/^(\d{0,3})(\d{0,3})(\d{0,4})$/);
  return match ? `(${match[1]}) ${match[2]}-${match[3]}` : phoneNumber;
}


// Get references to the input fields
const firstNameInput = document.getElementById('firstName');
const lastNameInput = document.getElementById('lastName');
const preferredNameInput = document.getElementById('preferredName');

// Add event listeners to the input fields
firstNameInput.addEventListener('keydown', restrictInput);
lastNameInput.addEventListener('keydown', restrictInput);
preferredNameInput.addEventListener('keydown', restrictInput);

// Event handler to restrict input
function restrictInput(event) {
  const key = event.key;
  const allowedCharactersRegex = /^[a-zA-Z\u002D\u2013\u2014\u201C\u201D\u00A8\u00C4\u00E4\u00D6\u00F6\u00DC\u00FC\s'"]$/;

  // Allow backspace, delete, and arrow keys
  if (key === 'Backspace' || key === 'Delete' ||  (key && key.startsWith('Arrow')))  {
    return;
  }

  // Allow allowed characters
  if (allowedCharactersRegex.test(key) || allowedCharactersRegex.test(event.key)) {
    return;
  }

  // Block other input
  event.preventDefault();
}




function previewData() {
    // Get form input values
    var firstName = document.getElementById('firstName').value;
    var lastName = document.getElementById('lastName').value;
    var preferredName = document.getElementById('preferredName').value;
    var age = document.getElementById('age').value;
    var address = document.getElementById('address').value;
    var gender = document.getElementById('gender').value;
    var communicationPreference = document.getElementById('communicationPreference').value;
    var phoneNumber = document.getElementById('phoneNumber').value;
    var email = document.getElementById('emailInfo').value;

    // Display the entered data in the preview section
    document.getElementById('previewFirstName').textContent = firstName;
    document.getElementById('previewLastName').textContent = lastName;
    document.getElementById('previewPreferredName').textContent = preferredName;
    document.getElementById('previewAge').textContent = age;
    document.getElementById('previewAddress').textContent = address;
    document.getElementById('previewGender').textContent = gender;
    document.getElementById('previewCommunicationPreference').textContent = communicationPreference;
    document.getElementById('previewPhoneNumber').textContent = phoneNumber;
    document.getElementById('previewEmail').textContent = email;
}



$(document).ready(function() {
    var passwordInput = $('#password');
    var confirmPasswordInput = $('#confirmPassword');
    var message = $('#message');
    var nextButton = $('#pwButton');

    // Function to validate the password
    function validatePassword() {
        var password = passwordInput.val();
        var confirmPassword = confirmPasswordInput.val();

        // Minimum length of 6 characters
        if (password.length < 6) {
            message.text("Password must be at least 6 characters long and contain at least one number and one symbol.");
            nextButton.prop('disabled', true);
            return;
        }

        // At least one letter, one number, and one symbol
        var letterRegex = /[a-zA-Z]/;
        var numberRegex = /[0-9]/;
        var symbolRegex = /[!@#$%^&*()\-_=+{};:,<.>/?[\]']/;

        if (!letterRegex.test(password) || !numberRegex.test(password) || !symbolRegex.test(password)) {
            message.text("Password must contain at least one letter, one number, and one symbol.");
            nextButton.prop('disabled', true);
            return;
        }

        // Confirm password match
        if (password !== confirmPassword) {
            message.text("Passwords do not match.");
            nextButton.prop('disabled', true);
            return;
        }

        message.text("");
        nextButton.prop('disabled', false);
    }

    // Trigger validation on password and confirm password input change
    passwordInput.on('input', validatePassword);
    confirmPasswordInput.on('input', validatePassword);
});
