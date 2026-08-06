import React from 'react';

const Solutions = () => {
  return (
    <>
      <header className="page-hero">
        <div className="container reveal">
          <h1>Solutions</h1>
        </div>
      </header>

      <section className="services container" style={{ marginTop: '-4rem' }}>
        <div className="services-grid">
          {/* Web Dev */}
          <div className="service-card reveal" style={{ display: 'flex', flexDirection: 'row', gridColumn: '1 / -1', alignItems: 'center' }}>
            <img src="/assets/images/web_dev_card.jpg" alt="Custom Web Development" className="card-img" style={{ width: '40%', height: '300px' }} />
            <div className="card-content" style={{ width: '60%', padding: '3rem' }}>
              <h3 className="text-gradient" style={{ fontSize: '2rem' }}>Custom Web Development</h3>
              <p style={{ fontSize: '1.1rem', marginBottom: '2rem' }}>Responsive web apps, SaaS platforms, and business portals built with modern stacks. Secure, scalable, and maintainable from day one.</p>
              <a href="#contact" className="btn btn-primary">Get a quote</a>
            </div>
          </div>

          {/* Mobile Dev */}
          <div className="service-card reveal" style={{ display: 'flex', flexDirection: 'rowReverse', gridColumn: '1 / -1', alignItems: 'center', background: 'rgba(139, 92, 246, 0.05)', borderColor: 'rgba(139, 92, 246, 0.2)' }}>
            <img src="/assets/images/mobile_dev_card.jpg" alt="Mobile App Development" className="card-img" style={{ width: '40%', height: '300px' }} />
            <div className="card-content" style={{ width: '60%', padding: '3rem' }}>
              <h3 style={{ color: 'var(--accent-purple)', fontSize: '2rem' }}>Native & Cross-Platform Apps</h3>
              <p style={{ fontSize: '1.1rem', marginBottom: '2rem' }}>Swift, Kotlin, Flutter, and React Native development. We build high-performance mobile applications featuring offline sync, push notifications, and secure API integrations.</p>
              <a href="#contact" className="btn btn-primary" style={{ background: 'var(--accent-purple)', color: '#fff' }}>Get a quote</a>
            </div>
          </div>
          
          {/* Networking */}
          <div className="service-card reveal" style={{ display: 'flex', flexDirection: 'row', gridColumn: '1 / -1', alignItems: 'center', background: 'rgba(16, 185, 129, 0.05)', borderColor: 'rgba(16, 185, 129, 0.2)' }}>
            <img src="/assets/images/cloud_network_card.jpg" alt="Enterprise Networking" className="card-img" style={{ width: '40%', height: '300px' }} />
            <div className="card-content" style={{ width: '60%', padding: '3rem' }}>
              <h3 style={{ color: 'var(--accent-green)', fontSize: '2rem' }}>Cloud & Enterprise Networking</h3>
              <p style={{ fontSize: '1.1rem', marginBottom: '2rem' }}>Design, deploy, and manage secure enterprise networks and cloud infrastructures. From hardware setup to cloud migration and robust cybersecurity implementations.</p>
              <a href="#contact" className="btn btn-primary" style={{ background: 'var(--accent-green)', color: '#000' }}>Get a quote</a>
            </div>
          </div>
        </div>
      </section>
    </>
  );
};

export default Solutions;
