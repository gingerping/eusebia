<!DOCTYPE html>
<html lang="en">
<head>
     <title>Eusebia Paz Arroyo National High School</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"> 
    <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;700&family=Source+Serif+4:ital,wght@0,300;0,400;1,300&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/67a9b7069e.js" crossorigin="anonymous"></script>
  <style>
    *, *::before, *::after {
      box-sizing: border-box;
      margin: 0;
      padding: 0;
    }

    :root {
      --navy-dark:    #0a2e5c;
      --navy-mid:     #103f80;
      --navy-light:   #1a5ca8;
      --gold:         #ffd700;
      --gold-soft:    rgba(255, 215, 0, 0.75);
      --white:        #ffffff;
      --bg:           #f7f8fc;
      --card-bg:      #ffffff;
      --border:       rgba(10, 46, 92, 0.12);
      --text-primary: #1a1e2e;
      --text-muted:   #5a6478;
      --blue-light:   #e6f1fb;
      --green-light:  #eaf3de;
      --purple-light: #eeedfe;
      --blue-accent:  #185fa5;
      --green-accent: #3b6d11;
      --purple-accent:#534ab7;
    }

    body {
      font-family: 'Source Serif 4', serif;
      background-color: var(--bg);
      color: var(--text-primary);
      min-height: 100vh;
      filter: saturate(1.2) brightness(1.1);
    }

    /* ── NAVBAR ── */
    .navbar {
      background: rgba(10, 46, 92, 0.97);
      backdrop-filter: blur(10px);
      -webkit-backdrop-filter: blur(10px);
      border-bottom: 1px solid rgba(255, 215, 0, 0.15);
      position: sticky;
      top: 0;
      z-index: 100;
    }

    .navbar-inner {
      max-width: 1100px;
      margin: 0 auto;
      padding: 0 1.5rem;
      height: 58px;
      display: flex;
      align-items: center;
      justify-content: space-between;
    }

    .navbar-brand {
      display: flex;
      align-items: center;
      gap: 10px;
      text-decoration: none;
    }

    .navbar-logo {
      width: 32px;
      height: 32px;
      border-radius: 50%;
      border: 1.5px solid rgba(255, 215, 0, 0.5);
      background: rgba(255, 215, 0, 0.08);
      display: flex;
      align-items: center;
      justify-content: center;
      font-size: 16px;
      flex-shrink: 0;
    }

    .navbar-title {
      font-family: 'Playfair Display', serif;
      font-size: 14px;
      font-weight: 700;
      color: #ffffff;
      line-height: 1.2;
      max-width: 200px;
    }

    .navbar-title span {
      display: block;
      font-family: 'Source Serif 4', serif;
      font-size: 10px;
      font-weight: 300;
      color: var(--gold-soft);
      letter-spacing: 0.08em;
      text-transform: uppercase;
    }

    .navbar-actions {
      display: flex;
      align-items: center;
      gap: 10px;
    }

    .btn-login {
      font-family: 'Source Serif 4', serif;
      font-size: 13.5px;
      font-weight: 400;
      color: rgba(255, 255, 255, 0.85);
      background: transparent;
      border: 1px solid rgba(255, 255, 255, 0.25);
      border-radius: 8px;
      padding: 0.42rem 1.1rem;
      cursor: pointer;
      text-decoration: none;
      transition: background 0.18s ease, border-color 0.18s ease, color 0.18s ease;
      display: inline-flex;
      align-items: center;
      gap: 6px;
    }

    .btn-login:hover {
      background: rgba(255, 255, 255, 0.08);
      border-color: rgba(255, 255, 255, 0.45);
      color: #ffffff;
    }

    .btn-register {
      font-family: 'Source Serif 4', serif;
      font-size: 13.5px;
      font-weight: 400;
      color: var(--navy-dark);
      background: var(--gold-soft);
      border: 1px solid var(--gold);
      border-radius: 8px;
      padding: 0.42rem 1.1rem;
      cursor: pointer;
      text-decoration: none;
      transition: background 0.18s ease, opacity 0.18s ease;
      display: inline-flex;
      align-items: center;
      gap: 6px;
    }

    .btn-register:hover {
      background: #f5f3eb;
      border-color: #f8f7ef;
    }

    .btn-icon {
      width: 14px;
      height: 14px;
      flex-shrink: 0;
    }

    /* Hamburger (mobile) */
    .hamburger {
      display: none;
      flex-direction: column;
      gap: 5px;
      background: none;
      border: none;
      cursor: pointer;
      padding: 4px;
    }

    .hamburger span {
      display: block;
      width: 22px;
      height: 2px;
      background: rgba(255,255,255,0.8);
      border-radius: 2px;
      transition: transform 0.2s ease, opacity 0.2s ease;
    }

    .mobile-menu {
      display: none;
      flex-direction: column;
      gap: 8px;
      padding: 1rem 1.5rem 1.25rem;
      border-top: 1px solid rgba(255,215,0,0.1);
      background: rgba(10, 46, 92, 0.98);
    }

    .mobile-menu.open { display: flex; }

    .mobile-menu .btn-login,
    .mobile-menu .btn-register {
      width: 100%;
      justify-content: center;
      padding: 0.65rem 1rem;
      font-size: 14px;
    }

    @media (max-width: 540px) {
      .navbar-actions { display: none; }
      .hamburger { display: flex; }
      .navbar-title { max-width: 160px; font-size: 13px; }
    }

    /* ── HERO BANNER ── */
    .hero {
      position: relative;
      width: 100%;
      height: 420px;
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
      object-position: center;
      z-index: 0;
    }

    /* dark gradient overlay so text is always readable */
    .hero-overlay {
      position: absolute;
      inset: 0;
      background: linear-gradient(
        to bottom,
        rgba(10, 46, 92, 0.55) 0%,
        rgba(10, 46, 92, 0.72) 60%,
        rgba(10, 46, 92, 0.88) 100%
      );
      z-index: 1;
    }

    .hero-content {
      position: relative;
      z-index: 2;
      padding: 2rem 1.5rem 4.5rem;
    }

    .seal-ring {
      width: 90px;
      height: 90px;
      border-radius: 50%;
      border: 2.5px solid rgba(255, 215, 0, 0.6);
      display: inline-flex;
      align-items: center;
      justify-content: center;
      margin-bottom: 1.5rem;
    }

    .seal-inner {
      width: 70px;
      height: 70px;
      border-radius: 50%;
      border: 1px solid rgba(255, 215, 0, 0.35);
      background: rgba(255, 215, 0, 0.12);
      display: flex;
      align-items: center;
      justify-content: center;
      font-size: 30px;
    }

    .school-name {
      font-family: 'Playfair Display', serif;
      color: var(--white);
      font-size: 26px;
      font-weight: 700;
      line-height: 1.3;
      max-width: 540px;
      margin: 0 auto 0.5rem;
      text-shadow: 0 2px 12px rgba(0,0,0,0.4);
    }

    .school-sub {
      color: var(--gold-soft);
      font-size: 13px;
      font-weight: 300;
      letter-spacing: 0.14em;
      text-transform: uppercase;
    }

    .divider-gold {
      width: 64px;
      height: 2px;
      background: linear-gradient(90deg, transparent, var(--gold), transparent);
      margin: 1.5rem auto;
    }

    .hero-caption {
      color: rgba(255, 255, 255, 0.65);
      font-size: 14px;
      font-weight: 300;
      letter-spacing: 0.06em;
    }

    /* upload hint banner */
    .photo-hint {
      position: absolute;
      bottom: 10px;
      right: 14px;
      z-index: 3;
      background: rgba(0,0,0,0.45);
      color: rgba(255,255,255,0.7);
      font-size: 11px;
      padding: 4px 10px;
      border-radius: 6px;
      font-weight: 300;
      letter-spacing: 0.04em;
      cursor: pointer;
      border: 1px solid rgba(255,255,255,0.15);
      transition: background 0.2s;
    }

    .photo-hint:hover { background: rgba(0,0,0,0.65); }

    @media (max-width: 500px) {
      .hero          { height: 320px; }
      .school-name   { font-size: 20px; }
      .hero-content  { padding-bottom: 3.5rem; }
    }

    /* ── CONTENT ── */
    .content {
      max-width: 740px;
      margin: 0 auto;
      padding: 0 1.5rem 3.5rem;
    }

    .card-section {
      margin-top: -2.5rem;
      position: relative;
    }

    /* ── CARDS ── */
    .mv-card {
      background: var(--card-bg);
      border: 1px solid var(--border);
      border-radius: 16px;
      overflow: hidden;
      margin-bottom: 1.25rem;
      box-shadow: 0 4px 24px rgba(10, 46, 92, 0.09);
      transition: box-shadow 0.2s ease;
    }

    .mv-card:hover {
      box-shadow: 0 8px 32px rgba(10, 46, 92, 0.14);
    }

    .card-header {
      display: flex;
      align-items: center;
      gap: 14px;
      padding: 1.1rem 1.5rem 1rem;
      border-bottom: 1px solid var(--border);
    }

    .icon-badge {
      width: 44px;
      height: 44px;
      border-radius: 11px;
      display: flex;
      align-items: center;
      justify-content: center;
      flex-shrink: 0;
    }

    .icon-badge.vision  { background: var(--blue-light); }
    .icon-badge.mission { background: var(--green-light); }
    .icon-badge.core    { background: var(--purple-light); }

    .icon-badge svg {
      width: 22px;
      height: 22px;
    }

    .card-label {
      font-size: 18px;
      font-weight: 700;
      color: var(--text-primary);
    }

    .card-tagline {
      font-size: 12px;
      font-weight: 300;
      color: var(--text-muted);
      letter-spacing: 0.09em;
      text-transform: uppercase;
      margin-top: 2px;
    }

