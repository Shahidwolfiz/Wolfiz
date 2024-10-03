<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>User Projects</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <style>
        #myVideo {
            position: fixed;
            right: 0;
            bottom: 0;
            min-width: 100%;
            min-height: 100%;
            z-index: -1; /* Ensure the video stays in the background */
        }

        .content {
            position: relative; /* Change to relative to overlay properly */
            z-index: 1; /* Ensure content appears above the video */
            color: white; /* Optional: change text color */
        }
    </style>
</head>
<body class="bg-gray-100">

    <video autoplay muted loop id="myVideo">
        @if($videos->isNotEmpty())
            @php
                $lastVideo = $videos->last();
            @endphp
            <source src="{{ asset('storage/' . $lastVideo->video) }}" type="video/mp4">
        @else
            <source src="https://www.w3schools.com/html/mov_bbb.mp4" type="video/mp4"> <!-- Placeholder -->
        @endif
        Your browser does not support the video tag.
    </video>

    <div class="content">
        <div class="flex w-11/12 items-center justify-between mx-auto mt-10">
            <ul class="link-list lg:text-6xl text-4xl">
                @foreach ($projects as $project)
                    <li>
                        <a class="__className_e04c4e" href="{{ route('project.show', $project->id) }}">
                            <div style="opacity: 1; will-change: auto;">
                                @foreach (str_split($project->name) as $char)
                                    <span style="display: inline-block; opacity: 1; will-change: auto; transform: none;">{{ $char }}</span>
                                @endforeach
                            </div>
                        </a>
                    </li>
                @endforeach
            </ul>

            <div class="flex items-center justify-end">
                <div class="flex flex-col gap-5">
                    @foreach ($socialIcons as $socialIcon)
                        <a href="{{ $socialIcon->url }}" target="_blank">
                            <img alt="{{ $socialIcon->name }}" loading="lazy" width="20" height="20" decoding="async" class="h-6 cursor-pointer" src="{{ asset('svg/' . strtolower($socialIcon->icon) . '.svg') }}" style="color: transparent;">
                        </a>
                    @endforeach
                </div>
            </div>
        </div>

        <h2 class="mt-10 text-xl font-semibold text-center">Follow Us</h2>
    </div>

</body>
</html>
