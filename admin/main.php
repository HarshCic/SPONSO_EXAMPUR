<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
  <div class="container-fluid">
      <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#menu-toggle" id="menu-toggle"><span class="glyphicon glyphicon-list" aria-hidden="true"></span></a>
      </div>
      <div id="navbar" class="navbar-collapse collapse">
          <ul  class="nav navbar-nav navbar-left">
              <li ><a href="index.php"> Exampur </a></li>
          </ul>
          <ul class="nav navbar-nav navbar-right">
            <li style="float:right;"><a href="#">Admin Panel</a></li>
          </ul>

      </div>
  </div>
</nav>

<div id="wrapper" class="toggled">
  <div class="container-fluid">
      <!-- Sidebar -->
      <div id="sidebar-wrapper">
          <ul class="sidebar-nav">
              <li class="sidebar-brand">
                  <br>
              </li>
              <li>
                  <a href="index.php"><span class="glyphicon glyphicon-home" aria-hidden="true"></span> Dashboard </a>
              </li>
               <li>

                    <a class="dropdown-btn"><span class="glyphicon glyphicon-facetime-video" aria-hidden="true"></span> Featured Video
                       <span class="glyphicon glyphicon-triangle-bottom" aria-hidden="true"></span>
                    </a>
                    <div class="dropdown-container">
                      <a href="featureAdd.php">Add Featured Video</a>
                      <a href="featureEdit.php">Edit Featured Video</a>
                    </div>
              </li>
              <li>

                   <a class="dropdown-btn"><span class="glyphicon glyphicon-bookmark" aria-hidden="true"></span> Exampur Special
                     <span class="glyphicon glyphicon-triangle-bottom" aria-hidden="true"></span>
                   </a>
                   <div class="dropdown-container">
                     <a href="exampuradd.php">Add Exampur Video</a>
                     <a href="exampuredit.php">Edit Exampur Video</a>
                   </div>
             </li>
             <li>

                  <a class="dropdown-btn"><span class="glyphicon glyphicon-upload" aria-hidden="true"></span> Concept
                    <span class="glyphicon glyphicon-triangle-bottom" aria-hidden="true"></span>
                  </a>
                  <div class="dropdown-container">
                    <a href="conceptadd.php">Add Concept</a>
                    <a href="concept.php">Edit Concept</a>
                  </div>
            </li>
            <li>

                 <a class="dropdown-btn"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> Exam
                   <span class="glyphicon glyphicon-triangle-bottom" aria-hidden="true"></span>
                 </a>
                 <div class="dropdown-container">
                   <a href="examadd.php">Add Exam</a>
                   <a href="exam.php">Edit Exam</a>
                 </div>
           </li>
           <li>

                <a class="dropdown-btn"><span class="glyphicon glyphicon-tags" aria-hidden="true"> </span> Subject
                  <span class="glyphicon glyphicon-triangle-bottom" aria-hidden="true"></span>
                </a>
                <div class="dropdown-container">
                  <a href="subjectadd.php">Add Subject</a>
                  <a href="subject.php">Edit Subject</a>
                </div>
          </li>
             <li>
                 <a href="study_material.php"><span class="glyphicon glyphicon-book" aria-hidden="true"></span> Study Material </a>
             </li>
              <li>
                  <a href="help.php"><span class="glyphicon glyphicon-comment" aria-hidden="true"></span> Help Request </a>
              </li>
          </ul>
      </div>
