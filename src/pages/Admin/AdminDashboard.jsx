import React, { useState, useEffect } from 'react';
import { collection, addDoc, getDocs, deleteDoc, doc } from 'firebase/firestore';
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
  const [theme, setTheme] = useState('blue'); // blue, purple, green

  const fetchProducts = async () => {
    setLoading(true);
    const querySnapshot = await getDocs(collection(db, "products"));
    const productsData = [];
    querySnapshot.forEach((doc) => {
      productsData.push({ id: doc.id, ...doc.data() });
    });
    setProducts(productsData);
    setLoading(false);
  };

  useEffect(() => {
    fetchProducts();
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
      // Reset form
      setModel(''); setPrice(''); setDescription(''); setCapacity(''); setUseCase(''); setTheme('blue');
      // Refresh list
      fetchProducts();
    } catch (err) {
      console.error("Error adding document: ", err);
      alert("Failed to add product");
    }
  };

  const handleDelete = async (id) => {
    if(window.confirm("Are you sure you want to delete this product?")) {
      await deleteDoc(doc(db, "products", id));
      fetchProducts();
    }
  };

  const handleLogout = async () => {
    await signOut(auth);
    navigate('/admin');
  };

  return (
    <div style={{ padding: '4rem 2rem', background: 'var(--bg-primary)', minHeight: '100vh', color: '#fff' }}>
      <div className="container" style={{ maxWidth: '1000px' }}>
        <div style={{ display: 'flex', justifyContent: 'space-between', alignItems: 'center', marginBottom: '3rem' }}>
          <h1>Admin Dashboard</h1>
          <button onClick={handleLogout} className="btn" style={{ background: 'transparent', border: '1px solid var(--accent-blue)', color: 'var(--accent-blue)' }}>Logout</button>
        </div>

        <div style={{ display: 'grid', gridTemplateColumns: '1fr 2fr', gap: '3rem' }}>
          
          {/* Add Product Form */}
          <div className="service-card" style={{ padding: '2rem', background: 'var(--bg-secondary)', borderRadius: '12px', height: 'fit-content' }}>
            <h3 style={{ marginBottom: '1.5rem' }}>Add New Product</h3>
            <form onSubmit={handleAddProduct} style={{ display: 'flex', flexDirection: 'column', gap: '1rem' }}>
              <input type="text" placeholder="Model Name (e.g. APC Smart-UPS)" value={model} onChange={e => setModel(e.target.value)} required style={inputStyle} />
              <input type="text" placeholder="Price (e.g. KSh 12,500)" value={price} onChange={e => setPrice(e.target.value)} required style={inputStyle} />
              <textarea placeholder="Description" value={description} onChange={e => setDescription(e.target.value)} required style={{...inputStyle, minHeight: '80px'}} />
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
            <h3 style={{ marginBottom: '1.5rem' }}>Manage Products</h3>
            {loading ? <p>Loading products...</p> : (
              <div style={{ display: 'flex', flexDirection: 'column', gap: '1rem' }}>
                {products.length === 0 && <p style={{ color: 'var(--text-secondary)' }}>No products found. Add one!</p>}
                {products.map(product => (
                  <div key={product.id} style={{ background: 'var(--bg-secondary)', padding: '1.5rem', borderRadius: '12px', display: 'flex', justifyContent: 'space-between', alignItems: 'center' }}>
                    <div>
                      <h4 style={{ fontSize: '1.2rem', marginBottom: '0.3rem' }}>{product.model}</h4>
                      <p style={{ color: 'var(--accent-blue)', fontWeight: 'bold' }}>{product.price}</p>
                    </div>
                    <button onClick={() => handleDelete(product.id)} style={{ background: '#ef4444', color: '#fff', border: 'none', padding: '0.5rem 1rem', borderRadius: '8px', cursor: 'pointer' }}>Delete</button>
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
  width: '100%', padding: '0.75rem', borderRadius: '8px', border: '1px solid rgba(255,255,255,0.1)', background: 'rgba(255,255,255,0.05)', color: '#fff'
};

export default AdminDashboard;
