$(document).ready(function () {
    function showForm(block, slot) {
        $("#registerForm").fadeIn(500).css("display", "flex");
        $("#slotInfo").text(`Register for Block ${block}, Slot ${slot}`);
        $("#slotBlock").val(block);
        $("#slotNumber").val(slot);
    }

    function startCountdown(timerElement, endTime, slotElement, block, slot) {
        let endTimeMs = new Date(endTime).getTime(); // Convert PHP time to JavaScript time
        let nowMs = new Date().getTime();
        
        console.log(`Debug: Slot ${slot} in Block ${block} -> End Time (UTC+8): ${endTime}, Converted: ${endTimeMs}`);
    
        let timerId = setInterval(function () {
            let now = new Date().getTime();
            let distance = endTimeMs - now;
    
            console.log(`Debug: Now (Malaysia Time) = ${new Date().toLocaleString("en-US", { timeZone: "Asia/Kuala_Lumpur" })}, Distance = ${distance}`);
    
            if (distance > 0) {
                let minutes = Math.floor(distance / (1000 * 60));
                let seconds = Math.floor((distance % (1000 * 60)) / 1000);
                timerElement.html(`${minutes}m ${seconds}s ⏳`);
            } else {
                clearInterval(timerId);
                timerElement.html("🔴 Expired");
    
                // Auto-bar the slot when time expires
                $.ajax({
                    url: "auto_bar.php",
                    type: "POST",
                    data: { block: block, slot: slot },
                    success: function (response) {
                        console.log(`Debug: Auto-bar response for Slot ${slot}: ${response}`);
                        if (response === "barred") {
                            slotElement.removeClass("occupied").addClass("barred").html("🚫 Barred");
                        }
                    }
                });
            }
        }, 1000);
    }
    

    // Start countdown for all occupied slots
    $(".slot.occupied").each(function () {
        let timerElement = $(this).find(".timer");
        let endTime = $(this).attr("data-end-time");
    
        if (endTime) {
            let timestamp = new Date(endTime).getTime(); // Convert to timestamp
            startCountdown(timerElement, timestamp, $(this));
        }
    });

    // Handle slot click
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

    // Handle form submission
    $("#registerParkingForm").submit(function (event) {
        event.preventDefault();
        $.ajax({
            url: "reserve_slot.php",
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
