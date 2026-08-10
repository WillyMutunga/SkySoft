import React, { useState, useEffect } from 'react';
import { collection, addDoc, updateDoc, onSnapshot, deleteDoc, doc } from 'firebase/firestore';
import { ref, uploadBytesResumable, getDownloadURL } from 'firebase/storage';
import { signOut } from 'firebase/auth';
import { db, auth, storage } from '../../firebase';
import { useNavigate } from 'react-router-dom';

const AdminDashboard = () => {
  const [products, setProducts] = useState([]);
  const [loading, setLoading] = useState(true);
  const [uploading, setUploading] = useState(false);
  const navigate = useNavigate();

  // Form states
  const [editId, setEditId] = useState(null);
  const [model, setModel] = useState('');
  const [price, setPrice] = useState('');
  const [description, setDescription] = useState('');
  const [capacity, setCapacity] = useState('');
  const [useCase, setUseCase] = useState('');
  const [theme, setTheme] = useState('blue');
  const [imageFile, setImageFile] = useState(null);
  const [currentImageUrl, setCurrentImageUrl] = useState('');

  useEffect(() => {
    setLoading(true);
    const unsubscribe = onSnapshot(collection(db, "products"), (querySnapshot) => {
      const productsData = [];
      querySnapshot.forEach((doc) => {
        productsData.push({ id: doc.id, ...doc.data() });
      });
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

  const resetForm = () => {
    setEditId(null);
    setModel(''); setPrice(''); setDescription(''); 
    setCapacity(''); setUseCase(''); setTheme('blue');
    setImageFile(null);
    setCurrentImageUrl('');
  };

  const handleEditClick = (product) => {
    setEditId(product.id);
    setModel(product.model);
    setPrice(product.price);
    setDescription(product.description);
    setCapacity(product.capacity);
    setUseCase(product.useCase);
    setTheme(product.theme || 'blue');
    setCurrentImageUrl(product.imageUrl || '');
    setImageFile(null); // Reset any selected file
    window.scrollTo({ top: 0, behavior: 'smooth' });
  };

  const handleSaveProduct = async (e) => {
    e.preventDefault();
    setUploading(true);
    try {
      let imageUrlToSave = currentImageUrl; // Default to existing URL if editing and not replacing

      // If they selected a new file, upload it first
      if (imageFile) {
        const storageRef = ref(storage, `products/${Date.now()}_${imageFile.name}`);
        const uploadTask = await uploadBytesResumable(storageRef, imageFile);
        imageUrlToSave = await getDownloadURL(uploadTask.ref);
      }

      const productData = {
        model,
        price,
        description,
        capacity,
        useCase,
        theme,
        imageUrl: imageUrlToSave
      };

      if (editId) {
        // Update existing document
        await updateDoc(doc(db, "products", editId), productData);
        alert("Product updated successfully!");
      } else {
        // Create new document
        await addDoc(collection(db, "products"), {
          ...productData,
          createdAt: new Date()
        });
        alert("Product added successfully!");
      }
      
      resetForm();
    } catch (err) {
      console.error("Error saving document: ", err);
      alert("Failed to save product. If you're uploading an image, ensure you've enabled Firebase Storage.");
    } finally {
      setUploading(false);
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
          
          {/* Add/Edit Product Form */}
          <div className="service-card" style={{ padding: '2rem', background: 'var(--bg-secondary)', borderRadius: '12px', height: 'fit-content', boxShadow: 'var(--shadow-soft)' }}>
            <div style={{ display: 'flex', justifyContent: 'space-between', alignItems: 'center', marginBottom: '1.5rem' }}>
              <h3 style={{ color: 'var(--text-primary)', margin: 0 }}>{editId ? 'Edit Product' : 'Add New Product'}</h3>
              {editId && <button onClick={resetForm} style={{ background: 'none', border: 'none', color: 'var(--text-secondary)', cursor: 'pointer', fontSize: '0.9rem', textDecoration: 'underline' }}>Cancel Edit</button>}
            </div>
            
            <form onSubmit={handleSaveProduct} style={{ display: 'flex', flexDirection: 'column', gap: '1rem' }}>
              <input type="text" placeholder="Model Name (e.g. APC Smart-UPS)" value={model} onChange={e => setModel(e.target.value)} required style={inputStyle} />
              
              <div>
                <label style={{ fontSize: '0.85rem', color: 'var(--text-secondary)', marginBottom: '0.3rem', display: 'block' }}>Product Image</label>
                {currentImageUrl && <div style={{ marginBottom: '0.5rem' }}><img src={currentImageUrl} alt="Current" style={{ width: '80px', height: '80px', objectFit: 'cover', borderRadius: '8px' }} /></div>}
                <input type="file" accept="image/*" onChange={e => setImageFile(e.target.files[0])} style={{...inputStyle, padding: '0.5rem'}} />
              </div>

              <input type="text" placeholder="Price (e.g. KSh 12,500)" value={price} onChange={e => setPrice(e.target.value)} required style={inputStyle} />
              <textarea placeholder="Description" value={description} onChange={e => setDescription(e.target.value)} required style={{...inputStyle, minHeight: '80px', resize: 'vertical'}} />
              <input type="text" placeholder="Power Capacity (e.g. 800VA / 450W)" value={capacity} onChange={e => setCapacity(e.target.value)} required style={inputStyle} />
              <input type="text" placeholder="Typical Use Case" value={useCase} onChange={e => setUseCase(e.target.value)} required style={inputStyle} />
              <select value={theme} onChange={e => setTheme(e.target.value)} style={inputStyle}>
                <option value="blue">Blue Theme</option>
                <option value="purple">Purple Theme</option>
                <option value="green">Green Theme</option>
              </select>
              
              <button type="submit" className="btn btn-primary" style={{ marginTop: '1rem' }} disabled={uploading}>
                {uploading ? 'Saving & Uploading...' : (editId ? 'Update Product' : 'Add Product')}
              </button>
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
                    <div style={{ display: 'flex', alignItems: 'center', gap: '1rem' }}>
                      {product.imageUrl ? (
                        <img src={product.imageUrl} alt={product.model} style={{ width: '50px', height: '50px', objectFit: 'cover', borderRadius: '8px' }} />
                      ) : (
                        <div style={{ width: '50px', height: '50px', background: 'var(--bg-primary)', borderRadius: '8px', display: 'flex', alignItems: 'center', justifyContent: 'center', fontSize: '0.8rem', color: 'var(--text-secondary)' }}>No Img</div>
                      )}
                      <div>
                        <h4 style={{ fontSize: '1.1rem', marginBottom: '0.2rem', color: 'var(--text-primary)' }}>{product.model}</h4>
                        <p style={{ color: 'var(--accent-blue)', fontWeight: 'bold', fontSize: '0.9rem', margin: 0 }}>{product.price}</p>
                      </div>
                    </div>
                    <div style={{ display: 'flex', gap: '0.5rem' }}>
                      <button onClick={() => handleEditClick(product)} style={{ background: 'var(--bg-primary)', color: 'var(--text-primary)', border: '1px solid rgba(0,0,0,0.1)', padding: '0.5rem 1rem', borderRadius: '8px', cursor: 'pointer', fontWeight: 'bold' }}>Edit</button>
                      <button onClick={() => handleDelete(product.id)} style={{ background: '#ef4444', color: '#fff', border: 'none', padding: '0.5rem 1rem', borderRadius: '8px', cursor: 'pointer', fontWeight: 'bold' }}>Delete</button>
                    </div>
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