.card-body {
  padding: 1.3rem 1.5rem 1.5rem;
  /* Ensures smooth text rendering */
  -webkit-font-smoothing: antialiased;
}

.card-body p {
  /* Using a modern system stack for better performance and look */
  font-family: 'Inter', -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, sans-serif;
  font-size: 1rem; /* Slightly larger (16px) for better accessibility */
  line-height: 1.6; /* Reduced slightly from 1.8 for tighter, more cohesive paragraphs */
  color: var(--text-primary);
  font-weight: 400; /* Standard weight is usually more readable than 300 */
  margin-bottom: 1rem;
}

.card-body strong {
  font-weight: 600; /* Increased to 600 to provide better contrast against 400 */
  color: var(--text-highlight, inherit); 
}

    /* ── VALUES GRID ── */
    .values-grid {
      display: grid;
      grid-template-columns: 1fr 1fr;
      gap: 10px;
      margin-top: 1.1rem;
    }

    .value-pill {
      background: #f4f6fb;
      border: 1px solid var(--border);
      border-radius: 10px;
      padding: 0.7rem 1rem;
      display: flex;
      align-items: center;
      gap: 10px;
    }

    .value-dot {
      width: 9px;
      height: 9px;
      border-radius: 50%;
      flex-shrink: 0;
    }

    .dot-blue   { background: #378add; }
    .dot-green  { background: #639922; }
    .dot-purple { background: #7f77dd; }
    .dot-amber  { background: #ba7517; }
    .dot-teal   { background: #1d9e75; }
    .dot-coral  { background: #d85a30; }

    .value-text {
      font-size: 14px;
      font-weight: 400;
      color: var(--text-primary);
    }

    /* ── FOOTER ── */
    footer {
      background: var(--navy-dark);
      text-align: center;
      padding: 1.2rem 1.5rem;
    }

    footer p {
      color: var(--gold-soft);
      font-size: 12.5px;
      font-weight: 300;
      letter-spacing: 0.07em;
    }

    /* ── RESPONSIVE ── */
    @media (max-width: 500px) {
      .school-name  { font-size: 20px; }
      .values-grid  { grid-template-columns: 1fr; }
      .card-header  { padding: 1rem 1.1rem; }
      .card-body    { padding: 1rem 1.1rem 1.2rem; }
    }
     .login-logo {
    background-color: rgba(255, 255, 255, 0.9); /* Soft white circle */
    padding: 10px;
    border-radius: 50%; /* Keeps it circular like the seal */
    box-shadow: 0 4px 10px rgba(0,0,0,0.1);
}
filter: saturate(1.2) brightness(1.1);
  </style>
</head>
<body>

  <!-- NAVBAR -->
  <nav class="navbar">
    <div class="navbar-inner">

      <a href="#" class="navbar-brand">
        <div class="navbar-logo">
          <img src="icons/eusebia.png" alt="Logo" style="width: 18px; height: 18px;">
        </div>
        <div class="navbar-title">
          EPAMNHS
          <span>DASHBOARD</span>
        </div>
      </a>

      <div class="navbar-actions">
        <a href="login.php" class="btn-login">
          <svg class="btn-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
            <path d="M15 3h4a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2h-4"/>
            <polyline points="10 17 15 12 10 7"/>
            <line x1="15" y1="12" x2="3" y2="12"/>
          </svg>
          Log in
        </a>
        <a href="resident_registration.php" class="btn-register">
          <svg class="btn-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
            <path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2"/>
            <circle cx="9" cy="7" r="4"/>
            <line x1="19" y1="8" x2="19" y2="14"/>
            <line x1="22" y1="11" x2="16" y2="11"/>
          </svg>
          Register
        </a>
      </div>

      <!-- Mobile hamburger -->
      <button class="hamburger" id="hamburgerBtn" aria-label="Toggle menu">
        <span></span>
        <span></span>
        <span></span>
      </button>

    </div>

    <!-- Mobile dropdown -->
    <div class="mobile-menu" id="mobileMenu">
      <a href="login.php" class="btn-login">
        <svg class="btn-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
          <path d="M15 3h4a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2h-4"/>
          <polyline points="10 17 15 12 10 7"/>
          <line x1="15" y1="12" x2="3" y2="12"/>
        </svg>
        Log in
      </a>
      <a href="resident_registration.php" class="btn-register">
        <svg class="btn-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
          <path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2"/>
          <circle cx="9" cy="7" r="4"/>
          <line x1="19" y1="8" x2="19" y2="14"/>
          <line x1="22" y1="11" x2="16" y2="11"/>
        </svg>
        Register
      </a>
    </div>
  </nav>

  <!-- HERO BANNER -->
  <header class="hero">
    <!-- Replace the src below with your own school photo -->
    <img
      class="hero-bg"
      src="icons/eusebia.jpg"
      alt="School campus"
      id="heroBg"
    />
    <div class="hero-overlay"></div>

    <div class="hero-content">
      <div class="seal-ring">
        <img src="icons/eusebia.png" class="login-logo" alt="Logo">
      </div>
      <h1 class="school-name">Eusebia Paz Arroyo National High School</h1>
      <p class="school-sub">DepEd &middot; Republic of the Philippines</p>
      <div class="divider-gold"></div>
      <p class="hero-caption">Mission &middot; Vision &middot; Core Values</p>
    </div>


  </header>
<br><br><br><br>
  <!-- MAIN CONTENT -->
  <main class="content">
    <div class="card-section">

      <!-- VISION -->
      <article class="mv-card">
        <div class="card-header">
          <div class="icon-badge vision">
            <svg viewBox="0 0 24 24" fill="none" stroke="#185fa5" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
              <circle cx="12" cy="12" r="3"/>
              <path d="M2 12s4-7 10-7 10 7 10 7-4 7-10 7-10-7-10-7z"/>
            </svg>
          </div>
          <div>
            <p class="card-label">Vision</p>
            <p class="card-tagline">What we aspire to become</p>
          </div>
        </div>
        <div class="card-body">
          <p>We dream of Filipinos 
who passionately love their country 
and whose values and competencies  
enable them to realize their full potential 
and contribute meaningfully to building the nation.
<br>
As a learner-centered public institution, 
the Department of Education 
continuously improves itself 
to better serve its stakeholders</p>
        </div>
      </article>

      <!-- MISSION -->
      <article class="mv-card">
        <div class="card-header">
          <div class="icon-badge mission">
            <svg viewBox="0 0 24 24" fill="none" stroke="#3b6d11" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
              <path d="M12 2L2 7l10 5 10-5-10-5z"/>
              <path d="M2 17l10 5 10-5"/>
              <path d="M2 12l10 5 10-5"/>
            </svg>
          </div>
          <div>
            <p class="card-label">Mission</p>
            <p class="card-tagline">What we commit to do</p>
          </div>
        </div>
        <div class="card-body">
          <p>To protect and promote the right of every Filipino to quality, equitable, culture-based, and complete basic education where: <br>
-Students learn in a child-friendly, gender-sensitive, safe, and motivating environment.
<br>
-Teachers facilitate learning and constantly nurture every learner.
<br>
-Administrators and staff, as stewards of the institution, ensure an enabling and supportive environment for effective learning to happen.
<br>
-Family, community, and other stakeholders are actively engaged and share responsibility for developing life-long learners.</p>
        </div>
      </article>

      <!-- CORE VALUES -->
      <article class="mv-card">
        <div class="card-header">
          <div class="icon-badge core">
            <svg viewBox="0 0 24 24" fill="none" stroke="#534ab7" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
              <path d="M12 21.35l-1.45-1.32C5.4 15.36 2 12.28 2 8.5 2 5.42 4.42 3 7.5 3c1.74 0 3.41.81 4.5 2.09C13.09 3.81 14.76 3 16.5 3 19.58 3 22 5.42 22 8.5c0 3.78-3.4 6.86-8.55 11.54L12 21.35z"/>
            </svg>
          </div>
          <div>
            <p class="card-label">Core Values</p>
            <p class="card-tagline">Principles we live by</p>
          </div>
        </div>
        <div class="card-body">
          <div class="values-grid">
            <div class="value-pill">
              <div class="value-dot dot-blue"></div>
              <span class="value-text">Maka-Diyos</span>
            </div>
            <div class="value-pill">
              <div class="value-dot dot-green"></div>
              <span class="value-text">Maka-tao</span>
            </div>
            <div class="value-pill">
              <div class="value-dot dot-purple"></div>
              <span class="value-text">Makakalikasan</span>
            </div>
            <div class="value-pill">
              <div class="value-dot dot-amber"></div>
              <span class="value-text">Makabansa</span>
            </div>
            
            
          </div>
        </div>
      </article>

    </div>
  </main>

  <!-- FOOTER -->
  <footer>
    <p>Eusebia Paz Arroyo National High School &middot; Department of Education</p>
  </footer>
  <script>
    const btn = document.getElementById('hamburgerBtn');
    const menu = document.getElementById('mobileMenu');
    btn.addEventListener('click', () => {
      menu.classList.toggle('open');
    });

    // Photo uploader
    document.getElementById('photoUpload').addEventListener('change', function () {
      const file = this.files[0];
      if (!file) return;
      const reader = new FileReader();
      reader.onload = (e) => {
        document.getElementById('heroBg').src = e.target.result;
      };
      reader.readAsDataURL(file);
    });
  </script>

</body>
</html>
