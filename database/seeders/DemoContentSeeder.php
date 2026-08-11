<?php

namespace Database\Seeders;

use App\Models\Blog;
use App\Models\Course;
use App\Models\CourseCategory;
use App\Models\CourseMode;
use App\Models\Event;
use App\Models\EventCategory;
use App\Models\News;
use App\Models\NewsType;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class DemoContentSeeder extends Seeder
{
    /**
     * Seed ~5 fully-detailed demo entries each for Courses, News, Events, and Blog.
     */
    public function run(): void
    {
        $this->seedCourses();
        $this->seedNews();
        $this->seedEvents();
        $this->seedBlogs();
    }

    protected function seedCourses(): void
    {
        $categories = collect([
            'Digital Marketing',
            'Web Development',
            'AI & Data Science',
            'Graphic Design & UI/UX',
            'Cybersecurity & Networking',
        ])->mapWithKeys(fn ($name) => [$name => CourseCategory::firstOrCreate(
            ['slug' => Str::slug($name)],
            ['name' => $name]
        )->id]);

        $modes = collect(['Online', 'On-Campus', 'Hybrid'])->mapWithKeys(fn ($name) => [$name => CourseMode::firstOrCreate(
            ['slug' => Str::slug($name)],
            ['name' => $name]
        )->id]);

        $courses = [
            [
                'title' => 'Digital Marketing & SEO Complete Course',
                'category' => 'Digital Marketing',
                'mode' => 'Online',
                'duration_weeks' => 12,
                'subtitle' => 'Master SEO, social media marketing, Google Ads, and analytics to grow businesses and build your career.',
                'about' => "<p>This Digital Marketing &amp; SEO Complete Course is designed to take you from beginner to advanced level. You will learn all the essential digital marketing skills including SEO, Social Media Marketing, Google Ads, Email Marketing, Content Marketing, and Web Analytics.</p><p>By the end of this course, you will be able to create and manage successful digital marketing campaigns that drive traffic, generate leads, and increase sales for any business.</p>",
                'what_you_will_learn' => [
                    'Understand Digital Marketing Fundamentals',
                    'Keyword Research & Competitor Analysis',
                    'On-Page & Off-Page SEO Techniques',
                    'Google Ads (Search, Display, YouTube)',
                    'Social Media Marketing Strategies',
                    'Content Marketing & Copywriting',
                    'Email Marketing Automation',
                    'Web Analytics & Reporting',
                ],
                'tools_technology' => ['Google Analytics', 'Google Search Console', 'Google Ads', 'Meta Ads Manager', 'SEMrush', 'Mailchimp'],
                'course_includes' => ['36+ Hours On-Demand Video', '45+ Lectures', 'Assignments & Projects', 'Downloadable Resources', 'Certificate of Completion', 'Access on Mobile & TV'],
                'curriculum' => [
                    ['title' => 'Introduction to Digital Marketing', 'content' => 'Overview of the digital marketing landscape, channels, and how businesses use them to grow.'],
                    ['title' => 'Search Engine Optimization (SEO)', 'content' => 'Keyword research, on-page optimization, technical SEO, and link building fundamentals.'],
                    ['title' => 'Paid Advertising with Google & Meta Ads', 'content' => 'Setting up, targeting, and optimizing paid campaigns across Google and social platforms.'],
                    ['title' => 'Social Media & Content Marketing', 'content' => 'Building a content calendar, copywriting, and growing an engaged audience organically.'],
                    ['title' => 'Analytics, Reporting & Capstone Project', 'content' => 'Reading campaign data, building reports, and presenting a full marketing plan for a real brand.'],
                ],
                'has_certificate' => true,
                'is_featured' => true,
            ],
            [
                'title' => 'Full Stack Web Development (MERN)',
                'category' => 'Web Development',
                'mode' => 'Hybrid',
                'duration_weeks' => 24,
                'subtitle' => 'Build and deploy real-world web applications using MongoDB, Express, React, and Node.js.',
                'about' => '<p>This Full Stack Web Development course takes you from HTML/CSS basics through to building and deploying complete applications with the MERN stack (MongoDB, Express, React, and Node.js).</p><p>You will work on hands-on projects throughout the course, culminating in a capstone application you can add straight to your portfolio.</p>',
                'what_you_will_learn' => [
                    'HTML5, CSS3 & Modern JavaScript (ES6+)',
                    'Responsive UI Development',
                    'Building REST APIs with Node.js & Express',
                    'Database Design with MongoDB',
                    'Front-End Development with React',
                    'Authentication & Authorization',
                    'Deploying Full-Stack Applications',
                    'Git & GitHub Workflow',
                ],
                'tools_technology' => ['VS Code', 'Node.js', 'Express.js', 'React', 'MongoDB', 'Git & GitHub', 'Postman'],
                'course_includes' => ['60+ Hours On-Demand Video', '70+ Lectures', 'Real-World Projects', 'Downloadable Source Code', 'Certificate of Completion', 'Career Mentorship Sessions'],
                'curriculum' => [
                    ['title' => 'Web Fundamentals: HTML, CSS & JavaScript', 'content' => 'Core building blocks of the web, responsive layouts, and JavaScript programming fundamentals.'],
                    ['title' => 'Back-End Development with Node.js & Express', 'content' => 'Building REST APIs, middleware, routing, and connecting to a database.'],
                    ['title' => 'Database Design with MongoDB', 'content' => 'Schema design, queries, and integrating MongoDB with an Express application.'],
                    ['title' => 'Front-End Development with React', 'content' => 'Components, hooks, state management, and consuming APIs in a React application.'],
                    ['title' => 'Authentication, Deployment & Capstone Project', 'content' => 'Securing an application with authentication and deploying a full-stack capstone project.'],
                ],
                'has_certificate' => true,
                'is_featured' => true,
            ],
            [
                'title' => 'AI & Data Science with Python',
                'category' => 'AI & Data Science',
                'mode' => 'Online',
                'duration_weeks' => 16,
                'subtitle' => 'Learn Python, data analysis, machine learning, and generative AI tools to solve real-world problems.',
                'about' => '<p>Build practical skills in artificial intelligence, data science, analytics, Python, and generative AI. Learn how to work with data, uncover meaningful insights, and use modern AI tools to solve real-world problems.</p><p>This course blends theory with hands-on labs so you graduate with a portfolio of data science projects, not just certificates.</p>',
                'what_you_will_learn' => [
                    'Python Programming for Data Science',
                    'Data Cleaning & Exploratory Data Analysis',
                    'Data Visualization with Matplotlib & Seaborn',
                    'Statistics & Probability Fundamentals',
                    'Machine Learning Algorithms',
                    'Introduction to Neural Networks',
                    'Working with Generative AI Tools',
                    'Building a Data Science Portfolio Project',
                ],
                'tools_technology' => ['Python', 'Jupyter Notebook', 'Pandas', 'NumPy', 'Scikit-learn', 'Power BI'],
                'course_includes' => ['48+ Hours On-Demand Video', '55+ Lectures', 'Hands-on Datasets & Labs', 'Downloadable Resources', 'Certificate of Completion', 'Access on Mobile & TV'],
                'curriculum' => [
                    ['title' => 'Python Programming Essentials', 'content' => 'Variables, data structures, functions, and libraries commonly used in data science.'],
                    ['title' => 'Data Analysis with Pandas & NumPy', 'content' => 'Cleaning, transforming, and analyzing real-world datasets.'],
                    ['title' => 'Data Visualization', 'content' => 'Communicating insights clearly with charts, dashboards, and storytelling techniques.'],
                    ['title' => 'Machine Learning Fundamentals', 'content' => 'Supervised and unsupervised learning, model training, and evaluation.'],
                    ['title' => 'Generative AI & Capstone Project', 'content' => 'Using modern AI tools in a workflow and presenting a complete data science project.'],
                ],
                'has_certificate' => true,
                'is_featured' => true,
            ],
            [
                'title' => 'UI/UX & Graphic Designing Masterclass',
                'category' => 'Graphic Design & UI/UX',
                'mode' => 'On-Campus',
                'duration_weeks' => 10,
                'subtitle' => 'Design beautiful, user-friendly interfaces and build a professional design portfolio from scratch.',
                'about' => '<p>This masterclass covers the full design process - from visual design fundamentals to wireframing, prototyping, and usability testing - so you can design products people love to use.</p><p>You will complete multiple real client-style briefs and leave with a polished portfolio ready to show employers or freelance clients.</p>',
                'what_you_will_learn' => [
                    'Design Fundamentals: Color, Typography & Layout',
                    'User Research & Wireframing',
                    'Prototyping in Figma',
                    'Mobile & Web App UI Design',
                    'Design Systems & Style Guides',
                    'Usability Testing Basics',
                    'Building a Design Portfolio',
                ],
                'tools_technology' => ['Figma', 'Adobe Photoshop', 'Adobe Illustrator', 'Canva'],
                'course_includes' => ['30+ Hours On-Demand Video', '38+ Lectures', 'Real Client-Style Briefs', 'Downloadable Templates', 'Certificate of Completion'],
                'curriculum' => [
                    ['title' => 'Design Fundamentals', 'content' => 'Color theory, typography, layout, and visual hierarchy for effective design.'],
                    ['title' => 'User Research & Wireframing', 'content' => 'Understanding users and translating needs into low-fidelity wireframes.'],
                    ['title' => 'Prototyping in Figma', 'content' => 'Building interactive, high-fidelity prototypes ready for testing.'],
                    ['title' => 'UI Design for Web & Mobile', 'content' => 'Designing polished, responsive interfaces for real products.'],
                    ['title' => 'Portfolio Project', 'content' => 'Packaging your best work into a portfolio piece that showcases your process.'],
                ],
                'has_certificate' => true,
                'is_featured' => false,
            ],
            [
                'title' => 'Cybersecurity & Ethical Hacking',
                'category' => 'Cybersecurity & Networking',
                'mode' => 'Hybrid',
                'duration_weeks' => 14,
                'subtitle' => 'Learn network security, ethical hacking, and defensive techniques used by real security professionals.',
                'about' => '<p>Cybersecurity and data science skills are in high demand across industries as organizations increasingly rely on automation and connected systems. This course covers networking fundamentals, common attack techniques, and how to defend against them.</p><p>Labs are conducted in a safe, sandboxed environment so you can practice real techniques without risk.</p>',
                'what_you_will_learn' => [
                    'Networking & Security Fundamentals',
                    'Common Attack Vectors & Threats',
                    'Ethical Hacking Methodology',
                    'Vulnerability Assessment & Penetration Testing Basics',
                    'Web Application Security',
                    'Security Tools & Best Practices',
                    'Incident Response Basics',
                ],
                'tools_technology' => ['Wireshark', 'Nmap', 'Kali Linux', 'Burp Suite', 'Metasploit'],
                'course_includes' => ['34+ Hours On-Demand Video', '40+ Lectures', 'Hands-on Lab Environment', 'Downloadable Resources', 'Certificate of Completion'],
                'curriculum' => [
                    ['title' => 'Networking & Security Fundamentals', 'content' => 'Core networking concepts and the principles behind securing systems.'],
                    ['title' => 'Reconnaissance & Scanning', 'content' => 'Techniques used to gather information and identify vulnerabilities in a target system.'],
                    ['title' => 'Exploitation Basics', 'content' => 'Understanding how common vulnerabilities are exploited, in a controlled lab environment.'],
                    ['title' => 'Web Application Security', 'content' => 'Common web vulnerabilities and how to test for and remediate them.'],
                    ['title' => 'Defensive Security & Capstone', 'content' => 'Building defensive strategies and completing a hands-on security assessment project.'],
                ],
                'has_certificate' => true,
                'is_featured' => false,
            ],
        ];

        foreach ($courses as $data) {
            Course::updateOrCreate(
                ['slug' => Str::slug($data['title'])],
                [
                    'course_category_id' => $categories[$data['category']],
                    'course_mode_id' => $modes[$data['mode']],
                    'title' => $data['title'],
                    'subtitle' => $data['subtitle'],
                    'duration_weeks' => $data['duration_weeks'],
                    'about' => $data['about'],
                    'what_you_will_learn' => $data['what_you_will_learn'],
                    'tools_technology' => $data['tools_technology'],
                    'course_includes' => $data['course_includes'],
                    'curriculum' => $data['curriculum'],
                    'has_certificate' => $data['has_certificate'],
                    'is_featured' => $data['is_featured'],
                ]
            );
        }

        $this->command?->info('Seeded '.count($courses).' courses.');
    }

    protected function seedNews(): void
    {
        $types = collect(['Admissions', 'Events', 'Announcements', 'Achievements', 'Partnerships'])
            ->mapWithKeys(fn ($name) => [$name => NewsType::firstOrCreate(
                ['slug' => Str::slug($name)],
                ['name' => $name]
            )->id]);

        $news = [
            [
                'title' => 'Career Institute Signs Franchise MOU for Kohinoor FSD Branch',
                'type' => 'Announcements',
                'subtitle' => 'A significant milestone as we expand our footprint to Faisalabad, bringing quality education closer to more students.',
                'content' => "<p>We are delighted to announce the signing of a Franchise Memorandum of Understanding (MOU) for our new branch in Kohinoor City, Faisalabad. This partnership marks a significant step in our mission to provide industry-focused education and professional training to students across Pakistan.</p><h4>Expanding Opportunities</h4><p>The new branch will offer a wide range of programs in Digital Marketing, Web Development, Graphic Design, UI/UX Design, Cybersecurity, and more. Our state-of-the-art labs and experienced trainers will ensure that students receive the highest quality education.</p><h4>What This Means for Students</h4><ul><li>Access to top-notch training and modern facilities</li><li>Industry-recognized certifications</li><li>Better career opportunities in Faisalabad and beyond</li><li>Practical learning with real-world projects</li></ul><p>We thank our partners, students, and team members who continue to support our journey. Together, we are shaping a brighter future!</p>",
            ],
            [
                'title' => 'New Batch Admissions Open for Digital Marketing & Web Development',
                'type' => 'Admissions',
                'subtitle' => 'Enrollments are now open for our upcoming batches, with limited seats available at every campus.',
                'content' => '<p>Career Institute is pleased to announce that admissions are now open for the upcoming batches of our Digital Marketing and Web Development programs, starting next month across all campuses.</p><p>Both programs are designed with industry input to ensure graduates are job-ready from day one, combining hands-on projects with mentorship from experienced instructors.</p><h4>How to Apply</h4><p>Interested students can visit their nearest campus or apply online through our admissions portal. Early applicants are eligible for a limited-time scholarship discount.</p>',
            ],
            [
                'title' => 'Career Institute Students Win National Coding Competition',
                'type' => 'Achievements',
                'subtitle' => 'A team of our Web Development students took first place at this year\'s National Collegiate Coding Championship.',
                'content' => "<p>We are proud to share that a team of three students from our Full Stack Web Development program secured first place at the National Collegiate Coding Championship, competing against teams from universities and training institutes across the country.</p><p>The team built a full-stack web application addressing a real community problem within a 24-hour hackathon window, impressing judges with both their technical execution and presentation.</p><p>This achievement reflects the practical, project-based approach at the heart of our training programs, and we couldn't be prouder of our students.</p>",
            ],
            [
                'title' => 'Career Institute Partners with Leading Tech Companies for Job Placements',
                'type' => 'Partnerships',
                'subtitle' => 'New hiring partnerships aim to connect graduating students directly with employers in tech and digital marketing.',
                'content' => '<p>Career Institute has signed hiring partnership agreements with several leading technology and digital marketing companies to provide direct job placement opportunities for our graduating students.</p><h4>What This Means</h4><ul><li>Priority interview opportunities for top-performing graduates</li><li>On-campus recruitment drives each semester</li><li>Internship pathways during the final months of training</li></ul><p>These partnerships are part of our ongoing commitment to not just teaching in-demand skills, but ensuring our graduates can put them to work.</p>',
            ],
            [
                'title' => 'Free Career Counseling Camp Announced Across All Campuses',
                'type' => 'Events',
                'subtitle' => 'Get one-on-one guidance on choosing the right course and career path at our upcoming counseling camps.',
                'content' => '<p>Career Institute will be hosting free career counseling camps at all campus locations this month, offering one-on-one sessions with our academic advisors to help prospective students choose the right course for their goals.</p><p>Whether you\'re a fresh graduate exploring career options or a working professional considering a skill upgrade, our counselors will help you map out a path based on your interests, background, and the current job market.</p><p>No registration fee is required - just walk in during camp hours at your nearest campus.</p>',
            ],
        ];

        foreach ($news as $data) {
            News::updateOrCreate(
                ['slug' => Str::slug($data['title'])],
                [
                    'news_type_id' => $types[$data['type']],
                    'title' => $data['title'],
                    'subtitle' => $data['subtitle'],
                    'content' => $data['content'],
                ]
            );
        }

        $this->command?->info('Seeded '.count($news).' news articles.');
    }

    protected function seedEvents(): void
    {
        $categories = collect(['Workshop', 'Seminar', 'Webinar', 'Career Fair', 'Open House'])
            ->mapWithKeys(fn ($name) => [$name => EventCategory::firstOrCreate(
                ['slug' => Str::slug($name)],
                ['name' => $name]
            )->id]);

        $events = [
            [
                'title' => 'Digital Marketing Free Workshop',
                'category' => 'Workshop',
                'event_date' => now()->addDays(10)->toDateString(),
                'campus' => 'Lahore Wapda Town',
                'venue' => 'Main Auditorium',
                'organizer' => 'Career Institute',
                'description' => '<p>Join us for a hands-on, half-day workshop covering the essentials of digital marketing - SEO, social media, and paid advertising - led by our senior instructors.</p><p>Ideal for beginners exploring a career switch and business owners who want to market their own brand.</p>',
                'is_paid' => false,
                'fee_amount' => null,
                'has_seat_limit' => true,
                'seat_limit' => 50,
            ],
            [
                'title' => 'Web Development Bootcamp Seminar',
                'category' => 'Seminar',
                'event_date' => now()->addDays(20)->toDateString(),
                'campus' => 'Satyana Road, Faisalabad',
                'venue' => 'Seminar Hall, Block B',
                'organizer' => 'Career Institute',
                'description' => "<p>A full-day seminar introducing our Full Stack Web Development curriculum, with live coding demos and a Q&amp;A session with current program mentors.</p><p>Attendees will get a roadmap for breaking into web development, regardless of their current background.</p>",
                'is_paid' => true,
                'fee_amount' => 1000,
                'has_seat_limit' => false,
                'seat_limit' => null,
            ],
            [
                'title' => 'AI & Data Science Webinar',
                'category' => 'Webinar',
                'event_date' => now()->addDays(5)->toDateString(),
                'campus' => 'Kohinoor Branch (Online)',
                'venue' => 'Live Online Session',
                'organizer' => 'Career Institute',
                'description' => '<p>An online session exploring how AI and data science are reshaping industries, and what skills are worth learning right now to future-proof your career.</p><p>Open to students, professionals, and anyone curious about a career in AI.</p>',
                'is_paid' => false,
                'fee_amount' => null,
                'has_seat_limit' => false,
                'seat_limit' => null,
            ],
            [
                'title' => 'Career Institute Job & Career Fair 2026',
                'category' => 'Career Fair',
                'event_date' => now()->addDays(30)->toDateString(),
                'campus' => 'Millat Chowk Branch',
                'venue' => 'Central Exhibition Hall',
                'organizer' => 'Career Institute',
                'description' => '<p>Meet hiring partners from leading tech, marketing, and design companies at our annual Career Fair. Bring your resume and portfolio - on-the-spot interviews will be conducted for shortlisted candidates.</p>',
                'is_paid' => false,
                'fee_amount' => null,
                'has_seat_limit' => true,
                'seat_limit' => 200,
            ],
            [
                'title' => 'Open House - New Campus Inauguration',
                'category' => 'Open House',
                'event_date' => now()->subDays(5)->toDateString(),
                'campus' => 'Jinnah Colony Branch',
                'venue' => 'Campus Main Entrance',
                'organizer' => 'Career Institute',
                'description' => '<p>We celebrated the opening of our newest campus with a guided tour of the facilities, labs, and classrooms, along with refreshments and a short address from our Founder & CEO.</p>',
                'is_paid' => false,
                'fee_amount' => null,
                'has_seat_limit' => false,
                'seat_limit' => null,
            ],
        ];

        foreach ($events as $data) {
            Event::updateOrCreate(
                ['slug' => Str::slug($data['title'])],
                [
                    'event_category_id' => $categories[$data['category']],
                    'title' => $data['title'],
                    'event_date' => $data['event_date'],
                    'campus' => $data['campus'],
                    'venue' => $data['venue'],
                    'organizer' => $data['organizer'],
                    'description' => $data['description'],
                    'is_paid' => $data['is_paid'],
                    'fee_amount' => $data['fee_amount'],
                    'has_seat_limit' => $data['has_seat_limit'],
                    'seat_limit' => $data['seat_limit'],
                ]
            );
        }

        $this->command?->info('Seeded '.count($events).' events.');
    }

    protected function seedBlogs(): void
    {
        $blogs = [
            [
                'title' => 'Shorthand Stenography Skills, Career, Pros and Cons, FAQs',
                'excerpt' => 'Shorthand Stenography is such a valuable skill for court reporting, journalism, and administrative careers - here\'s what you need to know.',
                'content' => "<p>Shorthand Stenography is such a valuable skill for court reporting, journalism, and administrative careers. In this guide, we break down what stenography actually is, the career paths it opens up, and whether it's worth learning in today's job market.</p><h3>What is Shorthand Stenography?</h3><p>Stenography is a method of rapid writing using abbreviations and symbols, allowing a trained stenographer to transcribe speech in real time - far faster than standard handwriting or typing.</p><h3>Career Opportunities</h3><ul><li>Court Reporter / Legal Stenographer</li><li>Parliamentary & Government Reporting</li><li>Executive Personal Assistant</li><li>Closed Captioning & Live Transcription</li></ul><h3>Pros and Cons</h3><p><strong>Pros:</strong> High demand in legal and government sectors, strong earning potential, and a relatively short training period compared to many other specialized careers.</p><p><strong>Cons:</strong> Requires consistent practice to build and maintain speed, and the role can be repetitive for some.</p><h3>Frequently Asked Questions</h3><p><strong>How long does it take to learn?</strong> Most students reach a professional working speed within 6-12 months of consistent practice.</p><p><strong>Is it still relevant with AI transcription tools?</strong> Yes - certified human stenographers are still required for legal and official records where accuracy and accountability matter most.</p>",
            ],
            [
                'title' => 'Top 10 In-Demand IT Skills to Learn in 2026',
                'excerpt' => 'From AI and cloud computing to cybersecurity, here are the ten IT skills employers are actively hiring for right now.',
                'content' => "<p>The technology job market keeps shifting - here are ten skills that are consistently showing up in job postings and hiring conversations this year.</p><h3>1. Artificial Intelligence & Machine Learning</h3><p>Understanding how to apply AI tools and build basic ML models is quickly becoming a baseline expectation across tech roles.</p><h3>2. Cloud Computing</h3><p>Familiarity with cloud platforms remains one of the most requested skills for infrastructure and DevOps roles.</p><h3>3. Cybersecurity Fundamentals</h3><p>As more business moves online, demand for security-aware developers and dedicated security analysts continues to grow.</p><h3>4. Full Stack Web Development</h3><p>Businesses of every size need functional, modern websites and web applications - full stack developers remain consistently in demand.</p><h3>5. Data Analysis</h3><p>The ability to turn raw data into decisions is valuable in almost every industry, not just tech.</p><p>Rounding out the list: UI/UX design, digital marketing, mobile app development, DevOps practices, and strong communication/soft skills - which employers repeatedly rank as just as important as the technical ones.</p>",
            ],
            [
                'title' => 'How to Build a Career in Digital Marketing: A Beginner\'s Guide',
                'excerpt' => 'New to digital marketing? Here\'s a practical, step-by-step roadmap to help you break into the field with confidence.',
                'content' => "<p>Digital marketing is one of the most accessible tech-adjacent careers to break into - you don't need a traditional degree, just the right skills and a portfolio to prove them. Here's how to get started.</p><h3>Step 1: Learn the Fundamentals</h3><p>Start with the core pillars: SEO, social media marketing, content marketing, email marketing, and paid advertising. You don't need to master all of them at once.</p><h3>Step 2: Get Hands-On Practice</h3><p>Run a small campaign for a friend's business, or start a personal blog or social account and grow it using the techniques you're learning. Employers care about results, not just certificates.</p><h3>Step 3: Learn the Tools</h3><p>Get comfortable with Google Analytics, Google Ads, Meta Ads Manager, and at least one SEO tool. Being tool-fluent makes you job-ready faster.</p><h3>Step 4: Build a Portfolio</h3><p>Document your campaigns, results, and case studies - even small wins matter when you're starting out.</p><h3>Step 5: Apply and Keep Learning</h3><p>Digital marketing evolves constantly. The professionals who stay ahead are the ones who keep testing new platforms and strategies long after they land their first role.</p>",
            ],
            [
                'title' => 'Freelancing vs Full-Time Job: Which Path is Right for You?',
                'excerpt' => 'Weighing the pros and cons of freelancing against a traditional job can help you choose the path that fits your goals.',
                'content' => "<p>One of the most common questions students ask after finishing a skills-based course is: should I freelance, or look for a full-time job? There's no universally right answer - it depends on your goals, financial situation, and working style.</p><h3>The Case for Freelancing</h3><p>Freelancing offers flexibility, the ability to work with clients from anywhere in the world, and control over your schedule and workload. It also tends to have a lower barrier to entry - a strong portfolio can matter more than formal experience.</p><h3>The Case for a Full-Time Job</h3><p>A full-time role offers income stability, structured mentorship, and often faster skill growth in the early stages of a career thanks to working alongside experienced teams.</p><h3>Can You Do Both?</h3><p>Many professionals start with a full-time job to build experience and stability, then transition into freelancing - or take on freelance projects on the side to diversify their income and skill set.</p><p>Whichever path you choose, the skills you build in a structured training program - whether in web development, design, or marketing - are transferable to both.</p>",
            ],
            [
                'title' => '5 Tips to Crack Your First IT Job Interview',
                'excerpt' => 'Preparing for your first tech interview? These five practical tips will help you walk in with confidence.',
                'content' => "<p>Your first IT job interview can feel intimidating, especially if you're coming from a non-traditional background. These five tips will help you prepare effectively.</p><h3>1. Know Your Projects Inside Out</h3><p>Be ready to explain the &quot;why&quot; behind every technical decision in your portfolio projects, not just the &quot;what&quot;. Interviewers care about your thought process.</p><h3>2. Practice Explaining Technical Concepts Simply</h3><p>Being able to explain a technical idea to a non-technical person is a skill in itself, and interviewers often test for it.</p><h3>3. Research the Company</h3><p>Understand what the company builds, who their customers are, and what technologies they use - it shows genuine interest and helps you ask better questions.</p><h3>4. Prepare for Both Technical and Behavioral Questions</h3><p>Don't just prep for coding or design challenges - be ready to talk through how you handle feedback, deadlines, and teamwork.</p><h3>5. Ask Thoughtful Questions</h3><p>Interviews go both ways. Asking about team structure, growth opportunities, or the tools they use shows you're evaluating fit, not just hoping to get hired.</p><p>Most importantly - treat your first few interviews as practice. Every one makes the next one easier.</p>",
            ],
        ];

        foreach ($blogs as $data) {
            Blog::updateOrCreate(
                ['slug' => Str::slug($data['title'])],
                [
                    'title' => $data['title'],
                    'excerpt' => $data['excerpt'],
                    'content' => $data['content'],
                ]
            );
        }

        $this->command?->info('Seeded '.count($blogs).' blog posts.');
    }
}
