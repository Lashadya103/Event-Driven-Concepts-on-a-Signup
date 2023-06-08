<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Choicees - Signup</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="p_styles.css">
</head>
<body>
    <div class="signup-container">
        <div class="container mt-5">      
            <div class="logo-container">
                <img class="logo-image" src="clothing-store-logo.png" alt="Clothing Store Logo">
                <h1 class="text-center">Sign Up</h1>
            </div>  

            
            <!-- Form Begins -->
            <form action="insert.php" class="form" method="POST" id="signupForm">

              
                <!-- Progress Bar  -->
                <div class="progressbar">
                    <div class="progress" id="progress"></div>
                    <div class="progress-step progress-step-active" data-title="Personal Info"></div>
                    <div class="progress-step" data-title="Verification"></div>
                    <div class="progress-step" data-title="Set Account"></div>
                    <div class="progress-step" data-title="Finish"></div>
                </div>
            
                <!-- Form item - Personal -->
                <div class="form-step form-step-active">
                    <div class="row g-3">
                        <div class="col-md-4">
                            <label for="firstName" class="form-label">First Name <span class="required-star">*</span></label>
                            <input type="text" class="form-control" id="firstName" name="firstName" required>
                        </div>
                        <div class="col-md-4">
                            <label for="lastName" class="form-label">Last Name <span class="required-star">*</span></label>
                            <input type="text" class="form-control" id="lastName" name="lastName" required>
                        </div>
                        <div class="col-md-4">
                            <label for="preferredName" class="form-label">Preferred Name</label>
                            <input type="text" class="form-control" id="preferredName" name="preferredName">
                        </div>
                    </div>
            
                    <div class="row g-3">
                        <div class="col-md-2">
                            <label for="age" class="form-label">Age<span class="required-star">*</span></label>
                            <input type="number" class="form-control" id="age" name="age" required min="15" max="99">
                        </div>
                        
                        <div class="col-md-10">
                            <label for="address" class="form-label">Address<span class="required-star">*</span></label>
                            <input type="text" class="form-control" id="address" name="address" required>
                        </div>
                    </div>
            
                    <div class="row g-3">
                        <div class="col-md-4">
                            <label for="gender" class="form-label">Gender<span class="required-star">*</span></label>
                            <select class="form-select" id="gender" name="gender" required>
                                <option value="" selected disabled>Select</option>
                                <option value="male">Male</option>
                                <option value="female">Female</option>
                                <option value="other">Other</option>
                            </select>
                        </div>
                       <div class="col-md-5">
                            <label for="communicationPreference" class="form-label">Communication Preference<span class="required-star">*</span></label>
                            <select class="form-select" id="communicationPreference" name="communicationPreference" required>
                                <option value="" selected disabled>Select</option>
                                <option value="email">Via Email</option>
                                <option value="phone">Via Phone Call</option>
                                <option value="text">Via Text Messages</option>
                            </select>
                        </div>


                    </div>
            
                    <div class="row g-3">
                        <div class="col-md-5">
                            <label for="phoneNumber" class="form-label">Mobile Number <span class="required-star">*</span></label>
                            <input type="text" class="form-control" id="phoneNumber" name="phoneNumber" placeholder="(0XX) XXX-XXXX" required>
                        </div>
                    </div>
            
            
                    <div class="text-center mt-3">
                        <a href="#" class="btn btn-next width-50" onclick="previewData()">Next</a>

                    </div>
                </div>
            
                <!-- Form item - Contact -->
                <div class="form-step">
                    <h5 style="text-align: center;">Please Verify Your Email Address to Proceed</h5>
                    <div class="input-group">
                        </div>
                    <div class="row g-3">
                        <div class="col-md-7">
                            <label for="emailInfo" class="form-label">E-mail <span class="required-star">*</span></label>
                            <input type="email" class="form-control" id="emailInfo" name="email" required>
                        </div>
                        <div class="col-md-1">
                           <br> <button class="verify_btn" onclick="this.classList.add('clicked')">Verify</button>
                        </div>
                    </div><br><br><br>
                    <div class="btns-group">
                        <a href="#" class="btn btn-prev">Back</a>
                        <a href="#" class="btn btn-next" onclick="previewData()">Next</a>
                    </div>
                </div>

                <!-- Form item - Password -->
                <div class="form-step">
                    <h5 style="text-align: center;">Please Enter the Password for Your Account</h5> 

                <div class="row g-3">
                  <div class="col-md-7">  
                      <label for="password" class="form-label">Password <span class="required-star">*</span></label>
                      <input type="password" name="password" id="password" class="form-control" placeholder="Password" required>
                    </div>
                  </div>
                <div class="row g-3">
                  <div class="col-md-7">    
                      <label for="confirmPassword" class="form-label">Confirm Password <span class="required-star">*</span></label>
                      <input type="password" name="confirmPassword" id="confirmPassword" class="form-control" placeholder="Confirm Password" required>
                      <p style="color: maroon;" id="message"></p>
                    </div>
                  </div>     <br>
                
                    <div class="btns-group">
                        <a href="#" class="btn btn-prev">Back</a>
                        <button type="button" class="btn btn-next" id="pwButton" onclick="previewData()">Next</button>
                    </div>
                </div>
           

<!-- Form item - Preview -->
<div class="form-step"><div style="text-align:center; background: seashell;">
    <br><h2>Information Preview</h2><br>
    <!-- Display the entered data here -->
    <p>First Name: <span id="previewFirstName"></span></p>
    <p>Last Name: <span id="previewLastName"></span></p>
    <p>Preferred Name: <span id="previewPreferredName"></span></p>
    <p>Age: <span id="previewAge"></span></p>
    <p>Address: <span id="previewAddress"></span></p>
    <p>Gender: <span id="previewGender"></span></p>
    <p>Communication Preference: <span id="previewCommunicationPreference"></span></p>
    <p>Mobile Number: <span id="previewPhoneNumber"></span></p>
    <p>Email: <span id="previewEmail"></span></p><br><br>
</div>
    <!-- Buttons to navigate back or submit the form -->
    <br><br><div class="btns-group">
        <a href="#" class="btn btn-prev">Back</a>
        <button type="submit" class="btn btn-next" name="register">Submit</button>
    </div>
    
</div>
            </form>


      </div>
  </div>
    
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="p_script.js"></script>
</body>
</html>


