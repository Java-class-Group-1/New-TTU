<?php 
include("../include/header.inc.php");
include("../include/sidebar.inc.php");

?>

      <!-- ============================================================== -->
      <div class="page-wrapper">
        <!-- ============================================================== -->
        <!-- Bread crumb and right sidebar toggle -->
        <!-- ============================================================== -->
        <div class="page-breadcrumb">
          <div class="row">
            <div class="col-12 d-flex no-block align-items-center">
              <h4 class="page-title text-center text-info">
              Hello Admin: 
                    <?php echo $_SESSION['username'];
                    ?></h4>
              <div class="ms-auto text-end">
                <nav aria-label="breadcrumb">
                  <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">
                      Library
                    </li>
                  </ol>
                </nav>
              </div>
            </div>
          </div>
        </div>
          <div class="container-fluid">
            <div class="row">
            <!-- Column -->
            <div class="col-md-6 col-lg-2 col-xlg-3">
              <div class="card card-hover">
                <div class="box bg-cyan text-center">
                  <h1 class="font-light text-white">
                    <i class="mdi mdi-view-dashboard"></i>
                  </h1>
                  <h6 class="text-white">Dashboard</h6>
                </div>
              </div>
            </div>
            <!-- Column -->
            <div class="col-md-6 col-lg-4 col-xlg-3">
              <div class="card card-hover">
                <div class="box bg-success text-center">
                  <h1 class="font-light text-white">
                    <i class="mdi mdi-chart-areaspline"></i>
                  </h1>
                  <h6 class="text-white">Lecture</h6>
                </div>
              </div>
            </div>
            <!-- Column -->
            <div class="col-md-6 col-lg-2 col-xlg-3">
              <div class="card card-hover">
                <div class="box bg-warning text-center">
                  <h1 class="font-light text-white">
                    <i class="mdi mdi-collage"></i>
                  </h1>
                  <h6 class="text-white">Department</h6>
                </div>
              </div>
            </div>
            <!-- Column -->
            <div class="col-md-6 col-lg-2 col-xlg-3">
              <div class="card card-hover">
                <div class="box bg-danger text-center">
                  <h1 class="font-light text-white">
                    <i class="mdi mdi-border-outside"></i>
                  </h1>
                  <h6 class="text-white">Faculty</h6>
                </div>
              </div>
            </div>
            <!-- Column -->
            <div class="col-md-6 col-lg-2 col-xlg-3">
              <div class="card card-hover">
                <div class="box bg-info text-center">
                  <h1 class="font-light text-white">
                    <i class="mdi mdi-arrow-all"></i>
                  </h1>
                  <h6 class="text-white">Program</h6>
                </div>
              </div>
            </div>
            <!-- Column -->
            <!-- Column -->
            <div class="col-md-6 col-lg-4 col-xlg-3">
              <div class="card card-hover">
                <div class="box bg-danger text-center">
                  <h1 class="font-light text-white">
                    <i class="mdi mdi-receipt"></i>
                  </h1>
                  <h6 class="text-white">Class Time Table</h6>
                </div>
              </div>
            </div>
            <!-- Column -->
            <div class="col-md-6 col-lg-2 col-xlg-3">
              <div class="card card-hover">
                <div class="box bg-info text-center">
                  <h1 class="font-light text-white">
                    <i class="mdi mdi-relative-scale"></i>
                  </h1>
                  <h6 class="text-white">Course Level</h6>
                </div>
              </div>
            </div>
            <!-- Column -->
            <div class="col-md-6 col-lg-2 col-xlg-3">
              <div class="card card-hover">
                <div class="box bg-cyan text-center">
                  <h1 class="font-light text-white">
                    <i class="mdi mdi-pencil"></i>
                  </h1>
                  <h6 class="text-white">Exams Time Table</h6>
                </div>
              </div>
            </div>
            <!-- Column -->
            <div class="col-md-6 col-lg-2 col-xlg-3">
              <div class="card card-hover">
                <div class="box bg-success text-center">
                  <h1 class="font-light text-white">
                    <i class="mdi mdi-calendar-check"></i>
                  </h1>
                  <h6 class="text-white">Rooms</h6>
                </div>
              </div>
            </div>
            <!-- Column -->
            <div class="col-md-6 col-lg-2 col-xlg-3">
              <div class="card card-hover">
                <div class="box bg-warning text-center">
                  <h1 class="font-light text-white">
                    <i class="mdi mdi-relative-scale"></i>
                  </h1>
                  <h6 class="text-white">Mal Practice</h6>
                </div>
              </div>
            </div>
            <!-- Column -->
          </div>
          <!-- ============================================================== -->
          <!-- Sales chart -->
          <!-- ============================================================== -->
          <div class="row">
            <div class="col-md-12">
              <div class="card">
                <div class="card-body">
                  <div class="d-md-flex align-items-center">
                    <div>
                      <h4 class="card-title">System Analysis</h4>
                      <h5 class="card-subtitle">Overview of how students are using the system</h5>
                    </div>
                  </div>
                  <div class="row">
                    <!-- column -->
                    <div class="col-lg-9">
                      <div class="flot-chart">
                        <div
                          class="flot-chart-content"
                          id="flot-line-chart"
                        ></div>
                      </div>
                    </div>
                    <div class="col-lg-3">
                      <div class="row">
                        <div class="col-6">
                          <div class="bg-dark p-10 text-white text-center">
                            <i class="mdi mdi-account-multiple  font-20">
                            </i>
                          <?php
                          include("../functions/fetch_foriegnData.php");
                          $totalStudents = getTotalStudents();
                        echo "<h5 class='mb-0 mt-1'>$totalStudents</h5>"?>
                          
                           
                            <small class="font-light">Total Users</small>
                          </div>
                        </div>
                        <div class="col-6">
                          <div class="bg-dark p-10 text-white text-center">
                            <i class="mdi mdi-account-location font-20"></i>
                          <?php
                          
                          $totalStudents = getTotalScience();
                        echo "<h5 class='mb-0 mt-1'>$totalStudents</h5>"?>
                        
                
                            <small class="font-light">Aplied Science</small>
                          </div>
                        </div>
                        <div class="col-6 mt-3">
                          <div class="bg-dark p-10 text-white text-center">
                            <i class="mdi mdi-beach font-16"></i>
                            <?php
                          
                          $totalStudents = getTotalArt();
                        echo "<h5 class='mb-0 mt-1'>$totalStudents</h5>"?>
                        
                            <small class="font-light">Applied Arts</small>
                          </div>
                        </div>
                        <div class="col-6 mt-3">
                          <div class="bg-dark p-10 text-white text-center">
                            <i class="mdi mdi-account-multiple-outline font-16"></i>
                            <?php
                          
                          $totalStudents = getTotalBus();
                        echo "<h5 class='mb-0 mt-1'>$totalStudents</h5>"?>
                        
                            <small class="font-light">Business
                    </small>
                          </div>
                        </div>
                        <div class="col-6 mt-3">
                          <div class="bg-dark p-10 text-white text-center">
                            <i class="mdi mdi-autorenew font-16"></i>
                            <?php
                          
                          $totalStudents = getTotalEng();
                        echo "<h5 class='mb-0 mt-1'>$totalStudents</h5>"?>
                        
                            <small class="font-light">Engineering</small>
                          </div>
                        </div>
                        <div class="col-6 mt-3">
                          <div class="bg-dark p-10 text-white text-center">
                            <i class="mdi mdi-calendar-check mb-1 font-16"></i>
                            <?php
                          
                          $totalStudents = getTotalBuilt();
                        echo "<h5 class='mb-0 mt-1'>$totalStudents</h5>"?>
                        
                            <small class="font-light">Built and Natural</small>
                          </div>
                        </div>
                      </div>
                    </div>
                    <!-- column -->
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- ============================================================== -->
          <!-- Sales chart -->
          <!-- ============================================================== -->
          <!-- ============================================================== -->
          <!-- Recent comment and chats -->
          <!-- ============================================================== -->
          <div class="row">
            <!-- column -->
        
              <!-- card -->
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title mb-0">Progress of each Department</h4>
                  <div class="mt-3">
                    <div class="d-flex no-block align-items-center">
                      <span>Computer Science</span>
                      <div class="ms-auto">
                        <span>Computer Science</span>
                      </div>
                    </div>
                    <div class="progress">
                      <div id="Computer Science" 
                        class="progress-bar progress-bar-striped"
                        role="progressbar"
                        style="width: 0%;"
                      
                        aria-valuemin="0"
                        aria-valuemax="100"
                      >0</div>
                    </div>
                  </div>
                  <div class="d-flex no-block align-items-center mt-4">
                      <span>Graphic Design Technology</span>
                      <div class="ms-auto">
                        <span>Graphic Design Technology</span>
                      </div>
                    </div>
                    <div class="progress">
                      <div id="Graphic Design Technology" class="progress-bar progress-bar-striped bg-info"
                        role="progressbar"
                        style="width: 0%"
                    
                        aria-valuemin="0"
                        aria-valuemax="100"
                      ></div>
                    </div>
                  <div class="d-flex no-block align-items-center mt-4">
                      <span>Accounting and Finance</span>
                      <div class="ms-auto">
                        <span>Accounting and Finance</span>
                      </div>
                    </div>
                    <div class="progress">
                      <div id="Accounting and Finance"
                        class="progress-bar progress-bar-striped bg-success"
                        role="progressbar"
                        style="width: 0%"
                        aria-valuenow="25"
                        aria-valuemin="0"
                        aria-valuemax="100"
                      ></div>
                    </div>
                  <div class="d-flex no-block align-items-center mt-4">
                      <span>Hospitality Management</span>
                      <div class="ms-auto">
                        <span>Hospitality Management</span>
                      </div>
                    </div>
                    <div class="progress">
                      <div id="Hospitality Management"
                        class="progress-bar progress-bar-striped bg-danger"
                        role="progressbar"
                        style="width:0%"
                   
                        aria-valuemin="0"
                        aria-valuemax="100"
                      ></div>
                    </div>
                  <div class="d-flex no-block align-items-center mt-4">
                      <span>Civil Engineering</span>
                      <div class="ms-auto">
                        <span>Civil Engineering</span>
                      </div>
                    </div>
                    <div class="progress">
                      <div id="Civil Engineering"
                        class="progress-bar progress-bar-striped bg-warning"
                        role="progressbar"
                        style="width: 0%"
                        aria-valuenow="25"
                        aria-valuemin="0"
                        aria-valuemax="100"
                      ></div>
                    </div>
                   
               
                  
                  <div>
                    <div class="d-flex no-block align-items-center mt-4">
                      <span>Tourism Management</span>
                      <div class="ms-auto">
                        <span>Tourism Management</span>
                      </div>
                    </div>
                    <div class="progress">
                      <div id="Tourism Management" 
                        class="progress-bar progress-bar-striped bg-danger"
                        role="progressbar"
                        style="width: 0%;"
                      
                        aria-valuemin="0"
                        aria-valuemax="100"
                      >0</div>
                      
                  
                  
                  </div>
                </div>
                </div>
           
              </div>
              
              <!-- card new -->
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title mb-0">Latest Exams Time Table</h4>
                </div>
                <ul class="list-style-none">
                  <li class="d-flex no-block card-body">
                    <i class="mdi mdi-check-circle fs-4 w-30px mt-1"></i>
                    <div>
                      <a href="#" class="mb-0 font-medium p-0"
                        >Lorem ipsum dolor sit amet, consectetur adipiscing
                        elit.</a
                      >
                      <span class="text-muted"
                        >dolor sit amet, consectetur adipiscing</span
                      >
                    </div>
                    <div class="ms-auto">
                      <div class="tetx-right">
                        <h5 class="text-muted mb-0">20</h5>
                        <span class="text-muted font-16">Jan</span>
                      </div>
                    </div>
                  </li>
                  <li class="d-flex no-block card-body border-top">
                    <i class="mdi mdi-gift fs-4 w-30px mt-1"></i>
                    <div>
                      <a href="#" class="mb-0 font-medium p-0"
                        >Congratulation Maruti, Happy Birthday</a
                      >
                      <span class="text-muted"
                        >many many happy returns of the day</span
                      >
                    </div>
                    <div class="ms-auto">
                      <div class="tetx-right">
                        <h5 class="text-muted mb-0">11</h5>
                        <span class="text-muted font-16">Jan</span>
                      </div>
                    </div>
                  </li>
                  <li class="d-flex no-block card-body border-top">
                    <i class="mdi mdi-plus fs-4 w-30px mt-1"></i>
                    <div>
                      <a href="#" class="mb-0 font-medium p-0"
                        >Maruti is a Responsive Admin theme</a
                      >
                      <span class="text-muted"
                        >But already everything was solved. It will ...</span
                      >
                    </div>
                    <div class="ms-auto">
                      <div class="tetx-right">
                        <h5 class="text-muted mb-0">19</h5>
                        <span class="text-muted font-16">Jan</span>
                      </div>
                    </div>
                  </li>
                  <li class="d-flex no-block card-body border-top">
                    <i class="mdi mdi-leaf fs-4 w-30px mt-1"></i>
                    <div>
                      <a href="#" class="mb-0 font-medium p-0"
                        >Envato approved Maruti Admin template</a
                      >
                      <span class="text-muted"
                        >i am very happy to approved by TF</span
                      >
                    </div>
                    <div class="ms-auto">
                      <div class="tetx-right">
                        <h5 class="text-muted mb-0">20</h5>
                        <span class="text-muted font-16">Jan</span>
                      </div>
                    </div>
                  </li>
                  <li class="d-flex no-block card-body border-top">
                    <i
                      class="mdi mdi-comment-question-outline fs-4 w-30px mt-1"
                    ></i>
                    <div>
                      <a href="#" class="mb-0 font-medium p-0">
                        I am alwayse here if you have any question</a
                      >
                      <span class="text-muted"
                        >we glad that you choose our template</span
                      >
                    </div>
                    <div class="ms-auto">
                      <div class="tetx-right">
                        <h5 class="text-muted mb-0">15</h5>
                        <span class="text-muted font-16">Jan</span>
                      </div>
                    </div>
                  </li>
                </ul>
              </div>
            </div>
            <!-- column -->

            <div class="col-lg-6">
            
                </div>
              </div>
            </div>
          </div>
          <!-- ============================================================== -->
          <!-- Recent comment and chats -->
          <!-- ============================================================== -->
        </div>
     <!-- Bootstrap JavaScript -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
  <!-- Your custom JavaScript -->
  <script>
    // Fetch student counts from PHP endpoint and update progress bars
    function fetchData() {
      fetch('../process/departrole.php')
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
<?php 
include("../include/footer.inc.php");
?>