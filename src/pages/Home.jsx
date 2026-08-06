import React from 'react';
import { Link } from 'react-router-dom';

const Home = () => {
  return (
    <>
      <header className="hero">
        <div className="hero-bg"></div>
        <div className="container hero-content">
          <h1 className="hero-title" style={{ fontSize: '6rem', marginBottom: '1rem', fontWeight: 800 }}>
            <span className="text-gradient">SkySoft Systems</span>
          </h1>
          <h2 className="subtitle" style={{ color: '#ffffff', textShadow: '0 4px 15px rgba(0,0,0,0.5)', fontSize: '2rem', marginBottom: '2rem', fontWeight: 600 }}>End-to-end digital & networking solutions</h2>
          <p className="hero-description" style={{ color: '#ffffff', textShadow: '0 4px 15px rgba(0,0,0,0.5)', fontSize: '1.25rem', fontFamily: "'JetBrains Mono', monospace", marginBottom: '2.5rem' }}>
            We Build Modern Software, Cloud, And Enterprise Networking.
          </p>
          <Link to="/solutions" className="btn btn-primary">Explore Solutions</Link>
        </div>
      </header>

      {/* About Us Section */}
      <section id="about" className="container about-section" style={{ padding: '6rem 2rem' }}>
        <div className="about-grid">
          <div className="about-content">
            <h2 className="text-gradient" style={{ fontSize: '2.5rem', marginBottom: '1.5rem' }}>About Us</h2>
            <p style={{ fontSize: '1.1rem', color: 'var(--text-secondary)', lineHeight: '1.8', marginBottom: '1.5rem' }}>
              At SkySoft Systems, we bridge the gap between complex business challenges and scalable technological solutions. Our team of elite engineers specializes in delivering mission-critical web applications, enterprise mobile platforms, and robust cloud networking infrastructures.
            </p>
            <p style={{ fontSize: '1.1rem', color: 'var(--text-secondary)', lineHeight: '1.8' }}>
              We empower modern businesses to thrive in a digital-first world by building systems that are not just functional, but beautifully designed, highly secure, and scalable from day one.
            </p>
          </div>
          <div className="about-image-wrapper">
            <img src="/assets/images/about_engineering.jpg" alt="Engineering the Future" className="about-image" />
            <div className="image-accent"></div>
          </div>
        </div>
      </section>

      {/* Services Section */}
      <section id="services" className="services container">
        <div className="section-header">
          <h2 className="text-gradient">Our Services</h2>
          <p style={{ color: 'var(--text-secondary)' }}>Delivering robust, scalable, and secure technology solutions.</p>
        </div>

        <div className="services-grid">
          <div className="service-card reveal">
            <img src="/assets/images/web_dev_card.jpg" alt="Custom Web Development" className="card-img" />
            <div className="card-content">
              <h3>Custom Web Development</h3>
              <p>Responsive web apps, SaaS platforms, and business portals built with modern stacks. Secure, scalable, and maintainable from day one.</p>
              <Link to="/solutions" className="btn btn-outline">Learn more</Link>
            </div>
          </div>

          <div className="service-card reveal" style={{ transitionDelay: '0.1s' }}>
            <img src="/assets/images/mobile_dev_card.jpg" alt="Mobile App Development" className="card-img" />
            <div className="card-content">
              <h3>Native & Cross-Platform</h3>
              <p>High-performance iOS and Android applications. Engaging user experiences backed by robust APIs and offline synchronization.</p>
              <Link to="/solutions" className="btn btn-outline">Learn more</Link>
            </div>
          </div>

          <div className="service-card reveal" style={{ transitionDelay: '0.2s' }}>
            <img src="/assets/images/cloud_network_card.jpg" alt="Cloud & Networking" className="card-img" />
            <div className="card-content">
              <h3>Enterprise Networking</h3>
              <p>Secure cloud architecture, robust enterprise networking solutions, and seamless digital infrastructure management.</p>
              <Link to="/solutions" className="btn btn-outline">Learn more</Link>
            </div>
          </div>
        </div>
      </section>

      {/* Why Choose Us Section */}
      <section className="partner-section">
        <div className="partner-bg"></div>
        <div className="container relative-z">
          <div className="section-header">
            <h2 style={{ color: '#ffffff', textShadow: '0 4px 15px rgba(0,0,0,0.3)' }}>Why Partner With Us?</h2>
          </div>
          <div className="features-grid">
            <div className="feature-item">
              <div className="feature-icon" style={{ background: 'rgba(59, 130, 246, 0.15)', color: 'var(--accent-blue)' }}>⚡</div>
              <h3>Agile Delivery</h3>
              <p>We deploy fast and iterate quickly. Our agile methodology ensures you see tangible progress every week.</p>
            </div>
            <div className="feature-item" style={{ transitionDelay: '0.1s' }}>
              <div className="feature-icon" style={{ background: 'rgba(16, 185, 129, 0.15)', color: 'var(--accent-green)' }}>🔒</div>
              <h3>Security First</h3>
              <p>From code to cloud infrastructure, we implement industry-leading security practices to protect your data.</p>
            </div>
            <div className="feature-item" style={{ transitionDelay: '0.2s' }}>
              <div className="feature-icon" style={{ background: 'rgba(139, 92, 246, 0.15)', color: 'var(--accent-purple)' }}>📈</div>
              <h3>Scalable Architecture</h3>
              <p>We build systems designed to grow with your business, handling millions of requests with zero downtime.</p>
            </div>
          </div>
        </div>
      </section>

      {/* Tech Stack Section */}
      <section className="container" style={{ padding: '4rem 2rem 8rem' }}>
        <div className="section-header reveal">
          <h2>Our Technology Stack</h2>
          <p style={{ color: 'var(--text-secondary)' }}>We use the best tools in the industry to build world-class software.</p>
        </div>
        
        <div className="tech-stack-grid reveal">
          <div className="tech-item">React & React Native</div>
          <div className="tech-item">Node.js & Express</div>
          <div className="tech-item">Python & Django</div>
          <div className="tech-item">AWS & Azure</div>
          <div className="tech-item">Docker & Kubernetes</div>
          <div className="tech-item">PostgreSQL & MongoDB</div>
          <div className="tech-item">TypeScript</div>
          <div className="tech-item">GraphQL</div>
        </div>

        <div style={{ textAlign: 'center', marginTop: '6rem' }} className="reveal">
          <Link to="/contact" className="btn btn-primary">Start Your Project</Link>
        </div>
      </section>
    </>
  );
};

export default Home;
