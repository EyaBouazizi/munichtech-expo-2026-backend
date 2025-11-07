<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    public function home()
    {
        return view('pages.home');
    }

    public function about()
    {
    return view('pages.about');
    }

    public function eventDetails()
    {
    return view('pages.event-details');
    }

    public function expoZones()
    {
    $zones = [
        ['title' => 'AI Solutions Arena', 'description' => 'Discover AI solutions transforming industries.', 'image' => 'https://dummyimage.com/400x250/cccccc/000000&text=AI+Arena'],
        ['title' => 'Fintech & Blockchain Zone', 'description' => 'Explore financial innovation and blockchain tech.', 'image' => 'https://dummyimage.com/400x250/cccccc/000000&text=Fintech'],
        ['title' => 'Startup & Investor Village', 'description' => 'Connect startups with investors.', 'image' => 'https://dummyimage.com/400x250/cccccc/000000&text=Startup+Village'],
        ['title' => 'Talent & Hiring Hub', 'description' => 'Meet top talent and hiring opportunities.', 'image' => 'https://dummyimage.com/400x250/cccccc/000000&text=Talent+Hub'],
        ['title' => 'Drone & Robotics Arena', 'description' => 'Showcase cutting-edge robotics and drone tech.', 'image' => 'https://dummyimage.com/400x250/cccccc/000000&text=Drones+&+Robotics'],
        ['title' => 'Sell to Germany Pavilion', 'description' => 'Business opportunities in the German market.', 'image' => 'https://dummyimage.com/400x250/cccccc/000000&text=Sell+to+Germany'],
    ];

    return view('pages.expo-zones', compact('zones'));
    }

    public function tickets()
    {
    $tickets = [
        ['type' => 'Expo Visitor Pass', 'price' => 249],
        ['type' => 'General Pass', 'price' => 799],
        ['type' => 'Startup Pass', 'price' => 999],
        ['type' => 'Investor Pass', 'price' => 1499],
        ['type' => 'VIP Executive Pass', 'price' => 2499],
        ['type' => 'Researchers / Students / Job Seekers', 'price' => 99],
    ];

    return view('pages.tickets', compact('tickets'));
    }

    public function sponsors()
    {
    $sponsors = [
        ['level' => 'Title Sponsor', 'price' => '€120000', 'description' => 'Main sponsor with top visibility throughout the event.'],
        ['level' => 'Platinum Sponsor', 'price' => '€75000', 'description' => 'High visibility and priority placement for branding.'],
        ['level' => 'Gold Sponsor', 'price' => '€45000', 'description' => 'Prominent presence in main event zones and materials.'],
        ['level' => 'Silver Sponsor', 'price' => '€25000', 'description' => 'Brand visibility and select promotion opportunities.'],
        ['level' => 'Bronze Sponsor', 'price' => '€12000', 'description' => 'Support the event and gain moderate visibility.'],
        ['level' => 'Track / Arena Sponsor', 'price' => '€20000', 'description' => 'Sponsor a specific track or arena.'],
        ['level' => 'Workshop Host', 'price' => '€8000', 'description' => 'Host a workshop and showcase expertise.'],
        ['level' => 'Startup Support Partner', 'price' => '€5,000–€10,000', 'description' => 'Support startups with moderate branding exposure.'],
    ];

    return view('pages.sponsors', compact('sponsors'));
    }
 
    public function exhibitors()
    {
    $booths = [
        ['type' => 'Startup Pod (2x2m)', 'price' => 5000, 'description' => 'Small booth for startups to showcase their product.'],
        ['type' => 'Growth Booth (3x3m)', 'price' => 10000, 'description' => 'Medium booth for growing companies with more visibility.'],
        ['type' => 'Corporate Showcase (6x6m+)', 'price' => 20000, 'description' => 'Large corporate booth for maximum exposure.'],
    ];

    return view('pages.exhibitors', compact('booths'));
    }

    public function speakers()
    {
    // Placeholder speakers
    $speakers = [
        ['name' => 'John Doe', 'title' => 'AI Specialist', 'topic' => 'Future of AI', 'photo' => 'https://dummyimage.com/200x200/cccccc/000000&text=John+Doe'],
        ['name' => 'Jane Smith', 'title' => 'Blockchain Expert', 'topic' => 'Fintech Innovations', 'photo' => 'https://dummyimage.com/200x200/cccccc/000000&text=Jane+Smith'],
        ['name' => 'Dr. Ahmed Ebada', 'title' => 'Product Manager', 'topic' => 'Startup Ecosystem', 'photo' => 'https://dummyimage.com/200x200/cccccc/000000&text=Ahmed+Ebada'],
    ];

    return view('pages.speakers', compact('speakers'));
    }

    public function workshops()
   {
    $addons = [
        ['name' => 'Expert Masterclass', 'price' => '€199–€499', 'description' => 'Deep-dive sessions with industry experts.'],
        ['name' => 'Product Demo Slot', 'price' => '€999', 'description' => 'Showcase your product to attendees in a dedicated slot.'],
        ['name' => 'Digital Networking Access', 'price' => '€149', 'description' => 'Access online networking platform to meet participants.'],
    ];

    return view('pages.workshops', compact('addons'));
   }


   public function talentHub()
{
    $employers = [
        ['type' => 'Hiring Booth', 'price' => 3000, 'description' => 'Set up a booth to hire top talent.'],
        ['type' => 'Employer Branding', 'price' => 5000, 'description' => 'Promote your company brand to attendees.'],
        ['type' => 'Resume Database', 'price' => 1000, 'description' => 'Access resumes of participants.'],
    ];

    $jobSeekers = [
        ['type' => 'Talent Pass', 'price' => '€49–€99', 'description' => 'Gain access to event and talent networking.'],
    ];

    return view('pages.talent-hub', compact('employers', 'jobSeekers'));
}

   public function agenda()
{
    $agenda = [
        'Day 1' => [
            ['time' => '09:00 - 10:00', 'track' => 'AI', 'session' => 'Opening Keynote'],
            ['time' => '10:15 - 11:15', 'track' => 'Startups', 'session' => 'Pitch Session 1'],
            ['time' => '11:30 - 12:30', 'track' => 'Sustainability', 'session' => 'Green Tech Panel'],
            ['time' => '12:45 - 13:45', 'track' => 'Talent', 'session' => 'Networking Lunch'],
        ],
        'Day 2' => [
            ['time' => '09:00 - 10:00', 'track' => 'AI', 'session' => 'AI & Ethics'],
            ['time' => '10:15 - 11:15', 'track' => 'Startups', 'session' => 'Pitch Session 2'],
            ['time' => '11:30 - 12:30', 'track' => 'Sustainability', 'session' => 'Sustainable Startups'],
            ['time' => '12:45 - 13:45', 'track' => 'Talent', 'session' => 'Career Fair'],
        ],
    ];

    return view('pages.agenda', compact('agenda'));
}

   public function contact()
{
    return view('pages.contact');
}



}
