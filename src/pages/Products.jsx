import React, { useState, useEffect } from 'react';
import { collection, onSnapshot } from 'firebase/firestore';
import { db } from '../firebase';

const Products = () => {
  const [products, setProducts] = useState([]);
  const [loading, setLoading] = useState(true);

  useEffect(() => {
    const unsubscribe = onSnapshot(collection(db, "products"), (querySnapshot) => {
      const productsData = [];
      querySnapshot.forEach((doc) => {
        productsData.push({ id: doc.id, ...doc.data() });
      });
      
      // Safe sorting logic
      productsData.sort((a, b) => {
        const timeA = a.createdAt?.seconds || 0;
        const timeB = b.createdAt?.seconds || 0;
        return timeB - timeA;
      });
      
      setProducts(productsData);
      setLoading(false);
    }, (error) => {
      console.error("Error fetching products:", error);
      setLoading(false);
    });

    return () => unsubscribe();
  }, []);

  // Helper to map themes to accent colors
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

      <section className="services container" style={{ marginTop: '-4rem', position: 'relative', zIndex: 2, marginBottom: '6rem', minHeight: '50vh' }}>
        
        {loading ? (
          <div style={{ textAlign: 'center', color: 'var(--text-secondary)', fontSize: '1.2rem', padding: '4rem' }}>
            Loading products...
          </div>
        ) : products.length === 0 ? (
          <div style={{ textAlign: 'center', color: 'var(--text-secondary)', fontSize: '1.2rem', padding: '4rem' }}>
            No products available at the moment.
          </div>
        ) : (
          <div className="services-grid">
            {products.map((product) => {
              const colors = getThemeColors(product.theme);
              return (
                <div key={product.id} className="service-card reveal solution-card" style={{ background: 'var(--bg-secondary)', borderColor: 'rgba(0,0,0,0.05)' }}>
                  <div className="card-content solution-content" style={{ width: '100%', padding: '3rem' }}>
                    <div style={{ display: 'flex', justifyContent: 'space-between', alignItems: 'flex-start', flexWrap: 'wrap', gap: '1rem' }}>
                      <h3 style={{ color: colors.accent, fontSize: '2rem', margin: 0 }}>{product.model}</h3>
                      <span style={{ background: colors.bg, color: colors.accent, padding: '0.5rem 1rem', borderRadius: '50px', fontWeight: 'bold' }}>
                        {product.price}
                      </span>
                    </div>
                    <p style={{ fontSize: '1.1rem', marginTop: '1rem', marginBottom: '2rem' }}>{product.description}</p>
                    
                    <div style={{ display: 'grid', gridTemplateColumns: 'repeat(auto-fit, minmax(200px, 1fr))', gap: '1.5rem', marginBottom: '2rem', background: 'var(--bg-primary)', padding: '1.5rem', borderRadius: '12px' }}>
                      <div>
                        <h4 style={{ color: 'var(--text-secondary)', fontSize: '0.9rem', marginBottom: '0.3rem' }}>Power Capacity</h4>
                        <p style={{ fontWeight: 'bold', fontSize: '1.1rem' }}>{product.capacity}</p>
                      </div>
                      <div>
                        <h4 style={{ color: 'var(--text-secondary)', fontSize: '0.9rem', marginBottom: '0.3rem' }}>Typical Use Case</h4>
                        <p style={{ fontWeight: 'bold', fontSize: '1.1rem' }}>{product.useCase}</p>
                      </div>
                    </div>

                    <a href="/contact" className="btn btn-primary" style={{ background: colors.accent, color: colors.text }}>Inquire Now</a>
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
