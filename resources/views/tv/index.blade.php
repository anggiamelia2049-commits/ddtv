<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Display TV - Dian Didaktika</title>

    <script src="https://cdn.tailwindcss.com"></script>

    <style>
        html,
        body {
            height: 100vh;
            margin: 0;
            padding: 0;
            overflow: hidden;
            background-color: #d0d8de;
            color: #ffffff;
            font-family: sans-serif;
        }

        .wrapper {
            display: flex;
            flex-direction: column;
            height: 100vh;
            padding: 20px 20px 70px 20px;
            box-sizing: border-box;
        }

        .tumpul-21 {
            border-radius: 21px !important;
            overflow: hidden;
        }

        .main-content {
            flex: 1;
            display: flex;
            gap: 20px;
            min-height: 0;
        }

        .video-box {
            position: relative;
            width: 100%;
            height: 100%;
            background: #000;
        }

        .video-box video {
            width: 100%;
            height: 100%;
            object-fit: cover;
            display: block;
        }

        .bg-card-sholat {
            background: #18385c;
            border: 1px solid rgba(255, 255, 255, 0.1);
            box-shadow: 0 10px 15px -3px rgba(1, 51, 98, 0.6);
        }

        .marquee-bg {
            background: linear-gradient(270deg, #46b1f8, #09b1bd, #0f5392);
            background-size: 400% 400%;
            animation: gradientMove 8s ease infinite;
        }

        @keyframes gradientMove {
            0% {
                background-position: 0% 50%;
            }

            50% {
                background-position: 100% 50%;
            }

            100% {
                background-position: 0% 50%;
            }
        }

        .marquee {
            overflow: hidden;
            width: 100%;
            position: relative;
        }

        .marquee-track {
            display: flex;
            width: max-content;
            animation: jalan 10s linear infinite;
        }

        .marquee-track span {
            white-space: nowrap;
            padding-right: 150px;
            font-size: 20px;
            font-weight: bold;
            color: white;
        }

        @keyframes jalan {
            0% {
                transform: translateX(0);
            }

            100% {
                transform: translateX(-33.333%);
            }
        }

        /* === PRAYER GLOW ANIMATION === */
        .bg-card-sholat {
            transition: transform 0.3s ease, box-shadow 0.3s ease, border-color 0.3s ease, background 0.3s ease;
        }

        .bg-card-sholat.active-glow {
            background: #1a4a7a !important;
            box-shadow: 0 0 22px rgba(9, 177, 189, 0.8), 0 10px 15px -3px rgba(1, 51, 98, 0.6) !important;
            border-color: rgba(9, 177, 189, 0.8) !important;
            transform: translateY(-4px) scale(1.05);
        }

        .bg-card-sholat.active-glow .text-blue-200 {
            color: #bef0ff !important;
        }
    </style>
</head>

<body>

    <div class="wrapper">
        <div class="main-content">
            @if ($Banner)
                <!-- banner-->
                <div class="w-full h-full">
                    <div class="w-full h-full object-cover">
                        <img src="{{ asset('storage/' . $Banner->image) }}" class="w-full h-full object-contain">
                    </div>
                </div>
            @else
                <!-- VIDEO -->
                <div class="{{ $flyers->isNotEmpty() ? 'w-3/4' : 'w-full' }} h-full transition-all duration-500">
                    <div class="bg-[#9BAEC0] video-box tumpul-21 shadow-2xl overflow-hidden aspect-video">
                        @if ($videos)
                            <video autoplay controls loop preload="auto" class="w-full h-full object-cover">
                                <source src="{{ asset('storage/' . $videos->video_file) }}" type="video/mp4">
                            </video>
                        @endif
                    </div>
                </div>
                <!-- FLYER (hanya kalau ada) -->
                @if ($flyers->isNotEmpty())
                    <div class="w-1/4 h-full flex items-center justify-center">
                        <div class="w-full h-full rounded-3xl flex items-center justify-center p-4">
                            <div class="w-full h-full bg-[#b1c2cf] rounded-3xl p-4 flex flex-col gap-4 overflow-hidden">
                                @foreach ($flyers->take(2) as $flyer)
                                    <div
                                        class="flex-1 min-h-0 flex items-center justify-center rounded-2xl overflow-hidden">
                                        <img src="{{ asset('storage/' . $flyer->image) }}"
                                            class="max-h-full max-w-full object-contain rounded-2xl">
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                @endif
            @endif
        </div>

        <!-- SHOLAT -->
        <div class="grid grid-cols-7 gap-3 mt-8">
            @php
                $sholat = [
                    ['n' => 'Subuh', 't' => $prayer->subuh ?? '--:--'],
                    ['n' => 'Dhuha', 't' => $prayer->dhuha ?? '--:--'],
                    ['n' => 'Dzuhur', 't' => $prayer->dzuhur ?? '--:--'],
                    ['n' => 'Ashar', 't' => $prayer->ashar ?? '--:--'],
                    ['n' => 'Maghrib', 't' => $prayer->maghrib ?? '--:--'],
                    ['n' => 'Isya', 't' => $prayer->isya ?? '--:--'],
                    ['n' => 'Dzikir&Tadarus', 't' => $prayer->dzikirtadarus ?? '--:--'],
                ];
            @endphp
            @foreach ($sholat as $s)
                <div class="bg-card-sholat tumpul-21 p-4 text-center" id="pcard-{{ $loop->index }}">
                    <p class="text-[10px] uppercase font-bold text-blue-200 tracking-wider">{{ $s['n'] }}</p>
                    <p class="text-2xl font-black mt-0">{{ $s['t'] }}</p>
                </div>
            @endforeach

        </div>
    </div>

    <!-- MARQUEE -->
    <div class="fixed bottom-0 left-0 w-full h-[48px] bg-[#081624] flex items-center z-50">
        <div class="bg-[#0d2137] h-full px-10 flex flex-col justify-center text-center min-w-[280px]">
            <div id="live-clock" class="text-xl font-bold">00:00:00</div>
            <div id="live-date" class="text-xs text-blue-400">-- --- ----</div>
        </div>

        <div class="flex-grow h-full flex items-center marquee-bg">
            <div class="marquee">
                <div class="marquee">
                    <div class="marquee-track">
                        <span>{{ $marquee->text_content ?? '' }}</span>
                        <span>{{ $marquee->text_content ?? '' }}</span>
                        <span>{{ $marquee->text_content ?? '' }}</span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        // Clock
        function updateTime() {
            const now = new Date();
            const options = {
                weekday: 'long',
                day: 'numeric',
                month: 'long',
                year: 'numeric'
            };
            document.getElementById('live-clock').innerText = now.toLocaleTimeString('id-ID', {
                hour12: false
            });
            document.getElementById('live-date').innerText = now.toLocaleDateString('id-ID', options);

        }

        setInterval(updateTime, 1000);
        updateTime();

        // Prayer Animation
        (function() {
            const total = {{ count($sholat) }};
            let current = 0,
                prev = -1;

            function showNext() {
                if (prev >= 0) document.getElementById('pcard-' + prev)?.classList.remove('active-glow');
                document.getElementById('pcard-' + current)?.classList.add('active-glow');
                prev = current;
                current = (current + 1) % total;
            }

            showNext();
            setInterval(showNext, 3000);
        })();
    </script>

</body>

</html>
