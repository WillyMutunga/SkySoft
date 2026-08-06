import React from 'react';

const Contact = () => {
  return (
    <>
      <header className="page-hero">
        <div className="container reveal">
          <h1>Contact Us</h1>
        </div>
      </header>

      <section className="container" style={{ marginTop: '-4rem', marginBottom: '6rem', position: 'relative', zIndex: 2 }}>
        <div className="contact-grid">
          
          <div className="contact-info reveal" style={{ background: 'var(--bg-secondary)', padding: '3rem', borderRadius: '20px', boxShadow: 'var(--shadow-soft)' }}>
            <h2 style={{ marginBottom: '1.5rem', fontSize: '2rem' }}>Get in Touch</h2>
            <p style={{ color: 'var(--text-secondary)', marginBottom: '2rem' }}>Ready to start your next big project? Reach out to our team of experts and let's build something amazing together.</p>
            
            <div style={{ marginBottom: '1.5rem' }}>
              <h4 style={{ color: 'var(--accent-blue)', marginBottom: '0.5rem' }}>Email</h4>
              <p>info@skysoftsystems.co.ke</p>
            </div>
            <div style={{ marginBottom: '1.5rem' }}>
              <h4 style={{ color: 'var(--accent-cyan)', marginBottom: '0.5rem' }}>Phone</h4>
              <p>+254 (0) 742 765 445<br/>+254 (0) 741 233 179</p>
            </div>
            <div>
              <h4 style={{ color: 'var(--accent-green)', marginBottom: '0.5rem' }}>Location</h4>
              <p>Nairobi, Kenya</p>
            </div>
          </div>

          <div className="contact-form reveal" style={{ transitionDelay: '0.2s', background: 'var(--bg-secondary)', padding: '3rem', borderRadius: '20px', boxShadow: 'var(--shadow-soft)' }}>
            <h3 style={{ marginBottom: '2rem', fontSize: '1.5rem' }}>Send us a message</h3>
            <form onSubmit={(e) => e.preventDefault()}>
              <div className="form-group">
                <label>Name</label>
                <input type="text" placeholder="John Doe" />
              </div>
              <div className="form-group">
                <label>Email</label>
                <input type="email" placeholder="john@company.com" />
              </div>
              <div className="form-group">
                <label>Message</label>
                <textarea rows="4" placeholder="Tell us about your project..."></textarea>
              </div>
              <button type="submit" className="btn btn-primary" style={{ width: '100%', marginTop: '1rem' }}>Send Message</button>
            </form>
          </div>

        </div>
      </section>
    </>
  );
};

export default Contact;
