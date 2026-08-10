import React from 'react';

const Products = () => {
  return (
    <>
      <header className="page-hero">
        <div className="container reveal">
          <h1>Our Products</h1>
        </div>
      </header>

      <section className="services container" style={{ marginTop: '-4rem', position: 'relative', zIndex: 2, marginBottom: '6rem' }}>
        <div className="services-grid">
          
          {/* Product 1 */}
          <div className="service-card reveal solution-card" style={{ background: 'var(--bg-secondary)', borderColor: 'rgba(0,0,0,0.05)' }}>
            <div className="card-content solution-content" style={{ width: '100%', padding: '3rem' }}>
              <h3 className="text-gradient" style={{ fontSize: '2rem' }}>Enterprise Cloud Suite</h3>
              <p style={{ fontSize: '1.1rem', marginBottom: '2rem' }}>A comprehensive, scalable cloud management platform designed for enterprise workloads. Secure, highly available, and perfectly tailored for large organizations.</p>
              <ul style={{ listStyleType: 'none', padding: 0, marginBottom: '2rem' }}>
                <li style={{ padding: '0.5rem 0', borderBottom: '1px solid rgba(0,0,0,0.1)' }}>✓ Real-time analytics and monitoring</li>
                <li style={{ padding: '0.5rem 0', borderBottom: '1px solid rgba(0,0,0,0.1)' }}>✓ Automated load balancing</li>
                <li style={{ padding: '0.5rem 0', borderBottom: '1px solid rgba(0,0,0,0.1)' }}>✓ End-to-end encryption</li>
              </ul>
              <a href="#contact" className="btn btn-primary">Learn More</a>
            </div>
          </div>

          {/* Product 2 */}
          <div className="service-card reveal solution-card" style={{ background: 'var(--bg-secondary)', borderColor: 'rgba(0,0,0,0.05)' }}>
            <div className="card-content solution-content" style={{ width: '100%', padding: '3rem' }}>
              <h3 style={{ color: 'var(--accent-purple)', fontSize: '2rem' }}>Network Security Gateway</h3>
              <p style={{ fontSize: '1.1rem', marginBottom: '2rem' }}>Next-generation firewall and intrusion prevention system. Protect your corporate network from sophisticated cyber threats with zero-trust architecture.</p>
              <ul style={{ listStyleType: 'none', padding: 0, marginBottom: '2rem' }}>
                <li style={{ padding: '0.5rem 0', borderBottom: '1px solid rgba(0,0,0,0.1)' }}>✓ Advanced threat protection</li>
                <li style={{ padding: '0.5rem 0', borderBottom: '1px solid rgba(0,0,0,0.1)' }}>✓ Deep packet inspection</li>
                <li style={{ padding: '0.5rem 0', borderBottom: '1px solid rgba(0,0,0,0.1)' }}>✓ Centralized management console</li>
              </ul>
              <a href="#contact" className="btn btn-primary" style={{ background: 'var(--accent-purple)', color: '#fff' }}>Learn More</a>
            </div>
          </div>
          
          {/* Product 3 */}
          <div className="service-card reveal solution-card" style={{ background: 'var(--bg-secondary)', borderColor: 'rgba(0,0,0,0.05)' }}>
            <div className="card-content solution-content" style={{ width: '100%', padding: '3rem' }}>
              <h3 style={{ color: 'var(--accent-green)', fontSize: '2rem' }}>Smart POS System</h3>
              <p style={{ fontSize: '1.1rem', marginBottom: '2rem' }}>A modern, cloud-connected point-of-sale hardware and software bundle tailored for retail and hospitality businesses in East Africa.</p>
              <ul style={{ listStyleType: 'none', padding: 0, marginBottom: '2rem' }}>
                <li style={{ padding: '0.5rem 0', borderBottom: '1px solid rgba(0,0,0,0.1)' }}>✓ Integrated mobile payments</li>
                <li style={{ padding: '0.5rem 0', borderBottom: '1px solid rgba(0,0,0,0.1)' }}>✓ Real-time inventory tracking</li>
                <li style={{ padding: '0.5rem 0', borderBottom: '1px solid rgba(0,0,0,0.1)' }}>✓ Offline mode capabilities</li>
              </ul>
              <a href="#contact" className="btn btn-primary" style={{ background: 'var(--accent-green)', color: '#000' }}>Learn More</a>
            </div>
          </div>

        </div>
      </section>
    </>
  );
};

export default Products;
