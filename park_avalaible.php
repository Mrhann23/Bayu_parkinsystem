<?php
include "connection.php";

date_default_timezone_set('Asia/Kuala_Lumpur'); // Set timezone to Malaysia

include "connection.php";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $block = $_POST['block'];
    $slot = $_POST['slot'];
    $name = $_POST['name'];
    $plate = $_POST['plate'];
    $duration = $_POST['duration'];

    // Get current time in Malaysia time zone
    $current_time = date("Y-m-d H:i:s"); 
    $end_time = date("Y-m-d H:i:s", strtotime("+$duration minutes"));

    $query = "UPDATE parking_slots SET occupied=1, name='$name', plate='$plate', duration='$duration', end_time='$end_time' WHERE block='$block' AND slot_number='$slot'";
    
    if (mysqli_query($conn, $query)) {
        echo "success";
    } else {
        echo "error";
    }
    exit();
}

// Fetch current time for debugging
$current_time_debug = date("Y-m-d H:i:s");
echo "<script>console.log('PHP Current Time: $current_time_debug');</script>";




// Fetch count of available, occupied, and barred slots
$countQuery = "SELECT 
            SUM(CASE WHEN occupied = 0 AND barred = 0 THEN 1 ELSE 0 END) AS available,
            SUM(CASE WHEN occupied = 1 THEN 1 ELSE 0 END) AS occupied,
            SUM(CASE WHEN barred = 1 THEN 1 ELSE 0 END) AS barred
          FROM parking_slots";

$countResult = mysqli_query($conn, $countQuery);
$data = mysqli_fetch_assoc($countResult);

$available = $data['available'];
$occupied = $data['occupied'];
$barred = $data['barred'];
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <title>Resident Parking</title>
    <link rel="stylesheet" href="park.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
    $(document).ready(function () {
        function showForm(block, slot) {
            $("#registerForm").fadeIn(500).css("display", "flex");
            $("#slotInfo").text(`Register for Block ${block}, Slot ${slot}`);
            $("#slotBlock").val(block);
            $("#slotNumber").val(slot);
        }

        
        function startCountdown() {
    document.querySelectorAll("[id^=timer_]").forEach(function (timer) {
        let endTime = new Date(timer.getAttribute("data-end")).getTime();
        let timerId = setInterval(function () {
            let now = new Date().getTime();
            let distance = endTime - now;
            if (distance <= 0) {
                let minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
                let seconds = Math.floor((distance % (1000 * 60)) / 1000);
                timer.innerHTML = `${minutes}m ${seconds}s ⏳`; 
            } else {
                let minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
                let seconds = Math.floor((distance % (1000 * 60)) / 1000);
                timer.innerHTML = `${minutes}m ${seconds}s ⏳`;
            }
        }, 1000);
    });
}

        $(".slot").click(function () {
            let block = $(this).data("block");
            let slot = $(this).data("slot");
            if ($(this).hasClass("occupied")) {
                alert("This slot is already occupied.");
            } else if ($(this).hasClass("barred")) {
                alert("This slot is temporarily closed.");
            } else {
                showForm(block, slot);
            }
        });

        $("#registerParkingForm").submit(function (event) {
            event.preventDefault();
            $.ajax({
                url: "",
                type: "POST",
                data: $(this).serialize(),
                success: function (response) {
                    if (response === "success") {
                        alert("Parking slot reserved successfully!");
                        location.reload();
                    } else {
                        alert("Reservation failed. Try again!");
                    }
                }
            });
        });
    });
    </script>
</head>
<body>
    <!-- Navigation Bar -->
    <nav class="navbar">
        <div class="logo-container">
            <img src="image/logo1.png" alt="Logo">
       
        </div>
        <ul class="nav-links">
            <li><a href="home.php">Home</a></li>
            <li><a href="about.php">About Us</a></li>
            <li><a href="Park.php">Parking</a></li>
            <li><a href="faq.php">FAQ</a></li>
            <li><a href="feedback.php">Feedback</a></li>
            <li><a href="login.php">Resident</a></li>
        </ul>
    </nav>


<!-- Digital Parking Board -->
<div class="digital-board">
    <div class="board-title">Live Parking Status</div>
    <div class="board-numbers">
        <div class="available-count">
            <span class="update-number" id="available"><?php echo $available; ?></span>
            <br>Available
        </div>
        <div class="occupied-count">
            <span class="update-number" id="occupied"><?php echo $occupied; ?></span>
            <br>Occupied
        </div>
        <div class="barred-count">
            <span class="update-number" id="barred"><?php echo $barred; ?></span>
            <br>Barred
        </div>
    </div>
</div>

<?php
$query = "SELECT * FROM parking_slots ORDER BY block, slot_number";
$result = mysqli_query($conn, $query);
$parking_spots = [];
while ($row = mysqli_fetch_assoc($result)) {
    $parking_spots[$row['block']][$row['slot_number']] = $row;
}
?>
<?php foreach ($parking_spots as $block => $slots) { ?>
    <h3 class="block-title">Block <?php echo $block; ?></h3>
    <div class="block-container">
    <?php foreach ($slots as $slot_id => $slot) {
        $class = $slot['barred'] ? 'barred' : ($slot['occupied'] ? 'occupied' : 'available'); 
        $endTime = $slot['end_time']; // Fetch end_time
        ?>
        
        <div class="slot <?php echo $class; ?>" 
     data-block="<?php echo $block; ?>" 
     data-slot="<?php echo $slot_id; ?>" 
     data-end-time="<?php echo $endTime; ?>">
    Slot <?php echo $slot_id; ?><br>
    
    <?php if ($slot['occupied']) { ?>
        🛑 Taken <br>
        <span class="timer" data-end-time="<?php echo $endTime; ?>">⏳ Loading...</span>
        
    <?php } else { ?>
        ✅ Available
    <?php } ?>
</div>

    <?php } ?>
    </div>
<?php } ?>



<div id="registerForm" class="parking-form-container" style="display:none;">
    <div class="form-content">
        <h2 id="slotInfo"></h2>
        <form id="registerParkingForm">
            <input type="hidden" id="slotBlock" name="block">
            <input type="hidden" id="slotNumber" name="slot">
            <label>Name:</label>
            <input type="text" name="name" required>
            <label>Plate Number:</label>
            <input type="text" name="plate" required>
            <label>Duration (minutes):</label>
            <input type="number" name="duration" required>
            <button type="submit">Reserve</button>
        </form>
        <button onclick="$('#registerForm').fadeOut(500);">Close</button>
    </div>
</div>

</body>
</html>
<script src="PARK.js"></script>