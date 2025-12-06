<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>{{ $title ?? 'Influentia' }}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    {{-- Tailwind via CDN (for dev; later you can switch to Vite/Tailwind build) --}}
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        primary: '#6D35FF',
                        primaryLight: '#E4D8FF',
                        primaryDark: '#4C22C5',
                        accent: '#FF72C6',
                        softGray: '#F5F5FB',
                    }
                }
            }
        }
    </script>
</head>
<body class="min-h-screen bg-gradient-to-br from-[#faf7ff] via-[#f6f7ff] to-[#f9fbff] text-slate-800">

    {{-- Top nav --}}
    <header class="w-full border-b border-slate-100 bg-white/60 backdrop-blur-sm">
        <div class="max-w-6xl mx-auto flex items-center justify-between py-4 px-4 lg:px-0">
            <div class="flex items-center gap-2">
                <div class="h-8 w-8 rounded-xl bg-primary flex items-center justify-center text-white text-xs font-bold">
                    <span>∞</span>
                </div>
                <span class="font-semibold text-slate-800 text-lg">Influentia</span>
            </div>
        </div>
    </header>

    {{-- Main content --}}
    <main class="max-w-6xl mx-auto px-4 lg:px-0 py-10 lg:py-14">
        {{ $slot }}
    </main>

</body>
</html>
