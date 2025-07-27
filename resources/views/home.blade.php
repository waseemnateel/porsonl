<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Mohammed Qassem | Graphic Designer</title>
<link rel="stylesheet" href="{{ asset('css/style.css') }}">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />

  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;500;700&display=swap" rel="stylesheet" />
</head>
<body>
    @include('components.hero', [
  'name' => 'Mohammed Qassem',
  'title' => 'Graphic Designer'
])

  <header class="navbar">
    <div class="logo">LOGO</div>

    <div class="menu-toggle" id="menu-toggle">
      <i class="fas fa-bars"></i>
    </div>

    <nav id="nav-menu">
      <ul>
        <li><a class="active" href="#">Home</a></li>
        <li><a href="#services" id="services">Services</a></li>
        <li><a href="#about">About me</a></li>
        <li><a href="#portfolio">Portfolio</a></li>
        <li><a href="#contact">Contact me</a></li>
      </ul>
    </nav>

    <a href="#" class="btn-hire">Hire Me</a>
  </header>

  @php
  $settings = \App\Models\Setting::all()->pluck('value', 'key');
@endphp
  <section class="hero">
    <div class="content">
      <p>Hi I am</p>
    <h1>{{ $settings['hero_name'] ?? 'Mohammed Qassem' }}</h1>
        <h2 class="glow-text">{{ $settings['hero_title'] ?? 'Graphic Designer' }}</h2>

      <div class="social">
  <a href="{{ $socials['instagram'] }}" target="_blank"><i class="fab fa-instagram"></i></a>

        <a href="{{ $socials['linkedin'] }}" target="_blank"><i class="fab fa-linkedin-in"></i></a>
  <a href="{{ $socials['dribbble'] }}" target="_blank"><i class="fab fa-dribbble"></i></a>
  <a href="{{ $socials['behance'] }}" target="_blank"><i class="fab fa-behance"></i></a>
      </div>

      <div class="buttons">
        <a href="#" class="btn-orange">Hire Me</a>
            @if(isset($settings['cv_file']))
    <a href="{{ asset('storage/' . $settings['cv_file']) }}" download class="btn-outline">Download CV</a>
        @endif
      </div>

      <div class="stats">
        <div class="stat-box">
          <strong>5+</strong>
          <span>Experiences</span>
        </div>
        <div class="stat-box">
          <strong>20+</strong>
          <span>Project done</span>
        </div>
        <div class="stat-box">
          <strong>25+</strong>
          <span>Happy Clients</span>
        </div>
      </div>
    </div>

   <div class="hero-image-container">
  <div class="circle-background"></div>
<img src="{{ asset('storage/' . ($settings['profile_image'] ?? 'asset/img/default-profile.jpeg')) }}" alt="hero" class="hero-image">

</div>


   </section>
  <!-- start 2 -->
   <section class="services" id="services">
  <div class="section-header">
    <h2>Services</h2>
    <p>Lorem ipsum dolor sit amet consectetur. Imperdiet convallis blandit felis ligula aliquam</p>
  </div>


  <div class="services-grid">
    <!-- يمكنك تكرار هذا الصندوق 6 مرات -->
   @foreach($services as $service)
  <div class="service-box">
    <img class="icon" width="50" src="{{ asset('storage/' . $service->icon_image) }}" alt="Service Icon">
    <h3>{{ $service->title }}</h3>
    <p>{{ $service->description }}</p>

  </div>
@endforeach

  </div>
</section>

  <!-- end 2 -->
   <!-- start 3  -->
 <section class="about" id="about">
  <div class="container about-container">
    <div class="hero-image-container">
  <div class="circle-background"></div>
@if(!empty($settings['about_image']))
<img src="{{ asset('storage/' . $settings['about_image']) }}" alt="hero" class="hero-image">

@endif
</div>


    <div class="about-text">
<h2 class="section-title">{{ $settings['about_title'] ?? '' }}</h2>
<p class="subtitle">{{ $settings['about_subtitle'] ?? '' }}</p>
 <p>{{ $settings['about_description'] ?? '' }}</p>

{{-- 111111111111111111111111111111111111111111111 --}}

      <a href="{{ asset('storage/' . ($settings['cv_file'] ?? 'cv/default.pdf')) }}" class="btn-orange" download>
  <i class="fas fa-download"></i> Download CV
