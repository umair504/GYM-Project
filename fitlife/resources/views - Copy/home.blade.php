@extends('layouts.app')

@section('title', 'Welcome to FitLife Gym')

@section('content')
<!-- Internal CSS for Home Page (self-contained) -->
<style>
/* Reset-ish (page-local) */
.home-section *, .home-section *::before, .home-section *::after {
  box-sizing: border-box;
  margin: 0;
  padding: 0;
}

/* Page background & container */
.home-section {
  min-height: calc(100vh - 140px); /* account for header/footer */
  display: flex;
  align-items: center;
  justify-content: center;
  padding: 64px 20px;
  background: linear-gradient(135deg, #e9f7ef 0%, #f7fbff 40%, #f1f8f4 100%);
  color: #0f1724;
}

/* Inner content card */
.home-card {
  width: 100%;
  max-width: 1100px;
  display: grid;
  grid-template-columns: 1fr 480px;
  gap: 32px;
  align-items: center;
  background: linear-gradient(180deg, rgba(255,255,255,0.96), rgba(250,250,250,0.98));
  border-radius: 18px;
  padding: 36px;
  box-shadow: 0 10px 40px rgba(13, 18, 25, 0.08);
  border: 1px solid rgba(15, 23, 36, 0.04);
}

/* Left column (text) */
.home-text h1 {
  font-family: 'Poppins', system-ui, -apple-system, "Segoe UI", Roboto, "Helvetica Neue", Arial;
  font-size: 2.6rem;
  line-height: 1.05;
  color: #071022;
  margin-bottom: 14px;
  letter-spacing: -0.5px;
}

.home-text p {
  color: #334155;
  font-size: 1.05rem;
  line-height: 1.6;
  margin-bottom: 14px;
}

/* Accent lead paragraph */
.home-text .lead {
  font-weight: 600;
  color: #0b3b2a;
  margin-bottom: 18px;
}

/* CTA row */
.cta-row {
  display: flex;
  gap: 12px;
  align-items: center;
  margin-top: 18px;
}

.btn {
  display: inline-flex;
  align-items: center;
  gap: 10px;
  background: linear-gradient(90deg, #1f8ef1 0%, #27ae60 100%);
  color: #fff;
  padding: 12px 18px;
  border-radius: 10px;
  font-weight: 600;
  border: none;
  cursor: pointer;
  text-decoration: none;
  transition: transform .16s ease, box-shadow .16s ease, opacity .16s ease;
  box-shadow: 0 8px 24px rgba(39, 174, 96, 0.12);
}

.btn:hover {
  transform: translateY(-3px);
  box-shadow: 0 14px 40px rgba(31, 142, 241, 0.12);
}

/* Secondary button look */
.btn.ghost {
  background: transparent;
  border: 1px solid rgba(7,16,34,0.06);
  color: #0b3b2a;
  box-shadow: none;
}

/* Right column (image / highlights) */
.home-visual {
  display: flex;
  flex-direction: column;
  gap: 18px;
  align-items: center;
  justify-content: center;
}

/* Hero image container */
.hero-image {
  width: 100%;
  max-width: 420px;
  border-radius: 14px;
  overflow: hidden;
  box-shadow: 0 18px 40px rgba(9, 30, 14, 0.06);
  border: 1px solid rgba(15,23,36,0.04);
}

/* Small feature badges below image */
.feature-badges {
  display: flex;
  gap: 10px;
  flex-wrap: wrap;
  justify-content: center;
  margin-top: 8px;
}

.badge {
  background: #f1fbf6;
  color: #0b3b2a;
  border-radius: 999px;
  padding: 8px 12px;
  font-weight: 600;
  font-size: 0.9rem;
  box-shadow: 0 6px 18px rgba(7, 19, 15, 0.04);
  border: 1px solid rgba(11,59,42,0.04);
}

/* Decorative underline */
.underline {
  height: 6px;
  width: 84px;
  border-radius: 999px;
  background: linear-gradient(90deg, rgba(31,142,241,0.95), rgba(39,174,96,0.95));
  margin: 18px 0;
}

/* Responsive adjustments */
@media (max-width: 980px) {
  .home-card {
    grid-template-columns: 1fr;
    padding: 26px;
  }

  .home-visual {
    order: -1; 
  }

  .home-text h1 {
    font-size: 2.2rem;
  }
}

@media (max-width: 520px) {
  .home-section {
    padding: 36px 12px;
  }

  .home-card {
    padding: 18px;
    gap: 18px;
  }

  .home-text h1 {
    font-size: 1.8rem;
  }

  .btn {
    padding: 10px 14px;
    font-size: 0.95rem;
  }
}

/* Small utility classes for alignment within page (optional) */
.text-muted { color: #64748b; }
.center { text-align: center; }
.m-b-8 { margin-bottom: 8px; }
.m-b-16 { margin-bottom: 16px; }

</style>

<!-- Markup -->
<div class="home-section">
  <div class="home-card" role="region" aria-label="FitLife Gym introduction">
    <div class="home-text">
      <div class="underline" aria-hidden="true"></div>
      <h1>Welcome to FitLife Gym</h1>
      <p class="lead">Transform your body, mind, and life — one workout at a time.</p>
      <p>
        We offer premium equipment, expert trainers, and world-class facilities to help you reach your goals.
        Whether you're just starting or training for performance, FitLife is your community for progress.
      </p>

      <div class="cta-row">
        <a href="{{ route('membership') }}" class="btn" aria-label="See membership plans">Join Now</a>
        <a href="{{ route('accessories') }}" class="btn ghost" aria-label="View accessories">Shop Gear</a>
      </div>
    </div>

    <div class="home-visual" aria-hidden="false">
      <div class="hero-image" role="img" aria-label="People working out in gym">
        <!-- Use your own image or keep the unsplash link -->
        <img src="https://thumbs.dreamstime.com/b/weightlifter-clapping-hands-preparing-workout-gym-focus-dust-112033565.jpg" alt="Gym workout scene">
      </div>

      <div class="feature-badges" aria-hidden="true">
        <div class="badge">Personal Trainers</div>
        <div class="badge">24/7 Access</div>
        <div class="badge">Group Classes</div>
        <div class="badge">Nutrition Plans</div>
      </div>
    </div>
  </div>
</div>
@endsection
