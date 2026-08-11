import React, { useState, useEffect } from 'react';

const Products = () => {
  const [products, setProducts] = useState([]);
  const [loading, setLoading] = useState(true);

  useEffect(() => {
    const fetchProducts = async () => {
      try {
        const response = await fetch('https://skysoftsystems.co.ke/api/products/');
        if (!response.ok) {
          throw new Error('Network response was not ok');
        }
        const productsData = await response.json();
        setProducts(productsData);
      } catch (error) {
        console.error("Error fetching products:", error);
      } finally {
        setLoading(false);
      }
    };

    fetchProducts();
  }, []);

  const getThemeColors = (theme) => {
    switch (theme) {
      case 'purple': return { accent: 'var(--accent-purple)', bg: 'rgba(139, 92, 246, 0.1)', text: '#fff' };
      case 'green': return { accent: 'var(--accent-green)', bg: 'rgba(16, 185, 129, 0.1)', text: '#000' };
      case 'blue':
      default: return { accent: 'var(--accent-blue)', bg: 'rgba(59, 130, 246, 0.1)', text: '#fff' };
    }
  };

  return (
    <>
      <header className="page-hero">
        <div className="container reveal">
          <h1>Our Products</h1>
        </div>
      </header>

      <section className="container" style={{ marginTop: '-4rem', position: 'relative', zIndex: 2, marginBottom: '6rem', minHeight: '50vh' }}>
        
        {loading ? (
          <div style={{ textAlign: 'center', color: 'var(--text-secondary)', fontSize: '1.2rem', padding: '4rem' }}>
            Loading products...
          </div>
        ) : products.length === 0 ? (
          <div style={{ textAlign: 'center', color: 'var(--text-secondary)', fontSize: '1.2rem', padding: '4rem' }}>
            No products available at the moment.
          </div>
        ) : (
          <div style={{ display: 'grid', gridTemplateColumns: 'repeat(auto-fit, minmax(320px, 1fr))', gap: '2rem' }}>
            {products.map((product) => {
              const colors = getThemeColors(product.theme);
              return (
                <div key={product.id} className="reveal" style={{ 
                  background: 'var(--bg-secondary)', 
                  borderRadius: '16px', 
                  overflow: 'hidden',
                  boxShadow: 'var(--shadow-soft)',
                  transition: 'var(--transition)',
                  display: 'flex',
                  flexDirection: 'column',
                  border: '1px solid rgba(0,0,0,0.05)'
                }}
                onMouseEnter={(e) => {
                  e.currentTarget.style.transform = 'translateY(-10px)';
                  e.currentTarget.style.boxShadow = 'var(--shadow-hover)';
                }}
                onMouseLeave={(e) => {
                  e.currentTarget.style.transform = 'translateY(0)';
                  e.currentTarget.style.boxShadow = 'var(--shadow-soft)';
                }}
                >
                  {/* Image Section */}
                  <div style={{ width: '100%', height: '250px', background: 'var(--bg-secondary)', position: 'relative', display: 'flex', alignItems: 'center', justifyContent: 'center', padding: '1.5rem', borderBottom: '1px solid rgba(0,0,0,0.05)' }}>
                    {product.imageUrl ? (
                      <img src={product.imageUrl} alt={product.model} style={{ maxWidth: '100%', maxHeight: '100%', objectFit: 'contain' }} />
                    ) : (
                      <div style={{ width: '100%', height: '100%', display: 'flex', alignItems: 'center', justifyContent: 'center', color: 'var(--text-secondary)' }}>
                        <span>No Image Available</span>
                      </div>
                    )}
                    <div style={{ position: 'absolute', top: '1rem', right: '1rem', background: colors.bg, color: colors.accent, padding: '0.4rem 1rem', borderRadius: '50px', fontWeight: 'bold', backdropFilter: 'blur(10px)', border: `1px solid ${colors.accent}40` }}>
                      {product.price}
                    </div>
                  </div>

                  {/* Content Section */}
                  <div style={{ padding: '2rem', display: 'flex', flexDirection: 'column', flexGrow: 1 }}>
                    <h3 style={{ color: 'var(--text-primary)', fontSize: '1.6rem', margin: '0 0 1rem 0' }}>{product.model}</h3>
                    <p style={{ color: 'var(--text-secondary)', fontSize: '1rem', marginBottom: '1.5rem', flexGrow: 1 }}>{product.description}</p>
                    
                    <div style={{ display: 'grid', gridTemplateColumns: '1fr 1fr', gap: '1rem', marginBottom: '2rem', background: 'var(--bg-primary)', padding: '1rem', borderRadius: '12px' }}>
                      <div>
                        <h4 style={{ color: 'var(--text-secondary)', fontSize: '0.8rem', marginBottom: '0.2rem', textTransform: 'uppercase', letterSpacing: '0.5px' }}>Capacity</h4>
                        <p style={{ fontWeight: 'bold', fontSize: '0.95rem', color: 'var(--text-primary)', margin: 0 }}>{product.capacity}</p>
                      </div>
                      <div>
                        <h4 style={{ color: 'var(--text-secondary)', fontSize: '0.8rem', marginBottom: '0.2rem', textTransform: 'uppercase', letterSpacing: '0.5px' }}>Use Case</h4>
                        <p style={{ fontWeight: 'bold', fontSize: '0.95rem', color: 'var(--text-primary)', margin: 0 }}>{product.useCase}</p>
                      </div>
                    </div>

                    <a href="/contact" className="btn btn-primary" style={{ background: colors.accent, color: '#fff', textAlign: 'center', width: '100%' }}>Inquire Now</a>
                  </div>
                </div>
              );
            })}
          </div>
        )}
      </section>
    </>
  );
};

export default Products;
