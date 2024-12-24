import { StrictMode } from 'react';
import { createRoot } from 'react-dom/client';
import 'bootstrap/dist/css/bootstrap.min.css';
import '@fortawesome/fontawesome-free/css/all.min.css';
import './index.css';
import { BrowserRouter, Route, Routes } from 'react-router';
import NotFoundPage from './routes/NotFoundPage.jsx';
import AboutUsPage from './routes/about-us/AboutUsPage.jsx';
import HomePage from './routes/home/HomePage.jsx';
import Footer from './routes/Footer.jsx';
import Navbar from './routes/Navbar.jsx';
import Logo from './assets/logo.png';

createRoot(document.getElementById('root')).render(<App />);

function App() {
  // Change the favicon
  const favicon = document.createElement('link');
  favicon.rel = 'icon';
  favicon.type = 'image/svg+xml';
  favicon.href = Logo;
  document.head.appendChild(favicon);

  return (
    <StrictMode>
      <BrowserRouter>
        <Navbar />
        <Routes>
          <Route index element={<HomePage />} />
          <Route path='about-us' element={<AboutUsPage />} />
          <Route path='*' element={<NotFoundPage />} />
        </Routes>
        <Footer />
      </BrowserRouter>
    </StrictMode>
  );
}
