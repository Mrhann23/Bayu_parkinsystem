<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Event Schedule - Bayu Parking System</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="Resident.css">
</head>
<body>
<!-- Navigation Bar -->
<header>
    <div class="navbar">
        <div class="logo">
            <img src="image/logo1.png" alt="Logo">
        </div>
        <ul class="nav-links">
            <li><a href="Resident.php">Home</a></li>
            <li><a href="About_resident.php">About</a></li>
            <li><a href="Contact.php">Contact us</a></li>
            <li class="dropdown">
                <a href="#">Services ▼</a>
                <ul class="dropdown-menu">
                    <li><a href="Chatting.php">Community Page</a></li>
                    <li><a href="Event.php">Event Post</a></li>
                    <li><a href="Reserve.php">Reserve Page</a></li>
                    <li><a href="Gallery.php">Gallery Page</a></li>
                    <li><a href="Announcement_resident.php">Announce Page</a></li>
                    
                    
                </ul>
            </li>
            <li><a href="login.php">Log out </a></li>
        </ul>
        <button class="theme-switch" onclick="toggleTheme()">🌙</button>
    </div>
</header>

    <br>
    <br>

    <div class="container py-5">
        <h2 class="text-center">Our Schedule</h2>
        <p class="text-center">Do not miss anything topic about the event</p>

        <div class="row">
            <div class="col-12">
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead class="table-dark">
                            <tr>
                                <th>Image</th>
                                <th>Event</th>
                                <th>Incharge</th>
                                <th>Time</th>
                                <th>Location</th>
                                <th>Register</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><img src="image/e1.jpg" alt="Event 1" class="img-thumbnail" width="100"></td>
                                <td>Zumba Class</td>
                                <td>Mr Ali</td>
                                <td>08:00 am - 10:00 am</td>
                                <td>Bayu Pandan Gym</td>
                                <td><a href="register_event.php?event=Zumba Class" class="btn btn-primary">Register</a></td>
                            </tr>
                            <tr>
                                <td><img src="image/e2.jpeg" alt="Event 2" class="img-thumbnail" width="100"></td>
                                <td>Clean Up Playground</td>
                                <td>Mr Ali</td>
                                <td>08:00 am - 10:00 am</td>
                                <td>Bayu Pandan Playground</td>
                                <td><a href="register_event.php?event=Clean Up Playground" class="btn btn-primary">Register</a></td>
                            </tr>
                            <tr>
                                <td><img src="image/e3.jpg" alt="Event 3" class="img-thumbnail" width="100"></td>
                                <td>Sing A long together</td>
                                <td>Mrs Suraya</td>
                                <td>08:00 am - 10:00 am</td>
                                <td>Bayu Pandan Hall</td>
                                <td><a href="register_event.php?event=Sign A long together" class="btn btn-primary">Register</a></td>
                            </tr>
                            <tr>
                                <td><img src="image/e4.jpg" alt="Event 4" class="img-thumbnail" width="100"></td>
                                <td>Go Green Day</td>
                                <td>Mrs Suraya</td>
                                <td>08:00 am - 10:00 am</td>
                                <td>Bayu Pandan Jaya Condominium </td>
                                <td><a href="register_event.php?event=Go Green Day " class="btn btn-primary">Register</a></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <script src="Resident.js"></script>
</body>
</html>