</a>

    </div>
  </div>

  <div class="skills-grid">
    <!-- strat1  -->

  <div class="progress-circle">
  <svg class="circle" viewBox="0 0 36 36">
    <path class="bg" d="M18 2.0845
          a 15.9155 15.9155 0 0 1 0 31.831
          a 15.9155 15.9155 0 0 1 0 -31.831" />
    <path class="progress" stroke-dasharray="100, 100" d="M18 2.0845
          a 15.9155 15.9155 0 0 1 0 31.831
          a 15.9155 15.9155 0 0 1 0 -31.831" />
  </svg>
  <div class="icon-center">
    <img src="https://cdn.jsdelivr.net/gh/devicons/devicon/icons/figma/figma-original.svg" alt="Figma" />
  </div>
  <h3>100%</h3>
  <p>Figma</p>
</div>
 <!-- end1 -->
 <!-- strat2  -->
  <div class="progress-circle">
  <svg class="circle" viewBox="0 0 36 36">
    <path class="bg" d="M18 2.0845
          a 15.9155 15.9155 0 0 1 0 31.831
          a 15.9155 15.9155 0 0 1 0 -31.831" />
    <path class="progress" stroke-dasharray="100, 100" d="M18 2.0845
          a 15.9155 15.9155 0 0 1 0 31.831
          a 15.9155 15.9155 0 0 1 0 -31.831" />
  </svg>
  <div class="icon-center">
    <img src="https://cdn.jsdelivr.net/gh/devicons/devicon/icons/xd/xd-plain.svg" alt="Adobe" />
  </div>
  <h3>100%</h3>
  <p>Adobe XD	</p>
</div>
 <!-- end 2 -->
   <!-- strat 3 -->
   <div class="progress-circle">
  <svg class="circle" viewBox="0 0 36 36">
    <path class="bg" d="M18 2.0845
          a 15.9155 15.9155 0 0 1 0 31.831
          a 15.9155 15.9155 0 0 1 0 -31.831" />
    <path class="progress" stroke-dasharray="100, 100" d="M18 2.0845
          a 15.9155 15.9155 0 0 1 0 31.831
          a 15.9155 15.9155 0 0 1 0 -31.831" />
  </svg>
  <div class="icon-center">
    <img src="https://cdn.jsdelivr.net/gh/devicons/devicon/icons/photoshop/photoshop-plain.svg" alt="photoshop" />
  </div>
  <h3>100%</h3>
  <p>Adobe Photoshop</p>
</div>
 <!-- end 3 -->

 <!-- strat 4 -->

   <div class="progress-circle">
  <svg class="circle" viewBox="0 0 36 36">
    <path class="bg" d="M18 2.0845
          a 15.9155 15.9155 0 0 1 0 31.831
          a 15.9155 15.9155 0 0 1 0 -31.831" />
    <path class="progress" stroke-dasharray="100, 100" d="M18 2.0845
          a 15.9155 15.9155 0 0 1 0 31.831
          a 15.9155 15.9155 0 0 1 0 -31.831" />
  </svg>
  <div class="icon-center">
    <img src="https://cdn.jsdelivr.net/gh/devicons/devicon/icons/illustrator/illustrator-plain.svg" alt="Adobe Illustrator	" />
  </div>
  <h3>100%</h3>
  <p>Adobe Illustrator	</p>
</div>
 <!-- end 4 -->
 <!-- strat 5 -->
   <div class="progress-circle">
  <svg class="circle" viewBox="0 0 36 36">
    <path class="bg" d="M18 2.0845
          a 15.9155 15.9155 0 0 1 0 31.831
          a 15.9155 15.9155 0 0 1 0 -31.831" />
    <path class="progress" stroke-dasharray="50, 100" d="M18 2.0845
          a 15.9155 15.9155 0 0 1 0 31.831
          a 15.9155 15.9155 0 0 1 0 -31.831" />
  </svg>
  <div class="icon-center">
    <img src="https://cdn.jsdelivr.net/gh/devicons/devicon/icons/premierepro/premierepro-plain.svg" alt="Adobe Premiere Pro" />
  </div>
  <h3>50%</h3>
  <p>Adobe Premiere Pro</p>
</div>
 <!-- end 5-->

  </div>
