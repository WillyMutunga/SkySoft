import React, { useEffect, useState } from 'react';
import { BrowserRouter as Router, Routes, Route, Link, useLocation } from 'react-router-dom';
import Home from './pages/Home';
import Solutions from './pages/Solutions';
import Products from './pages/Products';
import Contact from './pages/Contact';
import useReveal from './hooks/useReveal';

const ScrollToTop = () => {
  const { pathname } = useLocation();
  useEffect(() => {
    window.scrollTo(0, 0);
  }, [pathname]);
  return null;
};

const Navbar = () => {
  const [scrolled, setScrolled] = useState(false);
  const [isMobileMenuOpen, setIsMobileMenuOpen] = useState(false);
  const { pathname } = useLocation();

  useEffect(() => {
    const handleScroll = () => {
      setScrolled(window.scrollY > 50);
    };
    window.addEventListener('scroll', handleScroll);
    return () => window.removeEventListener('scroll', handleScroll);
  }, []);

  const closeMenu = () => setIsMobileMenuOpen(false);

  return (
    <nav className={`navbar ${scrolled ? 'scrolled' : ''}`}>
      <div className="nav-container">
        <div className="logo">
          <Link style={{ display: 'flex', alignItems: 'center', gap: '10px' }} to="/" onClick={closeMenu}>
            <img src="/assets/images/logo.jpg" alt="SkySoft Logo" className="logo-img" />
            <span>Sky</span><span>Soft</span> <span>Systems</span>
          </Link>
        </div>
        
        <div className="hamburger" onClick={() => setIsMobileMenuOpen(!isMobileMenuOpen)}>
          <span className={isMobileMenuOpen ? 'bar active' : 'bar'}></span>
          <span className={isMobileMenuOpen ? 'bar active' : 'bar'}></span>
          <span className={isMobileMenuOpen ? 'bar active' : 'bar'}></span>
        </div>

        <div className={`nav-links ${isMobileMenuOpen ? 'open' : ''}`}>
          <Link to="/" className={pathname === '/' ? 'active' : ''} onClick={closeMenu}>Home</Link>
          <a href="/#about" onClick={closeMenu}>About Us</a>
          <a href="/#services" onClick={closeMenu}>Services</a>
          <Link to="/products" className={pathname === '/products' ? 'active' : ''} onClick={closeMenu}>Products</Link>
          <Link to="/solutions" className={pathname === '/solutions' ? 'active' : ''} onClick={closeMenu}>Solutions</Link>
          <Link to="/contact" className={pathname === '/contact' ? 'active' : ''} onClick={closeMenu}>Contact</Link>
        </div>
      </div>
    </nav>
  );
};

const Footer = () => (
  <footer>
    <div className="container footer-content">
      <div className="logo">
        <img src="/assets/images/logo.jpg" alt="SkySoft Logo" className="logo-img" />
        <span>Sky</span><span>Soft</span> <span>Systems</span>
      </div>
      <p className="copyright">&copy; 2026 SkySoft Systems. All rights reserved.</p>
    </div>
  </footer>
);

// We need a wrapper inside Router to use the custom hook since it uses useLocation
const AppContent = () => {
  useReveal(); // Initialize reveal animations on every route change

  return (
    <>
      <ScrollToTop />
      <Navbar />
      <Routes>
        <Route path="/" element={<Home />} />
        <Route path="/products" element={<Products />} />
        <Route path="/solutions" element={<Solutions />} />
        <Route path="/contact" element={<Contact />} />
      </Routes>
      <Footer />
    </>
  );
};

function App() {
  return (
    <Router>
      <AppContent />
    </Router>
  );
}

export default App;
