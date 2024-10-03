<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User View</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Baloo+2&display=swap">
    <style>
        body {
            font-family: "Baloo 2", cursive;
            margin: 0;
            padding: 0;
            background-color: #f0f4f8;
            color: #333;
            overflow: hidden; /* Prevent scrolling */
        }

        header {
            background-color: #263C51;
            color: #fff;
            padding: 20px;
            text-align: center;
            position: fixed;
            width: 100%;
            z-index: 1000;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.2);
        }

        h1 {
            margin: 0;
            font-size: 2.5rem;
            text-transform: uppercase;
        }

        main {
            display: flex;
            height: 100vh; /* Full viewport height */
            overflow: hidden; /* Prevent scrolling */
        }

        .success-message {
            background-color: #dff0d8;
            color: #3c763d;
            padding: 10px;
            border-radius: 5px;
            margin: 20px;
            text-align: center;
        }

        .slider {
            display: flex;
            flex-direction: column; /* Vertical layout */
            height: 100vh; /* Full height for slider */
            overflow-y: auto; /* Enable vertical scrolling */
            scroll-behavior: smooth; /* Smooth scrolling */
            padding-right: 20px; /* Space for scrollbar */
        }

        .card {
                min-height: 100vh; /* Full height for each card */
                display: flex;
                flex-direction: row; /* Change to column for better layout */
                justify-content: center; /* Center content vertically */
                align-items: center; /* Center content horizontally */
                border: 1px solid #e5e7eb;
                border-radius: 10px;
                margin: 20px; /* Add margin around the card */
                transition: background-color 0.3s;
                scroll-snap-align: start; /* Align each card on scroll */
                overflow: hidden; /* Prevent overflow */
            }


        .entry-content {
            padding: 2rem;
            flex: 1;
            display: flex;
            flex-direction: column;
            justify-content: center; /* Center content vertically */
        }

        .postcard__title {
            font-size: 2rem; /* Adjusted size for full-screen */
            margin-bottom: 0.5rem;
            color: #263C51;
        }

        .postcard__preview-txt {
            margin-bottom: 1rem;
            line-height: 1.6;
            color: #4b5563; /* Gray text color */
        }

        .a-link {
            display: inline-block;
            margin-top: 10px;
            padding: 10px 20px;
            background-color: #20B4E3;
            color: #fff;
            border-radius: 5px;
            text-decoration: none;
            transition: background-color 0.3s;
        }

        .a-link:hover {
            background-color: #263C51;
        }

        /* Dots */
        .dots {
            position: fixed;
            right: 20px; /* Align to the right */
            top: 50%; /* Center vertically */
            transform: translateY(-50%); /* Adjust to center */
            display: flex;
            flex-direction: column; /* Vertical alignment */
            gap: 5px; /* Space between dots */
        }

        .dot {
            width: 10px;
            height: 10px;
            background-color: #bbb;
            border-radius: 50%;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .dot.active {
            background-color: #263C51;
        }

        /* Image styling */
       /* Image styling */
        img {
            transform: rotate(-10deg) skew(-10deg);
            width: 30%; /* Adjust width to make it smaller */
            height: auto; /* Maintain aspect ratio */
            object-fit: cover; /* Maintain aspect ratio */
            border-top-right-radius: 10px; /* Rounded corners */
            border-bottom-right-radius: 10px; /* Rounded corners */
            transition: transform 0.5s ease; /* Transition effect */
            margin: 10px; /* Add margin for spacing */
            animation: up-and-down 3s infinite; /* Infinite animation */
        }


        @keyframes up-and-down {
    0%, 100% {
        margin-top: 0;
    }
    50% {
        margin-top: -5px; /* Adjust the distance for up-and-down effect */
            }
        }

        img {
            animation: up-and-down 3s infinite; /* Infinite animation */
        }

        img:hover {
            transform: scale(1.05); /* Scale effect on hover */
        }
    </style>
</head>
<body>
    <header>
        <h1>Submitted Entries</h1>
    </header>

    <main>
        @if(session('success'))
            <div class="success-message">{{ session('success') }}</div>
        @endif

        <div class="slider" id="slider">
        @foreach($entries as $entry)
            <a href="{{ $entry->link }}" class="card" style="background-color: {{ $entry->background_color }};">
                <div class="entry-content">
                    <h2 class="postcard__title">{{ $entry->name }}</h2>
                    <p class="postcard__preview-txt">{{ $entry->description }}</p>
                        
                        
                        @if($entry->video)
                            <div class="video-card">
                                <p>Video:</p>
                                @if (strpos($entry->video, 'youtube.com') !== false)
                                    <iframe width="300" height="200" src="https://www.youtube.com/embed/{{ basename($entry->video) }}" frameborder="0" allowfullscreen></iframe>
                                @elseif (strpos($entry->video, 'vimeo.com') !== false)
                                    <iframe width="300" height="200" src="https://player.vimeo.com/video/{{ basename($entry->video) }}" frameborder="0" allowfullscreen></iframe>
                                @else
                                    <video controls width="300">
                                        <source src="{{ $entry->video }}" type="video/mp4">
                                        Your browser does not support the video tag.
                                    </video>
                                @endif
                            </div>
                        @endif
                    </div>
                    @if($entry->image)
                        <img src="{{ asset('storage/' . $entry->image) }}" alt="{{ $entry->name }}">
                    @endif
                </a>
            @endforeach
        </div>

        <div class="dots" id="dots"></div>
    </main>

    <script>
        const cards = document.querySelectorAll('.card');
        const dotsContainer = document.getElementById('dots');
        let currentIndex = 0;

        // Create dots
        cards.forEach((_, index) => {
            const dot = document.createElement('div');
            dot.classList.add('dot');
            dot.addEventListener('click', () => {
                currentIndex = index;
                updateSlider();
            });
            dotsContainer.appendChild(dot);
        });

        const updateSlider = () => {
            const slider = document.getElementById('slider');
            slider.scrollTo({
                top: currentIndex * slider.clientHeight,
                behavior: 'smooth'
            });

            // Update dots
            dotsContainer.querySelectorAll('.dot').forEach((dot, index) => {
                dot.classList.toggle('active', index === currentIndex);
            });
        };

        // Automatic sliding
        const autoSlide = setInterval(() => {
            currentIndex = (currentIndex + 1) % cards.length;
            updateSlider();
        }, 3000); // Change card every 3 seconds

        // Optional: Stop sliding on mouse enter
        dotsContainer.addEventListener('mouseenter', () => clearInterval(autoSlide));
        dotsContainer.addEventListener('mouseleave', () => {
            setInterval(autoSlide, 3000);
        });

        // Initialize the slider
        updateSlider();
    </script>
</body>
</html>