</section>

    <!-- end 3 -->

    <!-- start 4 -->
     <section id="portfolio" style="padding: 60px 20px; background-color: #111">
  <div style="text-align: center; margin-bottom: 40px">
    <h2 style="color: white; font-size: 32px; margin-bottom: 10px">Portfolio</h2>
   {{-- <div class="filter-buttons">
   <button onclick="scrollToCategory('all')" class="filter-btn active">All</button>
    <button onclick="scrollToCategory('website')" class="filter-btn ">Website Design</button>
    <button onclick="scrollToCategory('mobile')" class="filter-btn ">App Mobile Design</button>
    <button onclick="scrollToCategory('desktop')" class="filter-btn ">App Desktop</button>
    <button onclick="scrollToCategory('branding')" class="filter-btn ">Branding</button>
</div> --}}

  </div>
<!-- sssssssssssssssss -->
  <div class="portfolio-grid">
    <!-- Repeat for each project -->
     <!-- start 1box -->

         @foreach($projects as $project)

    <div class="project-card">
        <img src="{{ asset('storage/' . $project->image) }}" alt="Project Image">
      <div class="project-info">
          <h4>{{ $project->name }}</h4>
          <p>{{ $project->category }}</p>
      </div>
    </div>
        @endforeach

    <!-- Copy the above .project-card as needed -->
  </div> </div></div>
  <!-- sssssssssss -->
     <div class="portfolio-grid pt-52">
    <!-- Repeat for each project -->
     <!-- start 1box -->



  </div>
</section>

         <!-- end 4 -->
<!-- strat 5 -->
  <form class="contact-form" method="POST" action="{{ route('contact.submit') }}">

      @csrf
<section id="contact" class="contact-section">
  <div class="container">
    <h2>Contact me</h2>
    -- end 1box --><p class="subtitle">Cultivating Connections: Reach Out And Connect With Me</p>


      <div class="form-row">
        <input type="text" name="name" placeholder="Name" required />
        <input type="email" name="email" placeholder="Email" required />
      </div>
      <div class="form-row">
        <input type="text" name="phone" placeholder="Phone Number" required />
        <select name="service" required>
          <option value="">Service Of Interest</option>
          <option value="design">Design</option>
          <option value="branding">Branding</option>
          <option value="uiux">UI/UX</option>
        </select>
      </div>
      <div class="form-row">
        <input type="text" name="timeline" placeholder="Timeline" />
        <textarea name="details" placeholder="Project Details..."></textarea>
      </div>
      <button type="submit">Send</button>
    </form>
  </div>
</section>

<!-- end 5 -->
@php
  use App\Models\Setting;
  $settings = Setting::all()->pluck('value', 'key');
@endphp
 <!-- strat 6 -->

<footer class="footer">
  <h2 class="logo">LOGO</h2>

  <ul class="footer-nav">
    <li><a href="#">Home</a></li>
    <li><a href="#services">Services</a></li>
    <li><a href="#portfolio">Portfolio</a></li>
    <li><a href="#contact">Contact me</a></li>
  </ul>

  <div class="social-icons">
   <div class="icon">
@foreach($services as $service)

@endforeach
</div>

    <a href="{{ $settings['linkedin'] ?? '#' }}"><i class="fab fa-linkedin-in"></i></a>
    <a href="{{ $settings['dribbble'] ?? '#' }}"><i class="fab fa-dribbble"></i></a>
    <a href="{{ $settings['behance'] ?? '#' }}"><i class="fab fa-behance"></i></a>
  </div>

  <div class="contact-info">
    <p><i class="fas fa-envelope"></i> {{ $settings['site_email'] ?? 'info@example.com' }}</p>
    <p><i class="fas fa-phone-alt"></i> {{ $settings['site_phone'] ?? '+1234567890' }}</p>
  </div>

  <hr>
  <p class="copy">{{ $settings['footer_text'] ?? '© 2025 Your Name | All Rights Reserved' }}</p>
</footer>

  <!-- end 6 -->
  <script>
    const menuToggle = document.getElementById('menu-toggle');
    const navMenu = document.getElementById('nav-menu');

    menuToggle.addEventListener('click', () => {
      navMenu.classList.toggle('active');
    });

    const buttons = document.querySelectorAll('.filter-btn');
buttons.forEach(btn => {
  btn.addEventListener('click', () => {
    buttons.forEach(b => b.classList.remove('active'));
    btn.classList.add('active');
  });
});

 function scrollToCategory(categoryId) {
    if (categoryId === 'all') {
      window.scrollTo({ top: 0, behavior: 'smooth' });
    } else {
      const target = document.getElementById(categoryId);
      if (target) {
        target.scrollIntoView({ behavior: 'smooth' });
      }
    }

  </script>
</body>
</html>
