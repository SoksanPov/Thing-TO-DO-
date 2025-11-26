<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EventController extends Controller
{
    public function index()
    {
        $events = [
            [
                'id' => 1,
                'title' => 'SPA PACKAGES',
                // Add multiple images for carousel
                'images' => [
                    'Spa1.jpg',
                    'Spa2.jpg',
                    'Spa3.jpg',
                ],
                'image' => 'Spa Packages 69$.jpg', // thumbnail
                'price' => '69$/140 mins',
                'description' => 'Wonder of Bliss Package (140 minutes) includes Herbal Salt Scrub, Aromatherapy Massage, and Foot Reflexology.
Herbal Salt Scrub helps remove dead skin cells, making the skin soft and smooth while improving blood circulation.
Aromatherapy uses natural oils and floral scents to enhance relaxation and well-being through inhalation.
Foot Reflexology is an ancient healing technique that applies pressure to key points on the feet to balance body systems and relieve tension.'
            ],

            [
                'id' => 2,
                'title' => 'BUFFET DINNER WITH TRANDITIONAL DANCE SHOW',
                'images' => [
                    'Dinner show1.jpg',
                    'Dinner show2.jpg'
                ],
                'image' => 'Denner show.jpg',
                'price' => 'US$35.00/person',
                'description' => 'The Buffet Dinner Show showcases Cambodia’s rich culture through a series of traditional dances. Highlights include the graceful Apsara Dance from the Angkorian era, the Blessing Dance that offers wishes of happiness, and lively performances like the Coconut Shell Dance and Fishing Dance that depict romance and village life. The Golden Mermaid Dance retells the legendary love story of Hanuman and Sovann Maccha. Together, these performances bring Khmer history, mythology, and tradition to life in one unforgettable evening.'
            ],

            [
                'id' => 3,
                'title' => 'KULEN MOUNTAIN AND BENG MEALEA TOUR',
                'images' => [
                    'Kulen1.jpg',
                    'Kulen2.jpg',
                    'Kulen3.jpg',
                    'Kulen4.jpg'
                ],
                'image' => 'Kulen1.jpg',
                'price' => '1-3 People:$165',
                'description' => 'Kulen Mountain & Beng Mealea Tour – Escape the city and explore Phnom Kulen, just 50 km from Siem Reap. Visit the stunning Kulen Waterfall, with calm upper streams and a 20-meter lower cascade perfect for swimming. Then, discover the mysterious and photogenic Beng Mealea Temple hidden deep in the jungle. The tour includes transportation, an English-speaking guide, drinking water, and a cold towel (temple fees and meals not included).'
            ],

            [
                'id' => 4,
                'title' => 'EXPLORE ANGKOR',
                'images' => [
                    'Explore Angkor2.jpg',
                    'Explore Angkor3.jpg',
                    
                ],
                'image' => 'Explore Angkor1.jpg',
                'price' => '1-3 People:$90',
                'description' => 'The Small Tour of Angkor is the perfect way to discover the highlights of Angkor in one day. The route includes world-famous monuments such as Angkor Wat, Bayon, and Ta Prohm, along with impressive sites inside Angkor Thom like the Baphuon, Phimeanakas, and the Terrace of the Elephants. Together, they offer a rich introduction to the grandeur and history of the Khmer Empire.
                    Small Tour (Small Circuit) @ 8:00AM-4:00PM [ Time Flexible ].
                    Service Includes: 
                    . Transportation
                    . English speaking tour guide
                    . Drinking water
                    . Cold Towel
'
            ],

            [
                'id' => 5,
                'title' => 'EXPLORE BANTEAY SREI',
                'images' => [
                    'Explore Banteay Srie1.jpg',
                    'Explore Banteay Srie2.jpg',
                    'Explore Banteay Srie3.jpg',
                ],
                'image' => 'Explore Banteay Srie.jpg',
                'price' => '1-3 People:$105',
                'description' => 'Banteay Srei – The Jewel of Khmer Art
                            Banteay Srei, located about 25 km northeast of Angkor Wat, is a small 10th-century temple famous for its fine carvings and pink sandstone. Known as the “Citadel of Women” or “Citadel of Beauty,” it was built in 967 CE by a Brahmin scholar named Yajnavaraha during King Rajendravarman’s reign and is dedicated to the Hindu god Shiva. The temple features intricate bas-reliefs depicting scenes from Hindu epics and beautifully decorated towers, libraries, and sanctuaries.
                            Service includes: transportation, English-speaking tour guide, drinking water, and cold towel.'
            ],

            [
                'id' => 6,
                'title' => 'KOR KER TEMPLE',
                'images' => [
                    'Koh Ker 1.jpg',
                    'Koh Ker 2.jpg'
                ],
                'image' => 'Koh Ker 1.jpg',
                'price' => '1-3 People:$165',
                'description' => 'Koh Ker, in Preah Vihear province about 120 km from Siem Reap, was the Khmer Empire’s capital in the 10th century under King Jayavarman IV. The site features over 180 temples, including the 36-meter-high Prasat Thom Pyramid, the red sandstone Prasat Krahom, and shrines with giant lingas. Known for its unique sculptures, Koh Ker offers a mysterious glimpse into ancient Khmer art.
                                Includes: transportation, English-speaking guide, water, cold towel.
                                Excludes: temple pass, meals.'
            ],
        ];

        return view('events.index', compact('events'));
    }

    public function show($id)
    {
        return view('events.show', ['id' => $id]);
    }
}
