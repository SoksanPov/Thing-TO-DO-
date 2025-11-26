<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Thing TO DO</title>
<script src="https://cdn.tailwindcss.com"></script>
<script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
</head>
<body class="bg-gray-100 font-sans">

<!-- Header -->
<header class="fixed top-0 left-0 w-full z-50 backdrop-blur-md bg-gray-200/70 shadow-md py-3 px-6 flex items-center gap-4">
    <div class="flex flex-col items-center">
        <img src="{{ asset('images/logo.jpg') }}" alt="Logo" class="h-16 w-16 rounded-full border-2 border-white shadow-md transition-transform hover:scale-110">

        <div class="flex space-x-1 mt-1">
            @for ($i = 0; $i < 5; $i++)
                <svg xmlns="http://www.w3.org/2000/svg" fill="#FBBF24" viewBox="0 0 24 24" class="w-4 h-4 animate-pulse">
                    <path d="M12 .587l3.668 7.431L24 9.753l-6 5.847 1.416 8.26L12 19.771l-7.416 4.089L6 15.6 0 9.753l8.332-1.735z"/>
                </svg>
            @endfor
        </div>
    </div>

    <div>
        <h1 class="text-2xl md:text-3xl font-bold text-gray-800">SOMADEVI ANGKOR RESORT & SPA</h1>
        <p class="text-gray-600 text-sm md:text-base">Discover exciting activities and events!</p>
    </div>
</header>

