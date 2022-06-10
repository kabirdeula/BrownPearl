        <!-- Footer -->
        <footer class="sticky-footer bg-white">
            <div class="container">
                <div class="copyright text-center">
                    <span>Copyright &copy; Brown Pearl 2022/05/26 - <?php echo date("Y/m/d");?></span>
                </div>
            </div>
        </footer>
        <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper --> 

</div>
<!-- End of Page Wrapper -->

<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
</a>

<!-- Logout Modal-->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                <button class="close" type="button" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-bs-dismiss="modal">Cancel</button>
                <a class="btn btn-primary" href="./logout.php">Logout</a>
            </div>
        </div>
    </div>
</div>

<!-- Bootstrap core JavaScript-->
<script src="./vendor/jquery/jquery.min.js"></script>
<script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Core plugin JavaScript-->
<script src="./vendor/jquery-easing/jquery.easing.min.js"></script>

<!-- Custom scripts for all pages-->
<script src="./js/app.min.js"></script>

<script>
    $(document).ready( function() {

// With this function we will assemble our clock, 
// calling up whole date and then hours, minutes, 
// and seconds individually.

function displayTime() {
    var currentTime = new Date();
    var hours = currentTime.getHours();
    var minutes = currentTime.getMinutes();
    var seconds = currentTime.getSeconds();


    // Let's set the AM and PM meridiem and 
    // 12-hour format
    var meridiem = "AM";  // Default is AM
    
    // If hours is greater than 12
    if (hours > 12) {
        hours = hours - 12; // Convert to 12-hour format
        meridiem = "PM"; // Keep track of the meridiem
    }
    // 0 AM and 0 PM should read as 12
    if (hours === 0) {
        hours = 12;    
    }


    // If the hours digit is less than 10
    if(hours < 10) {
        // Add the "0" digit to the front
        // so 9 becomes "09"
        hours = "0" + hours;
    }
    // Format minutes and seconds the same way
    if(minutes < 10) {
        minutes = "0" + minutes;
    }        
    if(seconds < 10) {
        seconds = "0" + seconds;
    }

    // This gets a "handle" to the clock div in our HTML
    var clockDiv = document.getElementById('clock');

    // Then we set the text inside the clock div 
    // to the hours, minutes, and seconds of the current time
    clockDiv.innerText = hours + ":" + minutes + ":" + seconds + " " + meridiem;
}

// This runs the displayTime function the first time
displayTime();

// This makes our clock 'tick' by repeatedly
// running the displayTime function every second.
setInterval(displayTime, 1000);

});
</script>