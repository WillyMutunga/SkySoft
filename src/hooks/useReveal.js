import { useEffect } from 'react';
import { useLocation } from 'react-router-dom';

const useReveal = () => {
  const { pathname } = useLocation();

  useEffect(() => {
    // We add a slight delay to ensure the DOM is fully rendered after route change
    const timeout = setTimeout(() => {
      const revealElements = document.querySelectorAll('.reveal');
      
      const revealOptions = {
        threshold: 0.15,
        rootMargin: "0px 0px -50px 0px"
      };

      const revealOnScroll = new IntersectionObserver(function(entries, observer) {
        entries.forEach(entry => {
          if (!entry.isIntersecting) {
            return;
          } else {
            entry.target.classList.add('active');
            observer.unobserve(entry.target);
          }
        });
      }, revealOptions);

      revealElements.forEach(el => revealOnScroll.observe(el));

      return () => {
        revealElements.forEach(el => revealOnScroll.unobserve(el));
      };
    }, 100);

    return () => clearTimeout(timeout);
  }, [pathname]); // Re-run whenever the route changes
};

export default useReveal;
