<!-- resources/views/admin.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <style>
      body, html {
                height: 100%;
                margin: 0;
                font-family: Arial, sans-serif;
                background-color: #f8f9fa; /* Light background color */
                background-image: url("{{ asset('images/img.avif') }}"); 
                background-size: cover; /* Ensure the image covers the entire area */
                background-position: center; /* Center the image */
                display: flex;
                flex-direction: column;
            }

        .header {
            /* width: 100%; */
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 20px;
            background-color: #103B99;
            color: white;
            flex-wrap: nowrap;
            flex-direction: row-reverse;
        }
        .logo {
            height: 80px; /* Logo height */
        }
        .title {
            font-size: 1.5rem;
            margin: 0;
        }
        .welcome-message {
            text-align: center;
            margin-top: 20px;
            font-size: 1.2rem;
            color: #333;
        }
        .container {
            text-align: center;
            margin-top: 20px;
            background: white;
            border-radius: 8px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            padding: 20px;
            width: 90%;
            max-width: 600px;
            margin-left: auto;
            margin-right: auto;
        }
        .dropdown {
            margin-left: 33%;
            background: #103B99;
            color: #fff;
            cursor: pointer;
            height: 50px;
            line-height: 50px;
            position: relative;
            width: 200px;
            text-align: center;
            z-index: 1;
            transform: perspective(1000px);
            box-shadow: 0 2px 2px 0 rgba(0, 0, 0, 0.14), 
                        0 3px 1px -2px rgba(0, 0, 0, 0.12), 
                        0 1px 5px 0 rgba(0, 0, 0, 0.2);
        }
        .dropdown-menu {
            width: 100%;
            background-color: #fff;
            list-style-type: none;
            margin: 0;
            padding: 0;
            position: absolute;
            left: 0;
            opacity: 0;
            text-align: center;
            top: 100%; /* Show below the dropdown */
            visibility: hidden;
            z-index: 99999;
        }
        .dropdown-menu a {
            color: #000;
            display: inline-block;
            width: 100%;
            text-decoration: none;
            transition: all 0.3s;
            /* padding: 12px 16px; Padding for links */
        }
        .dropdown-menu a:hover {
            background: black;
            color: #fff;
        }
        .dropdown:hover .dropdown-menu {
            opacity: 1;
            visibility: visible;
            transition: all .5s;
        }
        .headline-container {
            text-align: center;
        }
        .headline {
            font-size: 3rem;
            position: relative;
            overflow: hidden;
        }
        .headline-text {
            display: block;
        }
        .dynamic-text {
            display: none;
            top: 0;
            left: 0;
            opacity: 0;
            transition: opacity 0.5s ease-in-out;
        }
        .footer {
            position: fixed;
            bottom: 0;
            left: 0;
            width: 100%;
            background: #263238;
            text-align: center;
            color: #f4f4f4;
        }
        .icons {
            padding-top: 1rem;
        }
        .icons a {
            text-decoration: none;
            font-size: 2rem;
            margin: 0.5rem;
            color: #f4f4f4;
        }
        .company-name {
            font-size: 1.6rem;
            margin-top: 0.5rem;
        }
        @media (max-width: 500px) {
            html {
                font-size: 50%;
            }
        }
        @media(min-width: 501px) and (max-width: 768px) {
            html {
                font-size: 50%;
            }
        }
        .rotating {
            display: block;
            opacity: 1;
        }
        @keyframes swirl {
            0% { transform: rotate(0); }
            50% { transform: rotate(360deg); }
            100% { transform: rotate(0); }
        }
    </style>
</head>
<body>
    @include('layouts.header')

    <div class="headline-container">
        <h1 class="headline">
            <span class="headline-text">Hi, welcome to Wolfiz<br>Admin Panel<br></span>
            <span class="dynamic-text rotating">Create Project</span>
            <span class="dynamic-text">Add Entries</span>
            <span class="dynamic-text">See Projects</span>
            <span class="dynamic-text">Change Logo</span>
            <span class="dynamic-text">Background Video</span>
        </h1>
    </div>

    <div class="container">
        <div class="dropdown">
            Selections
            <ul class="dropdown-menu" id="dropdownMenu">
                <li><a class="dropdown-item" href="{{ route('admin.projects.create') }}">Create Project</a></li>
                <li><a class="dropdown-item" href="{{ route('entries.create') }}">Add Entries</a></li>
                <li><a class="dropdown-item" href="{{ route('admin.projects.index') }}">See Projects</a></li>
                <li><a class="dropdown-item" href="{{ route('admin.social-icons.index') }}">Change Logo</a></li>
                <li><a class="dropdown-item" href="{{ route('videos.index') }}">Background Video</a></li>
            </ul>
        </div>
    </div>

    @include('layouts.footer')

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const dynamicTexts = document.querySelectorAll('.dynamic-text');
            const colors = ['#FF5733', '#33FF57', '#3357FF', 'blue', '#FF33F6']; // Add your desired colors here
            let currentIndex = 0;

            const changeText = () => {
                dynamicTexts[currentIndex].style.display = 'none';
                currentIndex = (currentIndex + 1) % dynamicTexts.length;
                dynamicTexts[currentIndex].style.display = 'block';
                dynamicTexts[currentIndex].style.opacity = '1';

                // Change color of the currently visible text
                dynamicTexts[currentIndex].style.color = colors[currentIndex % colors.length];

                setTimeout(() => {
                    dynamicTexts[currentIndex].style.opacity = '0';
                }, 2000); // Show for 2 seconds before fading out

                setTimeout(changeText, 3000); // Change every 3 seconds
            };

            changeText();
        });

        // Close dropdown if clicked outside
        document.addEventListener("click", function(event) {
            const dropdown = document.getElementById("dropdownMenu");
            if (!event.target.closest('.dropdown') && dropdown.classList.contains('show')) {
                dropdown.classList.remove('show');
            }
        });
    </script>

</body>
</html>
