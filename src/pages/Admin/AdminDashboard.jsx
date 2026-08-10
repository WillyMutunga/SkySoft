import React, { useState, useEffect } from 'react';
import { collection, addDoc, onSnapshot, deleteDoc, doc } from 'firebase/firestore';
import { signOut } from 'firebase/auth';
import { db, auth } from '../../firebase';
import { useNavigate } from 'react-router-dom';

const AdminDashboard = () => {
  const [products, setProducts] = useState([]);
  const [loading, setLoading] = useState(true);
  const navigate = useNavigate();

  // Form states
  const [model, setModel] = useState('');
  const [price, setPrice] = useState('');
  const [description, setDescription] = useState('');
  const [capacity, setCapacity] = useState('');
  const [useCase, setUseCase] = useState('');
  const [theme, setTheme] = useState('blue');

  useEffect(() => {
    setLoading(true);
    const unsubscribe = onSnapshot(collection(db, "products"), (querySnapshot) => {
      const productsData = [];
      querySnapshot.forEach((doc) => {
        productsData.push({ id: doc.id, ...doc.data() });
      });
      // Safe sort
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

  const handleAddProduct = async (e) => {
    e.preventDefault();
    try {
      await addDoc(collection(db, "products"), {
        model,
        price,
        description,
        capacity,
        useCase,
        theme,
        createdAt: new Date()
      });
      setModel(''); setPrice(''); setDescription(''); setCapacity(''); setUseCase(''); setTheme('blue');
    } catch (err) {
      console.error("Error adding document: ", err);
      alert("Failed to add product");
    }
  };

  const handleDelete = async (id) => {
    if(window.confirm("Are you sure you want to delete this product?")) {
      await deleteDoc(doc(db, "products", id));
    }
  };

  const handleLogout = async () => {
    await signOut(auth);
    navigate('/admin');
  };

  return (
    <div style={{ padding: '8rem 2rem 4rem', background: 'var(--bg-primary)', minHeight: '100vh', color: 'var(--text-primary)' }}>
      <div className="container" style={{ maxWidth: '1000px' }}>
        <div style={{ display: 'flex', justifyContent: 'space-between', alignItems: 'center', marginBottom: '3rem' }}>
          <h1 style={{ color: 'var(--text-primary)' }}>Admin Dashboard</h1>
          <button onClick={handleLogout} className="btn" style={{ background: 'transparent', border: '1px solid var(--accent-blue)', color: 'var(--accent-blue)' }}>Logout</button>
        </div>

        <div style={{ display: 'grid', gridTemplateColumns: 'repeat(auto-fit, minmax(300px, 1fr))', gap: '3rem' }}>
          
          {/* Add Product Form */}
          <div className="service-card" style={{ padding: '2rem', background: 'var(--bg-secondary)', borderRadius: '12px', height: 'fit-content', boxShadow: 'var(--shadow-soft)' }}>
            <h3 style={{ marginBottom: '1.5rem', color: 'var(--text-primary)' }}>Add New Product</h3>
            <form onSubmit={handleAddProduct} style={{ display: 'flex', flexDirection: 'column', gap: '1rem' }}>
              <input type="text" placeholder="Model Name (e.g. APC Smart-UPS)" value={model} onChange={e => setModel(e.target.value)} required style={inputStyle} />
              <input type="text" placeholder="Price (e.g. KSh 12,500)" value={price} onChange={e => setPrice(e.target.value)} required style={inputStyle} />
              <textarea placeholder="Description" value={description} onChange={e => setDescription(e.target.value)} required style={{...inputStyle, minHeight: '80px', resize: 'vertical'}} />
              <input type="text" placeholder="Power Capacity (e.g. 800VA / 450W)" value={capacity} onChange={e => setCapacity(e.target.value)} required style={inputStyle} />
              <input type="text" placeholder="Typical Use Case" value={useCase} onChange={e => setUseCase(e.target.value)} required style={inputStyle} />
              <select value={theme} onChange={e => setTheme(e.target.value)} style={inputStyle}>
                <option value="blue">Blue Theme</option>
                <option value="purple">Purple Theme</option>
                <option value="green">Green Theme</option>
              </select>
              <button type="submit" className="btn btn-primary" style={{ marginTop: '1rem' }}>Add Product</button>
            </form>
          </div>

          {/* Product List */}
          <div>
            <h3 style={{ marginBottom: '1.5rem', color: 'var(--text-primary)' }}>Manage Products</h3>
            {loading ? <p>Loading products...</p> : (
              <div style={{ display: 'flex', flexDirection: 'column', gap: '1rem' }}>
                {products.length === 0 && <p style={{ color: 'var(--text-secondary)' }}>No products found. Add one!</p>}
                {products.map(product => (
                  <div key={product.id} style={{ background: 'var(--bg-secondary)', padding: '1.5rem', borderRadius: '12px', display: 'flex', justifyContent: 'space-between', alignItems: 'center', boxShadow: 'var(--shadow-soft)' }}>
                    <div>
                      <h4 style={{ fontSize: '1.2rem', marginBottom: '0.3rem', color: 'var(--text-primary)' }}>{product.model}</h4>
                      <p style={{ color: 'var(--accent-blue)', fontWeight: 'bold' }}>{product.price}</p>
                    </div>
                    <button onClick={() => handleDelete(product.id)} style={{ background: '#ef4444', color: '#fff', border: 'none', padding: '0.5rem 1rem', borderRadius: '8px', cursor: 'pointer', fontWeight: 'bold' }}>Delete</button>
                  </div>
                ))}
              </div>
            )}
          </div>

        </div>
      </div>
    </div>
  );
};

const inputStyle = {
  width: '100%', 
  padding: '0.75rem', 
  borderRadius: '8px', 
  border: '1px solid rgba(0,0,0,0.1)', 
  background: 'var(--bg-primary)', 
  color: 'var(--text-primary)',
  fontFamily: 'inherit',
  fontSize: '0.95rem'
};

export default AdminDashboard;
