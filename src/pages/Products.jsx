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
              <div style={{ display: 'flex', justifyContent: 'space-between', alignItems: 'flex-start', flexWrap: 'wrap', gap: '1rem' }}>
                <h3 className="text-gradient" style={{ fontSize: '2rem', margin: 0 }}>APC Easy UPS BV800I-MSX</h3>
                <span style={{ background: 'rgba(59, 130, 246, 0.1)', color: 'var(--accent-blue)', padding: '0.5rem 1rem', borderRadius: '50px', fontWeight: 'bold' }}>KSh 12,500 – KSh 14,000</span>
              </div>
              <p style={{ fontSize: '1.1rem', marginTop: '1rem', marginBottom: '2rem' }}>Reliable battery backup and surge protection for your essential home and office devices.</p>
              
              <div style={{ display: 'grid', gridTemplateColumns: 'repeat(auto-fit, minmax(200px, 1fr))', gap: '1.5rem', marginBottom: '2rem', background: 'var(--bg-primary)', padding: '1.5rem', borderRadius: '12px' }}>
                <div>
                  <h4 style={{ color: 'var(--text-secondary)', fontSize: '0.9rem', marginBottom: '0.3rem' }}>Power Capacity</h4>
                  <p style={{ fontWeight: 'bold', fontSize: '1.1rem' }}>800VA / 450W</p>
                </div>
                <div>
                  <h4 style={{ color: 'var(--text-secondary)', fontSize: '0.9rem', marginBottom: '0.3rem' }}>Typical Use Case</h4>
                  <p style={{ fontWeight: 'bold', fontSize: '1.1rem' }}>Wi-Fi routers, TVs, and small electronics</p>
                </div>
              </div>
              
              <a href="/contact" className="btn btn-primary">Inquire Now</a>
            </div>
          </div>

          {/* Product 2 */}
          <div className="service-card reveal solution-card" style={{ background: 'var(--bg-secondary)', borderColor: 'rgba(0,0,0,0.05)' }}>
            <div className="card-content solution-content" style={{ width: '100%', padding: '3rem' }}>
              <div style={{ display: 'flex', justifyContent: 'space-between', alignItems: 'flex-start', flexWrap: 'wrap', gap: '1rem' }}>
                <h3 style={{ color: 'var(--accent-purple)', fontSize: '2rem', margin: 0 }}>APC Back-UPS BX1400UI</h3>
                <span style={{ background: 'rgba(139, 92, 246, 0.1)', color: 'var(--accent-purple)', padding: '0.5rem 1rem', borderRadius: '50px', fontWeight: 'bold' }}>KSh 24,000 – KSh 26,000</span>
              </div>
              <p style={{ fontSize: '1.1rem', marginTop: '1rem', marginBottom: '2rem' }}>High-performance battery backup and protection for demanding electronics and computers.</p>
              
              <div style={{ display: 'grid', gridTemplateColumns: 'repeat(auto-fit, minmax(200px, 1fr))', gap: '1.5rem', marginBottom: '2rem', background: 'var(--bg-primary)', padding: '1.5rem', borderRadius: '12px' }}>
                <div>
                  <h4 style={{ color: 'var(--text-secondary)', fontSize: '0.9rem', marginBottom: '0.3rem' }}>Power Capacity</h4>
                  <p style={{ fontWeight: 'bold', fontSize: '1.1rem' }}>1400VA / 700W</p>
                </div>
                <div>
                  <h4 style={{ color: 'var(--text-secondary)', fontSize: '0.9rem', marginBottom: '0.3rem' }}>Typical Use Case</h4>
                  <p style={{ fontWeight: 'bold', fontSize: '1.1rem' }}>Desktop computers and home entertainment systems</p>
                </div>
              </div>

              <a href="/contact" className="btn btn-primary" style={{ background: 'var(--accent-purple)', color: '#fff' }}>Inquire Now</a>
            </div>
          </div>
          
          {/* Product 3 */}
          <div className="service-card reveal solution-card" style={{ background: 'var(--bg-secondary)', borderColor: 'rgba(0,0,0,0.05)' }}>
            <div className="card-content solution-content" style={{ width: '100%', padding: '3rem' }}>
              <div style={{ display: 'flex', justifyContent: 'space-between', alignItems: 'flex-start', flexWrap: 'wrap', gap: '1rem' }}>
                <h3 style={{ color: 'var(--accent-green)', fontSize: '2rem', margin: 0 }}>APC Smart-UPS SMC1000IC</h3>
                <span style={{ background: 'rgba(16, 185, 129, 0.1)', color: 'var(--accent-green)', padding: '0.5rem 1rem', borderRadius: '50px', fontWeight: 'bold' }}>KSh 64,000 – KSh 66,000</span>
              </div>
              <p style={{ fontSize: '1.1rem', marginTop: '1rem', marginBottom: '2rem' }}>Intelligent and efficient network power protection from entry level to scaleable runtime.</p>
              
              <div style={{ display: 'grid', gridTemplateColumns: 'repeat(auto-fit, minmax(200px, 1fr))', gap: '1.5rem', marginBottom: '2rem', background: 'var(--bg-primary)', padding: '1.5rem', borderRadius: '12px' }}>
                <div>
                  <h4 style={{ color: 'var(--text-secondary)', fontSize: '0.9rem', marginBottom: '0.3rem' }}>Power Capacity</h4>
                  <p style={{ fontWeight: 'bold', fontSize: '1.1rem' }}>1000VA / 600W</p>
                </div>
                <div>
                  <h4 style={{ color: 'var(--text-secondary)', fontSize: '0.9rem', marginBottom: '0.3rem' }}>Typical Use Case</h4>
                  <p style={{ fontWeight: 'bold', fontSize: '1.1rem' }}>Office servers, networking racks, and hubs</p>
                </div>
              </div>

              <a href="/contact" className="btn btn-primary" style={{ background: 'var(--accent-green)', color: '#000' }}>Inquire Now</a>
            </div>
          </div>

        </div>
      </section>
    </>
  );
};

export default Products;
