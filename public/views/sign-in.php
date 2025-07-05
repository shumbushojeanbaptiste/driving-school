<div class="breadcrumb-area">
                <div class="container">
                    <div class="breadcrumb-content">
                        <ul>
                            <li><a href="index.html">Home</a></li>
                            <li class="active">Login</li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- Li's Breadcrumb Area End Here -->
            <!-- Begin Login Content Area -->
            <div class="page-section mb-60">
                <div class="container">
                 

                       <div class="row">
                        <!-- Begin Category Menu Area -->
    <div class="col-lg-5">
    <!--Category Menu Start-->
    <div class="category-menu">
        <div class="category-heading">
            <h2 class="categories-toggle"><span>Driving School Access</span></h2>
        </div>
        <div id="cate-toggle" class="category-menu-list">
            <ul>
                <!-- Login/Register Section -->
                <li class="right-menu"><a href="login">Login</a></li>
                <li class="right-menu"><a href="registration">Register</a></li>
                <li class="right-menu"><a href="forgot-password">Forgot Password?</a></li>
                
                <!-- Driving Courses -->
                <li class="right-menu"><a href="course-details">Driving Courses</a>
                    <ul class="cat-mega-menu">
                        <li class="right-menu cat-mega-title">
                            <a href="shop-left-sidebar">Beginner Courses</a>
                            <ul>
                                <li><a href="#">Classroom Training</a></li>
                                <li><a href="#">Behind-the-Wheel Training</a></li>
                                <li><a href="#">Mock Tests</a></li>
                                <li><a href="#">Basic Road Safety</a></li>
                            </ul>
                        </li>
                        <li class="right-menu cat-mega-title">
                            <a href="shop-left-sidebar">Advanced Courses</a>
                            <ul>
                                <li><a href="#">Highway Driving</a></li>
                                <li><a href="#">Defensive Driving</a></li>
                                <li><a href="#">Night Driving</a></li>
                            </ul>
                        </li>
                    </ul>
                </li>

                <!-- Driving License -->
                <li class="right-menu"><a href="license-details">Driving License</a>
                    <ul class="cat-mega-menu">
                        <li><a href="#">License Requirements</a></li>
                        <li><a href="#">Apply for a License</a></li>
                        <li><a href="#">Renew License</a></li>
                        <li><a href="#">License Tracking</a></li>
                    </ul>
                </li>

                <!-- Schedule and Appointments -->
                <li class="right-menu"><a href="schedule-appointment">Schedule Appointment</a>
                    <ul class="cat-mega-menu">
                        <li><a href="#">Book Driving Test</a></li>
                        <li><a href="#">Schedule a Lesson</a></li>
                        <li><a href="#">View Appointment History</a></li>
                    </ul>
                </li>

                <!-- Student Dashboard (Visible After Login) -->
                <li class="right-menu"><a href="student-dashboard">Student Dashboard</a></li>
                
                <!-- Driving Instructors (Access for Admins/Instructors) -->
                <li class="right-menu"><a href="instructor-details">Instructors</a>
                    <ul class="cat-mega-menu">
                        <li><a href="#">View Instructors</a></li>
                        <li><a href="#">Assign Instructor</a></li>
                    </ul>
                </li>

                <!-- More Options -->
                <li class="rx-parent">
                    <a class="rx-default">More Options</a>
                    <a class="rx-show">Less Options</a>
                </li>
            </ul>
        </div>
    </div>
    <!--Category Menu End-->
</div>

<div class="col-sm-12 col-md-12 col-xs-12 col-lg-7 mb-30">
    <!-- Login Form Start-->
    <form id="loginForm">
        <div class="login-form">
            <h4 class="login-title">Login</h4>
            <div class="row">
                <div class="col-md-12 col-12 mb-20">
                    <label>Email Address*</label>
                    <input id="email" class="mb-0" type="email" placeholder="Email Address" required>
                </div>
                <div class="col-12 mb-20">
                    <label>Password</label>
                    <input id="security_key" class="mb-0" type="password" placeholder="Password" required>
                </div>
                <div class="col-md-8">
                    <div class="check-box d-inline-block ml-0 ml-md-2 mt-10">
                        <input type="checkbox" id="remember_me">
                        <label for="remember_me">Remember me</label>
                    </div>
                </div>
                <div class="col-md-4 mt-10 mb-20 text-left text-md-right">
                    <a href="#">Forgotten password?</a>
                </div>
                <div class="col-md-12">
                    <button type="submit" class="register-button mt-0">Login</button>
                </div>
                <div class="col-md-12">
                <div id="loginMessage"></div>
                </div>
            </div>
        </div>
    </form>
    <!-- Login Form End-->
</div>

<!-- Success/Error Messages (Optional) -->





                        <!-- Category Menu Area End Here -->
                        <!-- Begin Slider Area -->
                         
                        <!-- Slider Area End Here -->
                    </div>
                </div>
            </div>



<script>
    document.getElementById("loginForm").addEventListener("submit", function(e) {
    e.preventDefault(); // Prevents the form from refreshing the page

    // Get the values from the form
    const email = document.getElementById("email").value;
    const password = document.getElementById("security_key").value;
    const rememberMe = document.getElementById("remember_me").checked;

    // Create a JSON object to send to the server
    const data = {
        email: email,
        security_key: password
    };

    // Show loading message
    document.getElementById("loginMessage").innerHTML = "<p>Logging in...</p>";

    // Send the POST request using Fetch API
    fetch("../_api/auth/login", {
        method: "POST",
        headers: {
            "Content-Type": "application/json",  // Send JSON data
        },
        body: JSON.stringify(data)  // Send JSON data in the body
    })
    .then(response => response.json()) // Parse the response as JSON
    .then(data => {
        // Log the response to debug it
        console.log('Server response:', data);

        // Check if the response has the expected structure
        if (data.message === "Login successful.") {
            // Handle successful login
            // Optionally, you can store some user info here if needed, or just a token
            sessionStorage.setItem('message', data.message);

            // Redirect to dashboard (adjust the route as needed)
            // window.location.href = "/dashboard"; // Adjust to your actual route
            document.getElementById("loginMessage").innerHTML = `<p style="color: green;">${data.message}</p>`;
        } else {
            // Handle error
            document.getElementById("loginMessage").innerHTML = `<p style="color: red;">${data.message}</p>`;
        }

        if (data.redirect) {
            window.location.href = data.redirect;
        }
    })
    .catch(error => {
        // Handle any errors that occur during the request
        document.getElementById("loginMessage").innerHTML = `<p style="color: red;">An error occurred. Please try again later.</p>`;
        console.error('Error during login:', error);
    });

});

</script>


