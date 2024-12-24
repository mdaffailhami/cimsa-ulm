import 'bootstrap/dist/css/bootstrap.min.css';
import 'aos/dist/aos.css';
import '@fortawesome/fontawesome-free/css/all.min.css';
import './index.css';
import Aos from 'aos';
import { StrictMode } from 'react';
import { createRoot } from 'react-dom/client';
import { BrowserRouter, Route, Routes } from 'react-router';
import NotFoundPage from './routes/NotFoundPage.jsx';
import AboutUsPage from './routes/about-us/AboutUsPage.jsx';
import HomePage from './routes/home/HomePage.jsx';
import Footer from './routes/Footer.jsx';
import Navbar from './routes/Navbar.jsx';
import Logo from './assets/Logo';

createRoot(document.getElementById('root')).render(<App />);

function App() {
  // Initialize AOS
  Aos.init();

  // Change the favicon
  document.head.insertAdjacentHTML(
    'beforeend',
    `<link rel="icon" type="image/svg+xml" href="${Logo}">`
  );

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