<div class="container mx-auto pt-32 pb-10" 
     x-data="{
        openModal: false,
        selectedEvent: {}
     }">

    <!-- Page Title -->
    <h1 class="text-4xl font-bold text-center mb-10 text-gray-800">THINGS TO DO IN SIEM REAP</h1>

    <!-- Event Grid -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
        @foreach($events as $event)
        <div class="bg-white shadow-lg rounded-lg overflow-hidden hover:scale-105 hover:shadow-2xl transition duration-300">
            <img src="{{ asset('images/'.$event['image']) }}" alt="{{ $event['title'] }}" class="w-full h-56 object-cover">

            <div class="p-4">
                <h2 class="text-xl font-semibold text-center mb-3">{{ $event['title'] }}</h2>

                <div class="flex justify-center">
                    {{-- <button 
                        @click="
                            selectedEvent = {{ json_encode($event) }};
                            selectedEvent.note = '{{ $event['duration'] ?? '' }} {{ $event['price'] ?? '' }}';
                            openModal = true;
                        "
                        class="bg-gray-100 text-gray-800 px-6 py-3 rounded-lg shadow-md shadow-gray-400/40
                               hover:shadow-xl hover:translate-y-[-2px] transition-all duration-200 
                               active:translate-y-1 active:shadow-inner">
                        View Details
                    </button> --}}
                    <button 
                    @click="
                        selectedEvent = {{ json_encode($event) }};
                        selectedEvent.note = '{{ $event['duration'] ?? '' }} {{ $event['price'] ?? '' }}';
                        openModal = true;
                    "
                    class="px-6 py-3 rounded-xl bg-white text-[#b68b75] font-semibold 
                        border border-[#c7a495]
                        shadow-[0_0_15px_rgba(198,167,149,0.25)]
                        hover:bg-[#b68b75] hover:text-white hover:shadow-[0_0_25px_rgba(198,167,149,0.45)]
                        hover:scale-[1.05]
                        active:scale-[0.97]
                        transition-all duration-300">

                    View Details
                </button>

                </div>
            </div>
        </div>
        @endforeach
    </div>

    <!-- Popup Modal -->
<div 
    x-show="openModal"
    class="fixed inset-0 flex items-center justify-center bg-black/60 backdrop-blur-sm z-[5000] p-4"
    x-transition>

    <div class="bg-white rounded-xl shadow-2xl w-full 
                max-w-md md:max-w-4xl 
                p-4 md:p-6 
                flex flex-col md:flex-row gap-6 
                overflow-y-auto md:overflow-visible 
                max-h-[90vh] md:max-h-none relative"
         x-data="{
            slide: 0,
            autoSlide() {
                setInterval(() => {
                    if (selectedEvent.images && selectedEvent.images.length > 1) {
                        this.slide = (this.slide + 1) % selectedEvent.images.length;
                    }
                }, 4000);
            }
         }"
         x-init="autoSlide()">

        <!-- FIXED CLOSE BUTTON -->
        <button 
            @click="openModal = false"
            class="absolute top-3 right-3 z-[9999] bg-white/90 hover:bg-white 
                   text-gray-600 hover:text-gray-800 
                   rounded-full p-2 shadow-lg border border-gray-200 backdrop-blur">
            ✕
        </button>

        <!-- LEFT: IMAGE CAROUSEL -->
        <div class="md:w-1/2 w-full">

            <div class="relative w-full h-[230px] sm:h-[320px] overflow-hidden rounded-xl z-[10]">

                <template x-for="(img, index) in selectedEvent.images ?? [selectedEvent.image]" :key="index">
                    <img 
                        :src="'/images/' + img"
                        x-show="slide === index"
                        x-transition:enter="transition ease-in-out duration-500"
                        x-transition:enter-start="opacity-0 scale-105"
                        x-transition:enter-end="opacity-100 scale-100"
                        x-transition:leave="transition ease-in-out duration-500"
                        x-transition:leave-start="opacity-100 scale-100"
                        x-transition:leave-end="opacity-0 scale-95"
                        class="w-full h-64 md:h-full object-cover rounded-lg shadow absolute inset-0 pointer-events-none">
                </template>

                <!-- NAV BUTTONS -->
                <button 
                    @click="slide = (slide === 0 ? (selectedEvent.images?.length - 1) : slide - 1)"
                    class="absolute left-2 top-1/2 -translate-y-1/2 bg-white/80 px-2 py-1 rounded-full shadow z-[20]">
                    ‹
                </button>

                <button 
                    @click="slide = (slide + 1) % (selectedEvent.images?.length || 1)"
                    class="absolute right-2 top-1/2 -translate-y-1/2 bg-white/80 px-2 py-1 rounded-full shadow z-[20]">
                    ›
                </button>

                <!-- DOTS -->
                <div class="absolute bottom-3 left-1/2 -translate-x-1/2 flex space-x-2 z-[20]">
                    <template x-for="(img, index) in selectedEvent.images ?? [selectedEvent.image]" :key="index">
                        <div class="w-3 h-3 rounded-full cursor-pointer"
                             :class="slide === index ? 'bg-white shadow' : 'bg-gray-400'"
                             @click="slide = index"></div>
                    </template>
                </div>
            </div>
        </div>

        <!-- RIGHT: TEXT -->
        <div class="md:w-1/2 w-full flex flex-col">

            <h2 class="text-xl md:text-2xl font-bold mb-2 text-gray-800" x-text="selectedEvent.title"></h2>
            <p class="text-gray-600 font-semibold mb-3" x-text="selectedEvent.note"></p>

            <div class="overflow-y-auto max-h-[40vh] md:max-h-[60vh] pr-1 mb-3">
                <p class="text-gray-700 leading-relaxed" x-text="selectedEvent.description"></p>
            </div>

            <div class="border-t pt-3 mt-auto">
                <h3 class="text-lg font-semibold text-gray-800 mb-3">Contact Available</h3>

                <ul class="text-xs text-gray-500 space-y-1 italic">
                    <li>📞 Hotline Call: (+855) 081 967 666</li>
                    <li>💬 Telegram: t.me/SomadeviResortHotline</li>
                    <li>💚 WhatsApp: wa.me/+85517555337</li>
                    <li>📧 Email: reservations@somadeviangkor.com</li>
                </ul>

                <div class="mt-4 flex flex-wrap gap-3">
                    <a href="tel:+85581967666" 
                       class="bg-gradient-to-r from-[#b99786] to-[#c8a493] text-white px-4 py-2 rounded-lg shadow">
                        Call Now
                    </a>

                    <button 
                        @click="window.open('https://t.me/SomadeviResortHotline?text=' + encodeURIComponent('I am interested in: ' + selectedEvent.title + ' - ' + selectedEvent.note), '_blank')"
                        class="bg-blue-500 text-white px-4 py-2 rounded-lg shadow">
                        Telegram
                    </button>

                    <button 
                        @click="window.open('https://wa.me/85517555337?text=' + encodeURIComponent('I am interested in: ' + selectedEvent.title + ' - ' + selectedEvent.note), '_blank')"
                        class="bg-green-500 text-white px-4 py-2 rounded-lg shadow">
                        WhatsApp
                    </button>

                    <button
                        @click="
                            fetch('{{ route('send.email') }}', {
                                method: 'POST',
                                headers: {
                                    'Content-Type': 'application/json',
                                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                                },
                                body: JSON.stringify({ 
                                    eventTitle: selectedEvent.title, 
                                    note: selectedEvent.note 
                                })
                            })
                            .then(res => res.json())
                            .then(data => { 
                                if(data.success) alert(data.message); 
                            })
                            .catch(() => alert('Error sending email'));
                        "
                        class="bg-red-500 text-white px-4 py-2 rounded-lg shadow">
                        Email
                    </button>
                </div>
            </div>
        </div>

    </div>
</div>



    <!-- Bottom Video Section -->
    <div class="mt-16">
        <h2 class="text-3xl font-bold text-center mb-8 text-gray-800">Our Event Videos</h2>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
            <template x-for="video in ['gYEBkZ7ouqg','NN7RCn0SC4E','t81JtCjtrOA']" :key="video">
                <div class="bg-white shadow-lg rounded-lg overflow-hidden hover:scale-105 transition duration-300">
                    <div class="w-full aspect-video">
                        <iframe 
                            :src="'https://www.youtube.com/embed/' + video" 
                            class="w-full h-full rounded-lg" 
                            frameborder="0" 
                            allowfullscreen>
                        </iframe>
                    </div>
                </div>
            </template>
        </div>
    </div>

</div>
</body>
</html>
