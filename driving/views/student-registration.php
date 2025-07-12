<?php
// filepath: c:\xampp\htdocs\www.driving.rw\driving\views\student-registration.php
?>
<div class="my-3 my-md-5">
    <div class="container">
        <div class="row row-cards row-deck">
            <div class="col-lg-12">
                <div class="card card-aside">
                    <div class="card-body d-flex flex-column">
                        <h4><a href="#">Register Beginner Driver | Students</a></h4>
                        <div class="text-muted">
                            View student registration details and their assigned training categories.
                            Monitor beginner drivers' progress and ensure they are assigned to the correct learning path.
                        </div>

                        <!-- Success Message Area -->
                        <div id="responseMessage"></div>

                        <form id="studentRegisterForm">
                            <div class="row">
                                <div class="col-md-6 col-lg-4">
                                    <div class="form-group">
                                        <label class="form-label">Student Code</label>
                                        <input type="text" class="form-control" name="stu_code" id="stu_code" required readonly>
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label">First Name</label>
                                        <input type="text" class="form-control" name="first_name" required placeholder="First Name">
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label">Family Name</label>
                                        <input type="text" class="form-control" name="familly_name" required placeholder="Family Name">
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label">Phone</label>
                                        <input type="text" class="form-control" name="phone" required placeholder="Phone Number">
                                    </div>
                                </div>
                                <div class="col-md-6 col-lg-4">
                                    <div class="form-group">
                                        <label class="form-label">Email</label>
                                        <input type="email" class="form-control" name="email" required placeholder="Email">
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label">ID Number</label>
                                        <input type="text" class="form-control" name="ID_number" required placeholder="ID Number">
                                    </div>
                                    <div class="form-group mt-4">
                                        <button type="submit" class="btn btn-primary">Register Student</button>
                                    </div>
                                </div>
                            </div>

                            <!-- Student Info Preview -->
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="alert alert-info">
                                        <strong>Student Code:</strong> 
                                        <span id="studentCode">STU-001</span><br>
                                        <small>Unique identifier for the student in the system.</small>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="alert alert-secondary">
                                        <strong>Status:</strong> 
                                        <span id="studentStatus">Pending</span><br>
                                        <small>Indicates whether the student is currently enrolled and active.</small>
                                    </div>
                                </div>
                            </div>
                        </form>

                        <script>
                        // Auto-generate Student Code like: 24UB007X
                        function generateStudentCode() {
                            const year = new Date().getFullYear().toString().slice(-2); // Last 2 digits of year
                            const randomNum = Math.floor(100 + Math.random() * 900); // 3-digit number
                            const letter = String.fromCharCode(65 + Math.floor(Math.random() * 26)); // Random uppercase letter
                            return `${year}UB${randomNum}${letter}`;
                        }

                        // Fill the student code input automatically
                        document.getElementById("stu_code").value = generateStudentCode();
                        document.getElementById("studentCode").innerText = document.getElementById("stu_code").value;

                        // Handle form submission
                        document.getElementById('studentRegisterForm').addEventListener('submit', function(e) {
                            e.preventDefault();
                            const form = e.target;
                            const payload = {
                                first_name: form.first_name.value,
                                familly_name: form.familly_name.value,
                                phone: form.phone.value,
                                email: form.email.value,
                                ID_number: form.ID_number.value,
                                stu_code: form.stu_code.value
                            };

                            fetch('../_api/students/register', {
                                method: 'POST',
                                headers: { 'Content-Type': 'application/json' },
                                body: JSON.stringify(payload)
                            })
                            .then(response => response.json())
                            .then(data => {
                                const msgContainer = document.getElementById("responseMessage");
                                msgContainer.innerHTML = `
                                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                                        ${data.message || 'Student registered successfully!'}
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>`;
                                
                                // Optionally update status
                                document.getElementById("studentStatus").innerText = "Active";

                                form.reset();
                                document.getElementById("stu_code").value = generateStudentCode();
                                document.getElementById("studentCode").innerText = document.getElementById("stu_code").value;
                            })
                            .catch(error => {
                                alert('Error registering student.');
                                console.error(error);
                            });
                        });
                        </script>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
