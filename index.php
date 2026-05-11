<!DOCTYPE html>
<html lang="en">
<head>
  <title>EPAMNHS | Vision, Mission & Core Values</title>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  
  <!-- Google Fonts & Icons -->
  <link href="https://fonts.googleapis.com/css2?family=Inter:opsz,wght@14..32,300;400;500;600;700&family=Playfair+Display:wght@400;600;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">
  
  <!-- Bootstrap 5 CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
  
  <!-- AOS Library (optional scroll animations) -->
  <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
  
  <style>
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }

    body {
      font-family: 'Inter', sans-serif;
      background: linear-gradient(145deg, #f8faff 0%, #f0f4fe 100%);
      color: #1a2c3e;
      scroll-behavior: smooth;
    }

    /* ========== NAVBAR (modern gradient, same as portal) ========== */
    .navbar-custom {
      background: linear-gradient(135deg, #0b2b5c 0%, #0f3b7a 100%);
      backdrop-filter: blur(8px);
      padding: 0.9rem 2rem;
      box-shadow: 0 8px 20px rgba(0,0,0,0.08);
      position: sticky;
      top: 0;
      z-index: 1000;
    }
    .navbar-brand {
      font-family: 'Playfair Display', serif;
      font-weight: 700;
      font-size: 1.5rem;
      letter-spacing: -0.3px;
      color: white !important;
      transition: transform 0.2s;
    }
    .navbar-brand:hover {
      transform: scale(1.02);
    }
    .nav-buttons {
      display: flex;
      gap: 12px;
    }
    .btn-nav {
      border-radius: 40px;
      padding: 8px 22px;
      font-weight: 500;
      font-size: 0.9rem;
      transition: all 0.2s;
      text-decoration: none;
      display: inline-flex;
      align-items: center;
      gap: 8px;
    }
    .btn-login {
      background: rgba(255,255,255,0.12);
      border: 1px solid rgba(255,255,255,0.25);
      color: white;
    }
    .btn-login:hover {
      background: rgba(255,255,255,0.25);
      color: white;
    }
    .btn-register {
      background: #ffd700cc;
      border: 1px solid #ffd700;
      color: #0b2b5c;
    }
    .btn-register:hover {
      background: #ffd700;
      color: #0b2b5c;
      transform: translateY(-2px);
    }
    .hamburger {
      display: none;
      flex-direction: column;
      gap: 5px;
      background: none;
      border: none;
      cursor: pointer;
    }
    .hamburger span {
      width: 24px;
      height: 2px;
      background: white;
      border-radius: 2px;
    }
    .mobile-menu {
      display: none;
      flex-direction: column;
      background: #0b2b5c;
      padding: 1rem 1.5rem;
      gap: 12px;
      border-top: 1px solid rgba(255,255,255,0.1);
    }
    .mobile-menu .btn-nav {
      width: 100%;
      justify-content: center;
    }
    @media (max-width: 768px) {
      .nav-buttons { display: none; }
      .hamburger { display: flex; }
      .navbar-custom { padding: 0.9rem 1.2rem; }
    }
    
    /* ========== HERO SECTION with background image ========== */
    .hero {
      position: relative;
      width: 100%;
      height: 380px;
      overflow: hidden;
      display: flex;
      align-items: center;
      justify-content: center;
      text-align: center;
    }
    .hero-bg {
      position: absolute;
      inset: 0;
      width: 100%;
      height: 100%;
      object-fit: cover;
      z-index: 0;
    }
    .hero-overlay {
      position: absolute;
      inset: 0;
      background: linear-gradient(135deg, rgba(11,43,92,0.3), rgba(15,59,122,0.45));
      z-index: 1;
    }
    .hero-content {
      position: relative;
      z-index: 2;
      padding: 2rem 1.5rem;
    }
    .seal-ring {
      width: 100px;
      height: 100px;
      margin: 0 auto 1.2rem;
      background: rgba(255,255,255,0.1);
      border-radius: 50%;
      display: flex;
      align-items: center;
      justify-content: center;
      border: 2px solid rgba(255,215,0,0.5);
    }
    .seal-ring img {
  filter: brightness(1.05) contrast(1.1);
  background: rgba(255,255,255,0.9);
  border-radius: 50%;
  padding: 8px;
}
    .school-name {
      font-family: 'Playfair Display', serif;
      font-size: 2.2rem;
      font-weight: 700;
      color: white;
      text-shadow: 0 2px 8px rgba(0,0,0,0.3);
    }
    .school-sub {
      color: rgba(255,215,0,0.85);
      font-size: 0.9rem;
      letter-spacing: 1px;
    }
    .divider-gold {
      width: 70px;
      height: 2px;
      background: linear-gradient(90deg, transparent, #ffd700, transparent);
      margin: 1.2rem auto;
    }
    .hero-caption {
      color: rgba(255,255,255,0.7);
      font-size: 0.85rem;
    }
    .photo-hint {
      position: absolute;
      bottom: 12px;
      right: 16px;
      z-index: 3;
      background: rgba(0,0,0,0.5);
      color: rgba(255,255,255,0.8);
      font-size: 0.7rem;
      padding: 4px 10px;
      border-radius: 20px;
      cursor: pointer;
      transition: 0.2s;
    }
    .photo-hint:hover {
      background: rgba(0,0,0,0.8);
    }
    @media (max-width: 600px) {
      .hero { height: 320px; }
      .school-name { font-size: 1.6rem; }
      .seal-ring { width: 80px; height: 80px; }
      .seal-ring img { width: 55px; }
    }
    
    /* ========== CARDS SECTION ========== */
    .content {
      max-width: 900px;
      margin: 0 auto;
      padding: 2rem 1.5rem 4rem;
    }
    .card-section {
      margin-top: -2rem;
      position: relative;
    }
    .mv-card {
      background: white;
      border-radius: 28px;
      box-shadow: 0 18px 35px -12px rgba(0,0,0,0.1);
      margin-bottom: 1.8rem;
      transition: all 0.3s ease;
      overflow: hidden;
    }
    .mv-card:hover {
      transform: translateY(-6px);
      box-shadow: 0 25px 40px -16px rgba(0,0,0,0.15);
    }
    .card-header {
      padding: 1.5rem 1.8rem 0.8rem;
      display: flex;
      align-items: center;
      gap: 1rem;
      border-bottom: 1px solid #eef2f8;
    }
    .icon-badge {
      width: 56px;
      height: 56px;
      border-radius: 20px;
      display: flex;
      align-items: center;
      justify-content: center;
      background: #eef2ff;
    }
    .icon-badge svg {
      width: 28px;
      height: 28px;
    }
    .card-label {
      font-size: 1.6rem;
      font-weight: 700;
      font-family: 'Playfair Display', serif;
      color: #0b2b5c;
      line-height: 1.2;
    }
    .card-tagline {
      font-size: 0.75rem;
      text-transform: uppercase;
      letter-spacing: 1.5px;
      color: #5a687c;
    }
    .card-body {
      padding: 1.5rem 1.8rem 2rem;
      font-size: 1rem;
      line-height: 1.6;
      color: #2c3e4e;
    }
    .card-body p {
      margin-bottom: 0.8rem;
    }
    /* Core values grid */
    .values-grid {
    display: grid;
    /* Reduced minmax to 140px so the 4 pillars can sit 2x2 on smaller cards */
    grid-template-columns: repeat(auto-fit, minmax(140px, 1fr));
    gap: 12px;
    margin-top: 1rem;
}

.value-pill {
    background: #f8fafc;
    border-radius: 12px; /* Changed from 60px to 12px for a more 'modern app' look */
    padding: 0.7rem 1rem;
    display: flex;
    align-items: center;
    gap: 12px;
    border: 1px solid #e2e8f0;
    transition: all 0.2s ease;
}

.value-pill:hover {
    background: #ffffff;
    border-color: #cbd5e1;
    transform: translateY(-2px);
    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.05);
}

.value-dot {
    width: 10px; /* Slightly smaller dot for a cleaner look */
    height: 10px;
    border-radius: 50%;
    flex-shrink: 0; /* Prevents dot from squishing if text is long */
}

/* Added soft glows to the dots to match your icon gradient style */
.dot-blue { background: #1e88e5; box-shadow: 0 0 8px rgba(30, 136, 229, 0.3); }
.dot-green { background: #43a047; box-shadow: 0 0 8px rgba(67, 160, 71, 0.3); }
.dot-purple { background: #8e44ad; box-shadow: 0 0 8px rgba(142, 68, 173, 0.3); }
.dot-amber { background: #fb8c00; box-shadow: 0 0 8px rgba(251, 140, 0, 0.3); }

.value-text {
    font-family: 'Inter', sans-serif;
    font-weight: 500;
    font-size: 0.9rem;
    color: #334155;
    letter-spacing: -0.01em;
}
    
    /* ========== BACK TO TOP BUTTON ========== */
    .top-link {
      position: fixed;
      bottom: 2rem;
      right: 2rem;
      background: #0b2b5c;
      width: 48px;
      height: 48px;
      border-radius: 30px;
      display: flex;
      align-items: center;
      justify-content: center;
      color: white;
      box-shadow: 0 5px 15px rgba(0,0,0,0.2);
      transition: all 0.3s;
      z-index: 99;
      text-decoration: none;
      opacity: 0;
      visibility: hidden;
    }
    .top-link.show {
      opacity: 1;
      visibility: visible;
    }
    .top-link:hover {
      background: #1f5a9e;
      transform: translateY(-5px);
      color: white;
    }
    
    /* ========== FOOTER ========== */
    .footer-custom {
      background: #0b1f33;
      color: #cddcec;
      padding: 2rem 1rem;
      text-align: center;
      font-size: 0.85rem;
      border-top-left-radius: 32px;
      border-top-right-radius: 32px;
    }
    
    @media (max-width: 600px) {
      .card-header { padding: 1.2rem 1.2rem 0.5rem; }
      .card-body { padding: 1.2rem; }
      .card-label { font-size: 1.3rem; }
      .values-grid { grid-template-columns: 1fr; }
    }
  </style>
</head>
<body>

<!-- ========== MODERN NAVBAR (public version) ========== -->
<nav class="navbar navbar-custom">
  <div class="container-fluid d-flex justify-content-between align-items-center">
    <a class="navbar-brand" href="#">
      <i class="bi bi-mortarboard-fill me-2"></i> EPAMNHS Portal
    </a>
    
    <!-- Desktop buttons -->
    <div class="nav-buttons">
      <a href="login.php" class="btn-nav btn-login">
        <i class="fas fa-sign-in-alt"></i> Log in
      </a>
      <a href="resident_registration.php" class="btn-nav btn-register">
        <i class="fas fa-user-plus"></i> Register
      </a>
    </div>
    
    <!-- Mobile hamburger -->
    <button class="hamburger" id="hamburgerBtn">
      <span></span><span></span><span></span>
    </button>
  </div>
  <!-- Mobile menu -->
  <div class="mobile-menu" id="mobileMenu">
    <a href="login.php" class="btn-nav btn-login"><i class="fas fa-sign-in-alt"></i> Log in</a>
    <a href="resident_registration.php" class="btn-nav btn-register"><i class="fas fa-user-plus"></i> Register</a>
  </div>
</nav>

<!-- ========== HERO BANNER with uploadable background ========== -->
<header class="hero">
  <img class="hero-bg" id="heroBg" src="icons/eusebia.jpg" alt="School campus">
  <div class="hero-overlay"></div>
  <div class="hero-content">
    <div class="seal-ring">
      <img src="icons/eusebia.png" alt="School Seal">
    </div>
    <h1 class="school-name">Eusebia Paz Arroyo MemorialNational High School</h1>
    <p class="school-sub">Department of Education</p>
    <div class="divider-gold"></div>
    <p class="hero-caption">Mission · Vision · Core Values</p>
  </div>
</header>

<!-- ========== CONTENT: VISION, MISSION, CORE VALUES ========== -->
<main class="content">
  <div class="card-section" data-aos="fade-up">
    
    <!-- VISION -->
    <article class="mv-card">
      <div class="card-header">
        <div class="icon-badge">
          <svg viewBox="0 0 24 24" fill="none" stroke="#185fa5" stroke-width="1.8">
            <circle cx="12" cy="12" r="3"/>
            <path d="M2 12s4-7 10-7 10 7 10 7-4 7-10 7-10-7-10-7z"/>
          </svg>
        </div>
        <div>
          <div class="card-label">Vision</div>
          <div class="card-tagline">What we aspire to become</div>
        </div>
      </div>
      <div class="card-body">
        <p>We dream of Filipinos who passionately love their country and whose values and competencies enable them to realize their full potential and contribute meaningfully to building the nation.</p>
        <p>As a learner-centered public institution, the Department of Education continuously improves itself to better serve its stakeholders.</p>
      </div>
    </article>
    
    <!-- MISSION -->
    <article class="mv-card">
      <div class="card-header">
        <div class="icon-badge">
          <svg viewBox="0 0 24 24" fill="none" stroke="#3b6d11" stroke-width="1.8">
            <path d="M12 2L2 7l10 5 10-5-10-5z"/>
            <path d="M2 17l10 5 10-5"/>
            <path d="M2 12l10 5 10-5"/>
          </svg>
        </div>
        <div>
          <div class="card-label">Mission</div>
          <div class="card-tagline">What we commit to do</div>
        </div>
      </div>
      <div class="card-body">
        <p>To protect and promote the right of every Filipino to quality, equitable, culture-based, and complete basic education where:</p>
        <p>* Students learn in a child-friendly, gender-sensitive, safe, and motivating environment.<br>
        * Teachers facilitate learning and constantly nurture every learner.<br>
        * Administrators and staff ensure an enabling and supportive environment for effective learning.<br>
        * Family, community, and stakeholders actively engage and share responsibility for developing life-long learners.</p>
      </div>
    </article>
    
    <!-- CORE VALUES -->
    <article class="mv-card">
  <div class="card-header">
    <div class="icon-badge">
      <!-- Changed to a 'Shield' icon for a more institutional feel -->
      <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
        <path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"></path>
      </svg>
    </div>
    <div class="header-text">
      <h3 class="card-label">Core Values</h3>
      <p class="card-tagline">Principles we live by</p>
    </div>
  </div>
  <div class="card-body">
    <div class="values-grid">
      <div class="value-pill"><span class="value-dot dot-blue"></span>Maka-Diyos</div>
      <div class="value-pill"><span class="value-dot dot-green"></span>Maka-tao</div>
      <div class="value-pill"><span class="value-dot dot-purple"></span>Makakalikasan</div>
      <div class="value-pill"><span class="value-dot dot-amber"></span>Makabansa</div>
    </div>
  </div>
</article>
    
  </div>
</main>

<!-- Back to Top Button -->
<a href="#" class="top-link" id="backToTopBtn">
  <i class="fas fa-arrow-up"></i>
</a>

<!-- Footer -->
<footer class="footer-custom">
  <div class="container">
    <div class="row">
      <div class="col-12">
        <i class="fas fa-school me-2"></i> Eusebia Paz Arroyo Memorial National High School 
        <br><small> <?= date('Y') ?> EPAMNHS. All rights reserved.</small>
      </div>
    </div>
  </div>
</footer>

<!-- Scripts -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script>
  AOS.init({ duration: 800, once: true, offset: 40 });
  
  // Mobile menu toggle
  const hamburger = document.getElementById('hamburgerBtn');
  const mobileMenu = document.getElementById('mobileMenu');
  hamburger.addEventListener('click', () => {
    mobileMenu.classList.toggle('show');
    if (mobileMenu.style.display === 'flex') mobileMenu.style.display = 'none';
    else mobileMenu.style.display = 'flex';
  });
  // Initially hidden
  mobileMenu.style.display = 'none';
  
  // Back to top button
  const backBtn = document.getElementById('backToTopBtn');
  window.addEventListener('scroll', () => {
    if (window.scrollY > 300) backBtn.classList.add('show');
    else backBtn.classList.remove('show');
  });
  backBtn.addEventListener('click', (e) => {
    e.preventDefault();
    window.scrollTo({ top: 0, behavior: 'smooth' });
  });
  
  // Background image upload
  const photoInput = document.getElementById('photoUpload');
  const heroImg = document.getElementById('heroBg');
  document.querySelector('.photo-hint').addEventListener('click', () => photoInput.click());
  photoInput.addEventListener('change', (e) => {
    const file = e.target.files[0];
    if (file) {
      const reader = new FileReader();
      reader.onload = (event) => { heroImg.src = event.target.result; };
      reader.readAsDataURL(file);
    }
  });
</script>
</body>
</html>