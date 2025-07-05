<div class="my-3 my-md-5">
  <div class="container">
    <div class="page-header">
      <h1 class="page-title">
         Integration Documentation
      </h1>
    </div>
    <div class="row">
      <div class="col-lg-1"></div>
      <div class="col-lg-10">
        <div class="card">
          <div class="card-body">
            <div class="text-wrap p-lg-6">
              <h2 class="mt-0 mb-4">Introduction</h2>
              <p>
                Welcome to the integration guide for the Driving School Management System. This platform is designed to streamline operations for driving schools, including student registration, instructor assignments, test scheduling, category tracking (e.g., B, C, D, F), and certification. This documentation will guide you through setting up, customizing, and deploying the system.
              </p>

              <h3 id="setup-environment">Environment Setup</h3>
              <p>
                To get started with the Driving School System, follow these steps to set up your local development environment:
              </p>
              <ol>
                <li><a href="https://nodejs.org/download/">Install Node.js</a> to manage project dependencies.</li>
                <li>Clone the project repository and navigate to the root folder (e.g., <code>/driving-school</code>).</li>
                <li>Run <code>npm install</code> to install necessary packages.</li>
                <li>If backend uses Python or FastAPI, ensure <a href="https://www.python.org/downloads/">Python</a> is installed and run <code>pip install -r requirements.txt</code>.</li>
                <li>If a database (like MySQL or PostgreSQL) is used, configure credentials in the <code>.env</code> or <code>config</code> file.</li>
              </ol>

              <h3 id="running-locally">Run the System Locally</h3>
              <ol>
                <li>Start the backend server: <code>uvicorn main:app --reload</code> or use the equivalent command if using another framework.</li>
                <li>Start the frontend: <code>npm start</code> (React) or <code>php artisan serve</code> (Laravel).</li>
                <li>Visit <a href="http://localhost:3000">http://localhost:3000</a> to explore the frontend interface.</li>
              </ol>

              <div class="alert alert-warning">
                <strong>Important!</strong> Avoid editing the <code>build/</code> or <code>dist/</code> folders directly, as these are regenerated during builds.
              </div>

              <h3 id="features">Core Features</h3>
              <ul>
                <li>Student registration and tracking</li>
                <li>Lesson scheduling and attendance monitoring</li>
                <li>Instructor allocation and profile management</li>
                <li>Test booking and performance reports</li>
                <li>Multi-category license support (B, C, D, F)</li>
                <li>Notifications, payment tracking, and certificate generation</li>
              </ul>

              <h3 id="support">Support and Requests</h3>
              <p>
                Need help or have a feature request? <a href="https://github.com/your-driving-school-project/issues/new">Open an issue on GitHub</a> or contact the system admin.
              </p>

            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-1"></div>
    </div>
  </div>
</div>
