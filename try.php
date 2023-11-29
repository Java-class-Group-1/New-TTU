<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Student Progress</title>
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
  <div class="container mt-5">
    <h2>Student Counts by Department</h2>
    <div class="row">
      <div class="col-md-6">
        <div class="progress mb-3">
          <div id="Computer Science" class="progress-bar bg-primary" role="progressbar" style="width: 0%;" aria-valuemin="0" aria-valuemax="100">0</div>
        </div>
        <div class="progress mb-3">
          <div id="Mathematics" class="progress-bar bg-success" role="progressbar" style="width: 0%;" aria-valuemin="0" aria-valuemax="100">0</div>
        </div>
        <!-- Add more progress bars for other departments -->
        <div class="progress mb-3">
          <div id="Physics" class="progress-bar bg-warning" role="progressbar" style="width: 0%;" aria-valuemin="0" aria-valuemax="100">0</div>
        </div>
        <div class="progress mb-3">
          <div id="Chemistry" class="progress-bar bg-info" role="progressbar" style="width: 0%;" aria-valuemin="0" aria-valuemax="100">0</div>
        </div>
        <div class="progress mb-3">
          <div id="Biology" class="progress-bar bg-info" role="progressbar" style="width: 0%;" aria-valuemin="0" aria-valuemax="100">0</div>
        </div>
        <!-- Add more progress bars for additional departments -->
      </div>
    </div>
  </div>

  <!-- Bootstrap JavaScript -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
  <!-- Your custom JavaScript -->
  <script>
    // Fetch student counts from PHP endpoint and update progress bars
    function fetchData() {
      fetch('try2.php')
        .then(response => response.json())
        .then(data => {
          let totalStudents = 0;

          // Calculate total number of students
          data.forEach(item => {
            totalStudents += parseInt(item.total_students);
          });

          // Update progress bars based on percentage of students in each department
          data.forEach(item => {
            const department = item.department;
            const departmentCount = parseInt(item.total_students);
            const progressBar = document.getElementById(department);

            if (progressBar) {
              const percentage = (departmentCount / totalStudents) * 100;
              progressBar.style.width = percentage + '%';
              progressBar.setAttribute('aria-valuenow', percentage);
              progressBar.innerText = Math.round(percentage) + '%';
            }
          });
        })
        .catch(error => console.error('Error:', error));
    }

    // Call fetchData function on page load
    window.onload = fetchData;
  </script>
</body>
</html>
