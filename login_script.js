
    document.getElementById("login-form").addEventListener("submit", function(event) {
      event.preventDefault();
  
      var email = document.getElementById("email").value;
      var password = document.getElementById("password").value;
      
         // Email validation using regular expression
      var emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
      if (!emailRegex.test(email)) {
        alert("Please enter a valid email address.");
        return;
      }
  
      // Perform login validation here
      // ...
    });
